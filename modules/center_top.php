<header>
        <div class="header_content">
           <div class="container">
		    <div class="row">
		  <div class="col-md-3"><img src="<?php echo $GLOBALS['BASE_DOMAIN'];?>images/logo.png" class="img-responsive" alt="Nhựa thông Phong Châu" width="120" height="120"></div>
            <div class="col-md-9">
			<div class="lgtitle">Nhựa thông Phong Châu</div>
			<p class="sodt">Hotline: 0989.328.669</p>
			<p class="support">(Tư vấn khách hàng 24/24)</p>
			</div>
            </div>
         </div>
         <nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>"><?php echo"<span style='font-weight:600; font-size:15px'>".$trangchu."</span>";?></a></li>
				
                <li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo "<span style='font-weight:600;font-size:15px'>".$sontuongnha."</span>";?> 
					<span class="caret"></span></a>
                    
                    <ul role="menu" class=" dropdown-menu">
						<?php 
						$sql = "SELECT id,name,title FROM product where cateid=1 and hot=1"; 
						$result = mysqli_query($link,$sql);
						while ($row=mysqli_fetch_array($result))
						{    
						    $c_id = $row["id"];
							$c_name = $row["name"];
							$title = $row["title"];
						?>
						<li class="col-xs-12"><a title="<?php echo $c_name; ?>" href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $c_id?>-<?php echo seo(changeTitle(trim($title)));?>.html"><?php echo $c_name; ?></a></li>
						
						<?php
						}
						?>	
					</ul>
               </li>
				   <li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo "<span style='font-weight:600;font-size:15px'>".$sontrangtri."</span>";?> 
					<span class="caret"></span></a>
                    
                    <ul role="menu" class=" dropdown-menu">
					<?php 
						$sql = "SELECT id,name,title FROM product where cateid=2  and hot=1"; 
						$result = mysqli_query($link,$sql);
						while ($row=mysqli_fetch_array($result))
						{    
						    $c_id_2 = $row["id"];
							$c_name_2 = $row["name"];
							$title = $row["title"];
						?>	
						<li class="col-xs-12"><a title="<?php echo $c_name_2; ?>" href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $c_id_2?>-<?php echo seo(changeTitle(trim($title)));?>.html"><?php echo $c_name_2; ?></a></li>
						<?php
						}
						?>
					</ul>
                </li>
		        <li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo "<span style='font-weight:600;font-size:15px'>".$sondogo."</span>";?>
					<span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
					 <?php 
						$sql = "SELECT id,name,title FROM product where cateid=3  and hot=1"; 
						$result = mysqli_query($link, $sql);
						while ($row=mysqli_fetch_array($result))
						{    
						    $c_id_3 = $row["id"];
							$c_name_3 = $row["name"];
							$title = $row["title"]
						?>	
						<li class="col-xs-12"><a title="<?php echo $c_name_3;?>" href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $c_id_3?>-<?php echo seo(changeTitle(trim($title)));?>.html"><?php echo $c_name_3;?></a></li>
					   <?php
					   }
					   ?>
					</ul>
                </li>
				<li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo "<span style='font-weight:600;font-size:15px'>".$sondau."</span>";?>
					<span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
					 <?php 
						$sql = "SELECT id,name,title FROM product where cateid=4  and hot=1"; 
						$result = mysqli_query($link, $sql);
						while ($row=mysqli_fetch_array($result))
						{    
						    $c_id_3 = $row["id"];
							$c_name_3 = $row["name"];
							$title = $row["title"]
						?>	
						<li class="col-xs-12"><a title="<?php echo $c_name_3;?>" href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $c_id_3?>-<?php echo seo(changeTitle(trim($title)));?>.html"><?php echo $c_name_3;?></a></li>
					   <?php
					   }
					   ?>
					</ul>
                </li>
				<li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo "<span style='font-weight:600;font-size:15px'>".$tranthachcao."</span>";?>
					<span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
					 <?php 
						$sql = "SELECT id,name,title FROM product where cateid=5  and hot=1"; 
						$result = mysqli_query($link, $sql);
						while ($row=mysqli_fetch_array($result))
						{    
						    $c_id_3 = $row["id"];
							$c_name_3 = $row["name"];
							$title = $row["title"]
						?>	
						<li class="col-xs-12"><a title="<?php echo $c_name_3;?>" href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $c_id_3?>-<?php echo seo(changeTitle(trim($title)));?>.html"><?php echo $c_name_3;?></a></li>
					   <?php
					   }
					   ?>
					</ul>
                </li>
				<!--
                <li class="dropdown">
                    <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $lienhe;?> <span class="caret"></span></a>
                    <ul role="menu" class=" dropdown-menu">
						<li class="col-sm-6 col-xs-6"><a href="?m=3"><?php echo'From lien he'?> </a></li>
					</ul>
				</li>
				-->		
              </ul>
    </div>
  </div>
</nav>
    </header>