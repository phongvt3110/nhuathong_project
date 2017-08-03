<?php
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 
?>
	
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
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a> | <a href="search.php"><img border=0 src="../images/search.png"> Tìm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Ngành nghề</font></b> &gt; Chỉnh sửa</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	
if (isset($_POST['submit']))
	{
		if (isset($_GET['id']))
		{
		
		$id = (int)$_GET['id'];
		
		$p_name = cleanQuery($_POST['name']);
		$p_parent_id = (int)$_POST['parent_id'];
		$p_position = (int)$_POST['position'];
		if ($p_parent_id == 0)
		{
			$p_position = (int)$_POST['position'];
			$sql = "UPDATE category SET ";
			$sql .= "name = '$p_name', ";
			$sql .= "parent_id = $p_parent_id, ";
			$sql .= "position = $p_position, ";
			$sql .= "sub_position = 0, ";
			$sql .= "subsub_position = 0 ";
			$sql .= " WHERE id = $id";
			mysqli_query($link, $sql);
			
			// Cập nhật các Danh mục CHA
			$sql = "UPDATE category SET position = $p_position WHERE parent_id = $id";	
			mysqli_query($link, $sql);
			
			$sql = "SELECT id FROM category WHERE parent_id = $id";
			$result = mysqli_query($link, $sql);
			while ($row=mysqli_fetch_array($result))
			{
				$arr[] =(int)$row["id"];
			}
			
			// Cập nhật các Danh mục CON
			$sql = "UPDATE category SET position = $p_position WHERE parent_id IN (".implode(',', $arr).")";	
			mysqli_query($link, $sql);
						
		}
		else
		{
			/////////////////
			$sql = "SELECT position, sub_position FROM category WHERE id = $p_parent_id";
			$result = mysqli_query($link, $sql);
			if ($row=mysqli_fetch_array($result))
			{
				$p_position = (int)$row["position"];
				$p_sub_position = (int)$row["sub_position"];
				$p_subsub_position = 0;
				if ($p_sub_position == 0)
					$p_sub_position = (int)$_POST['position'];
				else
					$p_subsub_position = (int)$_POST['position'];
				
				$sql = "UPDATE category SET ";
				$sql .= "name = '$p_name', ";
				$sql .= "parent_id = $p_parent_id, ";
				$sql .= "position = $p_position, ";
				$sql .= "sub_position = $p_sub_position, ";
				$sql .= "subsub_position = $p_subsub_position ";
				$sql .= " WHERE id = $id";
				mysqli_query($link, $sql);
				
				// Cập nhật các Danh mục CON
				$sql = "UPDATE category SET position = $p_position, sub_position = $p_sub_position WHERE parent_id = $id";	
				mysqli_query($link, $sql);
				
			}
			else
			{
				// Have a problem in this case
				$p_position = 0;	
				$p_sub_position = 0;
				$p_subsub_position = 0;
			}
		}
		
?>
      	  	
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành chỉnh sửa Ngành nghề.</td>
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
	if (isset($_GET['id']))
	{
		
		$id = (int)$_GET['id'];
		$sql = "SELECT * FROM category WHERE id = $id"; 
		$result = mysqli_query($link, $sql);
		if ($row=mysqli_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$p_name = htmlspecialchars($row["name"], ENT_QUOTES);
			$p_name_en = htmlspecialchars($row["name_en"], ENT_QUOTES);
			$p_parent = (int)$row["parent_id"];
			$p_position = (int)$row["position"];
			$p_sub_position = (int)$row["sub_position"];
			$p_subsub_position = (int)$row["subsub_position"];

?>
          	  
            <form name="form1" action="edit.php?id=<?php echo $p_id?>" method="post" onsubmit="return validate();" >                
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="10%"></td>
					  <td width="70%"></td>
                    </tr>
					<tr>
						<td>Tên ngành nghề:<font color="red">*</font></td>
						<td><input type="text" name="name" value="<?php echo $p_name?>" size="30" maxlength="28"></td>
					</tr>  
					<!--<tr>
						<td>Tiếng Anh</td><td><input type="text" name="name_en" value="<?php echo $p_name_en?>" size="30"></td>
					</tr>
					<tr>
						<td>Tiếng Nhật</td><td><input type="text" name="name_jp" value="<?php echo $p_name_jp?>" size="30"></td>
                    </tr>-->
                    
                	<tr>
                      <td>Thuộc ngành nghề :<font color="red">*</font></td>
                      <td colspan="2">
                      	<select name="parent_id">
                      		<option value=0>--- Ngành nghề chính ---</option>
<?php
$sql = "SELECT id, name, parent_id FROM category WHERE subsub_position = 0 ORDER BY position, sub_position, id"; 
//$sql = "SELECT id, name, parent_id FROM category ORDER BY id ASC"; 
$result = mysqli_query($link, $sql);
while ($row=mysqli_fetch_array($result))
{
	$p_id2 = $row["id"];
	$p_name2 = $row["name"];
	$p_parent_id2  = $row["parent_id"];
	
	if ($p_parent==$p_id2)
	{
		if ($p_parent_id2 == 0)
			echo "<option value=".$p_id2." selected>".$p_name2."</option>";
		else
			echo "<option value=".$p_id2." selected>--&nbsp;".$p_name2."</option>";
	}
	else
	{
		if ($p_parent_id2 == 0)
			echo "<option value=".$p_id2.">".$p_name2."</option>";
		else
			echo "<option value=".$p_id2.">--&nbsp;".$p_name2."</option>";
	}
	
	
	
}
?>                
		</select>
                      </td>
                    </tr>   
      				<tr>
                      <td>Thứ tự:<font color="red">*</font></td>
                      <td>
					 	<select  name="position" id="position">
							<?php
							 $a =array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6,"7"=>7,"8"=>8,"9"=>9,"10"=>10);
							 foreach($a as $k=>$v){
							 if ($p_position==$v)
								echo "<option value=".$v." selected>".$k."</option>";
								else
								echo "<option value=".$v.">".$k."</option>";
							 }
							?>  
							</select>
					  </td>
                    </tr>
					<!--<tr>
                      <td>Ảnh đại diện:</td>
                      <td colspan="2">
                        <div id="logo1"><?php if ($p_thumb!="") echo "<img src='../../photo/thumb/$p_thumb'>";?><br></div>
                        <input name="smallimg" type="text" id="smallimg" size="50" value="<?php echo $p_thumb?>">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=smallimg&dir=thumb&logo=logo1','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg1();" class="button">
                        </td>
                    </tr>-->
                    <tr>
                      <td width="20%"></td>
                      <td colspan="2">
                      	<hr size="1">	
                      </td>
                    </tr>  
                    	
                    	
                    <tr>
                      <td></td>
                      <td colspan="2">
                      	<input type="submit" name="submit" value=" Update ">
                      	<input type="reset" name="reset" value=" Reset ">
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
		function validate(){
		var f=document.form1;
		
		if(f.name.value==''){
			alert('Bạn chưa nhập tên danh mục?');
			f.name.focus();
			return false;
		}else if(f.parent_id.value==''){
		    alert('Bạn chưa chọn ngành?');
			f.parent_id.focus();
			return false;
		
		}
		
		f.command.value='submit';
		f.submit();
		
		
	}
		</script> 
                
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
