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
			alert('Bạn chưa nhập tên dịch vụ?');
			f.title.focus();
			return false;
		}else if(f.summary.value==''){
		    alert('Bạn chưa nhập tóm tắt dịch vụ:?');
			f.summary.focus();
			return false;
		
		}else if(f.content.value==''){
		    alert('Bạn chưa nội dung  chi tiết dịch vụ?');
			f.content.focus();
			return false;
		
		}else if(f.smallimg.value==''){
		   alert('Bạn chưa chọn ảnh nhỏ?');
		 	f.smallimg.focus();
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
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> List</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Add</a> | <a href="search.php"><img border=0 src="../images/search.png"> Search</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Sản phẩm</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	

if (isset($_POST["submit"]))
{
		
		$title = ($_POST["title"]);
		$summary = ($_POST["summary"]);
		$content = ($_POST["content"]);
		$smallimg = ($_POST["smallimg"]);
		
		$sql = "INSERT INTO services (title,summary, content,thumb, postdate) VALUES (";
		$sql.= "'$title','$summary', '$content','$smallimg', NOW())";
		//echo $sql;exit;
		mysqli_query($link, $sql);
?>

		
			
      	  
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành thêm một sản phẩm mới.</td>
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
          	  
     <form name="form1"  action="add.php" method="post" onsubmit="return validate();">
                
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
                      <td><input type="text" name="title" value="" size="80" maxlength="80"></td>
                    </tr>
					
    				<tr>
                      <td valign=top>Tóm tắt dịch vụ:<font color="red">*</font></td>
                      <td><textarea name="summary" cols="60" rows="5"></textarea></td>
                    </tr>
                <tr>
            <td>Nội dung chi tiết:<font color="red">*</font></td>
            <td><div style="width:600px">  <label for="content"></label>
            <textarea name="content" id="content" cols="70" rows="10"></textarea>
            <script type="text/javascript">
	var editor = CKEDITOR.replace( 'content',{
	uiColor : '#9AB8F3',
	language:'vi',
	skin:'v2',
	
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

	toolbar:[
	['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
	]
});		
	</script>
	</div>
            </td>
          </tr>
					    				<tr>
                      <td>Ảnh nhỏ:<font color="red">*</font></td>
                      <td>
                        <div id="logo1"><br></div>
                        <input name="smallimg" type="text" id="smallimg" size="50">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=smallimg&dir=thumb&logo=logo1','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg1();" class="button">
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
