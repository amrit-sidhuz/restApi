<?php
include "config.php";

session_start();
if (isset($_GET['match_id']) && $_GET['match_id']) {
    $match_id = $_GET['match_id'];
    $view = $_GET['view']; 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        <title>Live Scores | Kabaddi365.com</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.css" />
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
         
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
                <h4 class="modal-title text-center">Operator Login</h4>
              </div>
              <div class="modal-body">
                  
                  <p>Enter your one time password provided by your administrator.</p>
                    <div class="form-group">
                     <input style="padding: 5px; font-size: 30px;text-align: center; font-weight: bold;" id="oneTimePasswordInput" type="text" class="form-control" placeholder="" />
                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="enterOneTimePasswordBtn" class="btn btn-success btn-lg btn-block">Login</button>
              </div>
            </div>

          </div>
        </div>
       
       
       <div id="LoadingPageScreen">
           Loading....
       </div>
       
       
       
       <div id="EntireBodyContent" style="display:none">
                
    <table class="table table-striped" style="text-align: center;">
        <tr>

            <?php if ($view == 'camera') {
        ?>
                <th>
                    <span id="Team1Name">Loading...</span>
                    <i id="editBtnTeam1" class="fa fa-edit" style="color: #007bff; margin-left: 15px;"></i>
                        <input type="text" style="text-align: center" class="form-control" id="Team1NameEditBox" value="" />
                        <button class="btn btn-success btn-block" id="Team1NameEditBoxBtn">Update</button>
                </th>
                
                <th>
                    <span id="Team2Name">Loading...</span>
                    <i id="editBtnTeam2" class="fa fa-edit"  style="color: #007bff;  margin-left: 15px;"></i>
                        <input type="text" style="text-align: center" class="form-control" id="Team2NameEditBox" value="" />
                        <button class="btn btn-success btn-block" id="Team2NameEditBoxBtn">Update</button>
                </th>
            <?php
    } else {
        ?>
                <th>
                    <span id="Team2Name">Loading...</span>
                    <i id="editBtnTeam2" class="fa fa-edit"  style="color: #007bff;  margin-left: 15px;"></i>
                        <input type="text" style="text-align: center" class="form-control" id="Team2NameEditBox" value="" />
                        <button class="btn btn-success btn-block" id="Team2NameEditBoxBtn">Update</button>
                </th>
                <th>
                    <span id="Team1Name">Loading...</span>
                    <i id="editBtnTeam1" class="fa fa-edit" style="color: #007bff; margin-left: 15px;"></i>
                        <input type="text" style="text-align: center" class="form-control" id="Team1NameEditBox" value="" />
                        <button class="btn btn-success btn-block" id="Team1NameEditBoxBtn">Update</button>
                </th>
            <?php
    } ?>

        </tr>
        <tr style="font-size: 50px;">

<?php if ($view == 'camera') {
        ?>

            <th>
                <span id="Team1Score">0</span>
                <hr>
                <button class="btn btn-success btn-lg" id="Team1ScorePlusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">+</button>
                
                <button class="btn btn-danger btn-lg" id="Team1ScoreMinusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">-</button>
                
            </th>
            <th>
                <span id="Team2Score">0</span>
                <hr>
                <button class="btn btn-success btn-lg" id="Team2ScorePlusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">+</button>
                
                <button class="btn btn-danger btn-lg" id="Team2ScoreMinusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">-</button>
            </th>

<?php
    } else {
        ?>
    <th>
                <span id="Team2Score">0</span>
                <hr>
                <button class="btn btn-success btn-lg" id="Team2ScorePlusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">+</button>
                
                <button class="btn btn-danger btn-lg" id="Team2ScoreMinusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">-</button>
            </th>
    <th>
                <span id="Team1Score">0</span>
                <hr>
                <button class="btn btn-success btn-lg" id="Team1ScorePlusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">+</button>
                
                <button class="btn btn-danger btn-lg" id="Team1ScoreMinusBtn" style="font-weight: bold; font-size: 40px; padding-left: 25px; padding-right: 25px;">-</button>
                
            </th>
            
<?php
    } ?>


        </tr>
    </table>
            
    <div style="text-align: center; padding:20px; padding-top:0px;">
        
         <br>
    <div class="card text-center" style="margin-bottom:20px;">                  
        <div class="card-body" style="padding-bottom:0px;">
            <div class="form-group">
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="showScoreCard" id="showScoreCardYes" value="yes" checked>
                  <label class="form-check-label" for="showScoreCardYes">
                  Show
                  </label>
               </div>
               <div class="form-check  form-check-inline">
                  <input class="form-check-input" type="radio" name="showScoreCard" id="showScoreCardNo" value="no">
                  <label class="form-check-label" for="showScoreCardNo">
                  Hide
                  </label>
               </div>
               <button id="updateScoreCardSettings" type="submit" class="btn btn-primary">Update</button>
            </div>                                                              
        </div>
    </div>
        
        
        <button class="btn btn-primary btn-lg btn-block" id="ResetScores">Reset Scores</button>
        <button class="btn btn-success btn-lg btn-block" id="ShuffleTeams" style="margin-top:10px;">Change Teams</button>
        <?php if ($view == 'camera') {
        ?>

            <a href="<?php echo BASE_URL;?>/admin.php?view=opposite&match_id=<?php echo $match_id; ?>"><button class="btn btn-danger btn-lg btn-block" style="margin-top:10px; text-decoration: none">Opposite View</button></a>

        <?php
    } else {
        ?>

 <a href="<?php echo BASE_URL;?>/admin.php?view=camera&match_id=<?php echo $match_id; ?>"><button class="btn btn-danger btn-block btn-lg" style="margin-top:10px; text-decoration: none">Camera View</button></a>

        <?php
    } ?>
 
  <br>
 <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Match Type Settings
                  </div>
                  <div class="card-body text-left">
                
                     <div class="form-group">
                        <input id="matchCurrentMatchType" type="text" class="form-control" placeholder="" />
                     </div>

                     <div class="form-inline">
                         <div class="form-group mb-2">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="showMatchType" id="showMatchTypeYes" value="yes" checked>
                              <label class="form-check-label" for="showMatchTypeYes">
                              Show
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="showMatchType" id="showMatchTypeNo" value="no">
                              <label class="form-check-label" for="showMatchTypeNo">
                              Hide
                              </label>
                           </div>
                        </div>
                     </div>
                     
                     <button id="updatematchCurrentMatchTypeBtn" type="submit" class="btn btn-primary btn-block">Update</button>
                     
                  </div></div>
 

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

        var matchesRef = firebase.database().ref('matches/<?php echo $match_id; ?>');
        
        
        
        $("#Team1NameEditBox").hide();
        $("#Team1NameEditBoxBtn").hide();
        $("#Team2NameEditBox").hide();
        $("#Team2NameEditBoxBtn").hide();
        
        $("#editBtnTeam1").on("click", function(){
            $("#Team1NameEditBox").show();
            $("#Team1NameEditBoxBtn").show();
            $("#editBtnTeam1").hide();
        });
        $("#editBtnTeam2").on("click", function(){
            $("#Team2NameEditBox").show();
            $("#Team2NameEditBoxBtn").show();
            $("#editBtnTeam2").hide();
        });
        
        $("#Team1NameEditBoxBtn").on("click", function(){
            var teamName1 = $("#Team1NameEditBox").val();
            var teamName2 = $("#Team2NameEditBox").val();
            var MatchTitle = teamName1+" vs "+teamName2;
            matchesRef.update({"Team1Name": teamName1, "MatchTitle" :MatchTitle});    
            
            $("#Team1NameEditBox").hide();
            $("#Team1NameEditBoxBtn").hide();
             $("#editBtnTeam1").show();
        });
        
        $("#Team2NameEditBoxBtn").on("click", function(){
            var teamName1 = $("#Team1NameEditBox").val();
            var teamName2 = $("#Team2NameEditBox").val();
            var MatchTitle = teamName1+" vs "+teamName2;
            
            matchesRef.update({"Team2Name": teamName2, "MatchTitle" :MatchTitle}); 
            $("#Team2NameEditBox").hide();
            $("#Team2NameEditBoxBtn").hide();
             $("#editBtnTeam2").show();
        });
       
       $(document).ready(function(){
            firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').on('value', function (data) {
                $("#matchCurrentMatchType").val(data.val().value);
          });
       });

