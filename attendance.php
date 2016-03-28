<html>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <select name="location" id = "location">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      
    </select>
    
    
    
    
    
    
    <script>
        $(document).ready( function(){
                          $.ajax({ url: 'http://coho.spurlock.io/student/query.php?lid=' + document.getElementById('location').options[document.getElementById('location').selectedIndex].value , success: function(data) {  

                                    var json = JSON.parse( '"students" : [{"fName":"Kyle", "lName":"Adkins", "sid":"0"},{"fName":"Jimmy", "lName":"Neutron", "sid":"1"},{"fName":"Kid", "lName":"Newton", "sid":"2"}]'); 
                              
                                    var students = json.$("students");
                              
                                    document.write(students);
                                    for(var i = 0; i<students.length();i++)
                                    {
                                         $(".hoursTable").append('<tr><td align="center">' +  + '</td><td align="center">0.00</td><td><input id =  type="radio" name="presence" value="1"> Male<br></td></tr>');   
                                    }
                                    
            

                                                          } });
                        
                          
                          });

    </script>
    
    
    
    
    <div>
		<table class="hoursTable" cellspacing="0" rules="rows" border="1" id="table" style="width:300px;border-collapse:collapse;">
			<tr>
				<th align="center" scope="col" abbr="Date">Date</th><th align="center" scope="col" abbr="Hours">Hours</th><th scope="col">&nbsp;</th>
			</tr>
		</table>
	</div>
</html>