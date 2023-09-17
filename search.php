<?php
// Start session and connect to the database
session_start();
include('connection.php');

// Define error messages
$missingdeparture = '<p><strong>Please enter your departure!</strong></p>';
$invaliddeparture = '<p><strong>Please enter a valid departure!</strong></p>';
$missingdestination = '<p><strong>Please enter your destination!</strong></p>';
$invaliddestination = '<p><strong>Please enter a valid destination!</strong></p>';

// Initialize error variable
$errors = '';

// Get inputs
$departure = $_POST["departure"];
$destination = $_POST["destination"];
$tripPrice='';
$moreInformation='';



// Check coordinates
// if (!isset($_POST["departureLatitude"]) || !isset($_POST["departureLongitude"])) {
//     $errors .= $invaliddeparture;
// } else {
//     $departureLatitude = $_POST["departureLatitude"];
//     $departureLongitude = $_POST["departureLongitude"];
// }

// if (!isset($_POST["destinationLatitude"]) || !isset($_POST["destinationLongitude"])) {
//     $errors .= $invaliddestination;
// } else {
//     $destinationLatitude = $_POST["destinationLatitude"];
//     $destinationLongitude = $_POST["destinationLongitude"];
// }

// Set search radius
// $searchRadius = 10;

// Calculate min and max coordinates for departure
// $deltaLongitudeDeparture = $searchRadius * 360 / (24901 * cos(deg2rad($departureLatitude)));
// $minLongitudeDeparture = $departureLongitude - $deltaLongitudeDeparture;
// $maxLongitudeDeparture = $departureLongitude + $deltaLongitudeDeparture;

// if ($minLongitudeDeparture < -180) {
//     $minLongitudeDeparture += 360;
// }
// if ($maxLongitudeDeparture > 180) {
//     $maxLongitudeDeparture -= 360;
// }

// Calculate min and max coordinates for destination
// $deltaLongitudeDestination = $searchRadius * 360 / (24901 * cos(deg2rad($destinationLatitude)));
// $minLongitudeDestination = $destinationLongitude - $deltaLongitudeDestination;
// $maxLongitudeDestination = $destinationLongitude + $deltaLongitudeDestination;

// if ($minLongitudeDestination < -180) {
//     $minLongitudeDestination += 360;
// }
// if ($maxLongitudeDestination > 180) {
//     $maxLongitudeDestination -= 360;
// }

// Calculate min and max latitude for departure and destination
// $deltaLatitude = $searchRadius * 180 / 12430;
// $minLatitudeDeparture = $departureLatitude - $deltaLatitude;
// $maxLatitudeDeparture = $departureLatitude + $deltaLatitude;

// if ($minLatitudeDeparture < -90) {
//     $minLatitudeDeparture = -90;
// }
// if ($maxLatitudeDeparture > 90) {
//     $maxLatitudeDeparture = 90;
// }

// $minLatitudeDestination = $destinationLatitude - $deltaLatitude;
// $maxLatitudeDestination = $destinationLatitude + $deltaLatitude;

// if ($minLatitudeDestination < -90) {
//     $minLatitudeDestination = -90;
// }
// if ($maxLatitudeDestination > 90) {
//     $maxLatitudeDestination = 90;
// }

// Check departure
if (!$departure) {
    $errors .= $missingdeparture;
} else {
    $departure = filter_var($departure, FILTER_SANITIZE_STRING);
}

// Check destination
if (!$destination) {
    $errors .= $missingdestination;
} else {
    $destination = filter_var($destination, FILTER_SANITIZE_STRING);
}

// If there are errors, print error message
if ($errors) {
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

// Get all available trips in the carsharetrips table
// $myArray = [
//     $minLongitudeDeparture < $maxLongitudeDeparture,
//     $minLatitudeDeparture < $maxLatitudeDeparture,
//     $minLongitudeDestination < $maxLongitudeDestination,
//     $minLatitudeDestination < $maxLatitudeDestination
// ];

// $queryChoice1 = [
//     " (departureLongitude BETWEEN $minLongitudeDeparture AND $maxLongitudeDeparture)",
//     " AND (departureLatitude BETWEEN $minLatitudeDeparture AND $maxLatitudeDeparture)",
//     " AND (destinationLongitude BETWEEN $minLongitudeDestination AND $maxLongitudeDestination)",
//     " AND (destinationLatitude BETWEEN $minLatitudeDestination AND $maxLatitudeDestination)"
// ];

// $queryChoice2 = [
//     " ((departureLongitude > $minLongitudeDeparture) OR (departureLongitude < $maxLongitudeDeparture))",
//     " AND (departureLatitude BETWEEN $minLatitudeDeparture AND $maxLatitudeDeparture)",
//     " AND ((destinationLongitude > $minLongitudeDestination) OR (destinationLongitude < $maxLongitudeDestination))",
//     " AND (destinationLatitude BETWEEN $minLatitudeDestination AND $maxLatitudeDestination)"
// ];

// $queryChoices = [$queryChoice2, $queryChoice1];

// $sql = "SELECT * FROM carsharetrips WHERE ";

// for ($value = 0; $value < 4; $value++) {
//     $index = $myArray[$value];
//     $sql .= $queryChoices[$index][$value];
// }
$sql = "SELECT * FROM carsharetrips WHERE departure='$departure' AND destination='$destination'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "ERROR: Unable to execute: $sql. " . mysqli_error($link);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-info noresults'>There are no journeys matching your search!</div>";
    exit;
}

