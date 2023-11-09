<?php
include "config.php";

session_start();
   if (isset($_GET['match_id']) && $_GET['match_id']) {
       $match_id = $_GET['match_id'];
       ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>Live Scores | Kabaddi365.com</title>
      <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.9/sweetalert2.min.css" />
      <style>
          body{
              padding-right: 100px;
              padding-left: 100px;
          }
         textarea{
            font-weight: bold;
         }
         #LoadingPageScreen{
             width:100%;
             height: 100%;
             text-align: center;
             font-size: 70px;
             padding-top: 25%;
         }
         
         .roundMatchBox{
             padding: 10px; 
             border: 1px solid #eee;
             margin:0px;
             margin-bottom: 10px;
         }
         
         .roundMatchBox .score{
             font-size: 20px;
             font-weight: bold;
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
                 
       
       <div class="container-fluid" style="padding:10px; padding-bottom:0px;">
           <a href="<?php echo BASE_URL;?>/score.php?view=opposite&match_id=<?php echo $match_id;?>" target="_blank" class="btn btn-success btn-lg" style="float:right">Manage Scores &nbsp;&nbsp;<i class="fa fa-edit"></i></a>
         <h1 id="MatchTitle">
            Loading...
         </h1>
       </div>
        
    <hr>
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-3">
                
                <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Match Live Status
                  </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Match Live?</label> &nbsp; &nbsp;
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="isMatchLive" id="matchLiveYes" value="yes" checked>
                              <label class="form-check-label" for="matchLiveYes">
                              Yes
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="isMatchLive" id="matchLiveNo" value="no">
                              <label class="form-check-label" for="matchLiveNo">
                              No
                              </label>
                           </div>
                        </div>                                                  
                        <button id="updateMatchLiveSettings" type="submit" class="btn btn-primary btn-block">Update</button>
                        
                    </div>
                </div>
                
                <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Scoreboard Settings
                  </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                           <label for="exampleInputEmail1">Scoreboard?</label> &nbsp; &nbsp;
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="showScoreCard" id="showScoreCardYes" value="yes" checked>
                              <label class="form-check-label" for="showScoreCardYes">
                              Show
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="showScoreCard" id="showScoreCardNo" value="no">
                              <label class="form-check-label" for="showScoreCardNo">
                              Hide
                              </label>
                           </div>
                        </div>                                                  
                        <button id="updateScoreCardSettings" type="submit" class="btn btn-primary btn-block">Update</button>
                        
                    </div>
                </div>
                
                <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Match Round Settings
                  </div>
                  <div class="card-body">
                
                     <div class="form-group">
                        <input id="matchCurrentMatchType" type="text" class="form-control" placeholder="" />                         
                     </div>
                     
                     <div class="form-inline">
                         <div class="form-group mb-2">
                           <label for="exampleInputEmail1">Match Round?</label>
                           &nbsp;&nbsp;&nbsp;
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
                
                
               <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Main Screen Title Settings
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                        <textarea id="matchScreenMainTitle" type="text" class="form-control" placeholder=""></textarea>                         
                     </div>
                      
                     <div class="form-inline">
                         <div class="form-group mb-2">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="mainTitlewithMarquee" id="mainTitlewithMarqueeYes" value="yes" checked>
                              <label class="form-check-label" for="mainTitlewithMarqueeYes">
                              Scroll
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="mainTitlewithMarquee" id="mainTitlewithMarqueeNo" value="no">
                              <label class="form-check-label" for="mainTitlewithMarqueeNo">
                              Stable
                              </label>
                           </div>
                        </div>
                     </div>
                      
                     <button id="updatematchScreenMainTitleBtn" type="submit" class="btn btn-primary btn-block">Update</button>
                  </div>
               </div>   
                     
                     
                <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                     Sub Title Settings
                  </div>
                  <div class="card-body">
                     
                     <div class="form-group">
<!--                        <label for="exampleInputEmail1">Match Sub Title <small> <em>(You can choose text from right side)</em></small></label>-->
                        <textarea id="matchScreenSubTitle" type="text" class="form-control" placeholder=""></textarea>                         
                     </div>
                     
                     <div class="form-inline">
                         <div class="form-group mb-2">
<!--                           <label for="exampleInputEmail1">Scrollable?</label>
                           &nbsp;&nbsp;&nbsp;-->
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="subTitlewithMarquee" id="subTitlewithMarqueeYes" value="yes" checked>
                              <label class="form-check-label" for="subTitlewithMarqueeYes">
                              Scroll
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="subTitlewithMarquee" id="subTitlewithMarqueeNo" value="no">
                              <label class="form-check-label" for="subTitlewithMarqueeNo">
                              Stable
                              </label>
                           </div>
                        </div>
                     </div>
                     
                     
                     <button id="updatematchScreenSubTitleBtn" type="submit" class="btn btn-primary btn-block">Update</button>       
                  </div></div>
                     
                     
                
                     
                     
                <div class="card" style="margin-bottom:15px;">
                  <div class="card-header">
                    Screen Image Settings
                  </div>
                  <div class="card-body">
                
                     <div class="form-group">
<!--                        <label for="exampleInputEmail1">Image being used? <small> <em>(You can choose images from right side)</em></small></label>-->
                        <br>
                        <img style="display: none" src="" id="matchSideImage" width="100" height="100" />
                        <br>
                        <button style="display:none" id="removeMatchImage" type="submit" class="btn btn-primary">Remove Image</button>
                     </div>
                      
                  </div></div>   
                  
            </div>
             
                          
            <div class="col-12 col-md-9">
               <div class="card">
                  <div class="card-header">
                     <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="subtitles-tab" data-toggle="tab" href="#subtitles" role="tab" aria-controls="subtitles" aria-selected="true">Subtitles</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="matchtypes-tab" data-toggle="tab" href="#matchtypes" role="tab" aria-controls="matchtypes" aria-selected="false">Match Rounds</a>
                        </li>  
                        <li class="nav-item">
                           <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">Images</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="images-tab" data-toggle="tab" href="#matchteams" role="tab" aria-controls="teams" aria-selected="false">Teams</a>
                        </li>            
                        
                        <li class="nav-item">
                           <a class="nav-link" id="images-tab" data-toggle="tab" href="#roundmatches" role="tab" aria-controls="teams" aria-selected="false">Matches</a>
                        </li>  
                        
                        
                        
                     </ul>
                  </div>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane card-body fade show active" id="subtitles" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pre_added_texts" id="subTitlesSection">
                           Loading...
                        </div>
                         
                        <hr>
                        <div class="form-group">
                           <label><b>Create a new text</b></label>
                           <textarea id="subTitleText" type="text" class="form-control" placeholder=""></textarea>
                        </div>
                        <button id="saveSubTitle" type="submit" class="btn btn-success btn-block">Add</button>
                     </div>
                     <div class="tab-pane card-body fade" id="images" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pre_added_texts" id="imagesSection">
                           Loading...
                        </div>
                        <hr>
                        <div class="form-group">
                           <label><b>Create a new image</b></label>
                           <textarea id="imageTextBox" type="text" class="form-control" placeholder=""></textarea>
                        </div>
                        <button id="addNewImage" type="submit" class="btn btn-success btn-block">Add Image</button>
                     </div>
                      
                      
                     <div class="tab-pane card-body fade" id="matchtypes" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pre_added_texts" id="matchTypesSection">
                           Loading...
                        </div>
                        <hr>
                        <div class="form-group">
                           <label><b>Create a Match Round</b></label>
                           <textarea id="MatchTypeTextBox" type="text" class="form-control" placeholder=""></textarea>
                        </div>
                        <button id="addMatchTypeBtn" type="submit" class="btn btn-success btn-block">Add Match Round</button>
                     </div>
                      
                      
                       <div class="tab-pane card-body fade" id="matchteams" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pre_added_texts" id="matchTeamsSection">
                           Loading...
                        </div>
                        <hr>
                        <div class="form-group">
                           <label><b>Create a Team</b></label>
                           <textarea id="MatchTeamTextBox" type="text" class="form-control" placeholder=""></textarea>
                        </div>
                        <button id="addMatchTeamBtn" type="submit" class="btn btn-success btn-block">Add a Team</button>
                     </div>
                      
                      
                      <div class="tab-pane card-body fade" id="roundmatches" role="tabpanel" aria-labelledby="home-tab">
                        <div class="pre_added_texts" id="roundMatchesSection">
                           Loading...
                        </div>
                     </div>
                      
                                           
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
         
         
         function getRoundMatches(snapshot){
                var roundMatchesKeys = [];
                var roundMatches = [];
                var data = snapshot.val();
                var count = 1;
                var lastId = "";
                var lastIdData = "";
                var showBox = "";
                
               
                $.each(data, function(key, val) {
                    var keysData = {
                        roundKey :  key,
                        countId :  count
                    }
                    roundMatchesKeys.push(keysData);
                    
                    var showhideTeamAddBox = "";
                    if(val.roundStarted && val.roundComplete){
                        showhideTeamAddBox = "display: none";
                    }else{
                        showhideTeamAddBox = "display: visible";    
                    }
                   
                    
                    var matchTeams = [];
                    var teamstext = "";                                    
                     var textBox = '<div class="form-group" lastRoundId="" nextRoundId="" id="roundBox_'+count+'" roundId="'+key+'" style="border: 1px solid #eee; margin-bottom:20px; display:none"> <div class="row"><div class="col-12"><button id="showCompleteBtn_'+count+'" class="btn btn-sm btn-danger" style="float:right; margin-top:5px; margin-right:5px; display:none">✓ Complete</button><h3 style="font-size: 17px; font-weight: bold; background:#eee; padding: 10px; margin:0px;">'+val.matchTypeText+' <span id="count_matches_'+count+'">()</span></h3></div></div> <div class="row" style="'+showhideTeamAddBox+'"><div class="col-12"><div style="padding:15px; border: 1px solid #eee; background: #fff; margin: 10px;"><div class="row"><div class="col  col-5"><select id="teamOneSelect_'+count+'" class="form-control team_select"></select></div><div class="col col-5"><select id="teamTwoSelect_'+count+'" class="form-control team_select"></select></div><div class="col col-2"><button class="btn btn-primary addRoundMatchBtn" box_id="'+count+'" roundId="'+key+'" id="addMatchButton_'+count+'">+ Add</button></div></div></div></div></div><div style="background: #fff; margin: 10px; margin-top: 10px;" id="roundMatches_'+count+'"></div></div>';
                     roundMatches.push(textBox);                      
                     count++;                
                 });
                 $("#roundMatchesSection").html(roundMatches);
                                 
                 setTimeout(function(){                      
                     var count = 1;
                                          
//                     $('#roundBox_'+count+' #teamOneSelect_'+count).html('');
//                     $('#roundBox_'+count+' #teamTwoSelect_'+count).html('');
//                     
                        $.each(data, function(key, val) {
                           if(count == 1){   
                               
                                                              
                                // Get the Past and Future Rounds of current Round
                                for(i = 0; i < roundMatchesKeys.length; i++){
                                    if(roundMatchesKeys[i].countId == count){
                                        if(roundMatchesKeys[i - 1] && roundMatchesKeys[i - 1].roundKey){
                                            $("#roundBox_"+count).attr("lastRoundId", roundMatchesKeys[i - 1].roundKey);
                                        }
                                        if(roundMatchesKeys[i + 1] && roundMatchesKeys[i + 1].roundKey){
                                            $("#roundBox_"+count).attr("nextRoundId", roundMatchesKeys[i + 1].roundKey);
                                        }
                                    }
                                } 
                               
                                var totalTeamsinRound = 0;
                                  var MatchTeamsRf = firebase.database().ref('match_teams/<?php echo $match_id; ?>');
                                  MatchTeamsRf.on('value', function(snapshot){
                                    var data = snapshot.val();
                                    var teamcount = 1;
                                    $.each(data, function(key, val) {
                                              var textBox = '<option value="'+val.matchTeamText+'/'+key+'">'+val.matchTeamText+'</option>';
                                              $('#roundBox_'+count+' #teamOneSelect_'+count).append(textBox);
                                              $('#roundBox_'+count+' #teamTwoSelect_'+count).append(textBox);
                                            teamcount++;
                                            totalTeamsinRound++;
                                    });
                                  });
                                  
                                   // Check total teams in round else hide the round
                                    if(totalTeamsinRound == 0){
                                        $('#roundBox_'+count).hide();
                                    }else{
                                        $('#roundBox_'+count).show();
                                    }
                                  
                                  
                                  
                                  if(val.roundComplete){
                                      $('#roundBox_'+count+' #teamOneSelect_'+count).attr('disabled', 'disabled');
                                      $('#roundBox_'+count+' #teamTwoSelect_'+count).attr('disabled', 'disabled');
                                      $('#roundBox_'+count+' #addMatchButton_'+count).attr('disabled', 'disabled');
                                  }  
                                 
                                  
                          } 
                          
                          if(count > 1){     
                              // Get the Past and Future Rounds of current Round
                                for(i = 0; i < roundMatchesKeys.length; i++){
                                    if(roundMatchesKeys[i].countId == count){
                                        if(roundMatchesKeys[i - 1] && roundMatchesKeys[i - 1].roundKey){
                                            $("#roundBox_"+count).attr("lastRoundId", roundMatchesKeys[i - 1].roundKey);
                                        }
                                        if(roundMatchesKeys[i + 1] && roundMatchesKeys[i + 1].roundKey){
                                            $("#roundBox_"+count).attr("nextRoundId", roundMatchesKeys[i + 1].roundKey);
                                        }
                                    }
                                }                     

                                $('#roundBox_'+count+' #teamOneSelect_'+count).html('');
                                $('#roundBox_'+count+' #teamTwoSelect_'+count).html('');
                                
                                var totalTeamsinRound = 0;
                                // Get teams selected for next rounds.
                                var currentMatchTypeRoundTeams = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+key+'/teams');
                                currentMatchTypeRoundTeams.on('value', function(snapshot){
                                  var data = snapshot.val();
                                  var teamcount = 1;
                                  $.each(data, function(key, val) {
                                            var textBox = '<option value="'+val.matchTeamText+'/'+key+'">'+val.matchTeamText+'</option>';
                                            $('#roundBox_'+count+' #teamOneSelect_'+count).append(textBox);
                                            $('#roundBox_'+count+' #teamTwoSelect_'+count).append(textBox);
                                          teamcount++;
                                          totalTeamsinRound++;
                                  });                                  
                                });
                                
                                // Check total teams in round else hide the round
                                if(totalTeamsinRound == 0){
                                    $('#roundBox_'+count).hide();
                                }else{
                                    $('#roundBox_'+count).show();
                                }
                                
                                // Code will go here.. for round 1 it will come from main teams database,                              
                                if(val.roundComplete){
                                    $('#roundBox_'+count+' #teamOneSelect_'+count).attr('disabled', 'disabled');
                                    $('#roundBox_'+count+' #teamTwoSelect_'+count).attr('disabled', 'disabled');
                                    $('#roundBox_'+count+' #addMatchButton_'+count).attr('disabled', 'disabled');
                                }                                
                                
//                                if(val.roundComplete || !val.roundStarted){
//                                    $('#roundBox_'+count+' #showCompleteBtn_'+count).hide();
//                                }
                          }
                          
                        // Get the matches list and put them in the table
                        var matchesList = [];
                        
                        var totalMatches = 0;
                        var totalLiveMatches = 0;
                        var totalMatchesOver = 0;
                        var totalMatchesPending = 0;

                        $.each(val.matches, function(key_match, val_match) {
                                             
                            // Total Matches
                            totalMatches++;
                            // Matches Started
                            if(val_match.matchStarted){
                                totalLiveMatches++;
                            }
                            // Matches Completed
                            if(val_match.matchCompleted){
                                totalMatchesOver++;
                            }
                            // Matches Completed
                            if(!val_match.matchStarted && !val_match.matchCompleted){
                                totalMatchesPending++;
                            }
                    
                            
                            var displayDeleteButton = '';
                            var displayMatchCompletedText = '';
                            
                            if(val_match.matchStarted || val_match.matchCompleted){
                                displayDeleteButton = 'display: none;'
                            }
                            
                            if(!val_match.matchStarted){
                                displaystartMatchButton = 'display: visible;'
                            }else{
                                displaystartMatchButton = 'display: none;'
                            }
                                            
                            if(val_match.matchStarted && !val_match.matchCompleted){
                                displayMarkMatchCompletedButton = 'display: visible;'
                            }else{
                                displayMarkMatchCompletedButton = 'display: none;'
                            }
                            
                            if(val_match.matchCompleted){
                                displayMatchCompletedText = '<span class="badge badge-pill badge-danger">Completed</span>';
                            }
                            
                            var team1winnerdisplay = '';
                            var team2winnerdisplay = '';
                            
                            if(val_match.winningTeam && val_match.winningTeam == val_match.Team1KeyID){
                                team1winnerdisplay = 'display: visible';
                            }else{
                                team1winnerdisplay = 'display: none';
                            }
                            if(val_match.winningTeam && val_match.winningTeam == val_match.Team2KeyID){
                                team2winnerdisplay = 'display: visible';
                            }else{
                                team2winnerdisplay = 'display: none';
                            }
                            
                            var textBox = '<div class="row roundMatchBox" ><div class="col-md-3 text-right">'+val_match.Team1Name+'<p style="'+team1winnerdisplay+'"><span class="badge badge-pill badge-success">Winner</span></p></div><div class="col-md-2 text-center score">'+val_match.Team1Score+'</div><div class="col-md-2 text-center score"  style="border-left: 1px solid #eee">'+val_match.Team2Score+'</div><div class="col-md-3 text-left">'+val_match.Team2Name+'<p style="'+team2winnerdisplay+'"><span class="badge badge-pill badge-success">Winner</span></p></div><div class="col-md-2 text-left">'+displayMatchCompletedText+'<button matchKey="'+key_match+'" roundKey="'+val_match.roundId+'" class="btn btn-sm btn-danger deleteRoundMatchBtn" style="'+displayDeleteButton+'"><i class="fa fa-trash-alt"></i></button> &nbsp;<button matchKey="'+key_match+'" roundKey="'+val_match.roundId+'" class="btn btn-sm btn-primary markMatchCompleted" boxId="'+count+'" style="'+displayMarkMatchCompletedButton+'">Match Over</button>&nbsp;<button matchKey="'+key_match+'" roundKey="'+val_match.roundId+'" class="btn btn-sm btn-success startMatchButton" boxId="'+count+'" style="'+displaystartMatchButton+'">Start</button></div></div>';
                            matchesList.push(textBox);
                        });
                        $('#roundBox_'+count+' #roundMatches_'+count+'').html(matchesList);
                        // Get the matches list and put them in the table                        
                                  
                        $('#roundBox_'+count+' #count_matches_'+count+'').html('('+totalMatchesOver+"/"+totalMatches+" completed)");          
                            
                        if(totalMatches == 0){
                            $('#roundBox_'+count+' #count_matches_'+count+'').hide();
                        }
                        // Round Complete 
                        if(totalMatches > 0 && (totalMatchesOver == totalMatches)){
                            firebase.database().ref('match_types/<?php echo $match_id; ?>/'+key).update({
                                'roundComplete': true
                            });
                        }
                        
                      count++;
                   });
                }, 1000);
         }
         
         
         // Get Match Types for matches section getRoundMatches()
         var roundMatchesRf = firebase.database().ref('match_types/<?php echo $match_id; ?>');
         roundMatchesRf.on('value', getRoundMatches);
