<?php session_start();
$msg = $_SESSION['LID'];
?>
<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="yep.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
    

    <script>
        
        var cls = ""; 
        var lid = <?php session_start(); echo $_SESSION['LID'];?>;
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
        $(document).on('click', "#attLoad", function(){
        window.location.href = "attendance.php";
        });
            
        $(document).on('click', "#RscoreLoad", function(){
        window.location.href = "grades.php?subid=0";
        });
        $(document).on('click', "#stuLoad", function(){
        window.location.href = "studentList.php";
        });
                        
            

        }); 
  
    </script>
<body>
    <div class="panel">
        <div id="head">
        
        </div>
        <ul>
          <li><p id = "attLoad">Edit Attendance</p></li>
          <li><p id = "RscoreLoad">Edit Reading Scores</p></li>
          <li><p id = "stuLoad">Student List</p></li>
        </ul>
    </div>
    <div id = "page">
    
    </div>
    
</body>    
    
    
</html>