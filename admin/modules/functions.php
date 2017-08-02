<?php
function cleanQuery($string)	// Preventing SQL Injection with MySQL and PHP
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  if (phpversion() >= '4.3.0')
  {
    $string = mysql_real_escape_string($string);
  }
  else
  {
    $string = mysql_escape_string($string);
  }
  return $string;
}
	
function stripsign($st)
{
	$tmp = strtolower($st);
	$tmp = uni2nosign($tmp);	
	return $tmp;
}	
	
function split_int($str)
{
$p = $str;	
$i = strlen($p) - 3;
while ($i>0)
	{
	$p = substr($p, 0, $i).".".substr($p, $i);
	$i = $i - 3;
	}
return $p;
}
	
function getString1($st)
{
	
	//str_replace("'",'&quot',string);
	//htmlspecialchars(string);
	//addslashes(string);
	//str_replace("'",'`',$str);
	$tmp = $st;
	
	$tmp = (! get_magic_quotes_gpc ()) ? addslashes ($tmp) : $tmp;
	return $tmp;
}
	
function getString($st, $le)
{
	
	//str_replace("'",'&quot',string);
	//htmlspecialchars(string);
	//addslashes(string);
	//str_replace("'",'`',$str);
	if (!empty($le))
	{
		if (strlen($st)<=$le)
				$tmp = $st;
		else	$tmp = substr($st, 0, $le);
	}
	$tmp = (! get_magic_quotes_gpc ()) ? addslashes ($tmp) : $tmp;
	return $tmp;
}

function getNumber($st)
{
	if (!empty($st))
		$tmp = (int)$st;
	else	
		$tmp = 0;
	return $tmp;
}

function uploadFile($x, $link)	
{
	if ($x['name']!="")	
	{
		$fileName = $x['name'];	
		$tmpName  = $x['tmp_name'];
		$fileSize = $x['size'];
		$fileType = $x['type'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, $fileSize);
		$content = addslashes($content);
		fclose($fp);
		
		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
		
		$query = "INSERT INTO upload (name, size, type, content ) ".
		         "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

		mysql_query($query) or die('Error, query failed');
		
		$query = "SELECT MAX(id) as vid FROM upload WHERE name = '$fileName' AND size = '$fileSize'";
		
		$result = mysql_query($query, $link);
		$id = 0;
		if (mysql_num_rows($result)!=0)
		{
			while ($row=mysql_fetch_array($result))
			{
			$id = $row["vid"];
			}
		}	
		
		return $id;
	}
	else
	{
		return 0;	
	}	

		//echo "<br>File $fileName uploaded<br>";		
}

function uni2nosign($str)
{	
//A,E,I,U,O,Y,D
$tmp = $str;

$arr = array("á","à","ả","ã","ạ","â","ấ","ầ","ẩ","ẫ","ậ","ă","ắ","ằ","ẳ","ẵ","ặ","Á","À","Ả","Ã","Ạ","Â","Ấ","Ầ","Ẩ","Ẫ","Ậ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ");
$tmp = str_replace($arr, "a", $tmp);

$arr = array("é","è","ẻ","ẽ","ẹ","ê","ế","ề","ể","ễ","ệ","É","È","Ẻ","Ẽ","Ẹ","Ê","Ế","Ề","Ể","Ễ","Ệ");
$tmp = str_replace($arr, "e", $tmp);

$arr = array("ó","ò","ỏ","õ","ọ","ô","ố","ồ","ổ","ỗ","ộ","ơ","ớ","ờ","ở","ỡ","ợ","Ó","Ò","Ỏ","Õ","Ọ","Ô","Ố","Ồ","Ổ","Ỗ","Ộ","Ơ","Ớ","Ờ","Ở","Ỡ","Ợ");
$tmp = str_replace($arr, "o", $tmp);

$arr = array("ú","ù","ủ","ũ","ụ","ư","ứ","ừ","ử","ữ","ự","Ú","Ù","Ủ","Ũ","Ụ","Ư","Ứ","Ừ","Ử","Ữ","Ự");
$tmp = str_replace($arr, "u", $tmp);

$arr = array("í","ì","ỉ","ĩ","ị","Í","Ì","Ỉ","Ĩ","Ị");
$tmp = str_replace($arr, "i", $tmp);

$arr = array("ý","ỳ","ỷ","ỹ","ỵ","Ý","Ỳ","Ỷ","Ỹ","Ỵ");
$tmp = str_replace($arr, "i", $tmp);

$arr = array("đ","Đ");
$tmp = str_replace($arr, "d", $tmp);

return $tmp;
}
	
?>