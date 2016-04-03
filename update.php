<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$sid = $_GET["sid"];
$date = $_GET["date"];

$dday = $_GET["dday"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($sid)&& isset($date)){
                            
                    $sql = 'INSERT INTO Attendance (SID, DATE)
                    VALUES ("' . $sid . '" , "' . $date . '")'; 

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }
  
if (isset($dday) && isset($sid)){
                            $cnt=1;
                            $sql = 'SELECT * FROM Attendance WHERE DATE = "' . $dday . '" AND SID = "' . $sid . '"';
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              echo "buttongreen";
                                    
                                }
                            else {
                                echo "buttonred";
                            }
    }




$conn->close();
?>