<?php
session_start();	
if (isset($HTTP_GET_VARS{"act"}))
	{
		//session_start();
		//session_unregister("suid");
		$_SESSION['s_uid'] = "";
		$_SESSION['s_name'] = "";
		echo "<meta http-equiv='refresh' content='0;url=../login'>";
	}

require("../modules/header.php"); 
?>
      <TABLE cellSpacing=0 cellPadding=0 align=center border=0>
        <TBODY>
        <tr>
          <TD vAlign=top width=608 colspan=3>
                <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="50%" valign="top" height="200">
          
<?php 
if (isset($_POST["submit"]))	
{
	include("../modules/connection.php");
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$user = str_replace("'", "''", $user);
	$pass = str_replace("'", "''", $pass);
	//echo 'us:'.$user.' pass:'.$pass;exit;
	$pass = md5(md5($pass));
	
	$sql = "SELECT * FROM admin_account WHERE user = '$user' and pass = '$pass'"; 
	//echo $sql;exit;
	$result = mysql_query($sql, $link);
	if ($row=mysql_fetch_array($result))
		{
		$suid = $row["id"];
		//session_register("suid");	
		$_SESSION['s_uid']=$row["id"];
		$_SESSION["s_level"] = $row["types"];
		$_SESSION['s_name']=$row["user"];		
		mysql_close($link);
		echo "<p>You logged in successfully! Wait seconds for loading page ...</p>";
		echo "<meta http-equiv='refresh' content='2;url=../home'>";
		}	
	else
		{
		mysql_close($link);	
		echo "<p><font color='red'>You user/pass is incorrect! Please log in again ...</font></p>";
		echo "<meta http-equiv='refresh' content='2;url=../login'>";
		}	
}
else
{	
?>          	
          

            <table border="0" cellpadding="0" cellspacing="0" width="50%" align="center">
              <tr>
                <td width="100%" style="border-top: 1 solid #686868; border-left: 1 solid #686868; border-right: 1 solid #686868; border-bottom: 1 solid #686868">
                <form name="form1" action="" method="post">	  
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="40%">
                        <p align="center">
                		<img src="../images/user.gif"> Username:
                      </td>
                      <td width="60%">
                      	<input type="text" name="user" style="width: 100pt">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p align="center">
                    	<img src="../images/key.gif"> Password:
                      </td>
                      <td>
                      	<input type="password" name="pass" style="width: 100pt">                    
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" name="submit" value=" Submit " style="font-family: Tahoma; font-size: 11px;">
                      </td>
                    </tr>
                  </table>
                </form>  		  
                </td>
              </tr>
            </table>

<?php
}				
?>            
            
            
                </td>
              </tr>
            </table>

            </TD>
            						
  </TR>
  <TR>
    <TD vAlign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
