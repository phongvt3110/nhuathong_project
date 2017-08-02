<?php
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 

	$id = (int)$_GET["id"];
	$_id_str = "Chi Nhánh";
	
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
		
		
		$branch1 = ($_POST["branch1"]);
		$branch2 = ($_POST["branch2"]);
		$branch3 = ($_POST["branch3"]);
		$sql = "UPDATE menu_footer SET ";
		$sql .= "branch1 = '$branch1', ";
		$sql .= "branch2 = '$branch2', ";
		$sql .= "branch3 = '$branch3'";
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
		$sql = "SELECT * FROM menu_footer WHERE id = $id"; 
		$result = mysql_query($sql, $link);
		if ($row=mysql_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$branch1 = $row["branch1"];
			$branch2 = $row["branch2"];
			$branch3 = $row["branch3"];
			

	

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
                      <td>Miền Bắc:</td>
                        <td><textarea name="branch1" cols="60" rows="5"><?php echo $branch1?></textarea></td>
                    </tr>
                    <tr>
                      <td>Miền Trung:</td>
                       <td><textarea name="branch2" cols="60" rows="5"><?php echo $branch2?></textarea></td>
                    </tr>
					<tr>
                      <td>Miền Nam:</td>
                        <td><textarea name="branch3" cols="60" rows="5"><?php echo $branch3?></textarea></td>
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
