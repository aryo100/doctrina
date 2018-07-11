<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEAD-->
		<div class="page-head">
					<?php
					$nama='';
						$no=0;
						foreach ($sql1 as $obj1) {
							$no++;
							 $nama = $obj1->nama;
						}
					?>
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>
					<?php echo $nama ?>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="accordion">
                            <span class="glyphicon glyphicon-comment"></span> Chat
                            <div class="btn-group pull-right">
                                <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                            </div>
                        </div>
                    <div class="panel-collapse" id="collapseOne">
                        <div class="panel-body">
                            <ul class="chat">
							<?php
								$no=0;
					foreach ($sql->result() as $obj) {
									$no++;
							?>
                                <?php if($obj->pengirim != $this->session->userdata('role')){?>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php if($obj->pengirim == 'donatur'){echo $obj->nama_d;} else {echo $obj->nama_p;} ?></strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span><?php echo $obj->waktu; ?></small>
                                        </div>
                                        <p>
                                        <?php echo $obj->isi; ?>
                                        </p>
                                    </div>
                                </li>
                                <?php } else { ?>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $obj->waktu; ?></small>
                                            <!-- <strong class="pull-right primary-font"><?php if($obj->penerima == 'donatur'){echo $obj->nama_d;} else {echo $obj->nama_p;} ?></strong> -->
                                        </div>
                                        <p>
                                            <?php echo $obj->isi;?>
                                        </p>
                                    </div>
                                </li>
								<?php }} ?>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group" style="width: 100%">
                                <form action="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role');?>/simpan_chat/<?php echo $this->session->userdata('id').'/'.$this->uri->segment(3).'/'.$this->session->userdata('role');?>" method="post">
									<input name="isi" style="width: calc(100% - 51px)" id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
										<button name="chat" type="submit" class="btn btn-warning btn-sm" id="btn-chat">
											Send
										</button>
									<span class="input-group-btn">
									</span>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
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
			        divider: '<li class="multiselect-item divider"></li>',
			        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
				 }
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
	});
	$(document).ready(function(){
		$('.panel-body').scrollTop($('.chat').height());
	});
</script>
