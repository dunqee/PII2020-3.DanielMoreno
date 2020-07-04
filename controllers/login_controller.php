<?php

//Conectar a la Bases de datos
$hostname = "127.0.0.1";
$hostuser = "root";
$hostpassword = "";
$hostdatabase = "univa";
$connection = mysqli_connect($hostname,$hostuser,$hostpassword,$hostdatabase);

if ($connection) {
    //echo "You are connected";
    $sqlquery = "SELECT * FROM users";
    $result = mysqli_query($connection,$sqlquery); //utilizamos la conexion linea 8 y el sqlquery

    //var_dump($result);
    if (mysqli_num_rows($result) >0) {

        while($row = mysqli_fetch_assoc($result)){
            echo "<pre>";
            var_dump($row);
            echo "</pre>";

            //echo "Id: " .$row['idUser']. " - name: ".$row['name']."</br>" ; 
            $userEmail = $_GET['userEmail'];
            $userPassword = $_GET['userPassword'];

            if ($row['email']== $userEmail && $row['password'] == $userPassword ){

                echo "EMAIL AND USER FOUND";
            }


        }  
    } else {
        echo "EMPTY TABLE";
    }
    
} else {
    echo "Youre been hacked";
}


//echo "Getting data for login form";

$userEmail = $_GET['userEmail'];
$userPassword = $_GET['userPassword'];


/*
echo $user_email;
echo $user_password;
*/

if ($userEmail == 'danyamoreno@hotmail.com' && $userPassword == '123456') {
    //echo "Welcome ". $useEmail;
    # code...
} else {
    echo "User or password incorrect";
}

?>