<?php
//Conectar a la Bases de datos
$hostname = "127.0.0.1";
$hostuser = "root";
$hostpassword = "";
$hostdatabase = "univa";
$connection = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);
$sqlquery = "SELECT * FROM users";
$result = mysqli_query($connection,$sqlquery);
$cont =0;
$newPass = $_GET['newPassword'];
$sqlUpdate = "UPDATE users SET passwordU = '$newPass' where idUser = '$cont'";

if (mysqli_num_rows($result) >0) {
    while($row = mysqli_fetch_assoc($result)){
        
        $userEmail = $_GET['userEmail'];
        
        if ($row['email']== $userEmail){

            echo "USER FOUND";
            echo $cont;
            if (mysqli_query($connection, $sqlUpdate)) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . mysqli_error($connection);
              }
              
              mysqli_close($connection);
            
        }
        $cont = $cont +1;


    }  
} else {
    echo "EMPTY TABLE";
}



?>