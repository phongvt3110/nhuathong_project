<?php
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 
	//include "../FCKeditor/fckeditor.php"; 
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
		
		if(f.title.value==''){
			alert('Bạn chưa nhập tên slide?');
			f.title.focus();
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
          <td valign="top" width="175px">                  	  
           <?php require("../modules/left.php"); ?>                   	  
          </td>
          <td valign="top" width="608" colspan="2">
          <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a> | <a href="search.php"><img border=0 src="../images/search.png"> Tìm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Slide</font></b> &gt; Chỉnh sửa</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	
if (isset($_POST["submit"]))
	{
		if (isset($_GET["id"]))
		{
		
		$id = (int)$_GET["id"];
		$title = ($_POST["title"]);
		$links = ($_POST["links"]);
		$largeimg = ($_POST["largeimg"]);
		$tg='';
		if($links==''){
		 $tg='#';
		}else{
		 $tg=$links;
		}
		
		$sql = "UPDATE slide  SET ";
		$sql .= "title = '$title', ";
		$sql .= "img = '$largeimg', ";
		$sql .= "links = '$tg' ";
		$sql .= " WHERE id = $id";
		//echo $sql;exit;
		mysql_query($sql, $link);
		
?>
      	  	
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành chỉnh sửa thông tin slide.</td>
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
		$sql = "SELECT * FROM slide WHERE id = $id"; 
		$result = mysql_query($sql, $link);
		if ($row=mysql_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$p_title = $row["title"];
			$p_photo = $row["img"];
			$p_links = $row["links"];
			$p_type =(int)$row["type"];

?>
          	  
            <form name="form1" action="edit.php?id=<?php echo $p_id?>" method="post" onsubmit="return validate();">                
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
					<tr>
                      <td>Tiêu đề:<font color="red">*</font></td>
                      <td><input type="text" name="title" value="<?php echo $p_title?>" size="80" maxlength="60"></td>
                    </tr>
					<tr>
                      <td>Links:</td>
                      <td><input type="text" name="links" value="<?php echo $p_links?>" size="80"><br/>
					  ví du:http://noihoicn.com/san-pham-1.sp/12-lo-hoi-dot-than-ong-nuoc-dang-e.html
					  </td>
                    </tr>
                	
    				<tr>
                      <td>Ảnh :<font color="red">(Width:400px,Hieght:175px)*</font></td>
                      <td>
                        <div id="logo2"><?php if ($p_photo!="") echo "<img src='../../photo/origin/$p_photo' width='300px' height='300px'>";?><br></div>
                        <input name="largeimg" type="text" id="largeimg" size="50" value="<?php echo $p_photo?>">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=largeimg&dir=origin&logo=logo2','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg2();" class="button">
                        </td>
                    </tr>
    				<tr>
                      <td>Vị trí:<font color="red">*</font></td>
                      <td>
					  <select name="type" id="type">
					  		<?php
							 $a =array("quảng cáo trên banner"=>1,"công nhân xây dựng"=>2);
							 foreach($a as $k=>$v){
							 if ($p_type==$v)
								echo "<option value=".$v." selected>".$k."</option>";
								else
								echo "<option value=".$v.">".$k."</option>";
							 }
							?>  

					  </select>
					  
					  </td>
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
             <script language="JavaScript">
		
		function delimg1(str){
		document.all.logo1.innerHTML='';
		document.form1.smallimg.value='';
		}		
		
		function delimg2(str){
		document.all.logo2.innerHTML='';
		document.form1.largeimg.value='';
		}
		</script>      	   
                
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
