
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12">
			<!-- product -->
			<div class="product-content product-wrap clearfix product-deatil">
				<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12 ">
							<?php if(!empty($images)){ 
								
							?>
							<div class="product-image"> 
								<div id="myCarousel-2" class="carousel slide">
								<ol class="carousel-indicators">
									<?php foreach ($images as $k => $i) { ?>
									<li data-target="#myCarousel-2" data-slide-to="<?php echo $k; ?>" class="<?php echo $k==0?'active':''; ?>"></li>
								<?php } ?>
									
								</ol>
								<div class="carousel-inner">
									
									<?php foreach ($images as $key => $img) { ?>
									<div class="item <?php echo $key==0?'active':''; ?>">
										<img src="<?php echo base_url().'uploads/service/'.$img->image; ?>"  style="height: 300px;width: 407.83px;" alt="">
									</div>
									<?php } ?>
									
									
								</div>
								<a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
								<a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
								</div>
							</div>
						<?php   }else{ ?>
							<div class="product-image"> 
												<div id="myCarousel-2" class="carousel slide">
												<ol class="carousel-indicators">
													<li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
													<li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
													<li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
												</ol>
												<div class="carousel-inner">
													<!-- Slide 1 -->
													<div class="item active">
														<img src="<?php echo base_url(); ?>/backend_assets/img/demo/e-comm/detail-1.png" alt="">
													</div>
													<!-- Slide 2 -->
													<div class="item">
														<img src="<?php echo base_url(); ?>/backend_assets/img/demo/e-comm/detail-2.png" alt="">
													</div>
													<!-- Slide 3 -->
													<div class="item">
														<img src="<?php echo base_url(); ?>/backend_assets/img/demo/e-comm/detail-3.png" alt="">
													</div>
												</div>
												<a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
												<a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
												</div>
											</div>
						<?php   } ?>
						</div>
						<div class="col-md-7 col-sm-12 col-xs-12">
					
						<h2 class="name">
							<?php echo ucfirst($service['productName']); ?> 
							<small>Vendor by <a href="javascript:void(0);"><?php echo ucfirst($service['vendor']); ?></a></small>
							<!-- <i class="fa fa-star fa-2x text-primary"></i>
							<i class="fa fa-star fa-2x text-primary"></i>
							<i class="fa fa-star fa-2x text-primary"></i>
							<i class="fa fa-star fa-2x text-primary"></i>
							<i class="fa fa-star fa-2x text-muted"></i>
							<span class="fa fa-2x"><h5>(109) Votes</h5></span>	
							
							<a href="javascript:void(0);">109 customer reviews</a> -->
 
						</h2>
						<hr>
						<h4 class="price-container">
							
							<span>Serial number </span>> <?php echo $service['serialNumber']; ?>
						</h4>
					
						<div class="certified">
							<ul>
								<li><a href="javascript:void(0);">Status<span><?php switch ($service['status']) {
									case '0':
										echo "Pending";
										break;
									case '1':
										echo "In Progress";
										break;
									case '2':
										echo "Complete";
										break;
									
									default:
										echo "Pending";
										break;
								}; ?></span></a></li>
								<li><a href="javascript:void(0);">Purchase Date<span><?php echo date("d/m/Y",strtotime($service['purchaseDate'])); ?></span></a></li>
								<li><a href="javascript:void(0);">Contact number<span><?php echo $service['contactNumber']; ?></span></a></li>
							</ul>
						</div>
						<hr>
						<div class="description description-tabs">


							<ul id="myTab" class="nav nav-pills">
								<li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description </a></li>
								<!-- <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li> -->
							<!-- 	<li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li> -->
							</ul>
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in" id="more-information">
									<br>
									<strong>Description</strong>
									<p><?php echo $service['comment']; ?></p>
								</div>
								<!-- <div class="tab-pane fade" id="specifications">
									<br>
									<dl class="">
											<dt>Gravina</dt>
	                                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
	                                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
	                                        <dd>Eget lacinia odio sem nec elit.</dd>
	                                        <br>

	                                        <dt>Test lists</dt>
	                                        <dd>A description list is perfect for defining terms.</dd>
	                                        <br>	

	                                        <dt>Altra porta</dt>
	                                        <dd>Vestibulum id ligula porta felis euismod semper</dd>
	                                    </dl>
								</div> -->
								<!-- <div class="tab-pane fade" id="reviews">
									<br>
									<form method="post" class="well padding-bottom-10" onsubmit="return false;">
										<textarea rows="2" class="form-control" placeholder="Write a review"></textarea>
										<div class="margin-top-10">
											<button type="submit" class="btn btn-sm btn-primary pull-right">
												Submit Review
											</button>
											<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
											<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
											<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
											<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
										</div>
									</form>

									<div class="chat-body no-padding profile-message">
										<ul>
											<li class="message">
												<img src="img/avatars/1.png" class="online">
												<span class="message-text"> 
													<a href="javascript:void(0);" class="username">
														Alisha Molly 
														<span class="badge">Purchase Verified</span> 
														<span class="pull-right">
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-muted"></i>
														</span>
													</a> 
													
													
													Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved 
												</span>
												<ul class="list-inline font-xs">
													<li>
														<a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
													</li>
													<li class="pull-right">
														<small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
													</li>
												</ul>
											</li>
											<li class="message">
												<img src="img/avatars/2.png" class="online">
												<span class="message-text"> 
													<a href="javascript:void(0);" class="username">
														Aragon Zarko 
														<span class="badge">Purchase Verified</span> 
														<span class="pull-right">
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
															<i class="fa fa-star fa-2x text-primary"></i>
														</span>
													</a> 
													
													
													Excellent product, love it!
												</span>
												<ul class="list-inline font-xs">
													<li>
														<a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
													</li>
													<li class="pull-right">
														<small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</div> -->
							</div>
					

						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-6">
								<?php
									if(isset($user['userType'])&& $user['userType']==1):
									switch ($service['status']) {
									case '0':
									$applyStatus =1;
									$applyMsg = 'Click to Process';
									break;
									case '1':
									$applyStatus =2;
									$applyMsg = 'Click to Complete';
									break;

									default:
									$applyStatus =0;
									$applyMsg = 'Complete';
									break;
									}
									
									 ?>
									<a href="javascript:void(0);" <?php if($service['status']!=2): ?> onclick="statusChangeDetail(this);" <?php endif; ?> data-message="You want to change status!" data-serid="<?php echo encoding($service['serviceId']);?>" data-sid="<?php echo encoding($applyStatus);?>"  class="btn btn-success btn-lg"><?php echo $applyMsg; ?></a>
								<?php endif; ?>
							</div>
							<!-- <div class="col-sm-12 col-md-6 col-lg-6">
								<div class="btn-group pull-right">
		                            <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add to wishlist </button>
		                            <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contact Seller</button>
		                        </div>
							</div> -->
						</div>
						
					</div>
				</div>
			</div>
			<!-- end product -->
		</div>	

	
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
