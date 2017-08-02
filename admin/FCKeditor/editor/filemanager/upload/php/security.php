<?
session_start();	
if (!session_is_registered("suid"))		 
	{
	header("Location:../login");
	}
?>