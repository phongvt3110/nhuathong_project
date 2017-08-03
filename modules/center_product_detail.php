<?php
$catID = (int)$_GET["cid"];
$pid = (int)$_GET["pid"];
//echo 'cate:'.$catID;
//echo 'pid:'.$pid;
$sql = "SELECT id,title,cateid,summary,detail,origin_photo,postdate,comment FROM product  WHERE id = $pid";
//echo $sql;exit;
$result = mysqli_query($link, $sql);
if ($row=mysqli_fetch_array($result))
{
	$p_id = $row["id"];
	$p_title = $row["title"];
	$p_cateid = $row["cateid"];
	$p_summary = $row["summary"];
	$p_detail = $row["detail"];
	$p_origin_photo = $row["origin_photo"];
	$p_postdate = $row["postdate"];
	$p_comment = $row["comment"];
}
?>
<div class="content_cate">
           <div class="container">
             <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="cate_ring">
                   
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-12 list_ring nopadright">
							<ul>
							<li>
							<div class="media post-item">
								<div class="col-md-12">
								   <h1 class="galaxy-title news-detail-titleg"><?php echo $p_title;?></h1>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($p_postdate))?></div>
									<blockquote>
											<p style="float:left" class="glyphicon glyphicon-hand-right"></p> 
											<p style="text-align: center;"><strong><?php echo $p_comment?></strong>.</p>
								
									</blockquote>
									<img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/origin/<?php echo $p_origin_photo?>" alt="" />
								   <div class="clearfix">
                                   <?php echo $p_detail;?>
							   </div>
								
						<div class="fb-like" data-href="<?php echo $GLOBAL['BASE_DOMAIN'];?>/<?php echo $p_title;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
							   </div>
					        </div>
							</li>
							
							</ul>
							</div>
					
				</div>	 
                
				</div>
				 	
		</div>
		<div class="fb-comments" data-href="http://sonnhatotdep.vn" data-width="100%" data-numposts="20"></div>
		<!-- cate2-->
		<div class="cate_ring">
                    <div class="title_ring"><i class="icon_ring"></i><a  class="title_a">Tin liên quan</a>
                   </div>
                    <div class="content_ring">
                        <div class="row">
                            <div class="col-md-6 list_ring nopadright">
							<ul>
							<?php 
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product where  cateid =$catID and id <> $pid limit 0,3 "; 
								$result = mysqli_query($link, $sql);
								while ($row=mysqli_fetch_array($result))
								{    
									$col_id = $row["id"];
									$title = $row["title"];
									$summary = $row["summary"];
									$thumb_photo = $row["thumb_photo"];
									$postdate = $row["postdate"];
								?>	
							<li>
							<div class="media post-item">
								<div class="media-left">
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $col_id?>-<?php echo seo(changeTitle(trim($title)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $col_id?>-<?php echo seo(changeTitle(trim($title)));?>.html"><h4 class="galaxy-heading"><?php echo $title;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate));?></div>
								   <p class="post-description text-justify"><?php echo $summary?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $col_id?>-<?php echo seo(changeTitle(trim($title)));?>.html" class="galaxy-button">Đọc tiếp</a>
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
								$sql = "SELECT id,title,summary,thumb_photo,postdate FROM product  where  cateid =$catID and id <> $pid limit 3,6 "; 
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
									<a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html">
										<div class="post-image"><img src="<?php echo $GLOBAL['BASE_DOMAIN'];?>photo/thumb/<?php echo $thumb_photo_1; ?>" width="115px" height="115px"/></div>
									</a>
								</div>
								<div class="media-right">
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html"><h4 class="galaxy-heading"><?php echo $title_1;?></h4></a>
									<div class="post-time"><?php echo date("d/m/Y", strtotime($postdate_1));?></div>
								   <p class="post-description text-justify"><?php echo $summary_1?></p>
								   <a href="<?php echo $GLOBAL['BASE_DOMAIN'];?>son-nha/<?php echo $catID?>/<?php echo $id_1?>-<?php echo seo(changeTitle(trim($title_1)));?>.html" class="galaxy-button">Đọc tiếp</a>
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
                          
          </div>
          <!-- conten-->
			</div>
		</div>