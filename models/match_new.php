<?php
include "config.php";

if (isset($_GET['match_id']) && $_GET['match_id']) {
    $match_id = $_GET['match_id']; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
             <title>Match Screen Page | Kabaddi365.com</title>

             <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet">

        <style>
            body{
                width: 1920px;
                height: 1080px;
                //overflow:hidden;
                background: #3e945e url('img/background.png') no-repeat;
                font-family: 'Oswald', sans-serif;
            }
            
            #left_right_image{
                position: absolute;
                bottom:0px;
                z-index:100000000;
                width:100%;
            }
            .scoreboard{
                width: 804px; 
                height: 153px; 
                position: absolute; 
                right: 0px;
                text-align: center !important;
            }
            
            .match_type{
                position: absolute; 
                right: 60px;
                top: 110px;
                text-shadow: 1px 1px 1px #000;   
                font-family: 'Oswald', sans-serif;
                font-weight: bold;
                color: #fff;
                font-size: 30px;
                text-transform: uppercase;
            }    
            
            .scoreboard #Team1Name{
                position: absolute;
                font-size: 25px; 
                color: #fff;
                top:29px;
                left: 260px;
                width: 320px;
                text-shadow: 1px 1px 1px #000;                
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                text-transform: uppercase;
                font-family: 'Oswald', sans-serif;
                font-weight: bold;
                text-align:left !important;
            }
            .scoreboard #Team2Name{
                position: absolute;
                font-size: 25px; 
                color: #fff;
                top:65px;
                right: 250px;
                text-shadow: 1px 1px 1px #000;
                width: 320px;
                text-align:right;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                text-transform: uppercase;
                font-family: 'Oswald', sans-serif;
                text-align:right !important;
                font-weight: bold;
            }
            .scoreboard #Team1Score{
                position: absolute;
                font-size: 48px; 
                color: #fff;
                font-weight: bold;
                top:30px;
                left: 90px;
                width: 100px;
                text-align: center;
                text-shadow: 1px 1px 1px #333;
                font-family: 'Oswald', sans-serif;

            }
            .scoreboard #Team2Score{
                position: absolute;
                font-size: 48px; 
                color: #fff;
                font-weight: bold;
                top:30px;
                right: 75px;
                text-shadow: 1px 1px 1px #333;
                width: 100px;
                text-align: center;
                font-family: 'Oswald', sans-serif;
            }
                
            .tournament_name{
                position: absolute;
                bottom:90px;
                text-align: center;
                font-family: 'Oswald', sans-serif;
                text-shadow: 1px 1px 3px #000;
                font-size: 38px; 
                color: #fff;
                font-weight: bold;
                left: 200px;
                right: 200px;
            }
            
            .information_scroller{
                position: absolute;
                bottom:33px;
                text-align: center;
                font-family: 'Oswald', sans-serif;
                font-size: 35px; 
                color: #333;
                font-weight: bold;
                left: 200px;
                right: 200px;
            }
            
            
             .upcoming_live_matches{
                position: absolute;
                bottom:-10px;
                text-align: center;
                font-family: 'Oswald', sans-serif;
                font-size: 32.5px; 
                text-shadow: 1px 1px 3px #000;
                color: #fff;
                font-weight: bold;
                left: 200px;
                right: 200px;
            }
            
            .right_side_image{
                position: absolute;
                right:10px;   
                bottom:10px;
                z-index:100000000;
            }
            .right_side_image img{
                width: 210px;
                height: 150px;
            }
            
            
            #ViewScoreCard{
                display: none;
            }
            
            #roundMatchesSection{                
                background: rgba(0,0,0,0.5);
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                margin: 50px auto;
                width: 1024px;
                border-radius: 20px;
                overflow: hidden;
                height: auto;
                max-height: 600px;
            }
            
            #roundMatchesSection h3{
                font-family: 'Oswald', sans-serif;
                font-size: 32.5px; 
                text-shadow: 1px 1px 3px #000;
                color: #fff;
                font-weight: bold;
                text-align: center;
                padding: 20px;
                border-bottom: 3px dotted rgba(0,0,0, 0.1);
                text-transform: uppercase;               
            }
            
            #roundMatchesSection div.team_name_left{
                font-size: 24px; 
                text-shadow: 1px 1px 3px #000;
                color: #fff;
                padding-top: 12px;
            }
            
            #roundMatchesSection div.team_name_left h4{
               text-align: right;
            }
            #roundMatchesSection div.team_name_left span.badge{
               float:left;