//         roundMatchesRf.on('child_changed', getRoundMatches);
                          
           
          // Start Match
          
        
        $(document).on('click', ".startMatchButton", function() {
           var matchKey = $(this).attr("matchKey");
           var roundKey = $(this).attr("roundKey");
           
            swal({
                title: 'Are you sure you want to start this match?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Start'
            }).then((result) => {
                if (result.value) {
                    var matchRoundMatchRef = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+roundKey+'/matches/'+matchKey);
                    matchRoundMatchRef.update({
                        'matchStarted' : true
                    });
                    
                    // Mark the round started
                    firebase.database().ref('match_types/<?php echo $match_id; ?>/'+roundKey).update({
                        'roundStarted' : true
                    });
                    
                    var matchesRef = firebase.database().ref('matches/<?php echo $match_id; ?>');
                    matchRoundMatchRef.on('value', function(data){
                        var updateMatchData = {
                            'MatchTitle' : data.val().Team1Name+ ' vs '+data.val().Team2Name,
                            'Team1Name' : data.val().Team1Name,
                            'Team1Score' : data.val().Team1Score,
                            'Team1KeyID' : data.val().Team1KeyID,
                            
                            'Team2Name' : data.val().Team2Name,
                            'Team2Score' : data.val().Team2Score,
                            'Team2KeyID' : data.val().Team2KeyID,
                            
                            'currentRoundKey' : roundKey,
                            'currentRoundMatchKey' : matchKey,
                        }
                        matchesRef.update(updateMatchData);
                    });
                }
            });
    
        });
           
           
         // Add a round match
        $(document).on('click', ".deleteRoundMatchBtn", function() {
           var matchKey = $(this).attr("matchKey");
           var roundKey = $(this).attr("roundKey");
           
           var matchRoundMatchRef = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+roundKey+'/matches/'+matchKey);
           swal({
                title: 'Are you sure you want to delete this match?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    matchRoundMatchRef.remove();
                }
            });
        });
        
        

        // Mark the match as completed
        $(document).on('click', ".markMatchCompleted", function() {
           var matchKey = $(this).attr("matchKey");
           var roundKey = $(this).attr("roundKey");
           var boxId = $(this).attr("boxId");
           
           // Find the winning team
            var matchRoundMatchRef = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+roundKey+'/matches/'+matchKey);
            var winnerTeamKey = "";
            var winnerTeamName = "";
            matchRoundMatchRef.on('value', function(data){
                if(data.val().Team1Score > data.val().Team2Score){
                    winnerTeamKey = data.val().Team1KeyID;
                    winnerTeamName = data.val().Team1Name;
                }
                if(data.val().Team2Score > data.val().Team1Score){
                    winnerTeamKey = data.val().Team2KeyID;
                    winnerTeamName = data.val().Team2Name;
                }
            });    
           
           swal({
                title: 'Are you sure you want to mark this match as complete?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Complete'
            }).then((result) => {
                if (result.value) {
                    
                    // Push the team to the next Round
                    var nextRoundId = $("#roundBox_"+boxId).attr("nextroundid");                    
                    
                    if(nextRoundId && nextRoundId !== 'undefined' && nextRoundId !== null && nextRoundId.length > 0){
                        var matchRoundTeamsRef = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+nextRoundId+'/teams/'+winnerTeamKey).update({
                            'matchTeamText' : winnerTeamName
                        });                

                    }
                    
                    // Update the match stats
                    var data = {
                        'matchCompleted' : true,
                        'matchStarted' : true,
                        'winningTeam' : winnerTeamKey,
                    };
                    matchRoundMatchRef.update(data);
                }
            });
        });
        
        
           
        // Add a round match
        $(document).on('click', ".addRoundMatchBtn", function() {
            var roundBoxId = $(this).attr('box_id');
            var roundId = $(this).attr('roundId');
            
            var team1SelectValue = $('#roundBox_'+roundBoxId+' #teamOneSelect_'+roundBoxId).val();
            var team1Data = team1SelectValue.split("/");
            var team1Name = team1Data[0];
            var team1KeyID = team1Data[1];

            var team2SelectValue = $('#roundBox_'+roundBoxId+' #teamTwoSelect_'+roundBoxId).val();
            var team2Data = team2SelectValue.split("/");
            var team2Name = team2Data[0];
            var team2KeyID = team2Data[1];
            
            
            if(team2SelectValue == team1SelectValue){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Teams needs to be different than each other.',
                });
                return false;
            }
            
            // Add a match round team
            var matchRoundTeamsRef = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+roundId+'/matches');
            var data = {};
                data.roundId = roundId;
                data.Team1Name = team1Name;
                data.Team1KeyID = team1KeyID;
                data.Team1Score = 0;
                
                data.Team2Name = team2Name;
                data.Team2KeyID = team2KeyID;
                data.Team2Score = 0;
            
                data.created = new Date().getTime();
                
                data.matchStarted = false;
                data.matchCompleted = false;
                data.winningTeam = false;

                matchRoundTeamsRef.push(data);
            
        });
                    
                          
         
         // Get Match Types
         var MatchTypesRf = firebase.database().ref('match_types/<?php echo $match_id; ?>');
         MatchTypesRf.on('value', function(snapshot){
           var matchTypes = [];
           var data = snapshot.val();
           var count = 1;
           $.each(data, function(key, val) {
                var disabled = "";
                if(val.roundComplete){
                    disabled = 'disabled';
                }
                var textBox = '<div class="form-group"> <div class="row"><div class="col-9"><textarea id="match_type_' + count + '" class="form-control" '+disabled+' placeholder="">' + val.matchTypeText + '</textarea> </div> <div style="padding-left:0px; padding-right:0px;" class="col-3 text-left"><button '+disabled+' class="btn btn-primary updateMatchTypeBtn" box_id="' + count + '" box_key="' + key + '"><i class="far fa-edit"></i></button> &nbsp; <button '+disabled+' class="btn btn-danger deleteMatchTypeBtn" box_id="' + count + '" box_key="' + key + '"><i class="fas fa-trash-alt"></i></button>&nbsp; <button '+disabled+' class="btn btn-success markMatchTypeasMatchType" box_id="' + count + '" box_key="' + key + '"><i class="fa fa-check"></i></button></div> </div> </div>';
                        matchTypes.push(textBox);
                        count++;
                });
            $("#matchTypesSection").html(matchTypes);
         });
         
                  
         // Updating an existing item
         $(document).on('click', ".updateMatchTypeBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            var InputBox = $("#match_type_" + getBoxId).val();
            if (!InputBox || InputBox == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            var data = {};
            data.matchTypeText = InputBox;
            if(MatchTypesRf.child(getBoxKey).roundComplete == undefined){
                data.roundComplete = false;
            }else{
                data.roundComplete = MatchTypesRf.child(getBoxKey).roundComplete;
            }
            if(MatchTypesRf.child(getBoxKey).roundStarted == undefined){
                data.roundStarted = false;
            }else{
                data.roundStarted = MatchTypesRf.child(getBoxKey).roundStarted;
            }
            
            data.created = new Date().getTime();
            MatchTypesRf.child(getBoxKey).update(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was updated successfully!',
            });
         });
         
         
         $(document).on('click', ".deleteMatchTypeBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            swal({
                title: 'Are you sure you want to delete this match round?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    MatchTypesRf.child(getBoxKey).remove();
                }
            })
         });
         
         
         // Saving a new item
         $(document).on('click', "#addMatchTypeBtn", function() {
            var MatchTypeTextBox = $("#MatchTypeTextBox").val();
            if (!MatchTypeTextBox || MatchTypeTextBox == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'enter a text please',
                });
                return false;
            }
            var data = {};
            data.matchTypeText = MatchTypeTextBox;
            data.roundComplete = false;
            data.roundStarted = false;
            
            data.created = new Date().getTime();
                
            console.log(data);
            
            MatchTypesRf.push(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was added successfully!',
            });
            $("#MatchTypeTextBox").val("");
         });
         
         
        //***************************//
        
        // Get Match Teams
         var MatchTeamsRf = firebase.database().ref('match_teams/<?php echo $match_id; ?>');
         MatchTeamsRf.on('value', function(snapshot){
           var matchTeams = [];
           var data = snapshot.val();
           var count = 1;
           $.each(data, function(key, val) {
                   var textBox = '<div class="form-group"> <div class="row"><div class="col-9"><textarea id="match_team_' + count + '" class="form-control" placeholder="">' + val.matchTeamText + '</textarea> </div> <div style="padding-left:0px; padding-right:0px;" class="col-3 text-left"><button class="btn btn-primary updateMatchTeamBtn" box_id="' + count + '" box_key="' + key + '"><i class="far fa-edit"></i></button> &nbsp; <button class="btn btn-danger deleteMatchTeamBtn" box_id="' + count + '" box_key="' + key + '"><i class="fas fa-trash-alt"></i></button>&nbsp; </div> </div> </div>';
                   matchTeams.push(textBox);
                   count++;
           });
           $("#matchTeamsSection").html(matchTeams);
         });
         
                  
         // Updating an existing item
         $(document).on('click', ".updateMatchTeamBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            var InputBox = $("#match_team_" + getBoxId).val();
            if (!InputBox || InputBox == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            var data = {};
            data.matchTeamText = InputBox;
            data.created = new Date().getTime();
            MatchTeamsRf.child(getBoxKey).update(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was updated successfully!',
            });
         });
         
         
         $(document).on('click', ".deleteMatchTeamBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            swal({
                title: 'Are you sure you want to delete this match type?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    MatchTeamsRf.child(getBoxKey).remove();
                }
            })
         });
         
         
         // Saving a new item
         $(document).on('click', "#addMatchTeamBtn", function() {
            var MatchTeamTextBox = $("#MatchTeamTextBox").val();
            if (!MatchTeamTextBox || MatchTeamTextBox == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            var data = {};
            data.matchTeamText = MatchTeamTextBox;
            data.created = new Date().getTime();
            MatchTeamsRf.push(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was added successfully!',
            });
            $("#MatchTeamTextBox").val("");
         });
       
        //*************************//
         
         
         
         
         
         
         
         // Get Images
         var ImagesRf = firebase.database().ref('images/<?php echo $match_id; ?>');
         ImagesRf.on('value', function(snapshot){
         var images = [];
                 var data = snapshot.val();
                 var count = 1;
                 $.each(data, function(key, val) {
                 var textBox = '<div class="form-group"> <div class="row"><div class="col-2"><img style="float:left" src="' + val.imageUrl + '"  width="60" height="60"/></div> <div class="col-7"><textarea id="image_' + count + '" class="form-control" placeholder="">' + val.imageUrl + '</textarea> </div> <div style="padding-left:0px; padding-right:0px;" class="col-3 text-left"><button class="btn btn-primary updateImageBtn" box_id="' + count + '" box_key="' + key + '"><i class="far fa-edit"></i></button> &nbsp; <button class="btn btn-danger deleteImageBtn" box_id="' + count + '" box_key="' + key + '"><i class="fas fa-trash-alt"></i></button>&nbsp; <button class="btn btn-success markImageasMatchImage" box_id="' + count + '" box_key="' + key + '"><i class="fa fa-check"></i></button></div> </div> </div>';
                         images.push(textBox);
                         count++;
                 });
                 $("#imagesSection").html(images);
         });
         
         
         // Updating an existing item
         $(document).on('click', ".updateImageBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            var InputBox = $("#image_" + getBoxId).val();
            if (!InputBox || InputBox == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            var data = {};
            data.imageUrl = InputBox;
            data.created = new Date().getTime();
            ImagesRf.child(getBoxKey).update(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was updated successfully!',
            });
         });
         
         
         $(document).on('click', ".deleteImageBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            swal({
               title: 'Are you sure you want to delete this image?',
               text: "Choose this option wisely.",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    ImagesRf.child(getBoxKey).remove();
                }
            })
         });
         
         
         // Saving a new item
         $(document).on('click', "#addNewImage", function() {
            var imageUrl = $("#imageTextBox").val();
            if (!imageUrl || imageUrl == ""){
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'enter a text please',
            });
            return false;
            }
            var data = {};
            data.imageUrl = imageUrl;
            data.created = new Date().getTime();
            ImagesRf.push(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was added successfully!',
            });
            $("#imageTextBox").val("");
         });
         // Images Section
         
         
         //Get Sub Titles
         var subTitleTexts = firebase.database().ref('subtitle_texts/<?php echo $match_id; ?>');
         subTitleTexts.on('value', function(snapshot){
         var subTitles = [];
                 var data = snapshot.val();
                 var count = 1;
                 $.each(data, function(key, val) {
                 var textBox = '<div class="form-group"> <div class="row"> <div class="col-9"><textarea id="subtitle_' + count + '" class="form-control" placeholder="">' + val.subTitleText + '</textarea> </div> <div style="padding-left:0px; padding-right:0px;" class="col-3 text-left"><button class="btn btn-primary updateTextBtn" box_id="' + count + '" box_key="' + key + '"><i class="far fa-edit"></i></button> &nbsp; <button class="btn btn-danger deleteTextBtn" box_id="' + count + '" box_key="' + key + '"><i class="fas fa-trash-alt"></i></button>&nbsp; <button class="btn btn-success markTestasMatchSubTitle" box_id="' + count + '" box_key="' + key + '"><i class="fa fa-check"></i></button></div> </div> </div>';
                         subTitles.push(textBox);
                         count++;
                 });
         //                    var final_array = subTitles.join();
                 $("#subTitlesSection").html(subTitles);
         });
         
         
         // Updating an existing item
         $(document).on('click', ".updateTextBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            var InputBox = $("#subtitle_" + getBoxId).val();
            if (!InputBox || InputBox == ""){
                swal({
                type: 'error',
                title: 'Oops...',
                text: 'Enter a text please',
            });
            return false;
            }
            var data = {};
            data.subTitleText = InputBox;
            data.created = new Date().getTime();
            subTitleTexts.child(getBoxKey).update(data);
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was updated successfully!',
            });
            $("#subTitleText").val("");
         });
         
         
         
         // Saving a new item
         $(document).on('click', "#saveSubTitle", function() {
            var subTitleText = $("#subTitleText").val();
            if (!subTitleText || subTitleText == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'enter a text please',
                });
                return false;
            }
            var data = {};
            data.subTitleText = subTitleText;
            data.created = new Date().getTime();
            subTitleTexts.push(data);
            
            swal({
                type: 'success',
                title: 'Success',
                text: 'Data was added successfully!',
            });
            $("#subTitleText").val("");
         });
         //Delete a sub title text
         
         
         $(document).on('click', ".deleteTextBtn", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            swal({
                title: 'Are you sure you want to delete this text?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    subTitleTexts.child(getBoxKey).remove();
                }
            })
         });
         // Get Sub Titles
         
         
         var matchesRef = firebase.database().ref('matches/<?php echo $match_id; ?>');
         var matchesSliderRef = firebase.database().ref('matches_slider/<?php echo $match_id; ?>');
         
         $(document).on('click', "#removeMatchImage", function() {
            swal({
                title: 'Are you sure you want to remove the images from screen?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
                }).then((result) => {
                    if (result.value) {
                        
                        
                    firebase.database().ref("matchSideImage/<?php echo $match_id; ?>").remove();
                    
                    
                    swal({
                    type: 'success',
                            title: 'Success',
                            text: 'Image removed successfully!',
                    });
                }
            })

         });
         
         
         // Updating Main Screen Title
         $(document).on('click', "#updatematchScreenMainTitleBtn", function() {
            var matchScreenMainTitle = $("#matchScreenMainTitle").val();
            if (!matchScreenMainTitle || matchScreenMainTitle == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            
            var mainTitlewithMarqueeValue = $("input[name='mainTitlewithMarquee']:checked").val();
            
            
            firebase.database().ref('matches/<?php echo $match_id; ?>').update({"matchScreenMainTitle": matchScreenMainTitle});
            
            firebase.database().ref('mainTitlewithMarquee/<?php echo $match_id; ?>').update({"value": mainTitlewithMarqueeValue});
            
            firebase.database().ref('matchScreenMainTitle/<?php echo $match_id; ?>').update({"value": matchScreenMainTitle});
            
            
//            matchesSliderRef.update({"mainTitlewithMarquee": mainTitlewithMarqueeValue});
//            matchesSliderRef.update({"matchScreenMainTitle": matchScreenMainTitle});
            swal({
                type: 'success',
                title: 'Success',
                text: 'Match main title updated successfully!',
            });
         });
         
         
         // Updating Current Match Type
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
//            matchesRef.update({"showMatchType": showMatchTypeValue});

               // update the match type in main matches table too.
              matchesRef.update({"matchCurrentMatchType": matchCurrentMatchType});
            
            
            firebase.database().ref('showMatchType/<?php echo $match_id; ?>').update({"value": showMatchTypeValue});
            firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').update({"value": matchCurrentMatchType});
            
            
            swal({
                type: 'success',
                title: 'Success',
                text: 'Match type updated successfully!',
            });
         });
         
         // Updating Screen Sub Title
         $(document).on('click', "#updatematchScreenSubTitleBtn", function() {
            var matchScreenSubTitle = $("#matchScreenSubTitle").val();
            if (!matchScreenSubTitle || matchScreenSubTitle == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Enter a text please',
                });
                return false;
            }
            
            var subTitlewithMarqueeValue = $("input[name='subTitlewithMarquee']:checked").val();
            
            
            firebase.database().ref('subTitlewithMarquee/<?php echo $match_id; ?>').update({"value": subTitlewithMarqueeValue});
            
            firebase.database().ref('matchScreenSubTitle/<?php echo $match_id; ?>').update({"value": matchScreenSubTitle});
            
