<?php

// Development Connection

// $dsn     = 'mysql:host=localhost;dbname=food';
// $user    ='root';
// $pass    = '';
// $option  = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'
// );


// Remote DataBase Connection

$dsn     = 'mysql:host=remotemysql.com;dbname=1AjbgjU9oI';
$user    = '1AjbgjU9oI';
$pass    = 'LX3ZmaUy43';
$option  = array(
    PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'
);


try {

    $con = new PDO($dsn, $user, $pass, $option);

    $con-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}

catch(PDOException $e) {

    echo "Failed To Connect". $e->getMessage();

}







