<?php 	
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 
	include "../FCKeditor/fckeditor.php"; 
?>	
	<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.user.value==''){
			alert('Bạn chưa nhập tên đăng nhập?');
			f.user.focus();
			return false;
		}else if(f.pass.value==''){
			alert('Bạn chưa nhập mật khẩu?');
			f.pass.focus();
			return false;
		}
		f.command.value='submit';
		f.submit();
		
		
	}
</script>
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
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Tài khoản</font></b> &gt; Thêm mới</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	

if (isset($_POST["submit"]))
	{
		$p_ten= $_POST["user"];
		$p_matkhau = md5(md5((trim($_POST["pass"]))));
		$p_group = (int)$_POST["group"];
	$sql = "INSERT INTO admin_account(user,pass,types) VALUES (";
	$sql.= "'$p_ten','$p_matkhau',2)";
	//echo $sql;exit;
	mysql_query($sql, $link);
		
?>

		
			
      	  
            <table  style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành thêm mới một Nhóm.</td>
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
                
            <table  style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
					<tr>
                      <td>Tên đăng nhập:<font color="red">*</font></td>
                      <td><input type="text" name="user" value="" size="50"></td>
                    </tr>
					<tr>
                      <td>Mật khẩu:<font color="red">*</font></td>
                      <td><input type="text" name="pass" value="" size="50"></td>
                    </tr>
                    <tr>
                      <td>Quyền user:</font></td>
                      <td>
                      	<select name="group">
					    <option value=2>User</option>
					    
					</select>
                      </td>
                    </tr>	
                    <tr>
                      <td width="20%"></td>
                      <td width="80%">
                      	<hr size="1">	
                      </td>
                    </tr>      
                    <tr>
                      <td></td>
                      <td>
                      	<input type="submit" name="submit" value=" Thêm ">
                      	<input type="reset" name="reset" value=" Xóa ">
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