//            matchesSliderRef.update({"subTitlewithMarquee": subTitlewithMarqueeValue});
//            matchesSliderRef.update({"matchScreenSubTitle": matchScreenSubTitle});
            swal({
                type: 'success',
                title: 'Success',
                text: 'Match subtitle updated successfully!',
            });
         });
         
         
         $(document).on('click', ".markMatchTypeasMatchType", function() {
            var getBoxId = $(this).attr("box_id");
            var getBoxKey = $(this).attr("box_key");
            
            console.log(getBoxKey);
            
            var InputBox = $("#match_type_" + getBoxId).val();
            swal({
                title: 'Are you sure you want to use this match round?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {                                        
                    firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').update({"value": InputBox});
                    
                    if(getBoxKey !== undefined){
                     firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').update({"matchTypeKeyID": getBoxKey});  
                    }
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Match type updated successfully!',
                    });
                }
            })
         });
         
         
         $(document).on('click', ".markTestasMatchSubTitle", function() {
            var getBoxId = $(this).attr("box_id");
            var InputBox = $("#subtitle_" + getBoxId).val();
            swal({
                title: 'Are you sure you want to use this text as your match subtitle?',
                text: "Choose this option wisely.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    
                    
                    //matchesSliderRef.update({"matchScreenSubTitle": InputBox});
                    
                    
                    firebase.database().ref('matchScreenSubTitle/<?php echo $match_id; ?>').update({"value": InputBox});
                    
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Match subtitle updated successfully!',
                    });
                }
            })
         });
         
         $(document).on('click', ".markImageasMatchImage", function() {
            var getBoxId = $(this).attr("box_id");
             var InputBox = $("#image_" + getBoxId).val();
             swal({
                 title: 'Are you sure you want to use this image as your match image?',
                 text: "Choose this option wisely.",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, Do it!'
             }).then((result) => {
                if (result.value) {
                    ///matchesSliderRef.update({"matchSideImage": InputBox});
                    
                    firebase.database().ref('matchSideImage/<?php echo $match_id; ?>').update({"value": InputBox});
                    
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Match subtitle updated successfully!',
                    });
                }
                })
         });
         
         
         // Update Score Card Settings
         $(document).on('click', "#updateScoreCardSettings", function() {
            var showScoreCardValue = $("input[name='showScoreCard']:checked").val();
            matchesRef.update({"showScoreCard": showScoreCardValue});
           
            swal({
                type: 'success',
                title: 'Success',
                text: 'Scorecard updated successfully!',
            });
         });
         
         // Update Match Live Settings
         $(document).on('click', "#updateMatchLiveSettings", function() {
            var getIsMatchLiveValue = $("input[name='isMatchLive']:checked").val();
            matchesRef.update({"isMatchLive": getIsMatchLiveValue});
           
            swal({
                type: 'success',
                title: 'Success',
                text: 'Match Live status updated successfully!',
            });
         });
         
         
         
        firebase.database().ref('matchSideImage/<?php echo $match_id; ?>').on('value', function (data) {
            if (data.val() && data.val().value && data.val().value !== ""){
                $("#matchSideImage").attr("src", data.val().value);
                $("#removeMatchImage").show();
            } else{
                $("#matchSideImage").attr("src", "http://placehold.it/100x100?text=No+image");
                $("#removeMatchImage").hide();
            }     
        });
        
        
        firebase.database().ref('showMatchType/<?php echo $match_id; ?>').on('value', function (data) {
            if(data.val() && data.val().value && data.val().value !== ""){
                $("input[name='showMatchType'][value='"+data.val().value+"'").prop("checked",true);
            }
        });
        
        firebase.database().ref('matchScreenMainTitle/<?php echo $match_id; ?>').on('value', function (data) {
              $("#matchScreenMainTitle").val(data.val().value);
        });
        firebase.database().ref('mainTitlewithMarquee/<?php echo $match_id; ?>').on('value', function (data) {
             $("input[name='mainTitlewithMarquee'][value='"+data.val().value+"'").prop("checked",true);
        });
        
        firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').on('value', function (data) {
            $("#matchCurrentMatchType").val(data.val().value);
        });
        
        firebase.database().ref('matchScreenSubTitle/<?php echo $match_id; ?>').on('value', function (data) {
              $("#matchScreenSubTitle").val(data.val().value);
        });
        firebase.database().ref('subTitlewithMarquee/<?php echo $match_id; ?>').on('value', function (data) {
             $("input[name='subTitlewithMarquee'][value='"+data.val().value+"'").prop("checked",true);
        });
         
         
