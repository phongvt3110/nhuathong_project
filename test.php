<?php
//
////Khai bao ket noi, neu ket noi khong thanh cong, xuat hien thong bao loi
//$link = mysqli_connect("localhost", "root","monkey3110","nhuathong") or die("Could not connect to database");
//
////Mo co so du lieu
//
//mysqli_select_db("nhuathong", $link);
//
//						$sql = "SELECT id,name FROM category where parent_id=1 ORDER BY position, sub_position, subsub_position";
//						$result = mysqli_query($link,$sql);
//						//print_r($result);exit;
//						while ($row=mysqli_fetch_array($result))
//						{
//						    $c_id = $row["id"];
//							$c_name = $row["name"];
//							echo $c_name;
//						}



//$db = new mysqli("localhost", "root", "monkey3110", "nhuathong");
//
///* check connection */
//if ($db->connect_errno) {
//    printf("Connect failed: %s\n", $db->connect_error);
//    exit();
//}
//$sql = 'Select * from product';
//$result = $db->query($sql);
//while ($row = $result->fetch_array()){
//    echo $row['title']. '<br>';
//}
//$result->close();
//$db->close();
echo dirname(__FILE__).'<br>';
echo basename(__DIR__).'<br>';
echo 'http://'.$_SERVER['HTTP_HOST'].'/'.basename(__DIR__).'/<br>';
include ('config/config.php');
if(defined('BASE_DOMAIN')){
    echo 'true<br>';
} else {
    echo 'false<br>';
}
echo BASE_DOMAIN;
