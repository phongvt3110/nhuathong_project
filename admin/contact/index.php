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
            	<div align="right"><a href="index.php"><img border=0 src="../images/list.gif"> List</a> | <a href="#"><img border=0 src="../images/search.png"> Search</a></div>
	            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="100%" height="24">
                    &nbsp; <span style="letter-spacing: 2"><b><font color="#000000">Khách hàng liên hệ</font></b> &gt; List</span>
                  </td>
                </tr>
              </table>
            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse" bordercolor="#cdcdcd" border="1">
              <tr>
                <td width="100%">
                  <table border="0" cellpadding="0" cellspacing="5" width="100%">
                    <tr>
                      <td width="10%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Mã #</b></td>
                      <td width="15%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Họ tên</b></td>
                      <td width="15%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Email</b></td>	
					  <td width="40%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Nội dung</b></td>	
                      <td width="10%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Ngày gửi</b></td>	
                      <td width="10%" align="center" height="25" bgcolor="#616D7E" style="color:#FFFFFF"><b>Quản trị</b></td>
                    </tr>
                    
<?php
// how many rows to show per page
$rowsPerPage = 20;
// by default we show first page
$pageNum = (int)$_GET['page'];
if ($pageNum == 0) 	$pageNum = 1;
// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;
	
$sql = "SELECT id, name, email, message, posttime, ip FROM contacts ORDER BY id DESC LIMIT $offset, $rowsPerPage";
$result = mysqli_query($link, $sql);

while ($row=mysqli_fetch_array($result))
{
	$p_id = (int)$row["id"];
	$p_name = htmlspecialchars($row["name"], ENT_QUOTES);
	$p_email = htmlspecialchars($row["email"], ENT_QUOTES);
	$p_message = htmlspecialchars($row["message"], ENT_QUOTES);
	$p_posttime = $row["posttime"];
	$p_clicked = $row["ip"];
	
	if ($p_clicked == 0)
	{
		echo "<tr onmouseover=\"this.style.backgroundColor='#e8eeed';\" onmouseout=\"this.style.backgroundColor='#FFFFFF';\"><td align = 'center'><b>$p_id</b></td>";
		echo "<td><b>$p_name</b></td>";
		echo "<td><b>$p_email</b></td>";
		echo "<td><b>$p_message</b></td>";
		echo "<td align=\"center\"><b>$p_posttime</b></td>";
	}
	else
	{
		echo "<tr onmouseover=\"this.style.backgroundColor='#e8eeed';\" onmouseout=\"this.style.backgroundColor='#FFFFFF';\"><td align = 'center'>$p_id</td>";
		echo "<td>$p_name</td>";
		echo "<td>$p_email</td>";
		echo "<td>$p_message</td>";
		echo "<td align=\"center\">$p_posttime</td>";
	}
	
	echo "<td align = 'center'><a href='view.php?id=$p_id'><img src='../images/b_edit.png' border='0' alt='Edit'></a>&nbsp;&nbsp;&nbsp;</td></tr>";	
}


?>                      
                      
                  </table>
                </td>
              </tr>
            </table>		  
<?php              		  
// how many rows we have in database
$sql   = "SELECT COUNT(id) AS numrows FROM contacts";
$result = mysqli_query($link, $sql);
$row     = mysqli_fetch_array($result);
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

mysqli_close($link)
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
</BODY>
</HTML>       


