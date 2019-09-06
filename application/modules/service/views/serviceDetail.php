
<style type="text/css">
	
#profile-grid { overflow: auto; white-space: normal; }
#profile-grid .profile { padding-bottom: 40px; }
#profile-grid .panel { padding: 0 }
#profile-grid .panel-body { padding: 15px }
#profile-grid .profile-name { font-weight: bold; }
#profile-grid .thumbnail {margin-bottom:6px;}
#profile-grid .panel-thumbnail { overflow: hidden; }
#profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
</style>
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="well padding-10">
				<h4 class="margin-top-0"><b>Service</b></h4>
				<hr>
				<div class="row">
					<?php switch ($service['status']) {
							case '0':
								$status= "Pending";
								$label = "pink";
								break;
							case '1':
								$status= "In Progress";
								$label = "greenLight";
								break;
							case '2':
								$status= "Complete";
								$label = "blue";
								break;
							
							default:
								$status= "Pending";
								$label = "pink";
								break;
						}; ?>
					<div class="col-sm-12 col-md-12 col-lg-12 ">
						<ul class="list-group no-margin">
							<li class="list-group-item">
								<span class="pull-right"><?php echo ucfirst($service['productName']); ?></span> <b>Service Name</b>
							</li>	
							<li class="list-group-item">
								<span class="pull-right"><?php echo ucfirst($service['vendor']); ?></span> <b>Manufacture</b>
							</li>
							<li class="list-group-item">
								<span class="pull-right"><?php echo $service['serialNumber']; ?></span> <b>Series Number</b>
							</li>	
						
							<li class="list-group-item">
								<span class="pull-right"><?php echo date("d/m/Y",strtotime($service['purchaseDate'])); ?></span> <b>Date of Purchase</b>
							</li>
							<li class="list-group-item">
								<span class="pull-right"><?php echo $service['contactNumber']; ?></span> <b>Contact Number</b>
							</li>
							<li class="list-group-item">
								<span class="pull-right"><?php echo ucfirst($serviceUser['fullName']); ?></span> <b>Created By </b>
							</li>
							<li class="list-group-item">
								<div class="badge bg-color-<?php echo $label; ?> txt-color-white pull-right">
								<strong><?php echo $status; ?></strong>
								</div><b>Service Status</b>
							</li>	
							<li class="list-group-item text-center">
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
							 	<?php if($service['status']!=2): ?>
									<a href="javascript:void(0);" <?php if($service['status']!=2): ?> onclick="statusChangeDetail(this);" <?php endif; ?> data-message="You want to change status!" data-serid="<?php echo encoding($service['serviceId']);?>" data-sid="<?php echo encoding($applyStatus);?>"  class="btn btn-success btn-lg"><?php echo $applyMsg; ?></a>
								<?php endif; ?> 
								<?php endif; ?>
							</li>
							
						</ul>
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="timeline-seperator text-center"> <span>Fault Description </span>
							</div>
						</div>
						<hr>
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php echo !empty($service['faultDescription']) ? $service['faultDescription']: "NA"; ?>
						</div>
						<hr>
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="timeline-seperator text-center"> <span>Receipt of Purchase</span>
							</div>
						</div>
						<br>
						<hr>
						<div class="row" id="profile-grid">
							<?php foreach ($images as $k => $img) { ?>
							
							<?php if($img->type=='image'){ ?>
							<div class="col-sm-4 col-xs-12 profile">
							    <div class="panel panel-default">
							      <div class="panel-thumbnail text-center">
							      	
							      	<a href="javascript:void(0);" title="<?php echo ucfirst($img->type); ?>" class="thumb">
							      		<img src="<?php echo base_url().'uploads/service/'.$img->image; ?>" class="img-responsive img-rounded img-thumbnail" data-toggle="modal" data-target=".modal-profile-lg">
							      	</a>
							    
							      	
							      
							      </div>
							    </div>
							</div> 
							  <?php }else{ ?>
							  	<div class="col-sm-4 col-xs-12">
							    <div class="panel panel-default">
							      <div class="panel-thumbnail text-center">
							      	
							     
							      		<a href="<?php echo base_url().'uploads/service/'.$img->image; ?>" target="_blank" title="<?php echo ucfirst($img->type); ?>">
							      		<img src="<?php echo base_url().'backend_assets/img/attechment.png'; ?>" class="img-responsive img-rounded img-thumbnail" style="height: 105px;width: 142px;" >
							      	</a>
							      
							      </div>
							    </div>
							</div> 
							  	<?php } ?>
							<?php } ?>
						</div>
					</div>

					
				</div>
				
			</div>
		</div>	
	
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="well padding-10">
									<div class="row">

					  <?php if(isset($user['userType'])&& $user['userType']==1): ?>				
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="timeline-seperator text-center"> <span>Internal Comment</span>
						</div>
					
						<hr>
						<!-- comment -->
						<form method="post" action="<?php echo base_url().'api/service/internalserviceComment' ?>" id="internalcommentForm" class="well padding-bottom-10">
							<fieldset>
								<section >
									<textarea rows="2" class="form-control" name="notes" placeholder="Internal Comment" required><?php echo $service['notes']; ?></textarea>
											<input type="hidden" name="serviceId" value="<?php echo $service['serviceId']; ?>">
											<div class="margin-top-10">
												<button type="submit"class="btn btn-sm btn-danger pull-right" id="submit1">
													Add 
												</button>
											</div>
								</section>
						</fieldset>	
							
						</form>
				
						<!-- comment -->
					</div>
					<?php endif; ?>			
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="timeline-seperator text-center"> <span>Comment</span>
						</div>
						<div class="chat-body no-padding profile-message">
							<ul>
					
						<!-- 		<li class="message">
									<img src="<?php echo $serviceUser['profileImage']; ?>" class="online" style="height: 50px;width: 50px;" alt="user">
									<span class="message-text"> <a href="javascript:void(0);" class="username"><?php echo $serviceUser['fullName']; ?></a> <?php echo trim($service['comment']); ?> </span>

										<ul class="list-inline font-xs ">
											<li class="pull-right">
												<a href="javascript:void(0);" class="text-info"><i class="fa fa-time"></i> <?php echo date("d/m/Y H:i A",strtotime($service['crd']));  ?></a>
											</li>
											
										</ul>
								</li> -->
								<?php

								if(!empty($comments)): foreach ($comments as $k => $comment){
										$commentuser =  '';
										$commentImage = base_url().'backend_assets/img/avatars/sunny.png';
									if($comment->userType==1){
										$messagereply ="message-reply";
									}else{
										$messagereply ="";
									}


								 ?>
							<li class="message <?php echo $messagereply; ?>" style="margin-top:33px;">
										<img src="<?php echo $comment->profileImage;; ?>" class="online" style="height: 50px;width: 50px;" alt="user">
										<span class="message-text"> <a href="javascript:void(0);" class="username"><?php echo $comment->fullName; ?></a> <?php echo trim($comment->comment); ?> </span>

											<ul class="list-inline font-xs ">
												<li class="pull-right">
													<a href="javascript:void(0);" class="text-info"><i class="fa fa-time"></i> <?php echo date("d/m/Y H:i A",strtotime($comment->crd));  ?></a>
												</li>
												
											</ul>
									</li> 
								<?php
								 } else:
								 echo "<hr><center>No comment found</center>";
								endif; 
								 ?>
								<!-- <li class="message message-reply">
									<img src="img/avatars/3.png" class="online" alt="user">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>	
								</li> -->
							</ul>
						</div>
						<hr>
						<!-- comment -->
						<form method="post" action="<?php echo base_url().'api/service/serviceComment' ?>" id="commentForm" class="well padding-bottom-10"  <?php echo ($service['status']==2)?'style=display:none;': ''; ?> >
							<fieldset>
				<section >
					<textarea rows="2" class="form-control" name="comment" placeholder="What are you thinking?" required></textarea>
							<input type="hidden" name="serviceId" value="<?php echo $service['serviceId']; ?>">
							<div class="margin-top-10">
								<button type="submit" id="submit" class="btn btn-sm btn-primary pull-right" <?php echo ($service['status']==2)?'disabled': ''; ?> >
									Comment
								</button>
							</div>
				</section>
						</fieldset>	
							
						</form>
				
						<!-- comment -->
					</div>
					</div>
			</div>
		</div>
	</div>
</section>
<!-- end widget grid -->
<!-- .modal-profile -->
	<div class="modal fade modal-profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal">×</button>
						<h3 class="modal-title"></h3>
					</div>
					<div class="modal-body text-center">
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
        
			</div>
		</div>
