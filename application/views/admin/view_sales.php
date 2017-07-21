<?php include('admin_header.php') ?>


	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="row">
			<div class="col-lg-12">
				<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="main-logo" width="160"  alt=""/>
			</div>

			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4">
						<img src="<?php echo base_url('assets/images/admin.jpg'); ?>" class="profile-pic" width="160"  alt=""/>
					</div>

					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<div class="profile-name">
									<h9>John Doe</h9>
								</div>
							</div>
							<div class="col-lg-12">
								<h10>Admin</h10>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<ul class="nav menu">
			<!-- <li role="presentation" class="divider"></li> -->
			<li><?= anchor("dashboard",'Dashboard'); ?></li>
			<li><?= anchor("products",'Manage Products'); ?></li>
			<li><?= anchor("client/manageclient",'Manage Clients'); ?></li>
			<li><?= anchor("services/manage_services",'Manage Services',['id'=>'active']); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>
			<li><?= anchor("adminlogin/admin_logout",'Logout'); ?></li>

		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">

				<li id="new-li" class="active" id="new-li">Manage Services</li>
			</ol>
		</div><!--/.row-->

<div class="row">

	<div class="col-md-7">
				<div class="panel panel-info">
					<div class="panel-heading">Filter by Date</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-5">
								<?php echo form_open('sales/filter_by_sales'); ?>
								<label>Start Date</label>
									<?php echo form_input(['name'=>'start_date','type'=>'date','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Purchase Date','value'=>set_value('start_date')]); ?>
							</div>
							<div class="col-lg-5">
								<label>End Date</label>
									<?php echo form_input(['name'=>'end_date','type'=>'date','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Purchase Date','value'=>set_value('end_date')]); ?>
							</div>
							<div class="col-lg-2">
								<br />
								<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
								<?php echo form_close(); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
								<div class="form-error-custom">
									<?php echo form_error('start_date'); ?>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="form-error-custom">
									<?php echo form_error('end_date'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<div class="col-md-5">
				<div class="panel panel-info">
					<div class="panel-heading">Filter by Date</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
							<?php echo form_open('sales/filter_by_month'); ?>
								<label>Month</label><br />
							   <select name="month">
									<option value='1'>Janaury</option>
									<option value='2'>February</option>
									<option value='3'>March</option>
									<option value='4'>April</option>
									<option value='5'>May</option>
									<option value='6'>June</option>
									<option value='7'>July</option>
									<option value='8'>August</option>
									<option value='9'>September</option>
									<option value='10'>October</option>
									<option value='11'>November</option>
									<option value='12'>December</option>
								</select>
							</div>
							<div class="col-lg-4">
								<label>Year</label>
								<?php echo form_input(['name'=>'year','id'=>'inputEmail','class'=>'form-control','placeholder'=>'eg. 2017','value'=>set_value('year')]); ?>
							</div>
							<div class="col-lg-4">
								<br />
								<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
								<?php echo form_close(); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
								<div class="form-error-custom">
									<?php echo form_error('month'); ?>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="form-error-custom">
									<?php echo form_error('year'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-10">
								All Sales
							</div>

							<div class="col-lg-2">
								<div class="button-box">
											<?=anchor("sales",'Remove filters',['class'=>'btn 	btn-primary']); ?>
								</div>
							</div>

						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>
						        <th>Sr No.</th>
								  <th>Service Id</th>
								  <th>Service Details</th>
								  <th>Earning</th>
						        <th>Received On</th>
						     </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_sales)):
						   	foreach ($all_sales as $k): ?>
								<tr>
									<td> <?= ++$count ?></td>
									<td>
										<div class="blue-service">
											<?= $k->service_id ?>
										</div>
									</td>
									<td><?= $k->service_details ?></td>
									<td><?= $k->profit ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->received_date));?></td>
									</tr>
						   <?php endforeach; ?>
				   	<?php else: ?>
					   <tr>
						   <td colspan="10">No Records Found</td>
					   </tr>
				   <?php endif; ?>

							 </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div><!--/.main-->

	<?php include('admin_footer.php') ?>
