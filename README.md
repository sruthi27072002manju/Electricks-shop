# Ecommerce site with effective BOT

**PROBLEM STATEMENT:**  In most of the ecommerce site only the products are seen and purchased .Buyers are not able to enquiry about the things frequently. For that buyers want to post a mail to the given mail address and then only buyers get their doubts solved.

**PROJECT DESCRIPTION:**  Its a simple UI and complete  Ecommerce site with a Bot , where these bot helps the buyers to solve their doubts about the products at the same time by asking various question related to their products. The business-to-consumer aspect of product commerce (e-commerce) is the most visible business use of the World Wide Web. The primary goal of sample prototype an e-commerce site is to sell goods online with solving problems of customer speedily via FAQ Bot .we use azure MYSQL database for backend process.

**Project  URL**

>https://hardware.azurewebsites.net/index.php

*By this URL we can identify that the project is hosted with the help of AZURE WEB APP.*

>/config/dbconn.php
~~~
// Initializes MySQLi
$dbconn = mysqli_init();

mysqli_ssl_set($dbconn,NULL,NULL, "./DigiCertGlobalRootCA.crt.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($dbconn, 'sruthimysql.mysql.database.azure.com', *, *, 'electricks', 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno())
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
~~~
*From the above code you can verify that we have used AZURE DATABASE FOR MYSQL.*

![WEBSITE BOT SCREENSHOT] (/screenshot.jpeg)

*This Screenshot shows you that this Ecommerce site with a bot has been created using AZURE QnA Maker and AZURE Bot service*
