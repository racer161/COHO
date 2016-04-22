<?php session_start(); $msg = $_SESSION['LID']; ?>

<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="yep.css">
    <script>
        
        var cls = ""; 
        var lid = <?php session_start(); echo $_SESSION['LID'];?>;
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
            read_list();
            
            $('#loadout').click(function(){
                alert("made it");
                create_stu();
        
            });
            
            $(document).on('click', ".container-odd", function(){
                window.location.href = "profiler.php?sid="+$json_data[this.id]["sid"];
            });
            
            $(document).on('click', ".container-even", function(){
                window.location.href = "profiler.php?sid="+$json_data[this.id]["sid"];
            });
            
            
            
                     function create_stu(){ 
                         alert($('#firstname').val());
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/create.php',
                                   data: { fName : $('#firstname').val() ,lName : $('#lastname').val() , medinfo: $('#medinfo').val() ,phone: $('#phone').val() ,email: $('#email').val() ,addr: $('#addr').val() ,p1: $('#p1').val() ,p2: $('#p2').val() ,emrName: $('#emrName').val() ,emrNumber: $('#emrNumber').val() ,lid : <?php echo $msg; ?>},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        alert("successfully created new student!!");
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
                                
                    function read_list(){ 
                         
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { lidonly :  <?php echo $msg; ?>},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        
                                            $json_data = JSON.parse(data);
                                            fill_list();
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
                      
                      
                    function fill_list(){
                        
                        
                    
                        
                        
                        
                        $("#content").html(" ");
                        for(var i = 0; i<$json_data.length;i++){
                        

                                                    if (i%2==0)
                                                                            {
                                                                                $("#content").append('<div class = "container-even" id ="'+i+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></div>');
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class = "container-odd" id ="'+i+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></div>');  

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body>
    
    <div id = "content">
		
	</div>
    <div class = "container-new">
        + ADD A NEW STUDENT<br>
        
        First name:<br>
        <input type="text" id="firstname"><br>
        Last name:<br>
        <input type="text" id="lastname">
        Medical info:
        <input type="text" id="medinfo">
        Phone:
        <input type="text" id="phone">
        Email:
        <input type="text" id="email">
        Address:
        <input type="text" id="addr">
        Parent 1:
        <input type="text" id="p1">
        Parent 2:
        <input type="text" id="p2">
        Emergency Contact Name:
        <input type="text" id="emrName">
        Emergency Contact Phone Number:
        <input type="text" id="emrNumber">
        <button type="button" id = "loadout" >Create Student</button>
    </div>
    <div id = "info">
		
	</div>
    
    
    
    
    
   </body> 
</html>