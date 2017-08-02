<style>
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
}
</style>
<div class="container">
                <div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><span>Liên hệ</span></div>
                    <div class="content_lienhe">
					<?php
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
  
if (isset($_POST['send']))	///////////////////////////////////////////
{
	$errors = '';
	$your_name = mysql_real_escape_string($_POST['contact_name']);
	$your_email = mysql_real_escape_string($_POST['contact_email']);
	$contact_message = mysql_real_escape_string($_POST['contact_message']);
	
	
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO contacts (name, email, message, posttime, ip) VALUES ";
		$sql .= "('$your_name', '$your_email', '$contact_message', NOW(), '$ip')";
		//echo $sql;exit;
		mysql_query($sql, $link);
		echo "<p class='err'>Hoàn thành cập nhật gửi liên hệ</p>";
		$_SESSION['6_letters_code'] = null;
		
		
	
}
?>
                        <span class="thanks">Cảm ơn bạn đã liên lạc với chúng tôi. Chúng tôi sẽ hồi âm sớm nhất cho bạn!</span>
                        <form method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact_name">
								<span class="text-danger">*</span> Tên của bạn</label>
                                <div class="col-sm-10">
                                    <input id="contact_name" name="contact_name" type="text" placeholder="Tên của bạn" maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact_email"><span class="text-danger">*</span> Email của bạn</label>
                                <div class="col-sm-10">
                                    <input id="contact_email" name="contact_email" type="text" placeholder="Địa chỉ email của bạn" maxlength="80" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="contact_message"><span class="text-danger">*</span> Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea id="contact_message"  name="contact_message" placeholder="Nội dung tin nhắn" maxlength="500" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button name="send" id="send" type="submit" class="btn_download">Send Message</button>
                                </div>
                            </div> 
                        </form>

             </div>
                </div>
            </div>
        </div>
	