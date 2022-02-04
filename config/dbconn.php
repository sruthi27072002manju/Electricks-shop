<?php
// $dbconn = mysqli_connect("localhost","root","","electricks");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }

  date_default_timezone_set("Asia/Manila"); 

// Initializes MySQLi
$dbconn = mysqli_init();

mysqli_ssl_set($dbconn,NULL,NULL, "./DigiCertGlobalRootCA.crt.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($dbconn, 'sruthimysql.mysql.database.azure.com', 'sruthi', 'siva30kumar@', 'electricks', 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno())
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
?>
