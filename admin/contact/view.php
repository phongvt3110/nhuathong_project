<?php 	
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
	include "../modules/functions.php"; 
	include "../FCKeditor/fckeditor.php"; 
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
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> List</a> | <a href="#"><img border=0 src="../images/search.png"> Search</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Khách hàng liên hệ</font></b> &gt; Xem chi tiết</span>
                  </td>
                </tr>
              </table>
          	  
<?php
	if (isset($_GET["id"]))
	{
		
		$id = (int)$_GET["id"];
		$sql = "UPDATE contacts SET clicked = 1 WHERE id = $id"; 
		mysql_query($sql, $link);
		$sql = "SELECT * FROM contacts WHERE id = $id"; 
		$result = mysql_query($sql, $link);
		if ($row=mysql_fetch_array($result))
		{
			$p_id = (int)$row["id"];
			$p_name = $row["name"];
			$p_email = $row["email"];
			$p_message = $row["message"];
			$p_posttime = $row["posttime"];
			$p_ip = $row["ip"];

?>
          	  
            <table style="border-collapse: collapse" bordercolor="#686868" border="1" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="20%"></td>
                      <td width="80%"></td>
                    </tr>
					
                    <tr>
                      <td>Họ tên:</td>
                      <td><?php echo  $p_name?></td>
                    </tr>
					<tr>
                      <td>Email:</td>
                      <td><?php echo $p_email?></td>
                    </tr>
					<tr>
                      <td>Nội dung:</td>
                      <td><font color="blue"><?php echo $p_message?></font></td>
                    </tr>
                	<tr>
                      <td>Thời gian:</td>
                      <td><?php echo $p_posttime?></td>
                    </tr>
					<tr>
                      <td>IP:</td>
                      <td><?php echo $p_ip?></td>
                    </tr>		
                    <tr>
                      <td></td>
                      <td>
                      	<input type="button" name="btBack" value=" Quay lại " style="font-family:Tahoma;font-size:11px" onclick="history.go(-1);">
                      </td>
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