/*               margin-left: 50px;*/
               text-transform: uppercase;
            }
            #roundMatchesSection div.team_name_right{
                font-size: 24px; 
                text-shadow: 1px 1px 3px #000;
                color: #fff;
                padding-top: 12px;
                padding-left: 45px;
            }
            #roundMatchesSection div.team_name_right h4{
               text-align: left;
            }
            #roundMatchesSection div.team_name_right span.badge{
               float:right;
/*               margin-right: 50px;*/
               text-transform: uppercase;
            }
            #roundMatchesSection div.team_score{
                font-size: 40px; 
                text-shadow: 1px 1px 3px #000;
                color: yellow;
                font-weight: bold;
            }
            
            
            #roundMatchesSection .versus_text{
               font-size: 30px; 
                text-shadow: 1px 1px 3px #000;
                color: yellow;
            }
            div.roundMatchBox{
                border: 3px dotted rgba(0,0,0, 0.1);
                padding: 0px;
                background: rgba(0,0,0,0.2);
                margin-left: 20px;
                margin-right: 20px;
                margin-bottom: 10px;
                border-radius: 10px;
            }
            
            </style>
    </head>
    <body id="Body">
        
        <div id="left_right_image">
            <img src="img/left-right.png" />
        </div> 
        
        <div class="tournament_name" style="display:none; bottom: 105px;" id="mainTitleNormal"></div>
        
        <div class="tournament_name">
            <marquee scrolldelay="100" behavior="scroll" direction="left" style="display:none" id="mainTitleWithMarquee"></marquee>
        </div>
        
        
        <div class="information_scroller">
            <div id="subTitleNormal" style="display:none;"></div>
            <marquee scrolldelay="150" behavior="scroll" direction="left" style="display:none" id="subTitleWithMarquee"></marquee>
        </div>
        
        <div class="upcoming_live_matches">
            <marquee scrollamount="7" id="upcomingMatchesList"></marquee>
        </div>
        
        
        <div class="right_side_image">
            <img style="display:none" src="" id="matchSideImage" />
        </div>
        
        <div class="scoreboard" id="ViewScoreCard">
            <img src='img/Score_Back.png' />
            <div id="Team1Name">Loading...</div>
            <div id="Team2Name">Loading...</div>
            
            <div id="Team1Score">...</div>
            <div id="Team2Score">...</div>
        </div>
        <div class="match_type" style="display:none;" id="matchCurrentMatchType">...</div>        

        
        <div class="pre_added_texts" id="roundMatchesSection">
            
         </div>
        
        
        
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
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
        
        
        var boxes_with_matches = [];
        
        
        function getRoundMatches(snapshot){
                var roundMatchesKeys = [];
                var roundMatches = [];
                var data = snapshot.val();
                var maincount = 1;
               
               // Get the rounds
                $.each(data, function(key, val) {
                    var keysData = {
                        roundKey :  key,
                        countId :  maincount
                    }
                    roundMatchesKeys.push(keysData);
                     var textBox = '<div class="form-group" lastRoundId="" nextRoundId="" id="roundBox_'+maincount+'" roundId="'+key+'" style="margin-bottom:20px; display:none"> <div class="row"><div class="col-12"><h3>'+val.matchTypeText+'</h3></div></div><div id="roundMatches_'+maincount+'"></div></div>';
                     roundMatches.push(textBox);                      
                     maincount++;                
                 });                 
                 $("#roundMatchesSection").html(roundMatches);
                    
                 // Let's get the matches list   
                 setTimeout(function(){                      
                     var count = 1;
                                          
                     $('#roundBox_'+count+' #teamOneSelect_'+count).html('');
                     $('#roundBox_'+count+' #teamTwoSelect_'+count).html('');
                     
                        $.each(data, function(key, val) {
                            // get the teams from main teams table for first round
                           if(count == 1){   
                                  var totalTeamsinRound = 0;
                                  var MatchTeamsRf = firebase.database().ref('match_teams/<?php echo $match_id; ?>');
                                  MatchTeamsRf.on('value', function(snapshot){
                                        var data = snapshot.val();
                                        var teamcount = 1;
                                        $.each(data, function(key, val) {
                                                teamcount++;
                                                totalTeamsinRound++;
                                        });                                        
                                  });                                  
                          } 
                          
                          // get the teams from sub round teams table for other rounds
                          if(count > 1){     
                                var totalTeamsinRound = 0;
                                // Get teams selected for next rounds.
                                var currentMatchTypeRoundTeams = firebase.database().ref('match_types/<?php echo $match_id; ?>/'+key+'/teams');
                                currentMatchTypeRoundTeams.on('value', function(snapshot){
                                    var data = snapshot.val();
                                    $.each(data, function(key, val) {
                                            totalTeamsinRound++;
                                    });   
                                    // Check total teams in round else hide the round
//                                    if(totalTeamsinRound == 0){
//                                        $('#roundBox_'+count).hide();
//                                    }else{                                       
//                                        $('#roundBox_'+count).show();
//                                    }
                                });
                                
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
                                                                           
                            var showTeamScores = '';
                            var showVersusText = '';
                            if(val_match.matchStarted){
                                showTeamScores = 'display: visible;';
                                showVersusText = 'display: none;';
                            }else{
                                showTeamScores = 'display: none;';
                                showVersusText = 'display: visible;';
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
                            
                            var textBox = '<div class="row roundMatchBox"><div class="col-md-4 team_name_left"><span style="'+team1winnerdisplay+'" class="badge badge-pill badge-success pull-left">Winner</span><h4>'+val_match.Team1Name+'</h4></div><div class="col-md-2 text-center versus_text" style="'+showVersusText+'">vs</div><div style="'+showTeamScores+'" class="col-md-2 text-center team_score">'+val_match.Team1Score+'</div><div style="'+showTeamScores+'" class="col-md-2 text-center team_score">'+val_match.Team2Score+'</div><div class="col-md-4 team_name_right"><span style="'+team2winnerdisplay+'" class="badge badge-pill badge-success pull-right">Winner</span><h4>'+val_match.Team2Name+'</h4></div></div>';
                            matchesList.push(textBox);
                        });
                                                                        
                        // Get the matches list and put them in the table                                                     
                        $('#roundBox_'+count+' #roundMatches_'+count+'').html(matchesList);
                        
                        if(totalMatches > 0){
                            boxes_with_matches.push(count);
                            console.log(boxes_with_matches);
                            $('#roundBox_'+boxes_with_matches[0]).show();
                        }                                 
                      count++;
                   });
                }, 1000);
         }
         
         
         // Get Match Types for matches section getRoundMatches()
         var roundMatchesRf = firebase.database().ref('match_types/<?php echo $match_id; ?>');
         roundMatchesRf.on('value', getRoundMatches);
        
        
        
        

        var matchesRef = firebase.database().ref('matches/<?php echo $match_id; ?>');
        var matchesSliderRef = firebase.database().ref('matches_slider/<?php echo $match_id; ?>');
        
        
        firebase.database().ref('matchScreenMainTitle/<?php echo $match_id; ?>').on('value', function (data) {
            $("#mainTitleNormal").text(data.val().value);
            $("#mainTitleWithMarquee").text(data.val().value);          
            
            if(data.val().value.length > 67){
                firebase.database().ref('mainTitlewithMarquee/<?php echo $match_id; ?>').update({"value": "yes"});
            }else{
                firebase.database().ref('mainTitlewithMarquee/<?php echo $match_id; ?>').update({"value": "no"});
            }
        });
        
        firebase.database().ref('mainTitlewithMarquee/<?php echo $match_id; ?>').on('value', function (data) {
             if (data.val().value && data.val().value !== ""){
                if(data.val().value === "yes"){
                    $("#mainTitleWithMarquee").show();
                    document.getElementById('mainTitleWithMarquee').start();
                    $("#mainTitleNormal").hide();
                }else{
                    $("#mainTitleWithMarquee").hide();
                     document.getElementById('mainTitleWithMarquee').stop();
                    $("#mainTitleNormal").show();
                }
            }else{
                 $("#mainTitleNormal").show();
                 $("#mainTitleWithMarquee").hide();
                 document.getElementById('mainTitleWithMarquee').stop();
            }
        });
        
        
        
      
        firebase.database().ref('matchScreenSubTitle/<?php echo $match_id; ?>').on('value', function (data) {
            $("#subTitleNormal").text(data.val().value);
            $("#subTitleWithMarquee").text(data.val().value);
            
            if(data.val().value.length > 80){
                firebase.database().ref('subTitlewithMarquee/<?php echo $match_id; ?>').update({"value": "yes"});
            }else{
                 firebase.database().ref('subTitlewithMarquee/<?php echo $match_id; ?>').update({"value": "no"});
            }
            
        });
        
        firebase.database().ref('subTitlewithMarquee/<?php echo $match_id; ?>').on('value', function (data) {
             if (data.val().value && data.val().value !== ""){
               
               if(data.val().value === "yes"){
                   $("#subTitleWithMarquee").show();
                   document.getElementById('subTitleWithMarquee').start();
                   $("#subTitleNormal").hide();
                   
                   $(".information_scroller").css("bottom", "33px");
               }else{
                   $("#subTitleWithMarquee").hide();
                   document.getElementById('subTitleWithMarquee').stop();
                   $("#subTitleNormal").show();
                    $(".information_scroller").css("bottom", "43px");
               }
           }else{
               $("#subTitleWithMarquee").show();
               document.getElementById('subTitleWithMarquee').start();
               $("#subTitleNormal").hide();
               
                $(".information_scroller").css("bottom", "33px");
           }
        });
      
        
        
        firebase.database().ref('matchSideImage/<?php echo $match_id; ?>').on('value', function (data) {
            if (data.val().value && data.val().value !== ""){
                $("#matchSideImage").attr("src", data.val().value);
                $("#matchSideImage").show();    
            } else{
               $("#matchSideImage").hide();   
            }     
        });
        
        
        firebase.database().ref('matchCurrentMatchType/<?php echo $match_id; ?>').on('value', function (data) {
              $("#matchCurrentMatchType").text(data.val().value);
        });
        firebase.database().ref('showMatchType/<?php echo $match_id; ?>').on('value', function (data) {
             
              if (data.val() && data.val().value && data.val().value !== ""){
                    if(data.val().value === "yes"){
                        $("#matchCurrentMatchType").show();
                    }else{
                         $("#matchCurrentMatchType").hide();
                    }
                }   
             
        });
        
        
