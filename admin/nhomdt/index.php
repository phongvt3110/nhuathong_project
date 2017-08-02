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
                
                <table border="0" cellpadding="0" cellspacing="8" width="100%">
              <tr>
                <td width="100%">
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> Danh sách</a> | <a href="add.php"><img border=0 src="../images/add.gif"> Thêm</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Tài khoản</font></b> &gt; List</span>
                  </td>
                </tr>
              </table>
            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse" bordercolor="#cdcdcd" border="1">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="10%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Mã #</b></td>
                      <td width="25%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Tên uers</b></td>
					  <td width="10%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Quyền</b></td>
					  <td width="15%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Sửa|Xóa</b></td>
                    </tr>
                    
<?php
// how many rows to show per page
$rowsPerPage = 20;
// by default we show first page
$pageNum = (int)$_GET['page'];
if ($pageNum == 0) 	$pageNum = 1;
// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;

$sql = "SELECT id,user,types FROM admin_account  ORDER BY id ASC LIMIT $offset, $rowsPerPage";
$result = mysql_query($sql, $link);

while ($row=mysql_fetch_row($result))
{
	$p_id = (int)$row[0];
	$p_user =$row[1];
	$p_types =(int)$row[2];
	echo "<tr onmouseover=\"this.style.backgroundColor='#e8eeed';\" onmouseout=\"this.style.backgroundColor='#FFFFFF';\"><td align = 'center'>$p_id</td>";
	echo "<td><b>$p_user</b></td>";
	if($p_types==1){
	echo "<td><b>Admin</b></td>";
	}else{
	echo "<td><b>User</b></td>";
	}
echo "<td align = 'center'><a href='edit.php?id=$p_id'><img src='../images/b_edit.png' border='0' alt='Edit'></a>&nbsp;&nbsp;&nbsp;<a href='delete.php?id=$p_id'><img src='../images/b_drop.png' border='0' alt='Delete' onclick=\"javascript:return confirm('Bạn có chắc chắn muốn xóa bản ghi $p_id ?');\"></a></td></tr>";	
}


?>                      
                      
                  </table>
                </td>
              </tr>
            </table>		  
<?php              		  
// how many rows we have in database
$sql   = "SELECT COUNT(id) AS numrows FROM admin_account";
$result = mysql_query($sql, $link);
$row     = mysql_fetch_assoc($result);
$numrows = $row['numrows'];

// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage);

// print the link to access each page
$self = $_SERVER['PHP_SELF'];
$nav  = '';

if ($pageNum+10>$maxPage)
	$maxPage1 = $maxPage;
else
	$maxPage1 = $pageNum+10;

for($page=1;$page<=$maxPage1;$page++)
{
   if ($page == $pageNum)
   {
      $nav .= " $page "; // no need to create a link to current page
   }
   else
   {
   	  if (abs($page-$pageNum)<=10)
      		$nav .= " <a href=\"$self?page=$page\">$page</a> ";
   } 
}

if ($pageNum > 1)
{
   $page  = $pageNum - 1;
   $prev  = " <a href=\"$self?page=$page\">[Prev]</a> ";

   $first = " <a href=\"$self?page=1\">[First Page]</a> ";
} 
else
{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage)
{
   $page = $pageNum + 1;
   $next = " <a href=\"$self?page=$page\">[Next]</a> ";

   $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
} 
else
{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

if ($pageNum-10>1)
	$prev1 = ' ... ';
else
	$prev1 = '';

if ($pageNum+10<$maxPage)
	$next1 = ' ... ';
else
	$next1 = '';
// print the navigation link
echo "<p align='center'>Page: " . $first . $prev . $prev1 . $nav . $next1 . $next . $last . "</p>";
mysql_free_result($result);
mysql_close($link)
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


