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
			<li><?= anchor("services/manage_services",'Manage Services'); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>


		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">

				<li id="new-li" class="active" id="new-li">Manage Services</li>
			</ol>
		</div><!--/.row-->

		<div class="row">

			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading">
					By	Expiry
					</div>
					<div class="panel-body">

						<?php echo form_open('filter/expiry'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="years">
										<option value="+1 years">Active</option>
										<option value="+2 years">Expired</option>
										<option value="+3 years">Canceled</option>
										<option value="+4 years">Expiring within 90 Days</option>
										<option value="+5 years">Expiring within 180 Days</option>
										<option value="+5 years">Expiring in 180 plus Days</option>

										</select>
									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('cname'); ?>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						By Product
					</div>
					<div class="panel-body">

						<?php echo form_open('filter/expiry'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="product_id" >
											<?php
											foreach($p_dropdown as $dlist)
											{
											?>
											<option value="<?=$dlist['product_id']?>"><?=$dlist['product_name']?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('product_id'); ?>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						By Client
					</div>
					<div class="panel-body">

						<?php echo form_open('filter/expiry'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">

											<select name="client_id" >
												<?php	foreach($dropdown_list as $dlist) { ?>
												<option value="<?=$dlist['client_id']?>"><?=$dlist['cname']?></option>
												<?php	 } ?>
											</select>


									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('client_id'); ?>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						Added By
					</div>
					<div class="panel-body">

						<?php echo form_open('filter/expiry'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="product_id" >
											<?php
											foreach($admin_dropdown as $dlist)
											{
											?>
											<option value="<?=$dlist['admin_id']?>"><?=$dlist['admin_name']?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('cname'); ?>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_submit(['name'=>'submit','value'=>'Go','class'=>'btn btn-primary']); ?>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-12">
								Manage Services
							</div>

							</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>
								 <th>Service Id</th>
								 <th>Service / Domain Name</th>
								 <th>Service Status</th>
								 <th>Client Name</th>
								 <th>Reg. Date</th>
								 <th>Years</th>
								 <th>Exp. Date</th>
								<th>Product</th>
						    </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_services)):
						   	foreach ($all_services as $k): ?>
								<tr>

									<td>
										<div class="blue-service">
											<?= $k->service_id ?>
										</div>
									</td>
									<td><?= $k->service_name ?></td>
									<td><?= $k->service_status ?></td>
									<td><?= $k->client_name ?></td>
									<td><?= date("d-m-Y", strtotime($k->p_date));?></td>
									<td><?= $k->years ?></td>
									<td><?= date("d-m-Y", strtotime($k->expiry_date));?></td>
										<td><?= $k->product_name ?></td>

									<!-- <td>		<?=anchor("services/delete_service/{$k->service_id}",'X',['class'=>'btn btn-danger']); ?>
									</td> -->

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
