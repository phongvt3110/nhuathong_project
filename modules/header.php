<?php
include '../config/config.php';
function getBaseUrl() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
 }
//define('BASE_DOMAIN','http://'.$_SERVER['HTTP_HOST'].'/'.basename(dirname(__DIR__)).'/');
?>

<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php
		$url =($_SERVER['REQUEST_URI']);
		$path = parse_url($url, PHP_URL_PATH);
		$pathone = explode("/", trim($path, "/")); // trim to prevent
		if (empty($pathone[0])){
		echo "<title>SƠN NHÀ TỐT ĐẸP VN - SONNHATOTDEP.VN - O989.328.669</title>";
		echo "<meta name=\"description\" content=\"Sơn nhà tốt đẹp vn|sơn nhà|tốt đẹp|rẻ đẹp|son nha|tot dep\" />";
        echo "<meta name=\"keywords\" content=\"Sơn nhà tốt đẹp vn,sơn nhà|tốt đẹp,rẻ đẹp,son nha,tot dep\" />";
		}else if(!empty($pathone[0]) && empty($pathone[1]) && empty($pathone[2])){
	 	 echo "<title>CUNG CAP NHUA THONG TOAN VN - NHUATHONG.VN - O989.328.669</title>";
		  $p1 = explode(".", $pathone[0]);
		  if($p1[0] == 1){
		  echo "<meta name=\"description\" content=\"son tuong nha|sơn trường nhà\" />";
          echo "<meta name=\"keywords\" content=\"son tuong nha,sơn tường nhà\" />";
		 }else if($p1[0] == 2){
		  echo "<meta name=\"description\" content=\"son trang tri|sơn trang trí\" />";
          echo "<meta name=\"keywords\" content=\"son trang tri|sơn trang trí\" />";
		 }else if($p1[0] == 3){
		  echo "<meta name=\"description\" content=\"san go-son go,sàn gỗ,sơn gỗ\" />";
          echo "<meta name=\"keywords\" content=\"san go-son go,sàn gỗ,sơn gỗ\" />";
		 }else if($p1[0] == 4){
		  echo "<meta name=\"description\" content=\"son dau,sơn dầu\" />";
          echo "<meta name=\"keywords\" content=\"son dau,sơn dầu\" />";
		 }else if($p1[0] == 5){
		  echo "<meta name=\"description\" content=\"tran thach cao,trần thạnh cao\" />";
          echo "<meta name=\"keywords\" content=\"tran thach cao,trần thạnh cao\" />";
		 }else if($p1[0] == 6){
		  echo "<meta name=\"description\" content=\"tran thach cao,trần thạnh cao\" />";
          echo "<meta name=\"keywords\" content=\"tran thach cao,trần thạnh cao\" />";
		 }
		}else if(!empty($pathone[2]) && !empty($pathone[0]) && !empty($pathone[1])){
		    $p2 = explode(".", $pathone[2]);
			 $p3 = str_replace("-"," ",$p2[0]);
			 $p4 = preg_replace('/[0-9]+/', '', $p3);
			 echo "<title>".$p4."</title>";
			 echo '<meta name="description" content="'.$p4.'" />';
			 echo '<meta name="keywords" content="'.$p4.'" />';
		}
	?>
    <!-- Bootstrap -->
    <link  href="<?php echo $GLOBALS['BASE_DOMAIN'];?>css/style.css" rel="stylesheet">
    <link href="<?php echo $GLOBALS['BASE_DOMAIN'];?>css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>