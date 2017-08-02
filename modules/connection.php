<?php
//Khai bao ket noi, neu ket noi khong thanh cong, xuat hien thong bao loi	
$link = mysql_connect("localhost", "root", "") or die("Could not connect to database");

//Mo co so du lieu
mysql_select_db("nhuathong", $link);

define("LOG_TBL", "log"); 
define("HIT_COUNTER_TBL", "hit_counter"); 
define("BLOCK_IP", "0.0.0.0"); 
define("UNIQUE_TIME", "60");
define("USER_ONLINE_TIME", "5");
define("NO_OF_DIGITS", "5");
define("LAST_HOURS", "24");
define("DISPLAY_LOG_NO","50");

?>
