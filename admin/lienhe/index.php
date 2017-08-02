<?php
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 

	$id = (int)$_GET["id"];
	$_id_str = "Liên hệ";
	
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
		
		
		$address = ($_POST["address"]);
		$phone = ($_POST["phone"]);
		$email = ($_POST["email"]);
		$fax = ($_POST["fax"]);
		$sql = "UPDATE common SET ";
		$sql .= "address = '$address', ";
		$sql .= "phone = '$phone', ";
		$sql .= "email = '$email', ";
		$sql .= "fax = '$fax'";
		$sql .= " WHERE id = $id";
		//echo $sql;exit;
		mysql_query($sql, $link);
		
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
		$sql = "SELECT * FROM common WHERE id = $id"; 
		$result = mysql_query($sql, $link);
		if ($row=mysql_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$p_title = $row["title"];
			$p_detail = $row["detail"];
			$p_address = $row["address"];
			$p_phone = $row["phone"];
			$p_email = $row["email"];
			$p_fax = $row["fax"];

	

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
                      <td>Địa chỉ:</td>
                      <td><input type="text" name="address" value="<?php echo $p_address?>" size="80"></td>
                    </tr>
                    <tr>
                      <td>Phone 1:</td>
                      <td><input type="text" name="phone" value="<?php echo $p_phone?>" size="80"></td>
                    </tr>
					<tr>
                      <td>phone 2:</td>
                      <td><input type="text" name="fax" value="<?php echo $p_fax?>" size="80"></td>
                    </tr>

					<tr>
                      <td>Email:</td>
                      <td><input type="text" name="email" value="<?php echo $p_email?>" size="80"></td>
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
mysql_close($link);
?>                
                
            </TD>
            						
  </TR>
  <TR>
    <TD vAlign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
