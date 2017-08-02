<?php

//Khai bao ket noi, neu ket noi khong thanh cong, xuat hien thong bao loi	
$link = mysql_connect("localhost", "root", "") or die("Could not connect to database");

//Mo co so du lieu

mysql_select_db("sonnhatotdep", $link);

						$sql = "SELECT id,name FROM category where parent_id=1 ORDER BY position, sub_position, subsub_position"; 
						$result = mysql_query($sql, $link);
						//print_r($result);exit; 
						while ($row=mysql_fetch_array($result))
						{    
						    $c_id = $row["id"];
							$c_name = $row["name"];
							echo $c_name;
						}
?>