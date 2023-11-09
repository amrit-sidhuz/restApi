<?php
include "config.php";
?>

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.css" />
            <title>Administrator</title>
            <style>
                #LoadingPageScreen{
                    width:100%;
                    height: 100%;
                    text-align: center;
                    font-size: 70px;
                    padding-top: 25%;
                }   
            </style>

        </head>
        <body id="Body">

        </body>

        <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.js"></script>
            <script>
                // Initialize Firebase
        var config = {
            apiKey: "<?php echo apiKey; ?>",
            authDomain: "<?php echo authDomain; ?>",
            databaseURL: "<?php echo databaseURL; ?>",
            projectId: "<?php echo projectId; ?>",
            storageBucket: "<?php echo storageBucket; ?>",
            messagingSenderId: "<?php echo messagingSenderId; ?>"
        };
        firebase.initializeApp(config);

                // Auth Login
                var email = "365smartnetwork@gmail.com";
                var password = "Pardeep@123";


                // firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
                //     console.log(error);
                //     // Handle Errors here.
                //     var errorCode = error.code;
                //     var errorMessage = error.message;
                //     // ...
                // });

                firebase.auth().signOut().then(function() {
                // Sign-out successful.
                }).catch(function(error) {
                // An error happened.
                });



            </script>
        </html>