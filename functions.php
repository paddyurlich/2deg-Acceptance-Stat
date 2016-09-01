<?php

function hello(){
	echo "hello";
}


function connect(){
	$servername = "172.21.200.37";
    $username = "patrickurlich";
    $password = "forPUonly";
    $dbname = "ranPU";


    // Create connection
    //$connect = new mysqli($servername, $username, $password, $dbname);
     $connect = mysqli_connect($servername, $username,$password,$dbname); 
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 
}
	


function getSQLResult($sql,$field) {
       
        $servername = "172.21.200.37";
        $username = "patrickurlich";
        $password = "forPUonly";
        $dbname = "ranKH";

        // Create connection
        $connect = new mysqli($servername, $username, $password, $dbname);

         
        //echo "SQL = ".$sql."</br>";
         $result = $connect->query($sql);

         if ($result->num_rows > 0) {
              // output data of each row
              $row = $result->fetch_assoc();
              //echo "PS CSSR Average: " . $row["PS_CSSR_Average"]. "<br>"; 
              
              return $row[$field];
          }
          else "nothing";
          //else echo"no result found". $row["PS_CSSR_Average"];
    }
?>