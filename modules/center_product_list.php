<?php
	$catid =(int)$_GET['cid'];
	$p_header ="";
	 if($catid ==1){
	  $p_header = "SƠN TƯỜNG NHÀ";
	 }else if($catid ==2){
	  $p_header = "SƠN TRANG TRÍ";
	 }else if($catid ==3){
	  $p_header = "SÀN GỖ - SƠN ĐỒ GỖ";
	 }else if($catid ==4){
	  $p_header = "SƠN DẦU";
	 }else{
	  $p_header = "TRẦN THẠCH CAO";
	 }
	 
?>
<div class="content_cate">
           <div class="container">
             <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a class="title_a"><?php echo $p_header;?></a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-12 list_ring nopadright">
							<ul>
							<?php 
								$rowsPerPage = 10;
								$pageNum = (int)$_GET['p'];
								if ($pageNum == 0) 	$pageNum = 1;
								$offset = ($pageNum - 1) * $rowsPerPage;
							
							if ($catid == 0)
									$sql = "SELECT * FROM product ORDER BY id DESC LIMIT $offset, $rowsPerPage";
								else
									$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =$catid  ORDER BY id ASC LIMIT $offset, $rowsPerPage";	
								$result = mysql_query($sql, $link);
								while ($row=mysql_fetch_array($result))
								{
									$id = $row["id"];
									$title = $row["title"];
									$summary = $row["summary"];
									$thumb_photo = $row["thumb_photo"];
									$postdate = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo BASE_DOMAIN;?>son-nha/<?php echo $catid?>/<?php echo $id?>-<?php echo seo(changeTitle(trim($title)));?>.html">
										<div class="post-image"><img src="<?php echo BASE_DOMAIN;?>photo/thumb/<?php echo $thumb_photo; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo BASE_DOMAIN;?>son-nha/<?php echo $catid?>/<?php echo $id?>-<?php echo seo(changeTitle(trim($title)));?>.html"><h4 class="galaxy-heading"><?php echo $title;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate));?></div>
								   <p class="post-description text-justify"><?php echo $summary?></p>
								   <a href="<?php echo BASE_DOMAIN;?>son-nha/<?php echo $catid?>/<?php echo $id?>-<?php echo seo(changeTitle(trim($title)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
				</div>	 
                
				</div>
				 

				<!-- paging -->
				 <div class="page">
                      
					<ul class="pagination">	
				  <?php  
				
					// how many rows we have in database
					if ($catid == 0)
						$sql   = "SELECT COUNT(id) AS numrows FROM product";
					else
						$sql   = "SELECT COUNT(id) AS numrows FROM product WHERE cateid = $catid";
					//echo $sql;exit;
					$result = mysql_query($sql, $link);
					$row    = mysql_fetch_array($result);
					$numrows =(int)$row['numrows'];

					// how many pages we have when using paging?
					$maxPage = ceil($numrows/$rowsPerPage);

					// print the link to access each page
					//$self = "?m=1&cid=".$catid;
					$self = BASE_DOMAIN ."gia-son/".$catid."-".seo(changeTitle(trim($title)))."";
					$nav  = '';

					if ($pageNum+2>$maxPage)
						$maxPage1 = $maxPage;
					else
						$maxPage1 = $pageNum+2;

					for($page=1;$page<=$maxPage1;$page++)
					{ 
					  
					   if ($page == $pageNum)
					   {   
					    
						  $nav .= "<li><a class=\"active\">$page</a></li> "; // no need to create a link to current page
					   }
					   else
					   {  
						  if (abs($page-$pageNum)<=2)
								$nav .= "<li> <a href=\"$self/$page\">$page</a></li> ";
					   } 
					}

					if ($pageNum > 1)
					{
					   $page  = $pageNum - 1;
					   $prev  = " <li><a href=\"$self/$page\">Trang Trước</a></li> ";

					   $first = "<li> <a href=\"".BASE_DOMAIN ."gia-son.html\">Trang Đầu</a> ";
					} 
					

					if ($pageNum < $maxPage)
					{
					   $page = $pageNum + 1;
					   $next = "<li><a href=\"$self/$page\">Trang Tiếp</a></li> ";

					   $last = "<li><a href=\"$self/$maxPage\">Trang Cuối</a></li> ";
					} 

					if ($pageNum-2>1)
						$prev1 = ' ... ';
					else
						$prev1 = '';

					if ($pageNum+2<$maxPage)
						$next1 = ' ... ';
					else
						$next1 = '';
					// print the navigation link
					echo "" . $first . $prev . $prev1 . $nav . $next1 . $next . $last . "";
											
					?> 								
					</ul>
                 </div>
				 
		</div>
		
	<!-- end cate-->
		</div>
		
		  <div class="col-xs-6 col-md-4">
		    <div class="row">
                         <div class="col-md-5 list_ring nopadright">
                            <?php 
								$sql = "SELECT img  FROM slide where type=2"; 
								$result = mysql_query($sql, $link);
								while ($row=mysql_fetch_array($result))
								{    
									$img_photo = $row["img"];
									$img_links = $row["links"];
							?>	
							<a href="<?php echo $img_links; ?>">
                            <img src="<?php echo BASE_DOMAIN;?>photo/origin/<?php echo $img_photo; ?>"" class="img-rounded" alt="Cinque Terre" width="290px" height="250px"> 
							<p style="margin-top:10px;"/>
							</a>
							<?php } ?>
                        </div>
                        
                 </div>
             <!-- pange-->
			<div class="title_ring"><a href="<?php echo BASE_DOMAIN;?>" class="title_a">CHÚNG TÔI TRÊN FACEBOOK</a> </div>
				 <div class="row">
				    <div class="col-xs-12 list_ring nopadright">
					<div class="fb-page" data-href="https://www.facebook.com/S%C6%A1n-nh%C3%A0-t%E1%BB%91t-%C4%91%E1%BA%B9p-1900214316861207" data-width="220" data-height="220" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/S%C6%A1n-nh%C3%A0-t%E1%BB%91t-%C4%91%E1%BA%B9p-1900214316861207" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/S%C6%A1n-nh%C3%A0-t%E1%BB%91t-%C4%91%E1%BA%B9p-1900214316861207">Sơn nhà tốt đẹp</a></blockquote></div>
					    </div>
				 </div>
             <div class="title_ring"><a href="#" class="title_a">Danh mục</a> </div>
					<div class="row">
                        <div class="col-xs-12 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,thumb_photo FROM product where cateid=6"; 
								$result = mysql_query($sql, $link);
								while ($row=mysql_fetch_array($result))
								{    
									$id_9 = $row["id"];
									$title_9 = $row["title"];
								   	$thumb_photo_9 = $row["thumb_photo"];
								
								?>	
							<li>
							<div class="media post-item">
							  <div class="media-right">
								  <a href="<?php echo BASE_DOMAIN;?>son-nha/6/<?php echo $id_9?>-<?php echo seo(changeTitle(trim($title_9)));?>.html">
								  <h4 class="galaxy-heading"><?php echo $title_9;?></h4></a>
						       </div>
					        </div>
							</li>
							<?php
							}?>
							</ul>
					   </div>
                          
          </div>
          <!-- conten-->
			</div>
		</div>