<?php
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 

	$id = (int)$_GET["id"];
	$_id_str = "Menu bên trên";
	
?>
	<html>
	<head>
<script type="text/javascript" src="../jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
	<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>
</head>
<body>
      <TABLE cellSpacing=0 cellPadding=0 align=center border=0>
        <TBODY>
        <tr>
          <TD vAlign=top width=175>                  	  
           <?php require("../modules/left.php"); ?>                   	  
          </TD>
          <TD vAlign=top width=608 colspan=2>
          <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
				
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Thông tin chung</font></b> &gt; <?php echo $_id_str?></span>
                  </td>
                </tr>
              </table>
          	  
<?php
	
if (isset($_POST["submit"]))
	{
		if (isset($_GET["id"]))
		{
		
		$id = (int)$_GET["id"];
		
		$largeimg =  $_POST["largeimg"];
		$title    =  $_POST["title"];
		$phone1   =  $_POST["phone1"];
	    $phone2   =  $_POST["phone2"];
		$support  = $_POST["support"];
		$sql = "UPDATE menu_header SET ";
		$sql .= "title = '$title', ";
		$sql .= "thumb = '$largeimg', ";
		$sql .= "phone1 = '$phone1', ";
		$sql .= "phone2 = '$phone2', ";
		$sql .= "support = '$support' ";
		$sql .= " WHERE id = $id";
		//echo $sql;exit;
		mysqli_query($link, $sql);
		
?>
      	  	
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành chỉnh sửa thông tin.</td>
                    </tr>
                    
                  </table>
                </td>
              </tr>
            </table>
           
            		  
                </td>
              </tr>
            </table>

<?php	
		}
	}
else
{	
	if (isset($_GET["id"]))
	{
		
		$id = (int)$_GET["id"];
		$sql = "SELECT id,title,thumb,phone1,phone2,support FROM menu_header WHERE id = $id"; 
		//echo $sql;exit;
		$result = mysqli_query($link, $sql);
		if ($row=mysqli_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$p_title = $row["title"];
			$p_photo = $row["thumb"];
			$p_phone1 = $row["phone1"];
			$p_phone2 = $row["phone2"];
			$p_support = $row["support"];
	

?>
          	  
            <form name="form1" action="?id=<?php echo $p_id?>" method="post">                
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
					<tr>
                     <td>Ảnh :<font color="red">(Width:140px,Hieght:140px)*</font></td>
                      <td>
                        <div id="logo2"><?php if ($p_photo!="") echo "<img src='../../photo/origin/$p_photo' width='140px' height='140px'>";?><br></div>
                        <input name="largeimg" type="text" id="largeimg" size="50" value="<?php echo $p_photo?>">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=largeimg&dir=origin&logo=logo2','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg2();" class="button">
                        </td>
                    </tr>
                    <tr>
                      <td>Tên website:</td>
                         <td><input type="text" name="title" value="<?php echo $p_title?>" size="80"></td>
                    </tr>
					<tr>
                      <td>hotline 1:</td>
                         <td><input type="text" name="phone1" value="<?php echo $p_phone1?>" size="80"></td>
                    </tr>
					<tr>
                      <td>hotline 2:</td>
                         <td><input type="text" name="phone2" value="<?php echo $p_phone2?>" size="80"></td>
                    </tr>
					<tr>
                      <td>hỗ trợ:</td>
                        <td><input type="text" name="support" value="<?php echo $p_support?>" size="80"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                      	<input type="submit" name="submit" value=" Cập nhật ">
                      	<input type="reset" name="reset" value=" Hủy bỏ ">
                      </td>
                    </tr>   
                  </table>
                </td>
              </tr>
            </table>
           
            		  
                </td>
              </tr>
            </table>

               </form>  
     	   
                
<?php
				}
	}	
}
mysqli_close($link);
?>                
                
            </TD>
            						
  </TR>
  <TR>
    <TD vAlign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
