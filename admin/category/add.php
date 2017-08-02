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
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Ngành nghề</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
if (isset($_POST["submit"]))
	{
		
		$p_name = cleanQuery($_POST['name']);
		//$p_name_en = cleanQuery($_POST['name_en']);
		//$p_name_jp = cleanQuery($_POST['name_jp']);
		$p_parent_id = (int)$_POST['parent_id'];
		$p_position	=(int)$_POST['position'];	
		//echo $p_position;exit;
		if ($p_parent_id == 0)
		{
			$p_position = (int)$_POST['position'];
			$sql = "INSERT INTO category (name,parent_id, position, sub_position, subsub_position) VALUES (";
			$sql.= "'$p_name', $p_parent_id, $p_position, 0, 0)";
			
			mysql_query($sql, $link);
		}
		else
		{
			
			$sql = "SELECT position, sub_position FROM category WHERE id = $p_parent_id";
			$result = mysql_query($sql, $link);
			if ($row=mysql_fetch_array($result))
			{
				$p_position = (int)$row["position"];
				$p_sub_position = (int)$row["sub_position"];
				$p_subsub_position = 0;
				if ($p_sub_position == 0)
					$p_sub_position = (int)$_POST['position'];
				else
					$p_subsub_position = (int)$_POST['position'];
				
				$sql = "INSERT INTO category (name, parent_id, position, sub_position, subsub_position) VALUES (";
				$sql.= "'$p_name',$p_parent_id, $p_position, $p_sub_position, $p_subsub_position)";
				mysql_query($sql, $link);				
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

		
			
      	  
            <table  style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành thêm mới một Ngành nghề.</td>
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
          	  
          <form name="form1" action="add.php" method="post" onsubmit="return validate()">        
                
            <table  style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
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
						<td><input type="text" name="name" value="" size="30" maxlength="28"></td>
					</tr>  
					<!--<tr>
						<td>Tiếng Anh</td><td><input type="text" name="name_en" value="" size="30"></td>
					</tr>
					<tr>
						<td>Tiếng Nhật</td><td><input type="text" name="name_jp" value="" size="30"></td>
                    </tr>-->
                	<tr>
                      <td>Thuộc ngành nghề :<font color="red">*</font></td>
                      <td colspan="2">
                      	<select name="parent_id">
                      		<option value=0>--- Ngành nghề chính ---</option>
<?php
$sql = "SELECT id, name, parent_id FROM category WHERE subsub_position = 0 ORDER BY position, sub_position, id"; 
$result = mysql_query($sql, $link);
while ($row=mysql_fetch_array($result))
{
	$p_id = $row["id"];
	$p_name = $row["name"];
	$p_parent_id  = $row["parent_id"];

	if ($p_parent_id == 0)
		echo "<option value=".$p_id.">".$p_name."</option>";
	else
		echo "<option value=".$p_id.">--&nbsp;".$p_name."</option>";
}
?>                
		</select>
                      </td>
                    </tr>   
      				<tr>
                      <td>Thứ tự:</td>
                      <td colspan="2">
					  <select name="position">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					  </select>
					  </td>
                    </tr>
					<!--<tr>
                      <td>Ảnh đại diện:</td>
                      <td colspan="2">
                        <div id="logo1"><br></div>
                        <input name="smallimg" type="text" id="smallimg" size="50">
                        <input type="button" value="Upload" onClick="window.open('../modules/upload.php?img=smallimg&dir=thumb&logo=logo1','','width=480,height=200,status=yes,toolbar=no,scrollbars=yes,resizable=no,navbar=no');">
                        <input type="button" value="Delete" onClick="javascript:delimg1();" class="button">
                        </td>
                    </tr>-->
                    <tr>
                      <td width="20%"></td>
                      <td colspan="2" width="80%">
                      	<hr size="1">	
                      </td>
                    </tr>      
                    <tr>
                      <td></td>
                      <td colspan="2">
                      	<input type="submit" name="submit" value=" Insert ">
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
