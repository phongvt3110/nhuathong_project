  <div id="main">
        <div class="container">
            <div class="banner_app">
            	<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<?php 
					  
						$sql1 = "SELECT count(*) as dem FROM slide where type=1 "; 
					    $result1 = mysqli_query($sql1, $link);
						while ($row=mysqli_fetch_array($result1))
						{    
						  $dem = (int)$row["dem"];
					    }
						 
					?>	
					<?php for ($x =1; $x < $dem; $x++) {?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>"></li>
					<?php }?>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  <?php 
					    $counter=0;
						$sql = "SELECT id,title,img,links  FROM slide where type=1 "; 
						//echo $sql;exit;
					    $result = mysqli_query($link, $sql);
						while ($row=mysqli_fetch_array($result))
						{    
						  $q_id = $row["id"];
						  $q_title = $row["title"];
						  $q_img = $row["img"];
						  $img_links = $row["links"];
						  $counter++;
						 
						
					?>	
					<div class="item <?php if ($counter == 1) echo ' active'; ?>">
					  <a href="<?php echo $img_links?>"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/origin/<?php echo $q_img; ?>" alt="<?php echo $q_title;?>" width="400px" height="175px"></a>
					  <div class="carousel-caption">
						<h3 class="quangcao"><?php echo $q_title;?></h3>
					  </div>
					</div>
					<?php }?>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
			</div>
			
           </div>
        
        </div>
      
     <div class="content_cate">
			<div class="col-xs-12">
          <img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>images/ad.png"  class="img-responsive" style="margin:0 auto;"alt="son nha tot dep"></a>
		  </div>
           <div class="container">
             <div class="col-xs-12 col-sm-6 col-md-8">
			  <?php 
								$sql = "SELECT detail  FROM common where id=1"; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									
									$detail = $row["detail"];
									
							?>	
			    <div class="galaxy-heading"><?php echo $detail;?></div>
				<?}?>
                <div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?><?php echo '1';?>.html" class="title_a">SƠN TƯỜNG NHÀ (Xem tất cả)</a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =1 and hot=1 limit 0,4 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$colid = $row["id"];
									$title = $row["title"];
									$summary = $row["summary"];
									$thumb_photo = $row["thumb_photo"];
									$postdate = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $colid?>-<?php echo seo(changeTitle(trim($title)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $colid?>-<?php echo seo(changeTitle(trim($title)));?>.html"><h4 class="galaxy-heading"><?php echo $title;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate));?></div>
								   <p class="post-description text-justify"><?php echo $summary?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $colid?>-<?php echo seo(changeTitle(trim($title)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
							 <div class="col-md-6 list_ring nopadleft">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =1 and hot=1 limit 4,10 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_1 = $row["id"];
									$title_1 = $row["title"];
									$summary_1 = $row["summary"];
									$thumb_photo_1 = $row["thumb_photo"];
									$postdate_1 = $row["postdate"];
								?>	
							<li>
							 <div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_1; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html"><h4 class="galaxy-heading"><?php echo $title_1;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_1));?></div>
								   <p class="post-description text-justify"><?php echo $summary_1?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/1/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					         </div>
							</li>
							<?php
							}?>
							
							</ul>
							</div>
					</div>	 
				</div>
				
				 
		</div>
		<!-- cate2-->
			<div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?><?php echo '2';?>.html" class="title_a">SƠN TRANG TRÍ (Xem tất cả)</a>
                   </div>
                    <div class="content_ring">
                      <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =2 and hot=1 limit 0,3 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$chid2 = $row["id"];
									$ptitle2 = $row["title"];
									$summary2 = $row["summary"];
									$thumb_photo2 = $row["thumb_photo"];
									$postdate2 = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $chid2?>-<?php echo seo(changeTitle(trim($ptitle2)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo2; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $chid2?>-<?php echo seo(changeTitle(trim($ptitle2)));?>.html"><h4 class="galaxy-heading"><?php echo $ptitle2;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate2));?></div>
								   <p class="post-description text-justify"><?php echo $summary2?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $chid2?>-<?php echo seo(changeTitle(trim($ptitle2)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
							 <div class="col-md-6 list_ring nopadleft">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =2 and hot=1 limit 3,6 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_21 = $row["id"];
									$title_21 = $row["title"];
									$summary_21 = $row["summary"];
									$thumb_photo_21 = $row["thumb_photo"];
									$postdate_21 = $row["postdate"];
								?>	
							<li>
							 <div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $id_21?>-<?php echo seo(changeTitle(trim($title_21)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_21; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $id_21?>-<?php echo seo(changeTitle(trim($title_21)));?>.html"><h4 class="galaxy-heading"><?php echo $title_21;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_21));?></div>
								   <p class="post-description text-justify"><?php echo $summary_21?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/2/<?php echo $id_21?>-<?php echo seo(changeTitle(trim($title_21)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					         </div>
							</li>
							<?php
							}?>
							
							</ul>
							</div>
					</div>	   
                
				 </div>
		</div>	
	<!-- cate3 -->
	<div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?><?php echo '3';?>.html" class="title_a">SÀN GỖ - SƠN ĐỒ GỖ(Xem tất cả)</a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =3 and hot=1 limit 0,3 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id3 = $row["id"];
									$title3 = $row["title"];
									$summary3 = $row["summary"];
									$thumb_photo3 = $row["thumb_photo"];
									$postdate3 = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id3?>-<?php echo seo(changeTitle(trim($title3)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo3; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id3?>-<?php echo seo(changeTitle(trim($title3)));?>.html"><h4 class="galaxy-heading"><?php echo $title3;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate3));?></div>
								   <p class="post-description text-justify"><?php echo $summary3?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id3?>-<?php echo seo(changeTitle(trim($title3)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
							 <div class="col-md-6 list_ring nopadleft">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid=3 and hot=1 limit 3,6 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_4 = $row["id"];
									$title_4 = $row["title"];
									$summary_4 = $row["summary"];
									$thumb_photo_4 = $row["thumb_photo"];
									$postdate_4 = $row["postdate"];
								?>	
							<li>
							 <div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id_4?>-<?php echo seo(changeTitle(trim($title_4)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_4; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id_4?>-<?php echo seo(changeTitle(trim($title_4)));?>.html"><h4 class="galaxy-heading"><?php echo $title_4;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_4));?></div>
								   <p class="post-description text-justify"><?php echo $summary_4?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/3/<?php echo $id_4?>-<?php echo seo(changeTitle(trim($title_4)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					         </div>
							</li>
							<?php
							}?>
							
							</ul>
							</div>
					</div>	 
                
				</div>
				
				 
		</div>	
	<!-- end cate3-->
	<!-- cate 4-->
	<div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?><?php echo '4';?>.html" class="title_a">SƠN DẦU(Xem tất cả)</a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =4 and hot=1 limit 0,2 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id5 = $row["id"];
									$title5 = $row["title"];
									$summary5 = $row["summary"];
									$thumb_photo5 = $row["thumb_photo"];
									$postdate5 = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id5?>-<?php echo seo(changeTitle(trim($title5)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo5; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id5?>-<?php echo seo(changeTitle(trim($title5)));?>.html"><h4 class="galaxy-heading"><?php echo $title5;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate5));?></div>
								   <p class="post-description text-justify"><?php echo $summary5?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id5?>-<?php echo seo(changeTitle(trim($title5)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
							 <div class="col-md-6 list_ring nopadleft">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid=4 and hot=1 limit 2,4 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_6 = $row["id"];
									$title_6 = $row["title"];
									$summary_6 = $row["summary"];
									$thumb_photo_6 = $row["thumb_photo"];
									$postdate_6 = $row["postdate"];
								?>	
							<li>
							 <div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id_6?>-<?php echo seo(changeTitle(trim($title_6)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_6; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id_6?>-<?php echo seo(changeTitle(trim($title_6)));?>.html"><h4 class="galaxy-heading"><?php echo $title_6;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_6));?></div>
								   <p class="post-description text-justify"><?php echo $summary_6?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/4/<?php echo $id_6?>-<?php echo seo(changeTitle(trim($title_6)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					         </div>
							</li>
							<?php
							}?>
							
							</ul>
							</div>
					</div>	 
                
				</div>
				
				 
		</div>	
	<!-- end cate 4-->
	<!-- cate 5-->
	<div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?><?php echo '5';?>.html" class="title_a">TRẦN THẠCH CAO (Xem tất cả)</a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid =5 and hot=1 limit 0,3 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id7 = $row["id"];
									$title_7 = $row["title"];
									$summary7 = $row["summary"];
									$thumb_photo7 = $row["thumb_photo"];
									$postdate7 = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id7?>-<?php echo seo(changeTitle(trim($title_7)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo7; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id7?>-<?php echo seo(changeTitle(trim($title_7)));?>.html"><h4 class="galaxy-heading"><?php echo $title_7;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate7));?></div>
								   <p class="post-description text-justify"><?php echo $summary7?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id7?>-<?php echo seo(changeTitle(trim($title_7)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					        </div>
							</li>
							<?php
							 }
							?>
							</ul>
							</div>
							 <div class="col-md-6 list_ring nopadleft">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where cateid=5 and hot=1 limit 3,6 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_8 = $row["id"];
									$title_8 = $row["title"];
									$summary_8 = $row["summary"];
									$thumb_photo_8 = $row["thumb_photo"];
									$postdate_8 = $row["postdate"];
								?>	
							<li>
							 <div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id_8?>-<?php echo seo(changeTitle(trim($title_8)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_8; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id_8?>-<?php echo seo(changeTitle(trim($title_8)));?>.html"><h4 class="galaxy-heading"><?php echo $title_8;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_8));?></div>
								   <p class="post-description text-justify"><?php echo $summary_8?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/5/<?php echo $id_8?>-<?php echo seo(changeTitle(trim($title_8)));?>.html" class="galaxy-button">Đọc tiếp</a>
						       </div>
					         </div>
							</li>
							<?php
							}?>
							
							</ul>
							</div>
					</div>	 
                
				</div>
				
				 
		</div>	
	<!-- end cate 5-->
		</div>
		
		  <div class="col-xs-6 col-md-4">
		    <div class="row">
                         <div class="col-md-5 list_ring nopadright">
						  <?php 
								$sql = "SELECT img  FROM slide where type=2"; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$img_photo = $row["img"];
									$img_links = $row["links"];
							?>	
							<a href="<?php echo $img_links; ?>">
                            <img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/origin/<?php echo $img_photo; ?>"" class="img-rounded" alt="Cinque Terre" width="290px" height="250px"> 
							<p style="margin-top:10px;"/>
							</a>
							<?php } ?>
                        </div>
                        
                 </div>
				 <!-- pange-->
			<div class="title_ring"><a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>" class="title_a">CHÚNG TÔI TRÊN FACEBOOK</a> </div>
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
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$id_9 = $row["id"];
									$title_9 = $row["title"];
								   	$thumb_photo_9 = $row["thumb_photo"];
								
								?>	
							<li>
							<div class="media post-item">
							  <div class="media-right">
								  <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/6/<?php echo $id_9?>-<?php echo seo(changeTitle(trim($title_9)));?>.html">
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
			
</div>	