//            firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').on('value', function (data) {
//                    $("#matchCurrentMatchType").val(data.val().value);
//              });

            $(document).on('click', "#updatematchCurrentMatchTypeBtn", function() {
                var matchCurrentMatchType = $("#matchCurrentMatchType").val();
                if (!matchCurrentMatchType || matchCurrentMatchType == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                    });
                    return false;
                }

                var showMatchTypeValue = $("input[name='showMatchType']:checked").val();

                // update the match type in main matches table too.
                matchesRef.update({"matchCurrentMatchType": showMatchTypeValue});

                firebase.database().ref('showMatchType/<?php echo $match_id; ?>').update({"value": showMatchTypeValue});
                firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').update({"value": matchCurrentMatchType});


                swal({
                    type: 'success',
                    title: 'Success',
                    text: 'Match type updated successfully!',
                });
             });
             
             
        var currentRoundKey = '';
        var currentRoundMatchKey = '';
        
         matchesRef.on('value', function (data) {
            $("#MatchTitle").text(data.val().MatchTitle);
            $("#Team1Name").text(data.val().Team1Name);
            $("#Team1NameEditBox").val(data.val().Team1Name);
            
            $("#Team2Name").text(data.val().Team2Name);
            $("#Team2NameEditBox").val(data.val().Team2Name);
            
            $("#Team1Score").text(data.val().Team1Score);
            $("#Team2Score").text(data.val().Team2Score);
            $("#Body").css("background-color", data.val().BackColor);
            $("#MatchImage").attr("src", data.val().MatchImage);
            
            if (data.val().showScoreCard && data.val().showScoreCard !== ""){
               $("input[name='showScoreCard'][value='"+data.val().showScoreCard+"'").prop("checked",true);
            }
            
            if (data.val().operatorOneTimePassword && data.val().operatorOneTimePassword !== ""){
                onetimepasswordFromFirebase = data.val().operatorOneTimePassword;
            }
            
            $("#LoadingPageScreen").hide();
            $("#matchSideImage").show();          
            
            
            if(data.val().currentRoundKey){
                currentRoundKey = data.val().currentRoundKey;
                currentRoundMatchKey = data.val().currentRoundMatchKey;
            }
           
            
            
            <?php if(isset($_SESSION['adminUserName']) && $_SESSION['adminSuccessFullyLoggedIn'] == "true") {?>
                    $("#EntireBodyContent").show();
            <?php } else {?> 
                if (typeof(Storage) !== "undefined") {
                var checkLoggedInUser = localStorage.getItem("operatorPassword");                
                if(checkLoggedInUser !== null){
                    if(checkLoggedInUser == onetimepasswordFromFirebase){
                        $("#EntireBodyContent").show();
                    }else{
                        localStorage.removeItem("operatorPassword");
                        $("#EntireBodyContent").hide();
                        $('#myModal').modal({
                                backdrop: 'static',
                                keyboard: false
                        });
                    }
                }else{
                    $('#myModal').modal({
                            backdrop: 'static',
                            keyboard: false
                    });
                }
            }  
            <?php }?>
            
            
         
            
            
        });
        
            
            
        
        
        $(document).on('click', "#enterOneTimePasswordBtn", function() {
            var oneTimePassword = $("#oneTimePasswordInput").val();
            if (!oneTimePassword || oneTimePassword == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please enter one time password.',
                });
                return false;
            }
            if(oneTimePassword == onetimepasswordFromFirebase){
                console.log("Password matched");
                
                if (typeof(Storage) !== "undefined") {
                    localStorage.setItem("operatorPassword", oneTimePassword);
                }                
                $("#EntireBodyContent").show();
                $('#myModal').modal('toggle');
            }else{
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: "Password you entered doesn't match ",
                });
                return false;
            }          
        });
        
        
        // Update Score Card Settings
         $(document).on('click', "#updateScoreCardSettings", function() {
            var showScoreCardValue = $("input[name='showScoreCard']:checked").val();
            matchesRef.update({"showScoreCard": showScoreCardValue});
            
            swal({
                type: 'success',
                title: 'Success',
                text: 'Match subtitle updated successfully!',
            });
             
         });
        
        
        $("#Team1ScorePlusBtn").on("click", function(){
            var Team1Score = parseFloat($("#Team1Score").text());
            var Team2Score = parseFloat($("#Team2Score").text());
            if(Team1Score == 0 && Team2Score == 0){
                var points = 1.5;
            }else{
                var points = 1;
            }
            
            matchesRef.update({"Team1Score": parseFloat(Team1Score + points)});     
            if(currentRoundKey){
                firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({"Team1Score": parseFloat(Team1Score + points)});
            }
        });
        
        $("#Team2ScorePlusBtn").on("click", function(){
            var Team1Score = parseFloat($("#Team1Score").text());
            var Team2Score = parseFloat($("#Team2Score").text());
            if(Team1Score == 0 && Team2Score == 0){
                var points = 1.5;
            }else{
                var points = 1;
            }
           matchesRef.update({"Team2Score": parseFloat(Team2Score + points)});
           if(currentRoundKey){
               firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({"Team2Score": parseFloat(Team2Score + points)});
            }
        });
        
        
        $("#Team1ScoreMinusBtn").on("click", function(){
            var Team1Score = parseFloat($("#Team1Score").text());
            if(Team1Score == 1.5){
                var points = 1.5;
            }else{
                var points = 1;
            }
            if(Team1Score > 0){
                 matchesRef.update({"Team1Score": parseFloat(Team1Score - points)}); 
                 if(currentRoundKey){
                   firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({"Team1Score": parseFloat(Team1Score - points)}); 
             }
            }
        });
        
        $("#Team2ScoreMinusBtn").on("click", function(){
           var Team2Score = parseFloat($("#Team2Score").text());
            if(Team2Score == 1.5){
                var points = 1.5;
            }else{
                var points = 1;
            }
            if(Team2Score > 0){
                matchesRef.update({"Team2Score": parseFloat(Team2Score - points)});  
                if(currentRoundKey){
                   firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({"Team2Score": parseFloat(Team2Score - points)});     
                }
            }
        });
        
        
        $("#ResetScores").on("click", function(){
           swal({
                title: 'Are you sure you want to reset the scores?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
              }).then((result) => {
                if (result.value) {
                    matchesRef.update({"Team2Score": 0, "Team1Score": 0});
                    
                    
                    if(currentRoundKey){
                       firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({"Team2Score": 0, "Team1Score": 0});     
                    }
                    
                    
                }
              }) 
        });
        
        $("#ShuffleTeams").on("click", function(){
            swal({
                title: 'Are you sure you want to change the team position?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
              }).then((result) => {
                if (result.value) {
                        var Team1Score = parseFloat($("#Team1Score").text());
                        var Team2Score = parseFloat($("#Team2Score").text());
                        var Team1Name = $("#Team1Name").text();
                        var Team2Name = $("#Team2Name").text();
                        
                        var Team1KeyID = '';
                        var Team2KeyID = '';
                        
                        matchesRef.on('value', function (data) {
                            if(data && data.val() && data.val().Team2KeyID){
                                Team1KeyID = data.val().Team2KeyID;
                            }
                            if(data && data.val() && data.val().Team1KeyID){
                                Team2KeyID = data.val().Team1KeyID;
                            }
                        });

                        var data = {};
                        data.Team1Name = Team2Name;
                        data.Team2Name = Team1Name;
                        data.Team1Score = Team2Score;
                        data.Team2Score = Team1Score;
                        
                        if(Team1KeyID.length > 0){
                            data.Team1KeyID = Team1KeyID;
                        }
                        if(Team2KeyID.length > 0){
                            data.Team2KeyID = Team2KeyID;
                        }
                        
                        data.MatchTitle = Team2Name+" vs "+Team1Name;   

                        matchesRef.update(data); 
                        
                        firebase.database().ref('match_types/<?php echo $match_id; ?>/'+currentRoundKey+'/matches/'+currentRoundMatchKey).update({
                            "Team1Name": Team2Name, 
                            "Team1KeyID" : Team1KeyID,
                            "Team1Score" : Team2Score,
                            "Team2Name": Team1Name, 
                            "Team2KeyID" : Team2KeyID,
                            "Team2Score" : Team1Score,
                        });  
                        
                        
                }
              }) 
        });
        
        
        

    </script>

