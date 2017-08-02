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
			alert('Bạn chưa nhập tên sản phẩm?');
			f.title.focus();
			return false;
		}else if(f.name.value==''){
			alert('Bạn chưa nhập tên danh mục con?');
			f.name.focus();
			return false;
		}else if(f.cateid.value=='0'){
		    alert('Bạn chưa chọn danh mục?');
			f.cateid.focus();
			return false;
		
		}else if(f.summary.value==''){
		    alert('Bạn chưa nhập mô tả sản phẩm:?');
			f.summary.focus();
			return false;
		
		}else if(f.comment.value==''){
		    alert('Bạn chưa nhập đánh giá sản phẩm?');
			f.comment.focus();
			return false;
		
		}else if(f.smallimg.value==''){
		   alert('Bạn chưa chọn ảnh nhỏ?');
		 	f.smallimg.focus();
			return false;
		
		}else if(f.largeimg.value==''){
		   alert('Bạn chưa chọn ảnh lớn?');
		 	f.largeimg.focus();
			return false;
		
		}else if(f.price.value==''){
		   alert('Bạn chưa nhập gía?');
		 	f.price.focus();
			return false;
		
		}else if(f.hot.value=='2') {
			alert('Bạn chưa chọn trạng thái sản phẩm');
		 	f.hot.focus();
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
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Sản phẩm</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
if(isset($_POST['btnluu'])=="Lưu tạm")
{ 
	    if(empty($_POST['title'])){
		  $title = 'luu tam thoi chinh lai';
		}else $title = $_POST['title'];
		
	    if(empty($_POST['name'])){
		  $name = 'son nha dep luu tam';
		}else $name = $_POST['name'];
	 
    	if(empty($_POST['serialno'])){
		  $serialno = 'S001';
		}else $serialno = $_POST['serialno'];
		
		if(empty($_POST['summary'])){
		  $summary = 'son nha dep luu tam';
		}else $summary = $_POST['summary'];
		
		if(empty($_POST['detail'])){
		  $detail = 'son nha dep luu tam';
		}else $detail = $_POST['detail'];
		
		if(($_POST['cateid'])==0){
		  $category = 1;
		}else $category = $_POST['cateid'];
		
       if(empty($_POST['comment'])){
		  $comment = 'son';
		}else $comment = $_POST['comment'];
		
	  if(empty($_POST['smallimg'])){
		  $smallimg = '100417212949jutun1.jpg';
		}else $smallimg = $_POST['smallimg'];

      if(empty($_POST['largeimg'])){
		  $largeimg = '100417212956jtun2.jpg';
		}else $largeimg = $_POST['largeimg'];
		
     if(empty($_POST['price'])){
		  $price = '100';
		}else $price = $_POST['price'];
	
	  if(empty($_POST['lang'])){
		  $lang = '0';
		}else $lang = $_POST['lang'];
	
	
	  if(($_POST['hot'])==2){
		  $hot = '0';
		}else $hot = $_POST['hot'];
		
		$sql = "INSERT INTO product (title,name, serialno, summary, detail, cateid,comment, thumb_photo, origin_photo, postdate, counter, price, lang,hot) VALUES (";
		$sql.= "'$title','$name', '$serialno', '$summary', '$detail',$category,'$comment', '$smallimg', '$largeimg', NOW(), 0, $price, $lang,$hot)";
		//echo $sql;exit;
		echo'<meta http-equiv="refresh" content="0;url=index.php">';
		mysql_query($sql, $link);
		
		   
}else if (isset($_POST['btnthem'])=='Thêm mới'){
		$title = ($_POST["title"]);
		$name = ($_POST["name"]);
		//echo $title;exit;
		$serialno = ($_POST["serialno"]);
		$summary = ($_POST["summary"]);
		$detail = ($_POST["detail"]);
		$category = (int)$_POST["cateid"];
		$comment = ($_POST["comment"]);
		$smallimg = ($_POST["smallimg"]);
		$largeimg = ($_POST["largeimg"]);
		$price = (int)$_POST["price"];
		$lang = (int)$_POST["lang"];
		$hot = (int)$_POST["hot"];
		
		$sql = "INSERT INTO product (title,name, serialno, summary, detail, cateid,comment, thumb_photo, origin_photo, postdate, counter, price, lang,hot) VALUES (";
		$sql.= "'$title','$name', '$serialno', '$summary', '$detail',$category,'$comment', '$smallimg', '$largeimg', NOW(), 0, $price, $lang,$hot)";
		//echo $sql;exit;
		mysql_query($sql, $link);
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
          	  
          <form name="form1" action="add.php" method="post">
                
            <table  style="border-collapse: collapse" bordercolor="#cdcdcd" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
			
					<tr>
                      <td>Ngôn ngữ:</td>
                      <td>
					  <select name="lang">
							<option value="0">Tiếng Việt</option>
					  </select>
					  </td>
                    </tr>
                    <tr>
                      <td>Tiêu đề:<font color="red">*</font></td>
                      <td><input type="text" name="title" value="" size="80" maxlength="80"></td>
                    </tr>
					<tr>
                      <td>Tên danh mục con:<font color="red">*</font></td>
                      <td><input type="text" name="name" value="" size="80" maxlength="80"></td>
                    </tr>
					<tr>
                      <td>Mã số:</td>
                      <td><input type="text" name="serialno" value="S001" size="20"><span><b>(ví dụ:S001)</b></span></td>
                    </tr>
                	<tr>
                      <td>Danh mục cha :<font color="red">*</font></td>
                      <td>
                      	<select name="cateid">
                      		<option value=0>--- Select ---</option>
<?php
$sql = "SELECT id, name, parent_id, subsub_position FROM category ORDER BY position, sub_position, subsub_position"; 
$result = mysql_query($sql, $link);
while ($row=mysql_fetch_array($result))
{
	$p_id = $row["id"];
	$p_name = $row["name"];
	$p_parent_id  = $row["parent_id"];
	$p_subsub_position  = $row["subsub_position"];

	if ($p_parent_id == 0)
		echo "<option value=".$p_id.">".$p_name."</option>";
	elseif ($p_subsub_position == 0)
		echo "<option value=".$p_id.">--&nbsp;".$p_name."</option>";
	else	
		echo "<option value=".$p_id.">----&nbsp;".$p_name."</option>";
}
?>        
		</select>
                      </td>
                    </tr>
    				<tr>
                      <td valign=top>Mô tả tóm tắt:<font color="red">*</font></td>
                      <td><textarea name="summary" cols="60" rows="5"></textarea></td>
                    </tr>
                    
                  <!--   <tr>
                      <td valign=top colspan="2"><b>Mô tả thông số kỹ thuật:</b></td>
                    </tr>   
                    <tr>
                      <td colspan="2">
					?php
					$sBasePath = '../FCKeditor/';
					
					$oFCKeditor = new FCKeditor('content') ;
					$oFCKeditor->BasePath	= $sBasePath ;
					$oFCKeditor->Height		= '500' ;
					$oFCKeditor->Value		= '';
					$oFCKeditor->Create() ;
					?>                      
                        </td>
                    </tr>-->
			 <tr>
            <td>Mô tả chi tiết sản phẩm</td>
            <td><div style="width:600px">  <label for="detail"></label>
            <textarea name="detail" id="detail" cols="70" rows="10"></textarea>
            <script type="text/javascript">
	var editor = CKEDITOR.replace( 'detail',{
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
	],
	allowedContent: {
			'img': {
				style: 'height, width'
			}
		}
});		
	</script>
	</div>
            </td>
          </tr>
					<tr>
                      <td valign=top>SEO cụm từ khóa:<font color="red">*</font></td>
                      <td><textarea name="comment" cols="60" rows="5"></textarea></td>
                    </tr>
    				<tr>
                      <td>Ảnh nhỏ:<font color="red">(kích thước:width:115px,height:115px)*</font></td>
                      <td>
                        <div id="logo1"><br></div>
                        <input name="smallimg" type="text" id="smallimg" size="50">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=smallimg&dir=thumb&logo=logo1','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg1();" class="button">
                        </td>
                    </tr>
    				<tr>
                      <td>Ảnh to:<font color="red">(kích thước:width:500px,height:500px)*</font></td>
                      <td>
                        <div id="logo2"><br></div>
                        <input name="largeimg" type="text" id="largeimg" size="50">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=largeimg&dir=origin&logo=logo2','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg2();" class="button">
                        </td>
                    </tr>
					<tr>
                      <td>Đơn giá:</td>
                      <td><input type="text" name="price" value="100" size="20"></td>
                    </tr>
					<tr>
                      <td>Dịch vụ hot:<font color="red">*</font></td>
                      <td>
					  <select name="hot">
					  		<option value="2">-----select-------</option>
							<option value="0">Bình thường</option>
							<option value="1">Hot</option>
							
					  </select>
					  </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
					    <input type="submit" name="btnluu" value="Lưu tạm"/>
                      	<input type="submit" name="btnthem" value="Thêm mới" onclick="return validate()"/>
                      	<input type="reset" name="reset" value=" Hủy bỏ "/>
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
