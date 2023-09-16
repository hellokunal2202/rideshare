<?php
// session_start();
include('connection.php');
//logout
include('logout.php');

//remember me
include('remember.php');
?>
<?php
    if(isset($_SESSION["user_id"])){
        include("navigationbarconnected.php");
    }else{
        include("navigationbarnotconnected.php");
    }  
    ?>
    

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Sharing </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="styling.css">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/sunny/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAqae-o5nTRe28k9M3BazQIPzkr9AQB3zw"></script>
      <style>



.container {
    text-align: left;
    background-color: #fff;
    padding: 20px;
    position: absolute;
    top: 100px;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
}





.notification {
    color: black;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.notification-text {
    flex-grow: 1;
}

.accept-button, .delete-button {
    background-color: #004658;
    color: #fff;
    border: none;
    padding: 5px 15px;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.accept-button:hover {
    background-color: #0056b3;
}

.delete-button:hover {
    background-color: #ff6b6b;
}

/* Add a horizontal line between notifications */
.notification + .notification {
    border-top: 1px solid #ccc;
    margin-top: 10px;
}

       
        </style>
<body>
<div class="container">
        <div id="notificationContainer">
            <?php
            

            $notifications = [
                'This is notification 1.',
                'Notification 2: You have a new message.',
                'Notification 3: Welcome to our website!',
                'Notification 4: Don\'t forget to subscribe!',
                'Notification 5: Today is a special day!'
            ];

            // Check if a notification is set and display it
            if (isset($_SESSION['notification'])) {
                echo '<div class="notification">' . $_SESSION['notification'] . '</div>';
                unset($_SESSION['notification']); // Clear the session-based notification
            }

            // Display the example notifications with "Accept" and "Delete" buttons
            foreach ($notifications as $index => $notification) {
                echo '<div class="notification">';
                echo '<span class="notification-text">' . $notification . '</span>';
                echo '<button onclick="acceptNotification(' . $index . ')" class="accept-button">Accept</button>';
                echo '<button onclick="deleteNotification(' . $index . ')" class="delete-button">Delete</button>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script>
        function acceptNotification(index) {
            // Implement your logic to accept the notification
            // For now, we'll just hide the notification on the client-side
            const notificationDiv = document.querySelectorAll('.notification')[index];
            notificationDiv.style.display = 'none';
        }

        function deleteNotification(index) {
            // Implement your logic to delete the notification
            // For now, we'll just hide the notification on the client-side
            const notificationDiv = document.querySelectorAll('.notification')[index];
            notificationDiv.style.display = 'none';
        }
    </script>
</body>
</html>
