<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEAD-->
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>
				<?php echo $title; ?>
				</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
		<!-- END PAGE HEAD-->
		<!-- BEGIN PAGE BREADCRUMB -->
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<span class="active">list donatur</span>
			</li>
		</ul>
		<!-- END PAGE BREADCRUMB -->
		<!-- BEGIN PAGE BASE CONTENT -->
		<!-- BEGIN : USER CARDS -->
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light portlet-fit bordered">
					<div class="portlet-body">
						<div class="mt-element-card mt-element-overlay">
							<div class="row">
							<?php
								$no=0;
								foreach ($sql as $obj1) {
									$no++;
									if($obj1->status == 'approved'){
								?>
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<div class="mt-card-item">
										<div class="mt-card-avatar mt-overlay-1">
											<img src="<?php echo base_url();?>/assets/upload/foto/<?php echo $obj1->foto_pas;?>" />
											<div class="mt-overlay">
												<ul class="mt-info">
													<li>
														<li>
														<a class="btn default btn-outline" href="<?php echo base_url();?>index.php/penerima/data_lengkap_dona/<?php echo $obj1->id;?>">
															<i class="icon-magnifier"></i>
														</a>
													</li>
														<a class="btn default btn-outline" href="<?php echo base_url();?>index.php/penerima/view_chat/<?php echo $obj1->id;?>">
															<i class="fa fa-comments"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="mt-card-content">
											<h3 class="mt-card-name"><?php echo $obj1->nama;?></h3>
											
											<div class="star-rating">
												<input type="radio" name="example" class="rating" value="1" <?php if($obj1->rating == 1){ echo 'checked'; } ?>/>
												<input type="radio" name="example" class="rating" value="2"	<?php if($obj1->rating == 2){ echo 'checked'; } ?> />
												<input type="radio" name="example" class="rating" value="3" <?php if($obj1->rating == 3){ echo 'checked'; } ?>/>
												<input type="radio" name="example" class="rating" value="4" <?php if($obj1->rating == 4){ echo 'checked'; } ?>/>
												<input type="radio" name="example" class="rating" value="5" <?php if($obj1->rating == 5){ echo 'checked'; } ?>/>
											</div>
											<!-- <div class="mt-card-social">
												<ul>
													<li>
														<a href="javascript:;">
															<i class="icon-social-facebook"></i>
														</a>
													</li>
												</ul>
											</div> -->
										</div>
									</div>
								</div>
							<?php }}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END : USER CARDS -->
		<!-- END PAGE BASE CONTENT -->
	</div>
	<!-- END CONTENT BODY -->
</div>

<script src="<?php echo base_url(); ?>assets//global/plugins/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
		$('.star-rating').non_rating();
	});
</script>