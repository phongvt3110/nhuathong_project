<footer>
        <div class="container">

          <div class="row">
			<div class="col-sm-4">
			     <?php
				$sql = "SELECT branch1,thumb  FROM menu_footer where id=2";
				$result = mysqli_query($link, $sql);
				while ($row=mysqli_fetch_array($result))
				{
				$branch1 = $row["branch1"];
				$thumb = $row["thumb"];
				?>
                  <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/origin/<?php echo $thumb?>" alt=""></a>
                 <p class="info_text"><?php echo $branch1?></p>
                  <?php }?>
            </div>
            <div class="col-sm-4">
				 <?php
				$sql = "SELECT branch1,branch2,branch3  FROM menu_footer where id=1";
				$result = mysqli_query($link, $sql);
				while ($row=mysqli_fetch_array($result))
				{
				$branch1 = $row["branch1"];
				$branch2 = $row["branch2"];
				$branch3 = $row["branch3"];

				?>
                 <p class="info_text">
				 <b>Miền Bắc</b>:<?php echo $branch1?></br>
				 <b>Miền Trung</b>:<?php echo $branch2?></br>
                 <b>Miền Namc</b> :<?php echo $branch3?>
			   </p>
                 <?php }?>
                 </div>
			<div class="col-sm-4">
				 <?php
				$sql = "SELECT title,address,phone,email  FROM common where id=2";
				$result = mysqli_query($link, $sql);
				while ($row=mysqli_fetch_array($result))
				{
				$title = $row["title"];
				$address = $row["address"];
				$phone = $row["phone"];
				$email = $row["email"];
				?>
                  <p class="info_text">
				<?php echo 'Liên Hệ: Mr.VIỄN'?></br>
				 HotLine:<?php echo $phone?></br>
                 Địa chỉ :<?php echo $address?>
			   </p>
                 <?php }?>
                 </div>

        </div>
		</div>
	 <div class="hotline-phone">
	<div class="item2 clearfix">
		<i class="fa fa-phone"  style="font-size:24px" aria-hidden="true"></i> <a href="tel:0989328669">0989.328.669</a>
	</div>
	</div>
    </footer>
    <!-- Modal -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $GLOBAL['BASE_DOMAIN'];?>js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $GLOBAL['BASE_DOMAIN'];?>js/bootstrap.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98079631-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '676533569220187',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };
   (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1049537405179904";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</script>
  </body>
</html>