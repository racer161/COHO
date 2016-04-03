<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="yep.css">
    <script>
        
        var cls = ""; 
        var date_num = "";
        var json_data = [];
        $(document).ready(function (){
            
        
        
         
        
        $('#loadout').click(function(){
        alert("made it");
        read_list();
        
        });
        
        
        function update_attendance(id_num){

                                    id_num = json_data[id_num]["sid"];
            
                                    

                                    window.date_num = document.getElementById("dater").value; 
                                    
                                    

                                    $.ajax({ url: 'http://coho.spurlock.io/update.php?sid=' + id_num +'&date='+ date_num , success: function(data) {  

                                                    if (data =='yep'){
                                                        
                                                    }else{
                                                        
                                                        alert("Failed to connect to server!! Refresh and try again.");
                                                        
                                                    }

                                            }   
                                    });
                              
                              
                        };
        
                     function read_list(){ 
                         $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { lid : '"' + document.getElementById('location').options[document.getElementById('location').selectedIndex].value + '"' },
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
                    
                        date_num = document.getElementById("dater").value;
                        for(var i = 0; i<$json_data.length;i++){
                                    

                                                    if (i%2==0)
                                                                            {
                                                                                $("#content").append('<div class = "container-even"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><button class="button" id="' + i + '" onclick="update_attendance(' + i +')" ></button></div>');   
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class = "container-odd"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><button class="button" id ="' + i + '" onclick="update_attendance(' + i +')" ></button></div>');  

                                                                            }
                        }
                    }
            function color_list()
            {
                var id_numb = $json_data[i]["sid"];
                
                $.ajax({
                                   url: 'http://coho.spurlock.io/update.php?',
                                   data: { sid: '"' + id_numb + '"', dday: '"' + document.getElementById('dater').value + '"' },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        $('#'+).
                                   },
                                   type: 'GET'
                                });
                
            }
                        
            

        }); 
  
    </script>
    
    </head>
    <body>
    <h1>Location</h1>
    <select name="location" id = "location">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      
    </select>
    <h1>Date</h1>
    <input type="date" id="dater" name="dater">
    
    <button type="button" id = "loadout" >Load List</button>
    
    
    
    
    
    
    
    
    <div id = "content">
		
	</div>
    <div id = "info">
		
	</div>
    
    
    
    
    
   </body> 
</html>