//         matchesRef.on('value', function (data) {
//            $("#matchScreenMainTitle").val(data.val().matchScreenMainTitle);
//            $("#matchScreenSubTitle").val(data.val().matchScreenSubTitle);
//            
//            if (data.val().showScoreCard && data.val().showScoreCard !== ""){
//               $("input[name='showScoreCard'][value='"+data.val().showScoreCard+"'").prop("checked",true);
//            } 
//            
//            if (data.val().mainTitlewithMarquee && data.val().mainTitlewithMarquee !== ""){
//               $("input[name='mainTitlewithMarquee'][value='"+data.val().mainTitlewithMarquee+"'").prop("checked",true);
//            }
//            if (data.val().subTitlewithMarquee && data.val().subTitlewithMarquee !== ""){
//               $("input[name='subTitlewithMarquee'][value='"+data.val().subTitlewithMarquee+"'").prop("checked",true);
//            }
//            
//                    
//         });
         
         
         
         
         
         
        $("#LoadingPageScreen").show();
         
         var onetimepasswordFromFirebase = 0;         
       
         
         matchesRef.on('value', function (data) {
//            console.log(data.val());
             
            $("#MatchTitle").text(data.val().MatchTitle);
            $("#Team1Name").text(data.val().Team1Name);
            $("#Team2Name").text(data.val().Team2Name);
            $("#Team1Score").text(data.val().Team1Score);
            $("#Team2Score").text(data.val().Team2Score);
            
            
            if (data.val().showScoreCard && data.val().showScoreCard !== ""){
               $("input[name='showScoreCard'][value='"+data.val().showScoreCard+"'").prop("checked",true);
            } 
            
            if (data.val().isMatchLive && data.val().isMatchLive !== ""){
               $("input[name='isMatchLive'][value='"+data.val().isMatchLive+"'").prop("checked",true);
            }
            
//            $("#Body").css("background-color", data.val().BackColor);
//            $("#MatchImage").attr("src", data.val().MatchImage);
            
//            $("#matchCurrentMatchType").val(data.val().matchCurrentMatchType);

//            if (data.val().showMatchType && data.val().showMatchType !== ""){
//               $("input[name='showMatchType'][value='"+data.val().showMatchType+"'").prop("checked",true);
//            }  
            
//            if (data.val().matchSideImage && data.val().matchSideImage !== ""){
//                $("#matchSideImage").attr("src", data.val().matchSideImage);
//                $("#removeMatchImage").show();
//            } else{
//                $("#matchSideImage").attr("src", "http://placehold.it/100x100?text=No+image");
//                $("#removeMatchImage").hide();
//            }
            
            
            if (data.val().operatorOneTimePassword && data.val().operatorOneTimePassword !== ""){
                onetimepasswordFromFirebase = data.val().operatorOneTimePassword;
            }
            
            $("#LoadingPageScreen").hide();
            $("#matchSideImage").show();          
            
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
              
        
         
      </script>
   </body>
</html>
<?php
   } else {
?>
    Match Not found
<?php
    }
?>