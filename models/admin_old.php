<?php
include "config.php";

if (isset($_GET['match_id']) && $_GET['match_id']) {
    $match_id = $_GET['match_id']; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        <title>Live Scores | Kabaddi365.com</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.css" />
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body id="Body">
    <center>
<!--        <br>
        <h1 id="MatchTitle">
            Match Title
        </h1>
        <br>-->
        <a href="<?php echo BASE_URL;?>/admin.php">Back to admin</a>
    </center>
    <br>
    <table class="table table-striped" style="text-align: center;">
        <tr>
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
        </tr>
        <tr style="font-size: 50px;">
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
        </tr>
    </table>
    
    <div style="text-align: center; padding:20px;">
        <button class="btn btn-primary btn-lg btn-block" id="ResetScores">Reset Scores</button>
        <br>
        <button class="btn btn-success btn-lg btn-block" id="ShuffleTeams">Change Teams</button>
    </div>
    
    
        
    <img src="" id="MatchImage" style="width:100%;" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
        });
        
        $("#Team2NameEditBoxBtn").on("click", function(){
            var teamName1 = $("#Team1NameEditBox").val();
            var teamName2 = $("#Team2NameEditBox").val();
            var MatchTitle = teamName1+" vs "+teamName2;
            
            matchesRef.update({"Team2Name": teamName2, "MatchTitle" :MatchTitle}); 
            $("#Team2NameEditBox").hide();
            $("#Team2NameEditBoxBtn").hide();
        });
        
        
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

                        var data = {};
                        data.Team1Name = Team2Name;
                        data.Team2Name = Team1Name;
                        data.Team1Score = Team2Score;
                        data.Team2Score = Team1Score;
                        data.MatchTitle = Team2Name+" vs "+Team1Name;   

                        matchesRef.update(data); 
                }
              }) 
        });
        

    </script>

</body>
</html>




<?php
} else {
        ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.css" />
            <title>Administrator</title>
        </head>
        <body id="Body">
        <center>
                        <br>
                        <h1 id="MatchTitle">
                            Matches List
                        </h1>
                        <br>
            </center>
            <div class="container">
                <div class="row">
                    
                    
                    <div class="col-12 col-md-8">
                        
                        
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                    <th>Match Name</th>
                                    <th>Team 1 Score</th>
                                    <th>Team 2 Score</th>
                                    <th>View Match</th>
                                    <th>Edit Scores</th>
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
                                        <label for="exampleInputEmail1">Team 1 Name</label>
                                        <input id="Team1Name" type="text" class="form-control" placeholder="Enter name of team 1">                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Team 2 Name</label>
                                        <input id="Team2Name" type="text" class="form-control" placeholder="Enter name of team 2">                                      
                                    </div>
                                    <button id="saveMatch" type="submit" class="btn btn-primary btn-block">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
                            var match = '<tr><td>'+val.MatchTitle+'</td><td>'+val.Team1Score+'</td><td>'+val.Team2Score+'</td><td class="text-center"><a target="_blank" href="<?php echo BASE_URL;?>/match.php?match_id='+key+'"><button class="btn btn-primary" id="'+key+'">View</button></a></td><td class="text-center"><a href="<?php echo BASE_URL;?>/admin.php?match_id='+key+'" target="_blank"><button class="btn btn-success" id="'+key+'">Edit Scores</button></a></td><td class="text-center"><button class="removeItem btn btn-danger" id="'+key+'">Remove</button></td></tr>';
                            ListofMatches.push(match);
                        }                         
                    });
                    var final_array = ListofMatches.join();
                    $("#listmatches").html(final_array);
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
                              
            </script>

        </body>
    </html>
<?php
    } ?>
