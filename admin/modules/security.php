<?php
session_start();	
if ((!isset($_SESSION['s_uid'])) || ($_SESSION['s_uid'] == ""))		 
	{
	header("Location:../login");
	}
?>