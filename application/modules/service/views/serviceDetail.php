
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="well padding-10">
							<h4 class="margin-top-0"><i class="fa fa-cog"></i> <b><?php echo ucfirst($service['productName']); ?></b></h4>
							<hr>
							<div class="row">

								<div class="col-sm-4 col-md-4 col-lg-4 ">

									<ul class="list-group no-margin">
										<li class="list-group-item">
											<span class="badge pull-right"><?php echo ucfirst($service['vendor']); ?></span> Vendor
										</li>
										<li class="list-group-item">
											<span class="badge pull-right"><?php echo $service['serialNumber']; ?></span> Serial number
										</li>

										
									</ul>

								</div>
								<div class="col-sm-4 col-md-4 col-lg-4 ">

									<ul class="list-group no-margin">
										<li class="list-group-item">
											<span class="badge pull-right"><?php echo date("d/m/Y",strtotime($service['purchaseDate'])); ?></span> Purchase Date
										</li>
										<li class="list-group-item">
											<span class="badge pull-right"><?php echo $service['contactNumber']; ?></span> Contact number
										</li>
									</ul>

								</div>
							<div class="col-sm-4 col-md-4 col-lg-4 ">

									<ul class="list-group no-margin">
										<li class="list-group-item">
											<b>Comment</b>
										</li>
										<li class="list-group-item">
											<?php echo $service['comment']; ?>
										</li>
									</ul>

								</div>


						</div>
						<hr>
						<div class="row">
								<div class="col-sm-3 col-md-3 col-lg-3">
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
								
										<div class="dd-handle bg-color-<?php echo $label; ?> txt-color-white pull-right">
																				<strong><?php echo $status; ?></strong>
																			</div>
										<b>Service Status</b>
								</div>
								<div class="col-sm-9 col-md-9 col-lg-9 ">

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
										<?php else :?>
											<strong> Service process is completed.</strong>
									 <?php endif; ?> 
								<?php endif; ?>
								</div>
							
							</div>
						</div>
			
		</div>

<!-- SuperBox -->

	<div class="superbox col-sm-12 col-md-12 col-lg-12">
		<?php foreach ($images as $key => $img) { ?>
		<div class="superbox-list">
			<img src="<?php echo base_url().'uploads/service/'.$img->image; ?>" data-img="<?php echo base_url().'uploads/service/'.$img->image; ?>" alt="<?php echo ucfirst($service['productName']); ?>" title="<?php echo ucfirst($service['productName']); ?>" class="superbox-img thumbnail">
		</div><?php } ?>
		<div class="superbox-float"></div>
	</div>
	<div class="superbox-show" style="height:300px; display: none"></div>
	<!-- /SuperBox -->
	
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
