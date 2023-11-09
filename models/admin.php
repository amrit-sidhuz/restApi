<?php
include "config.php";
session_start();
if (isset($_GET['match_id']) && $_GET['match_id']) {
    $match_id = $_GET['match_id'];
    $view = $_GET['view']; 
?>
Nothing here
<?php

} else {
    // $adminUserName = "365smartnetwork@gmail.com";
    // $adminPassword = "P@rd33p@123";    
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
            
    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center">Admin Login</h4>
              </div>
                <form action="" method="POST" id="adminLoginForm">
                    <div class="modal-body">
                      <div class="form-group">
                          <label>Username</label>
                           <input name="username" style="padding: 5px; font-size: 30px;text-align: center; font-weight: bold;" id="UsernameInput" type="text" value="<?php if(isset($_POST['username'])){ 
                echo $_POST['username']; 
            } ?>" class="form-control" placeholder="" />
                       </div>

                      <div class="form-group">
                           <label>Password</label>
                           <input name="password"  style="padding: 5px; font-size: 30px;text-align: center; font-weight: bold;" id="PasswordInput" type="password" class="form-control" placeholder="" />
                       </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="AdminLoginBtn" class="btn btn-success btn-lg btn-block">Login</button>
                    </div>
                </form>
            </div>

          </div>
        </div>
       
       
            
       <div id="LoadingPageScreen">
           Loading....
       </div>
                   
       
       <div id="EntireBodyContent" style="display:none">
              
           <div class="container-fluid" style="padding:10px; padding-bottom:0px;">
            <a id="logoutBtn" href="javascript:void()" class="btn btn-success btn-lg" style="float:right">Log out</a>
          <h1 id="MatchTitle">
             Live Tournaments Management System
          </h1>
        </div>
           
        
           <hr>
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                    <th>Main Screen title</th>
                                    <th>Teams</th>
                                    <th>Team 1 Score</th>
                                    <th>Team 2 Score</th>
                                    <th>Manage Content</th>
                                    <th>View Match</th>
                                    <th>Edit Score</th>
                                    <th>Remove</th>
                            </thead>
                            <tbody id="listmatches">
                                <tr>
                                    <td> Loading Content..</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>

                    </div>    
                    <div class="col-12 col-md-4">

                        <div class="card">
                            <div class="card-header">
                                Create a match
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Screen Title</label>
                                        <input id="matchScreenMainTitle" type="text" class="form-control" placeholder="Set main screen title">                                      
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Team 1 Name <sup style="color:red">*</sup></label>
                                        <input id="Team1Name" type="text" class="form-control" placeholder="Enter name of team 1">                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Team 2 Name <sup style="color:red">*</sup></label>
                                        <input id="Team2Name" type="text" class="form-control" placeholder="Enter name of team 2">                                      
                                    </div>
                                    <button id="saveMatch" type="submit" class="btn btn-primary btn-block">Add</button>
                            </div>
                        </div>

                        <br>

                        <div class="card border-danger">
                            <div class="card-header text-white bg-danger ">
                                Create a user
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Email</label>
                                        <input id="userEmail" type="text" class="form-control" placeholder="Enter email address for the user">                                      
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password <sup style="color:red">*</sup></label>
                                        <input id="userPassword" type="text" class="form-control" placeholder="Enter password for the user">                                      
                                    </div>                                    
                                    <button id="createUser" type="submit" class="btn btn-danger btn-block">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>

       

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

                firebase.auth().onAuthStateChanged(function(user) {
                    if (user) {
                        // User is signed in.
                        $("#EntireBodyContent").show();
                    } else {
                        // No user is signed in.
                        $("#EntireBodyContent").hide();
                        $('#myModal').modal({
                                backdrop: 'static',
                                keyboard: false
                        });
                        
                    }
                });  
                
                var matchesRef = firebase.database().ref('matches');
                matchesRef.on('value', function(snapshot){
                    var ListofMatches = [];
                    var data = snapshot.val();                    
                    $.each(data, function(key, val) {
                        if(val.showtoAdmin){
                            
                            // var match = '<tr><td>'+val.matchScreenMainTitle+'</td><td>'+val.MatchTitle+'<hr> OP: <b>'+val.operatorOneTimePassword+'</b> </td><td>'+val.Team1Score+'</td><td>'+val.Team2Score+'</td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match_screen_content.php?match_id='+key+'"><button class="btn btn-primary btn-block" id="'+key+'">Manage</button></a><p style="margin-top:10px"><button class="btn btn-success btn-block updateOTP" id="'+key+'">Update OP</button></p></td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match.php?match_id='+key+'"><button class="btn btn-primary" id="'+key+'">View</button></a></td><td class="text-center"><a href="<?php echo BASE_URL;?>/score.php?view=camera&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Camera</button></a><br><a style="margin-bottom:15px;" href="<?php echo BASE_URL;?>/score.php?view=opposite&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Opposite</button></a></td><td class="text-center"><button class="removeItem btn btn-danger" id="'+key+'">Remove</button></td></tr>';
                            // ListofMatches.push(match);

                            var match = '<tr><td>'+val.matchScreenMainTitle+'</td><td>'+val.MatchTitle+'</td><td>'+val.Team1Score+'</td><td>'+val.Team2Score+'</td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match_screen_content.php?match_id='+key+'"><button class="btn btn-primary btn-block" id="'+key+'">Manage</button></a></td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match.php?match_id='+key+'"><button class="btn btn-primary" id="'+key+'">View</button></a></td><td class="text-center"><a href="<?php echo BASE_URL;?>/score.php?view=camera&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Camera</button></a><br><a style="margin-bottom:15px;" href="<?php echo BASE_URL;?>/score.php?view=opposite&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Opposite</button></a></td><td class="text-center"><button class="removeItem btn btn-danger" id="'+key+'">Remove</button></td></tr>';
                            ListofMatches.push(match);
                        }                         
                    });
                    var final_array = ListofMatches.join();
                    $("#listmatches").html(final_array);
                });


                // // List all the users listed in the system
                // firebase.auth().listUsers(100, 1)
                // .then(function(listUsersResult) {
                //     listUsersResult.users.forEach(function(userRecord) {
                //         console.log('user', userRecord.toJSON());
                //     });               
                // })
                // .catch(function(error) {
                //     console.log('Error listing users:', error);
                // });
                
                $(document).on('click', ".updateOTP", function() {
                    var matchId = $(this).attr("id");
                    
                    swal({
                        title: 'Enter a new password for operator',
                        input: 'text',
                        inputAttributes: {
                          autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Save Password',
                      }).then((result) => {
                          if (result === false) return false;   
                          if(result.value !== ""){
                            var matchRef = firebase.database().ref('matches/'+matchId);  
                            matchRef.update({"operatorOneTimePassword": result.value});

                            swal({
                                  type: 'success',
                                  title: 'Oops...',
                                  text: 'Password updated successfully!',
                             })
                            return false;
                          }
                      })
                    
                });
                
                $("#saveMatch").on("click", function(){
                    var Team1Name = $("#Team1Name").val();
                    if(!Team1Name || Team1Name == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Team name 1 missing',
                          })
                        return false;
                    }
                    var Team2Name = $("#Team2Name").val();
                    if(!Team2Name || Team2Name == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Team name 2 missing',
                          })
                        return false;
                    }
                    var data = {};
                        data.matchScreenMainTitle = $("#matchScreenMainTitle").val();
                        data.Team1Name = Team1Name;
                        data.Team2Name = Team2Name;
                        data.MatchTitle = Team1Name+" vs "+Team2Name;
                        data.Team1Score = 0;
                        data.Team2Score = 0;
                        data.showtoAdmin = true;
                        data.MatchLive = false;
                        data.created = new Date().getTime();
                        
                    matchesRef.push(data);     
                   $("#Team1Name").val("");     
                   $("#Team2Name").val("");   
                    
                });
                
                $(document).on('click', ".removeItem" , function() {
                    var matchId = $(this).attr("id"); 
                    swal({
                        title: 'Are you sure you want to remove this match?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.value) {
                            matchesRef.child(matchId).update({"MatchLive": false,"showtoAdmin": false });
                        }
                      })
                });
                $("#LoadingPageScreen").hide();
                    

               
                
               
                    
                 $(document).on('click', "#AdminLoginBtn", function() {
                    var userName = $("#UsernameInput").val();
                    var passWord = $("#PasswordInput").val();
                    if (!userName || userName == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please enter your username',
                        });
                        return false;
                    }
                    
                    if (!passWord || passWord == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please enter your password',
                        });
                        return false;
                    }

                    if (userName === "amrit.kb365@gmail.com"){
                        firebase.auth().signInWithEmailAndPassword( userName, passWord).then(function(data){
                        console.log(data);   
                        console.log(data.email); 
                        
                        $.post("<?php echo BASE_URL;?>/session.php", {"adminUserName": data.email, "adminSuccessFullyLoggedIn" : "true", "referralUrl": "<?php echo BASE_URL;?>/admin.php"});
                        setTimeout(() => {
                            $('#myModal').modal("hide");
                            $("#EntireBodyContent").show();
                        }, 250);

                        }).catch(function(error) {
                            var errorCode = error.code;
                            var errorMessage = error.message;
                            swal({
                                type: 'error',
                                title: 'Error Code: '+errorCode,
                                text: errorMessage,
                            });
                        });
                    }else{
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Sorry you are not authorized to access this section.',
                        });
                        return false;
                    }                    
                });        

                $(document).on('click', "#createUser", function() {
                    var userEmail = $("#userEmail").val();
                    var userPassword = $("#userPassword").val();

                    if (!userEmail || userEmail == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please enter email address',
                        });
                        return false;
                    }
                    if (!userPassword || userPassword == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please enter a password',
                        });
                        return false;
                    }          
                    
                    firebase.auth().createUserWithEmailAndPassword( userEmail, userPassword).then(function(data){
                        
                        var allowedUids = firebase.database().ref('allowedUids');
                        // allowedUids.push({data.uid: true});
                        // matchesRef.push(firebase.auth().);

                        $("#userEmail").val("");
                        $("#userPassword").val("");
                        swal({
                            type: 'success',
                            title: "User Added!",
                            text: "User with email "+userEmail+" was successfully added",
                        });
                    }).catch(function(error) {
                            var errorCode = error.code;
                            var errorMessage = error.message;
                            swal({
                                type: 'error',
                                title: 'Error Code: '+errorCode,
                                text: errorMessage,
                            });
                    });
                });

                $(document).on('click', "#logoutBtn", function() {
                    firebase.auth().signOut().then(function() {
                        $.post("<?php echo BASE_URL;?>/logout.php", {"referralUrl": "<?php echo BASE_URL;?>/admin.php"});
                    // Sign-out successful.
                    }).catch(function(error) {
                    // An error happened.
                    });
                });
            </script>
        </body>
    </html>
<?php
    } ?>
