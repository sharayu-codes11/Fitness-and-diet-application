<?php
$host="localhost";
$user="root";
$pass="";
$dbname="fitnessdb";
$con=mysql_connect($host,$user,$pass);
if(!$con)
{
    echo "Error";
}
//else{
    //echo "Connection successful";
//}
$db=mysql_select_db($dbname,$con);
if(!$db)
{
    echo "Error";
}
//else{
    //echo "Connection successful";
//}
?>