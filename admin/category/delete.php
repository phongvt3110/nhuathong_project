<?php 	
	include "../modules/security.php"; 
	include "../modules/connection.php"; 
	include "../modules/header.php"; 
?>
	
      <TABLE cellSpacing=0 cellPadding=0 align=center border=0>
        <TBODY>
        <tr>
          <TD vAlign=top width=175>                  	  
           <?php require("../modules/left.php"); ?>                   	  
          </TD>
          <TD vAlign=top width=608 colspan=2>
          	  
<?php
if (isset($_GET["id"]))
	{
		
		$id = (int)$_GET['id'];
		$sql = "DELETE FROM category WHERE id = $id"; 
		mysql_query($sql, $link);
		mysql_close($link);
?>
<table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> List</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Add</a> | <a href="search.php"><img border=0 src="../images/search.png"> Search</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Ngành nghề</font></b> &gt; Xóa</span>
                  </td>
                </tr>
              </table>
      	  
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td width="100%" style="border-top: 1 solid #686868; border-left: 1 solid #686868; border-right: 1 solid #686868; border-bottom: 1 solid #686868">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td align=center height=100>Hoàn thành xóa bản ghi có mã <?php echo $id?></td>
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
?>                
                
                
                
                
            </TD>
            						
  </TR>
  <TR>
    <TD vAlign=top align=middle width=780 height=33 colspan=3>
    			
      <?php require("../modules/bottom.php"); ?>
	     
	        </TD></TR></TBODY></TABLE>                              
</div>
</BODY></HTML>       
