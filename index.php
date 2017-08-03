<?php
	session_start();
	$m = (int)$_GET['m'];
	include "lang/vn.php";
	include "modules/connection.php";
	include "modules/header.php";
	include "modules/functions.php";

	include "modules/center_top.php";
			switch ($m)
			{
			case 1:
				include "modules/center_product_list.php";
				break;
			case 2:
				include "modules/center_product_detail.php";
				break;
			case 3:
				include "modules/center_contact.php";
				break;
			default:
				include "modules/center_home.php";
				break;
			}

	include "modules/bottom.php";