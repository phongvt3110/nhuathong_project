<?php 	
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 
	
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
<script language="JavaScript">
		
		function delimg1(str){
		document.all.logo1.innerHTML='';
		document.form1.smallimg.value='';
		}		
		
		function delimg2(str){
		document.all.logo2.innerHTML='';
		document.form1.largeimg.value='';
		}
		function validate(){
		var f=document.form1;
		
		if(f.file.value==''){
			alert('Bạn chưa chon video?');
			f.file.focus();
			return false;
		}
		f.command.value='submit';
		f.submit();
		
		
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
          <TD vAlign="top" width="608" colspan="2">
          <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">video</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	

if (isset($_POST["submit"]))
{
		
$allowedExts = array("mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma"))
&& in_array($extension, $allowedExts))

  {
 
$target_path = "../../video/son/";
$target_name = date("dmyHis");
$target_name = $target_name . basename( $_FILES['file']['name']);
$target_path = $target_path . $target_name; 

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
     echo "The file ". basename( $_FILES['file']['name']). " has been uploaded";
  }
  
  }
else
  {
  echo "Invalid file";
  }
		//echo $title;exit;
		//echo'name:'.$target_name;
		
		$sql = "INSERT INTO video (name,createdate) VALUES (";
		$sql.= "'$target_name', NOW())";
		//echo $sql;exit;
		mysql_query($sql, $link);
?>

		
			
      	  
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành thêm một  video.</td>
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
else
{	
?>
          	  
          <form name="form1" enctype="multipart/form-data" action="add.php" method="post" onsubmit="return validate();">
                
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
                    
					
           
    				<tr>
                      <td>Video </font></td>
                      <td>
					 <input type="file" name="file" id="file" size="20" /><br />  
                       </td>
                    </tr>
					 									
                    <tr>
                      <td></td>
                      <td>
                      	<input type="submit" name="submit" value=" Thêm mới ">
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
mysql_close($link);
?>                
                
                
            </TD>
            						
  </TR>
  <TR>
    <TD valign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
