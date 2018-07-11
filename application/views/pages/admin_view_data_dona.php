<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
	<!-- BEGIN PAGE HEAD-->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1><?php echo $title; ?>
				<!-- <small>managed datatable samples</small> -->
			</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD-->
	<!-- BEGIN PAGE BREADCRUMB -->
	<ul class="page-breadcrumb breadcrumb">
		<!-- <li>
			<a href="index.html">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="#">Tables</a>
			<i class="fa fa-circle"></i>
		</li> -->
		<li>
			<span class="active">tabel data</span>
		</li>
	</ul>
	<!-- END PAGE BREADCRUMB -->
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light bordered">

				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
								<a  href="<?php echo base_url();?>index.php/daftar/view_dona">
									<button id="sample_editable_1_new" class="btn sbold green"> Add New
										<i class="fa fa-plus"></i>

									</button>
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="btn-group pull-right">
									<button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
												<i class="fa fa-print"></i> Print </a>
										</li>
										<li>
											<a href="javascript:;">
												<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
										</li>
										<li>
											<a href="javascript:;">
												<i class="fa fa-file-excel-o"></i> Export to Excel </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<table id="tabel_dona" class="table table-striped table-bordered table-hover table-checkable order-column">
						<thead>
							<tr>
								<th>
									<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
										<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
										<span></span>
									</label>
								</th>
								<th> Nama </th>
								<th> Jenis Kelasmin </th>
								<th> Tanggal Lahir </th>
								<th> No.KTP </th>
								<th> Status </th>
								<th> Actions </th>
							</tr>
						</thead>
						<tbody>
						<?php
							$no=0;
							foreach ($sql1 as $obj1) {
								$no++;
								?>
							<tr class="odd gradeX">
								<td>
									<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
										<input type="checkbox" class="checkboxes" value="1" />
										<span></span>
									</label>
								</td>
								<td> <?php echo $obj1->nama; ?> </td>
								<td> <?php if($obj1->gender=='cowok'){echo 'Laki -laki';}else{echo'Perempuan';} ?> </td>
								<td class="center"> <?php echo $obj1->tanggal_lahir; ?> </td>
								<td> <?php echo $obj1->no_ktp; ?> </td>
								
								<td>
									<?php if($obj1->status =='approved'){
										echo "<span class='label label-sm label-success'> Approved </span>";
									}
									elseif($obj1->status =='unapproved'){
										echo "<span class='label label-sm label-warning'> Unapproved </span>";
									}
									else{
										echo "<span class='label label-sm label-default'> Pending </span>";
									}

									?>
								</td>
								<!-- <td class="center"> 12 Jan 2012 </td> -->
								<td>
									<div class="btn-group">
										<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
											<i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-left" role="menu">
											<li>
												<a href="<?php echo base_url();?>index.php/<?php echo $this->session->userdata('role');?>/data_lengkap/<?php echo $obj1->id.'/donatur';?>">
													<i class="icon-user"></i> See More </a>
											</li>
											<li class="divider"> </li>
											
											<?php if($obj1->status !='approved'){?>
												<li>
													<a href="<?php echo base_url();?>index.php/<?php echo $this->session->userdata('role');?>/akun_simpan/<?php echo $obj1->id.'/donatur';?>">
														<i class="icon-check"></i> Approved </a>
												</li>
											<?php } ?>
											<?php if($obj1->status !='unapproved'){ ?>
											<li>
												<a href="<?php echo base_url();?>index.php/<?php echo $this->session->userdata('role');?>/unapproved/<?php echo $obj1->id.'/donatur';?>">
													<i class="icon-close"></i> unapproved </a>
											</li>
											<?php } ?>
										</ul>
									</div>
								</td>
								<?php
									}
									?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<!-- page specific plugin scripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<!-- <script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = 
		$('#sample_1')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
				{ "bSortable": false },
				null, null,null, null, null,null,
				{ "bSortable": false }
			],
			"aaSorting": [],
			columns: [
				null, null,null, null, null,null,null,null
			]
			
			//"bProcessing": true,
			//"bServerSide": true,
			//"sAjaxSource": "http://127.0.0.1/table.php"	,
	
			//,
			//"sScrollY": "200px",
			//"bPaginate": false,
	
			//"sScrollX": "100%",
			//"sScrollXInner": "120%",
			//"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element
	
			//"iDisplayLength": 50
		} );			
	})
</script> -->
<script>
	$(document).ready(function() {
		// table = $('#sample_1').DataTable();
		
		// table.destroy();

		$('#tabel_dona').DataTable( {
			"aoColumns": [
				{ "bSortable": false },
				null, null,null, null, null,
				{ "bSortable": false }
			],
			"aaSorting": [],
			columns: [
				null, null,null, null, null,null,null,null
			]
			
			// responsive: {
			// 	details: {
			// 		type: 'column'
			// 	}
			// },
			// columnDefs: [ {
			// 	className: 'control',
			// 	orderable: false,
			// 	targets:   0
			// } ],
			// order: [ 1, 'asc' ]
		} );
	} );
</script>