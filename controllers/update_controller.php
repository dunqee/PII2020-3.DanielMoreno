<?php
//Conectar a la Bases de datos
$hostname = "127.0.0.1";
$hostuser = "root";
$hostpassword = "";
$hostdatabase = "univa";
$connection = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);
$sqlquery = "SELECT * FROM users";
$result = mysqli_query($connection,$sqlquery);
$newPass = $_GET['newPassword'];
$userEmail = $_GET['userEmail'];
$sqlUpdate = "UPDATE users SET passwordU = '$newPass' where email = '$userEmail'";

if (mysqli_num_rows($result) >0) {
    while($row = mysqli_fetch_assoc($result)){
        
        if ($row['email']== $userEmail){
            if (mysqli_query($connection, $sqlUpdate)) {
                echo "updated successfully";
              } else {
                echo "Error updating: ". mysqli_error($connection);
              }
              mysqli_close($connection);
        }


    }  
} else {
    echo "EMPTY TABLE";
}



?>