echo "<div class='alert alert-info journeysummary'>From $departure to $destination.<br />Closest Journeys:</div>";
echo '<div id="message">';

// Cycle through trips and find close ones

// Retrieve each row in $result
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{

    // Check if the trip date is in the past
    $dateOK = 1;
    if ($row['regular'] == "N") {
        $source = $row['date'];
        $tripDate = DateTime::createFromFormat('D d M, Y', $source);
        $today = date("D d M, Y");
        $todayDate = DateTime::createFromFormat('D d M, Y', $today);
        $dateOK = ($tripDate > $todayDate);
    }


    // If date is ok
    if ($dateOK) 
    {
        // Print trip

        // Get trip user id
        $person_id = $row['user_id'];


        // Run query to get user details
        $sql2 = "SELECT * FROM users WHERE user_id='$person_id' LIMIT 1";
        $result2 = mysqli_query($link, $sql2);

        if ($result2) 
        {

            // Get user details
            $row2 = mysqli_fetch_array($result2);

            // Get phone number:
            if (isset($_SESSION['user_id'])) {
                $phonenumber = $row2['phonenumber'];

            } else {
                $phonenumber = "Please sign up! Only members have access to contact information.";
            }

            // Get picture
            $picture = $row2['profilepicture'];
            // Get firstname
            $firstname = $row2['first_name'];

            // Get gender
            $gender = $row2['gender'];

            // More information
            
  
            //more information
            $moreInformation = $row2['moreinformation'];
            
            //get trip departure
            // $tripDeparture = $row['departure'];
            
            //get trip destination
            // $tripDestination = $row['destination'];
            
            //get trip price
            $tripPrice = $row['price'];
            
            //get seats available in the trip
            $seatsAvailable = $row['seatsavailable'];
            
            //Get trip frequency and time:
            if($row['regular']=="N"){
                $frequency = "One-off journey.";
                $time = $row['date']." at " .$row['time'].".";
            }else{
                $frequency = "Regular.";
                $weekdays=['monday'=>'Mon','tuesday'=>'Tue','wednesday'=>'Wed','thursday'=>'Thu','friday'=>'Fri','saturday'=>'Sat','sunday'=>'Sun'];
                $array = [];
                foreach($weekdays  as $key => $value){
                    if($row[$key]==1){
                        array_push($array,$value);
                    }
                    $time = implode("-", $array)." at " .$row['time'].".";
                }
            }
            
            //print trip
            echo 
             "<h3 class='row'>
                <div class='col-sm-3 journey' >
                    <div class='driver' >$firstname  &#160;
                    </div>
                    <div>
                        <img class='previewing' src='$picture' />
                    </div>
                </div>

                <div class='col-sm-7 journey'>
                    <div>
                        <span class='departure'>Departure:
                        </span> 
                        $departure.
                    </div>
                    <div>
                        <span class='destination'>Destination:
                        </span> 
                        $destination.
                    </div>
                    <div class='time'>
                        $time
                    </div>
                    <div>
                        $frequency
                    </div>
                </div>

                <div class='col-sm-2 price journey2'>
                    <div class='price'>
                        Rs$tripPrice
                    </div>

                    <div class='perseat'>
                        Per Seat
                    </div>
                    <div class='seatsavailable'>
                        $seatsAvailable left
                    </div>
                </div>
            </h3>";
            
            echo 
            "<div class='moreinfo'>
                <div>
                    <div>
                        Gender: $gender
                    </div>
                    <div class='telephone'>
                        &#9742: $phonenumber
                    </div>";
      
                
                    
                    if (isset($_SESSION['user_id'])) 
                    {
                        // echo $person_id;
                        $trip_id = $row['trip_id'];

                        // echo $trip_id;
                        // echo $_SESSION['user_id'];
              
?>                      
                    <!-- <button type='button' class='btn btn-lg green signup'><a href='request_query.php?id=<?php echo $row['user_id'],$person_id ?>'>Send request</a></button> -->
                    <button class='btn btn-lg green signup' id='sendReq' onclick='sendAction(1,"<?php echo $person_id ?>","<?php echo $trip_id ?>")'>Send Request</button>
                    <span id="req_send_alert"></span>
<script>
function sendAction(constant,driver_id,trip_id){
    alert("Request Sent !");
    btn = document.getElementById('sendReq');
    spn = document.getElementById('req_send_alert');
    btn.style.display="none";
    spn.innerHTML = "Request Sent !";

   $.post(`request_query.php?action=sendReq&id=${driver_id}&trip_id=${trip_id}`,function(res){   })


} 
</script>

                    
<?php
        
                    }
          
            echo "</div>
                <div class='aboutme'>
                About me: $moreInformation
                </div>
            </div>";
        }
    }
}

?>





















