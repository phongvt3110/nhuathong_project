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
		
		if(f.title.value==''){
			alert('Bạn chưa nhập tên tên slide?');
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
          <TD vAlign=top width=175>                  	  
           <?php require("../modules/left.php"); ?>                   	  
          </TD>
          <TD vAlign="top" width="608" colspan="2">
          <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a> | <a href="search.php"><img border=0 src="../images/search.png"> Tìm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Silde</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	

if (isset($_POST["submit"]))
{
		
		$title = ($_POST["title"]);
		$links = ($_POST["links"]);
		$type = ($_POST["type"]);
		$tg='';
		if($links==''){
		 $tg='#';
		}else{
		 $tg=$links;
		}
		//echo $title;exit;
		$largeimg = ($_POST["largeimg"]);
		
		$sql = "INSERT INTO slide (title, links, img,createdate,type) VALUES (";
		$sql.= "'$title', '$tg', '$largeimg', NOW(),$type)";
		//echo $sql;exit;
		mysqli_query($link, $sql);
?>

		
			
      	  
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành thêm một  ảnh slide.</td>
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
          	  
          <form name="form1" action="add.php" method="post" onsubmit="return validate();">
                
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
                    <tr>
                      <td>Tiêu đề:<font color="red">*</font></td>
                      <td><input type="text" name="title" value="" size="80" maxlength="58"></td>
                    </tr>
					 <tr>
                      <td>Link:</td>
                      <td><input type="text" name="links" value="" size="80" maxlength="300"><br/>
					    ví du:http://sonnhatopdep.vn/sondulux.html
					  </td>
					
                    </tr>
					
           
    				<tr>
                      <td>Ảnh :<font color="red">(Width:400px,Hieght:175px)*</font></td>
                      <td>
                        <div id="logo2"><br></div>
                        <input name="largeimg" type="text" id="largeimg" size="50">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=largeimg&dir=origin&logo=logo2','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg2();" class="button">
                        </td>
                    </tr>
					<tr>
                      <td>Vị trí:<font color="red">*</font></td>
                      <td>
					  <select name="type">
					  		<option value="4">-----select-------</option>
							<option value="1">quảng cáo trên banner</option>
							<option value="2">công nhân xây dựng</option>
							
					  </select>
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
mysqli_close($link);
?>                
                
                
            </TD>
            						
  </TR>
  <TR>
    <TD valign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