//        matchesSliderRef.on('value', function (data) {
////            $("#mainTitleNormal").text(data.val().matchScreenMainTitle);
////            $("#mainTitleWithMarquee").text(data.val().matchScreenMainTitle);
////            $("#subTitleNormal").text(data.val().matchScreenSubTitle);
////            $("#subTitleWithMarquee").text(data.val().matchScreenSubTitle);
//            
//                       
////           if(data.val().matchSideImage && data.val().matchSideImage !==""){
////               $("#matchSideImage").attr("src", data.val().matchSideImage);
////               $("#matchSideImage").show();    
////           }else{
////               //$("#matchSideImage").attr("src", "http://placehold.it/100x100?text=No+image");
////               $("#matchSideImage").hide();    
////           }
//           
//           
//           // Main Title Marquee
////           if (data.val().mainTitlewithMarquee && data.val().mainTitlewithMarquee !== ""){
////               if(data.val().mainTitlewithMarquee === "yes"){
////                   $("#mainTitleWithMarquee").show();
////                   
////                   document.getElementById('mainTitleWithMarquee').start();
////                   $("#mainTitleNormal").hide();
////               }else{
////                   $("#mainTitleWithMarquee").hide();
////                    document.getElementById('mainTitleWithMarquee').stop();
////                   $("#mainTitleNormal").show();
////               }
////           }else{
////                $("#mainTitleNormal").show();
////                $("#mainTitleWithMarquee").hide();
////                document.getElementById('mainTitleWithMarquee').stop();
////           }  
//            // Sub Title Marquee
////           if (data.val().subTitlewithMarquee && data.val().subTitlewithMarquee !== ""){
////               
////               if(data.val().subTitlewithMarquee === "yes"){
////                   $("#subTitleWithMarquee").show();
////                   document.getElementById('subTitleWithMarquee').start();
////                   $("#subTitleNormal").hide();
////                   
////                   $(".information_scroller").css("bottom", "33px");
////               }else{
////                   $("#subTitleWithMarquee").hide();
////                   document.getElementById('subTitleWithMarquee').stop();
////                   $("#subTitleNormal").show();
////                    $(".information_scroller").css("bottom", "43px");
////               }
////           }else{
////               $("#subTitleWithMarquee").show();
////               document.getElementById('subTitleWithMarquee').start();
////               $("#subTitleNormal").hide();
////               
////                $(".information_scroller").css("bottom", "33px");
////           }
//            
//        });
        
        matchesRef.on('value', function (data) {
            $("#MatchTitle").text(data.val().MatchTitle);
            $("#Team1Name").text(data.val().Team1Name);
            $("#Team2Name").text(data.val().Team2Name);
            $("#Team1Score").text(data.val().Team1Score);
            $("#Team2Score").text(data.val().Team2Score);
            $("#Body").css("background-color", data.val().BackColor);
            
//            if(data.val().matchCurrentMatchType && data.val().matchCurrentMatchType !== ""){
//                $("#matchCurrentMatchType").text(data.val().matchCurrentMatchType);
//            }
//            
            // Show Score Card
           if (data.val().showScoreCard && data.val().showScoreCard !== ""){
                if(data.val().showScoreCard === "yes"){
                    
                    firebase.database().ref('showMatchType/<?php echo $match_id; ?>').on('value', function (data) {
                            if (data.val().value && data.val().value !== ""){
                                  if(data.val().value === "yes"){
                                      $("#matchCurrentMatchType").show();
                                  }else{
                                       $("#matchCurrentMatchType").hide();
                                  }
                              }   
                      });
                    
                    //Show ScoreCard
//                    $("#ViewScoreCard").show();
                    $("#ViewScoreCard").slideDown(1000);
               }else{
                   
                   //Hide ScoreCard
//                   $("#ViewScoreCard").hide();
                     $("#ViewScoreCard").slideUp(1000);

                    
                   $("#matchCurrentMatchType").hide();
               }
           }
           // Show Match Type
//           if (data.val().showMatchType && data.val().showMatchType !== ""){
//               if(data.val().showMatchType === "yes" && data.val().showScoreCard === "yes"){
//                   $("#matchCurrentMatchType").show();
//               }else{
//                    $("#matchCurrentMatchType").hide();
//               }
//           }                        
        });       
        
        
        $(document).ready(function(){
            $.get( "http://api.kabaddi365.com/v4/upcoming_tournaments", function( data ) {
                
                var events = [];
                $.each(data.data.records, function( index, value ) {
                    events.push("* "+value.title+" "+value.event_date);
                    var final_array = events.join(", ");
                    $("#upcomingMatchesList").text(final_array);
                });
          });
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