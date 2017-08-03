<?php
//Khai bao ket noi, neu ket noi khong thanh cong, xuat hien thong bao loi	
$link = mysqli_connect("localhost", "root", "monkey3110","nhuathong") or die("Could not connect to database");

//Mo co so du lieu
mysqli_select_db($link,"nhuathong");

define("LOG_TBL", "log"); 
define("HIT_COUNTER_TBL", "hit_counter"); 
define("BLOCK_IP", "0.0.0.0"); 
define("UNIQUE_TIME", "60");
define("USER_ONLINE_TIME", "5");
define("NO_OF_DIGITS", "5");
define("LAST_HOURS", "24");
define("DISPLAY_LOG_NO","50");

?>
