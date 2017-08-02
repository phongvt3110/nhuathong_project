<?php
require("../modules/security.php");
?>
<form enctype="multipart/form-data" action="uploaddone.php" method="POST">
<table border="0" cellspacing="2" cellpadding="2" align="center">
    <tr> 
      <td><font face="Arial, Helvetica, sans-serif" size="2"><b> Upload News 
        Thumbnail</b></font></td>
    </tr>
    <tr> 
      <td bgcolor="#666666" align="center"></td>
    </tr>
    <tr> 
      <td bgcolor="#F6F6F6"><font face="Arial, Helvetica, sans-serif" size="1">Select 
        the file that you want to upload and then click the upload button.<br>
        Only .JPG or .GIF Files</font></td>
    </tr>
    <tr> 
      <td bgcolor="#666666" align="center"></td>
    </tr>
        <tr> 
      <td> <font face="Arial, Helvetica, sans-serif" size="2"> File : 
    	<input name="uploadedfile" type="file" size="30">
        </font></td>
    </tr>
    <tr> 
      <td align="center"><font face="Arial, Helvetica, sans-serif" size="2">
    	<input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <input type="hidden" name="img" value="<?php echo $_GET["img"]?>">
    	<input type="hidden" name="dir" value="<?php echo $_GET["dir"]?>">
    	<input type="hidden" name="logo" value="<?php echo $_GET["logo"]?>">	
        <input type="submit" value="Upload File">	
        </font></td>
    </tr>
  </table>
</form> 