</body>
</html>

<?php
} else {
    $adminUserName = "kabaddi365";
    $adminPassword = "chakdefatte@123#";    
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
            <a href="<?php echo BASE_URL;?>/logout.php" class="btn btn-success btn-lg" style="float:right">Log out</a>
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
                   apiKey: "AIzaSyBoONei-F4IUpdkNQsi5IL7v9TgHw7wQuI",
                    authDomain: "kabaddi365-985.firebaseapp.com",
                    databaseURL: "https://kabaddi365-985.firebaseio.com",
                    projectId: "kabaddi365-985",
                    storageBucket: "kabaddi365-985.appspot.com",
                    messagingSenderId: "1031296111546"
                };
                firebase.initializeApp(config);
                
                
                var matchesRef = firebase.database().ref('matches');
                matchesRef.on('value', function(snapshot){
                    var ListofMatches = [];
                    var data = snapshot.val();                    
                    $.each(data, function(key, val) {
                        if(val.showtoAdmin){
                            
                            var match = '<tr><td>'+val.matchScreenMainTitle+'</td><td>'+val.MatchTitle+'<hr> OP: <b>'+val.operatorOneTimePassword+'</b> </td><td>'+val.Team1Score+'</td><td>'+val.Team2Score+'</td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match_screen_content.php?match_id='+key+'"><button class="btn btn-primary btn-block" id="'+key+'">Manage</button></a><p style="margin-top:10px"><button class="btn btn-success btn-block updateOTP" id="'+key+'">Update OP</button></p></td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match.php?match_id='+key+'"><button class="btn btn-primary" id="'+key+'">View</button></a></td><td class="text-center"><a href="<?php echo BASE_URL;?>/admin.php?view=camera&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Camera</button></a><br><a style="margin-bottom:15px;" href="<?php echo BASE_URL;?>/admin.php?view=opposite&match_id='+key+'" target="_blank"><button class="btn btn-success btn-block" id="'+key+'">Opposite</button></a></td><td class="text-center"><button class="removeItem btn btn-danger" id="'+key+'">Remove</button></td></tr>';
                            ListofMatches.push(match);
                        }                         
                    });
                    var final_array = ListofMatches.join();
                    $("#listmatches").html(final_array);
                });
                
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
                
                <?php 
                if(isset($_POST) && $_POST['username']){
                    if($_POST['username'] == $adminUserName && $_POST['password'] == $adminPassword){
                        $_SESSION['adminUserName'] = $adminUserName;
                        $_SESSION['adminSuccessFullyLoggedIn'] = "true";                        
                ?>
                    $("#EntireBodyContent").show();
                <?php     
                    } else {  
                ?>
                    
                    
                   swal({
                        type: 'error',
                        title: 'Oops...',
                        text: "The username and password doesnt match",
                    });
                    
                    
                <?php
                    }
                } 
                ?>
                
                <?php if(!isset($_SESSION['adminUserName']) && $_SESSION['adminSuccessFullyLoggedIn'] !== "true") {?>
                    $('#myModal').modal({
                            backdrop: 'static',
                            keyboard: false
                    });
                <?php } else {?>
                    $("#EntireBodyContent").show();
                <?php }?>
                    
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
                    
                    $("#adminLoginForm").submit();
                });
                              
            </script>

        </body>
    </html>
<?php
    } ?>
