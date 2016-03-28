<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$sid = $_GET["sid"];
$temail = $_GET["temail"];
$pass = $_GET["pass"];


$gid = $_GET["gid"];
$subid = $_GET["subid"];

$lid = $_GET["lid"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($sid)){
                            $sql = 'SELECT * FROM Students WHERE SID = ' . $sid;
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo ' {

                                          "fName":"' . $row["fName"] . '",

                                          "lName":"' . $row["lName"] . '",

                                          "minfo":"' . $row["Medical Info"] . '",

                                          "pnum":"' . $row["Phone"] . '",

                                          "Email":"' . $row["Email"] . '",

                                          "Address":"' . $row["Adddress"] . '",

                                          "pn1":"' . $row["Parent1"] . '",

                                          "pn2":"' . $row["Parent2"] . '",
                                          
                                          "EmergencyName":"' . $row["EmrName"] . '",
                                          
                                          "EmergencyNumber":"' . $row["EmrNumber"] . '"

                                       }';


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }

if (isset($gid) && isset($subid)){ 
                            $sql = 'SELECT * FROM GradeBook WHERE SID = ' . $gid . ' AND Subject = ' . $subid  ;
                            $result = $conn->query($sql);
    
                            
    
                            if ($result->num_rows > 0) {
                                echo '[';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo $row["Grade"] . ',';


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            echo '0]';
                            } else {
                                echo "no data!";
                            }
    }



if (isset($lid)){ 
                            $sql = 'SELECT * FROM Students WHERE LID = ' . $lid;
                            $result = $conn->query($sql);
    
                            
    
                            if ($result->num_rows > 0) {
                                echo ' "students" : [';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    
                                    echo '{"fName":"' . $row["fName"] . '", "lName":"' . $row["lName"] . '", "sid":"' . $row["SID"] . '"},';
                                    


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            echo ']';
                            } else {
                                echo "no data!";
                            }
    }

if (isset($vid)){
                            $sql = 'SELECT * FROM Volunteers WHERE VID = ' . $vid;
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo ' "Volunteer": {

                                          "First Name":"' . $row["fName"] . '",

                                          "Last Name":"' . $row["lName"] . '",

                                          "Medical Info":"' . $row["Medical Info"] . '",

                                          "Phone":"' . $row["Phone"] . '",

                                          "Email":"' . $row["Email"] . '",

                                       }';


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }

if (isset($temail) && isset($pass)){
                            $sql = 'SELECT * FROM Teacher WHERE Email = "' . $temail. '"';
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                      if (password_verify($pass, $row["Password"])){
                                          echo "verified";
                                      }else{
                                          echo "error!";
                                      }


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }


$conn->close();
?>