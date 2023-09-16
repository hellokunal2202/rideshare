//create a geocoder object to use the geocode
var geocoder = new google.maps.Geocoder();
var data;

//Ajax Call for the sign up form 
//Once the form is submitted
$("#signupform").submit(function(event){
    //hide message
    $("#signupmessage").hide();
    //show spinner
    $("#spinner").css("display", "block");
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
                //hide spinner
                $("#spinner").css("display", "none");
                //show message
                $("#signupmessage").slideDown();
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show message
            $("#signupmessage").slideDown();
            
        }
    
    });

});

//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event) {
    // Hide message
    $("#loginmessage").hide();
    // Prevent default php processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();

    // Send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            console.log(data); // Check what data is received from the server
            if (data) {
                // Redirect to mainpageloggedin.php on successful login
                window.location = "mainpageloggedin.php";
            } else {
                $('#loginmessage').html(data);
                // Show message
                $("#loginmessage").slideDown();
            }
        },
        
        error: function() {
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            // Show message
            $("#loginmessage").slideDown();
        }
    });
});



//Ajax Call for the forgot password form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){ 
    //hide message
    $("#forgotpasswordmessage").hide();
    //show spinner
    $("#spinner").css("display", "block");
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#forgotpasswordmessage').html(data);
            //hide spinner
            $("#spinner").css("display", "none");
            //show message
            $("#forgotpasswordmessage").slideDown();
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show message
            $("#forgotpasswordmessage").slideDown();
        }
    
    });

});

//Ajax Call for the search form 
$("#searchform").submit(function(event){
    $("#results").fadeOut();
    // $("#spinner").css("display", "block");
    event.preventDefault();
    data = $(this).serializeArray();
    console.log(data);
    
    $.ajax({
        url: "search.php",
        data: data,
        type: "POST",
        success: function(data2){
            console.log(data);
            if(data2){
                $('#results').html(data2);
                //accordion
                $("#message").accordion({
                    icons: false,
                    active:false,
                    collapsible: true,
                    heightStyle: "content"   
                });
            }
            $("#spinner").css("display", "none");
            $("#results").fadeIn();
    },
        error: function(){
            $("#results").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#spinner").css("display", "none");
            $("#results").fadeIn();

}
    }); 
   
    
});
                        
    //define functions
    // function getSearchTripDepartureCoordinates(){
    //     geocoder.geocode(
    //         {
    //             'address' : document.getElementById("departure").value
    //         },
    //         function(results, status){
    //             if(status == google.maps.GeocoderStatus.OK){
    //                 departureLongitude = results[0].geometry.location.lng();
    //                 departureLatitude = results[0].geometry.location.lat();
    //                 data.push({name:'departureLongitude', value: departureLongitude});
    //                 data.push({name:'departureLatitude', value: departureLatitude});
    //                 getSearchTripDestinationCoordinates();
    //             }else{
    //                 getSearchTripDestinationCoordinates();
    //             }

    //         }
    //     );
    // }

    // function getSearchTripDestinationCoordinates(){
    //     geocoder.geocode(
    //         {
    //             'address' : document.getElementById("destination").value
    //         },
    //         function(results, status){
    //             if(status == google.maps.GeocoderStatus.OK){
    //                 destinationLongitude = results[0].geometry.location.lng();
    //                 destinationLatitude = results[0].geometry.location.lat();
    //                 data.push({name:'destinationLongitude', value: destinationLongitude});
    //                 data.push({name:'destinationLatitude', value: destinationLatitude});
    //                 submitSearchTripRequest();
    //             }else{
    //                 submitSearchTripRequest();
    //             }

    //         }
    //     );

    // }







