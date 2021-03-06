<?php 
	$rating = 0; 
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEAD-->
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?php echo $title; ?>
				</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
		<!-- END PAGE HEAD-->
		<!-- BEGIN PAGE BREADCRUMB -->
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<a href="..">Tabel Data</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span class="active">Profil</span>
			</li>
		</ul>
		<!-- END PAGE BREADCRUMB -->
		<!-- BEGIN PAGE BASE CONTENT -->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PROFILE SIDEBAR -->
				<div class="profile-sidebar">
					<!-- PORTLET MAIN -->
					<div style="padding: 30px 0 !important;" class="portlet light profile-sidebar-portlet bordered">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="<?php echo base_url();?>/assets/upload/foto/<?php echo $sql['foto_pas'];?>" class="img-responsive" alt=""> 
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name"> <?php echo $sql['nama'];?> </div>
							<!-- <div class="profile-usertitle-job"> Developer </div> -->
							<?php if($this->session->userdata('role')!=$this->uri->segment(4) && $this->session->userdata('role')!='donatur' && $this->uri->segment(4)!='penerima'){?>
							<div class="star-rating">
								<input type="radio" name="example" class="rating" value="1" <?php if($sql['rating'] == 1){ echo 'checked'; } ?>/>
								<input type="radio" name="example" class="rating" value="2"	<?php if($sql['rating'] == 2){ echo 'checked'; } ?> />
								<input type="radio" name="example" class="rating" value="3" <?php if($sql['rating'] == 3){ echo 'checked'; } ?>/>
								<input type="radio" name="example" class="rating" value="4" <?php if($sql['rating'] == 4){ echo 'checked'; } ?>/>
								<input type="radio" name="example" class="rating" value="5" <?php if($sql['rating'] == 5){ echo 'checked'; } ?>/>
							</div>
							<?php } ?>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
						<?php if($this->session->userdata('role')!=$this->uri->segment(4) && $this->uri->segment(4)!= 'penerima'){ ?>
							<a href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role');?>/buat_beasiswa/<?php echo $sql['id'].'/'.$this->session->userdata('id'); ?>"><button type="button" class="btn btn-circle green btn-sm">Get</button></a>
						<?php } ?>
						<?php if($this->session->userdata('role')!=$this->uri->segment(4)){ ?>
						<a href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role');?>/view_chat/<?php echo $sql['id'].'/'.$sql['nama']; ?>"><button type="button" class="btn btn-circle red btn-sm">Message</button></a>
						<?php } ?>	
						</div>
						<!-- END SIDEBAR BUTTONS -->
					</div>
					<!-- END PORTLET MAIN -->
					<!-- PORTLET MAIN -->
					<div class="portlet light bordered">
						<!-- STAT -->
						<div class="row list-separated profile-stat">
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="uppercase profile-stat-title"> 37 </div>
								<div class="uppercase profile-stat-text"> Beasiswa </div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="uppercase profile-stat-title"> 51 </div>
								<div class="uppercase profile-stat-text"> Partisipan </div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="uppercase profile-stat-title"> 61 </div>
								<div class="uppercase profile-stat-text"> Diterima </div>
							</div>
						</div>
						<!-- END STAT -->
						<div>
							<div class="margin-top-20 profile-desc-link">
								<i class="fa fa-envelope"></i>
								<a href="mailto:<?php echo $sql['email'];?>"><?php echo $sql['email'];?></a>
							</div>
						</div>
					</div>
					<!-- END PORTLET MAIN -->
				</div>
				<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet light bordered">
								<div class="portlet-title tabbable-line">
									<div class="caption caption-md">
										<i class="icon-globe theme-font hide"></i>
										<span class="caption-subject font-blue-madison bold uppercase">Ikhtisar</span>
									</div>
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_1_1" data-toggle="tab">Deskripsi</a>
										</li>
										<?php if($this->uri->segment(4)== 'donatur' && $this->session->userdata('role')=='admin'){ ?>
										<li>
											<a href="#tab_1_2" data-toggle="tab">Bukti Slip Gaji</a>
										</li>
										<li>
											<a href="#tab_1_3" data-toggle="tab">Surat Keterangan Aktif Kerja</a>
										</li>
										<?php } else if($this->uri->segment(4)== 'penerima'){ ?>
											<li>
												<a href="#tab_1_4" data-toggle="tab">SKTM</a>
											</li>
										<?php } ?>
										<?php if($this->uri->segment(4)== 'donatur'){ ?>
										<li>
											<a href="#tab_1_5" data-toggle="tab">Syarat</a>
										</li>
										<?php } ?>
									</ul>
								</div>
								<div style="height: 410px;" class="portlet-body">
									<div class="tab-content">
										<!-- GENERAL QUESTION TAB -->
										<div class="tab-pane active" id="tab_1_1">
											<div style="overflow-y: hidden; height: 390px;" class="panel-body">
												<?php if($this->session->userdata('role')==$this->uri->segment(4)){?>
												<div id="edit" style="float:right;" >
													<a><i class="fa fa-pencil"></i>[Edit]</a>
												</div>
												
												<form id="edit-text" action="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role');?>/des_simpan" method="post">
													<input type="hidden" name="id" value="<?php echo $sql['id'];?>">
													<textarea id="summernote" name="deskripsi"><?php echo $sql['deskripsi'];?></textarea>
													<button type="submit" class="btn blue editable-submit"><i class="fa fa-check"></i></button>
													<button id="show" type="button" class="btn default editable-cancel"><i class="fa fa-times"></i></button>
												</form>
												<?php }?>
												<!-- <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
													nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
												<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
													nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
												<p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
													craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
													nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p> -->
												<div id="isi">
													<?php echo $sql['deskripsi'];?>
												</div>
											</div>
										</div>
										
										<?php if($this->uri->segment(4)== 'donatur' && $this->session->userdata('role')=='admin'){ ?>
										<!-- END GENERAL QUESTION TAB -->
										<!-- MEMBERSHIP TAB -->
										<div class="tab-pane" id="tab_1_2">
											<div class="panel-body">
												<img src="<?php echo base_url();?>/assets/upload/ss/<?php echo $sql['ss_gaji'];?>" class="img-responsive" alt=""> 
											</div>
										</div>
										<!-- END MEMBERSHIP TAB -->
										<!-- TERMS OF USE TAB -->
										<div class="tab-pane" id="tab_1_3">
											<div class="panel-body">
												<img src="<?php echo base_url();?>/assets/upload/ss/<?php echo $sql['ss_aktif'];?>" class="img-responsive" alt=""> 
											</div>
										</div>
										<?php } else if($this->uri->segment(4)== 'penerima'){ ?>
										<div class="tab-pane" id="tab_1_4">
											<div class="panel-body">
												<img src="<?php echo base_url();?>/assets/upload/ss/<?php echo $sql['ss_sktm'];?>" class="img-responsive" alt=""> 
											</div>
										</div>
										<?php } ?>
										<?php if($this->uri->segment(4)== 'donatur'){ ?>
										<div class="tab-pane" id="tab_1_5">
											<div style="overflow-y: hidden; height: 390px;" class="panel-body">
												<?php if($this->session->userdata('role')==$this->uri->segment(4)){?>
												<div id="edit-sya" style="float:right;" >
													<a><i class="fa fa-pencil"></i>[Edit]</a>
												</div>
												
												<form id="edit-text-sya" action="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role');?>/sya_simpan" method="post">
													<input type="hidden" name="id" value="<?php echo $sql['id'];?>">
													<textarea id="summernote-sya" name="syarat"><?php echo $sql['syarat'];?></textarea>
													<button type="submit" class="btn blue editable-submit"><i class="fa fa-check"></i></button>
													<button id="show-sya" type="button" class="btn default editable-cancel"><i class="fa fa-times"></i></button>
												</form>
												<?php }?>
												<!-- <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
													nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
												<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
													nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
												<p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
													craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
													nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p> -->
												<div id="isi-sya">
													<?php echo $sql['syarat'];?>
												</div>
											</div>
										</div>
										<?php } ?>
										<!-- END TERMS OF USE TAB -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PROFILE CONTENT -->
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
	</div>
	<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> -->

<!-- page specific plugin scripts -->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-typeahead.js"></script> -->

<!-- ace scripts -->
<!-- <script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
<script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 enableHTML: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a tabindex="0"><label></label></a></li>',
			        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
				 }
			        divider: '<li class="multiselect-item divider"></li>',
				});
			
				
				var substringMatcher = function(strs) {
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES']),
					limit: 10
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
</script> -->
<script src="<?php echo base_url(); ?>assets//global/plugins/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
		$('.star-rating').non_rating();
		
		$(document).ready(function() {
			$('#summernote').summernote();
			$('#summernote-sya').summernote();
		});
	});
</script>

<script>
	$(document).ready(function(){
		$("#edit-text").hide();
		$("#edit").click(function(){
			$("#isi").hide();
			$("#edit-text").show();
		});
		$("#show").click(function(){
			location.reload();
		});
		$("#edit-text-sya").hide();
		$("#edit-sya").click(function(){
			$("#isi-sya").hide();
			$("#edit-text-sya").show();
		});
		$("#show").click(function(){
			location.reload();
		});
		$("#show-sya").click(function(){
			location.reload();
		});
	});
</script>
