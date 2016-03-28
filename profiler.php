<html>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    
    
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    
    
    <script>
        $(document).ready( function(){
                          $.ajax({ url: 'http://coho.spurlock.io/student/query.php?sid=' + $("#yep").text() , success: function(data) {  

                                    var json = JSON.parse(data);                                              

                                    //document.write(json["fName"]);
                              
                                    $("#nametag").text(json["fName"] + " " + json["lName"]);
                              
                                    $("#1").text(json["pn1"]);
                              
                                    $("#2").text(json["pn2"]);
                              
                                    $("#3").text(json["minfo"]);
                              
                                    $("#4").text(json["pnum"]);
                                    
            

                                                          } });
                        
                          
                          });

        







    </script>
    
    <body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a id = "nametag" href="#">Fervency</a></h1>
			<span>Template Design by </span> 
            
            
        </div>
        <div style="width:30%">
			<div>
                <h3>Math</h3>
				<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>
	</div>
</div>
<script>
    
    var graph = [];
    
    $(document).ready( function(){
    $.ajax({ url: 'http://coho.spurlock.io/student/query.php?gid=' + $("#yep").text() +'&subid=1', success: function(data) {  

                                    graph = JSON.parse(data);
                                    

                                                          } });
    
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["1","2","3","4","5","6"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : graph["g"]
				}
				
			]
		}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
    
    });
	</script>
<div id="wrapper3">
	<div id="portfolio" class="container">
		<div class="title">
			<h2>Student Info</h2>
        </div>
		<div  class="column">
			<div class="box"> <a href="#"></a>
				<h3 id = 'fn'>Parent 1 Name</h3>
				<p id = "1" >Fermentum nibh augue praesent a lacus at urna congue rutrum.</p>
            </div>
		</div>
		<div  class="column">
			<div class="box"> <a href="#"></a>
				<h3>Parent 2 Name</h3>
				<p id = "2" >Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
            </div>
		</div>
		<div  class="column">
			<div class="box"> <a href="#"></a>
				<h3>Medical Info</h3>
				<p id = "3" >Vivamus fermentum nibh in augue praesent urna congue rutrum.</p>
            </div>
		</div>
		<div  class="column">
			<div class="box"> <a href="#"></a>
				<h3>Contact Phone Number</h3>
				<p id = "4" >Rutrum fermentum nibh in augue praesent urna congue rutrum.</p>
            </div>
		</div>
	</div>
</div>
        

<p id = "yep">
        <?php echo $_GET["sid"]; ?>
</p>        
</body>

</html>