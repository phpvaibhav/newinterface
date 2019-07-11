
<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="well well-light well-sm no-margin no-padding">
						<div class="row">
							<div class="col-sm-12">
								<div id="myCarousel" class="carousel fade profile-carousel">
									<div class="air air-bottom-right padding-10">
										<a href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-<?php echo $userData['status']?'check':'time'; ?>"></i><?php echo $userData['status']?'Active':'Inactive'; ?></a>&nbsp;<!--  <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a> -->
									</div>
									<div class="air air-top-left padding-10">
										<h4 class="txt-color-white font-md"><?php echo date('M d,Y',strtotime($userData['crd'])); ?></h4>
									</div>
									<ol class="carousel-indicators">
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<li data-target="#myCarousel" data-slide-to="1" class=""></li>
										<li data-target="#myCarousel" data-slide-to="2" class=""></li>
									</ol>
									<div class="carousel-inner">
										<!-- Slide 1 -->
										<div class="item active">
											<img src="<?php echo $backend_assets;?>img/demo/s1.jpg" alt="demo user">
										</div>
										<!-- Slide 2 -->
										<div class="item">
											<img src="<?php echo $backend_assets;?>img/demo/s2.jpg" alt="demo user">
										</div>
										<!-- Slide 3 -->
										<div class="item">
											<img src="<?php echo $backend_assets;?>img/demo/m3.jpg" alt="demo user">
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-4 profile-pic">
										<?php 
											$img = $backend_assets.'img/avatars/sunny-big.png';
											if(!empty($userData['profileImage'])):
												$img = base_url().'uploads/users/thumb/'.$userData['profileImage'];
											endif;
										?>
										<img src="<?php echo $img;?>" alt="<?php echo $userData['fullName'];?>">
										<!-- <div class="padding-10">
											<h4 class="font-md"><strong>1,543</strong>
											<br>
											<small>Followers</small></h4>
											<br>
											<h4 class="font-md"><strong>419</strong>
											<br>
											<small>Connections</small></h4>
										</div> -->
									</div>
									<div class="col-sm-8">
										
										<?php $fullName =$userData['fullName'];
											$name = explode(" ",$fullName);
										?>
										
										<h1>
											<?php for ($i=0; $i <sizeof($name) ; $i++) { 
												if($i==0){
													echo $name[0];
												}else{
													echo '<span class="semi-bold">'.$name[1].'</span>';
												}
											} ?>
											 <!-- <span class="semi-bold">Doe</span> -->
										<br>
										<small><?php switch ($userData['userType']) {
											case 1:
												echo 'Super Admin';
												break;
											case 2:
												echo 'Customer';
												break;
											case 3:
												echo 'Employee';
												break;
											
											default:
												echo 'Unknown';
												break;
										}


										 ?></small></h1>

										<ul class="list-unstyled">
											<!-- <li>
												<p class="text-muted">
													<i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken">313</span>) <span class="txt-color-darken">464</span> - <span class="txt-color-darken">6473</span>
												</p>
											</li> -->
											<li>
												<p class="text-muted">
													<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $userData['email']; ?>"><?php echo $userData['email']; ?></a>
												</p>
											</li>
											<li>
												<p class="text-muted">
													<i class="fa fa-mobile"></i>&nbsp;&nbsp;<a href="javascript:void(0);"><?php echo $userData['contactNumber']; ?></a>
												</p>
											</li>
											<!-- <li>
												<p class="text-muted">
													<i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken">john12</span>
												</p>
											</li> -->
											<!-- <li>
												<p class="text-muted">
													<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken">Free after <a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Create an Appointment">4:30 PM</a></span>
												</p>
											</li> -->
										</ul>
										<br>
										<!-- <p class="font-md">
											<i>A little about me...</i>
										</p>
										<p>

											Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
											cumque nihil impedit quo minus id quod maxime placeat facere

										</p>
										<br>
										<a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a> -->
										<br>
										<br>

									</div>
							<!-- 		<div class="col-sm-3">
										<h1><small>Connections</small></h1>
										<ul class="list-inline friends-list">
											<li><img src="<?php echo $backend_assets;?>img/avatars/1.png" alt="friend-1">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/2.png" alt="friend-2">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/3.png" alt="friend-3">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/4.png" alt="friend-4">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/5.png" alt="friend-5">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/male.png" alt="friend-6">
											</li>
											<li>
												<a href="javascript:void(0);">413 more</a>
											</li>
										</ul>

										<h1><small>Recent visitors</small></h1>
										<ul class="list-inline friends-list">
											<li><img src="<?php echo $backend_assets;?>img/avatars/male.png" alt="friend-1">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/female.png" alt="friend-2">
											</li>
											<li><img src="<?php echo $backend_assets;?>img/avatars/female.png" alt="friend-3">
											</li>
										</ul>

									</div> -->

								</div>

							</div>

						</div>

							<!-- <div class="row">

								<div class="col-sm-12">

									<hr>

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-right">
											<li class="active">
												<a href="#a1" data-toggle="tab">Recent Articles</a>
											</li>

										</ul>

										<div class="tab-content padding-top-10">
											<div class="tab-pane fade in active" id="a1">

												<div class="row">

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">Allice in Wonderland</a></h6>
														<p>
															Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi Nam eget dui.
															Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
															sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel.
														</p>
													</div>

													<div class="col-sm-12">

														<hr>

													</div>

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">World Report</a></h6>
														<p>
															Morning our be dry. Life also third land after first beginning to evening cattle created let subdue you'll winged don't Face firmament.
															You winged you're was Fruit divided signs lights i living cattle yielding over light life life sea, so deep.
															Abundantly given years bring were after. Greater you're meat beast creeping behold he unto She'd doesn't. Replenish brought kind gathering Meat.
														</p>
													</div>

													<div class="col-sm-12">

														<br>

													</div>

												</div>
											</div>
										</div>

									</div>

								</div>

							</div> -->
							<!-- end row -->

						</div>

					</div>
					<div class="col-sm-12 col-md-12 col-lg-6">
						<!-- update -->
						<form action="updateUser" id="smart-form-updateuser" class="smart-form client-form" enctype="multipart/form-data" novalidate="" autocomplete="off">
							<header>
								Update
							</header>
							<fieldset>
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="fullName" placeholder="Full name" value="<?php echo $userData['fullName']; ?>">
									<input type="hidden" name="userauth" value="<?php echo $this->uri->segment(3); ?>">
									<b class="tooltip tooltip-bottom-right">Needed to enter the full name</b> </label>
								</section>

								<section>
								<label class="input"> <i class="icon-append fa fa-envelope"></i>
									<input type="email" name="email" placeholder="Email address" value="<?php echo $userData['email']; ?>">
									<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-phone"></i>
									<input type="text" name="contact" maxlength="13" size="13" class="number-only" placeholder="Contact"  value="<?php echo $userData['contactNumber']; ?>">
									<b class="tooltip tooltip-bottom-right">Needed to enter the contact number</b> </label>
								</section>
							<!-- 	<section>
									<label class="textarea">
									<textarea name="comment" placeholder="Comment" maxlength="500"></textarea>
									</label>
								</section> -->

								<section>
								<!-- <label class="label">Image</label> -->
								<div class="input input-file">
								<span class="button"><input type="file" name="profileImage" id="file" onchange="this.parentNode.nextSibling.value = this.value" accept="image/*">Browse</span><input type="text" readonly="">
								</div>

								</section>
							</fieldset>
						<footer>
						<button type="submit" id="submit" class="btn btn-primary">
						Update
						</button>
					</footer>

						
						</form>
						<!-- update -->
					</div>
				</div>

			</div>


	</div>

</div>

<!-- end row