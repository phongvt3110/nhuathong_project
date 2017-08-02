<?php
require("../modules/security.php");

$target_path = "../../photo/thumb/";
if ($_POST["dir"] == "origin")
	$target_path = "../../photo/origin/";
	
$target_name = date("dmyHis");
$target_name = $target_name . basename( $_FILES['uploadedfile']['name']);
$target_path = $target_path . $target_name; 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
     echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";

?>

<script language="JavaScript">
opener.document.all.<?php echo $_POST["logo"]?>.innerHTML='<img src=\'<?php echo $target_path?>\'>';	
opener.document.form1.<?php echo $_POST["img"]?>.value = '<?php echo $target_name?>';
self.close();
</script>     
     
<?php  
} 
else{
     echo "There was an error uploading the file, please try again!";
} 
?>