<?php
function toProvinces($pid1, $pid2, $pid3, $link)
{
		$condition = $pid1;
		$condition .= $pid2 == 0 ? '' : ','.$pid2;
		$condition .= $pid3 == 0 ? '' : ','.$pid3;

		$sql = "SELECT city FROM province WHERE id IN ($condition)";
		//echo "sql:".$sql;exit;
		$result = mysqli_query($link, $sql);
		$province = "";

		while ($row=mysqli_fetch_row($result))
		{
			if ($provinces == "")
				$provinces = $row[0];//0
			else
				$provinces .= ", ".$row[0];//0
		}

		return  $provinces;
}
//gen so
function RandNumber($e){
 	for($i=0;$i<$e;$i++){
		$rand =$rand.rand(0, 9);  
 	}
	return $rand;
  }	
function cleanQuery($string)	// Preventing SQL Injection with MySQL and PHP
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  if (phpversion() >= '4.3.0')
  {
    $string = mysqli_real_escape_string($string);
  }
  else
  {
    $string = mysqli_escape_string($string);
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

		mysqli_query($query) or die('Error, query failed');
		
		$query = "SELECT MAX(id) as vid FROM upload WHERE name = '$fileName' AND size = '$fileSize'";
		
		$result = mysqli_query($query, $link);
		$id = 0;
		if (mysqli_num_rows($result)!=0)
		{
			while ($row=mysqli_fetch_row($result))
			{
			$id = $row[0];//vid->0
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
function rennder_options($options = array(), $selection = null) {

    if (!is_array($options)) {
        return false;
    }
    $result = "";
    foreach($options as $option) {
        $option_str =  '<option value="'.$option['value'].'"';
        if ($selection !== null && $option['value'] == $selection){
            $option_str .= ' selected="selected"';
        }
        $option_str .= '>'.$option['name'].'</option>';
        $result .= $option_str;
    }
    return result;
}
function changeTitle($str){ 
	$str = trim(str_replace(',',' ',$str)); 
    $str = uni2nosign(strtolower($str));
	$str = trim(str_replace(' ','-',$str)); 
	$str = trim(str_replace('---','- ',$str)); 
    return $str; 
    }  
function replacleTitleall($str){ 
	$str = trim(str_replace(',',' ',$str)); 
	$str = trim(str_replace('.',' ',$str)); 
    return $str; 
    }  	
function seo($s) {
 $tr = array('ş', 'Ş', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', ' ', '?', '?', '?', '.', '/');
 $eng = array('s', 'S', 'i', 'I', 'g', 'G', 'u', 'U', 'o', 'O', 'C', 'c', '-', '', '', '', '');
 $s = str_replace($tr, $eng, $s);
 $s = str_replace("%", "", $s);
 $s = strtolower($s);
 $s = preg_replace('/&.+?;/', '', $s);
 $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = trim($s, '-');
 return $s;
}
//loai bo the br
function br2nl($string){
  $return=eregi_replace('<br[[:space:]]*/?'.
    '[[:space:]]*>',chr(13).chr(10),$string);
  return $return;
}
function nv_br2nl( $text )
{
	if( empty( $text ) ) return '';

	return preg_replace( '/\<br(\s*)?\/?(\s*)?\>/i', chr(13).chr(10), $text );
}
//loc the html
 function removeallhtml($str) {
  $r=preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $str)."\n";

  return $r;
  }
function removeaimg($str) {
  $r=preg_replace('/<img[^>]+\>/i', '', $str)."\n";
  
  return $r;
  }   
?>