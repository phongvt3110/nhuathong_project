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
				<!--
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> List</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Add</a> | <a href="search.php"><img border=0 src="../images/search.png"> Search</a></div>
				-->
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Tài khoản cá nhân</font></b> &gt; Đổi mật khẩu</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	
if (isset($_POST["submit"]))
	{
		
		if (isset($_GET['id']))
		{
		
		$id = (int)$_GET['id'];
				
		$pass = ($_POST["pass"]);
		$pass1 = ($_POST["pass1"]);
		$pass2 = ($_POST["pass2"]);
		
		$report = "Thay đổi mật khẩu thành công.";
		
		if ($pass1 != $pass2)
			{
				$report = "<font color='red'>Nhập lại Mật khẩu mới không chính xác.</font>";
			}
		else
		{
			$pass = md5(md5($pass));
			$pass1 = md5(md5($pass1));
			
			$sql = "SELECT user FROM admin_account WHERE id = $id AND pass = '$pass'";
			$result = mysql_query($sql, $link);	
			if (mysql_num_rows($result)>0)
			{
				$sql = "UPDATE admin_account SET pass = '$pass1' WHERE id = $id";
				mysql_query($sql, $link);	
			}
			else
			{
				$report="<font color='red'>Mật khẩu cũ không đúng.</font>";
			}	
			
		}
?>
      	  	
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100><?php echo $report?></td>
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

?>
          	  
            <form name="form1" action="edit.php" method="post">                
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
                    <tr>
                      <td>Mật khẩu cũ:</td>
                      <td><input type="password" name="pass" value="" size="50"></td>
                    </tr>
					<tr>
                      <td>Mật khẩu mới:</td>
                      <td><input type="password" name="pass1" value="" size="50"></td>
                    </tr>
					<tr>
                      <td>Nhập lại Mật khẩu mới:</td>
                      <td><input type="password" name="pass2" value="" size="50"></td>
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
