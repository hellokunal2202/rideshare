<?php 
    session_start();
    include('connection.php');

    if($_REQUEST['action']==='sendReq')
    {
        $driver_id  = $_REQUEST['id'];
        $trip_id=$_REQUEST['trip_id'];
        $user_id = $_SESSION['user_id'];

        // $dateAdded_now = date('Y-m-d');
        $request = "INSERT INTO riderequest(user_id, driver_id, status,	trip_id) VALUES ('$user_id','$driver_id','pending','$trip_id')";
        $request_query = mysqli_query($link, $request);

        // $sql = "INSERT INTO requests (sendingfrom, sendingto, dateAdded) VALUES ('$reqSendingFrom', '$reqSendingTo', '$dateAdded_now')"; 

        // $sql_requestFrom_name = "SELECT name FROM register where id = '$reqSendingFrom'";
        // $sql_requestTo_name = "SELECT name FROM register where id = '$reqSendingTo'";

        // $result_FROM = mysqli_query($conn, $sql_requestFrom_name);   
        // $result_TO = mysqli_query($conn, $sql_requestTo_name);   

        // $row_name_from = mysqli_fetch_assoc($result_FROM);
        // $row_name_TO = mysqli_fetch_assoc($result_TO);

        //     $message =  
        //     $row_name_from['name'].' Sent You Request 
        //     <button class="btn btn-primary" onclick="reqAction(1,'.$reqSendingFrom.')">Accept</button> 
        //     <button class="btn btn-success" onclick="reqAction(2,'.$reqSendingFrom.')">Reject</button>';




        // $sql_notification = "INSERT INTO notifications (noti_From, noti_To, message, is_read, date_added) VALUES ('$reqSendingFrom', '$reqSendingTo', '$message', '0', '$dateAdded_now')"; 

        
        if ($request_query) {
            $success  =  "Request send, saved into DB";
        } else {
            $success  =  "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
 

    }
    else if($_REQUEST['action']==='RequestSection'){
        $request_id  = $_REQUEST['request_id'];
        $user_id = $_SESSION['user_id'];
        // $dateAdded_now = date('Y-m-d');
        $update_req = "UPDATE riderequest SET status='accepted' WHERE request_id='$request_id'";
        $result = mysqli_query($link, $update_req);
        if($result){
            $seat_query = "update carsharetrips set seatsavailable = seatsavailable-1 where trip_id = (select trip_id from riderequest where request_id = '$request_id')";
            $seat_result = mysqli_query($link, $seat_query);
            echo "Request Accepted";

        }
        else{
            echo "Error";
        }

        
        
        
    }

?>
