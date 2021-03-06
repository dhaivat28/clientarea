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
					By	Status
					</div>
					<div class="panel-body">

						<?php echo form_open('filters/filter_by_status'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="status">
										<option value="Active">Active</option>
										<option value="Expired">Expired</option>
										<option value="Cancelled">Cancelled</option>
										<option value="90">Expiring within 90 Days</option>
										<option value="180">Expiring within 180 Days</option>
										<option value="180plus">Expiring in 180 plus Days</option>
										</select>
									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('status'); ?>
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

						<?php echo form_open('filters/filter_by_product'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="product_id" >
											<?php
											foreach($product_dropdown as $p_d)
											{
											?>
											<option value="<?=$p_d['product_id']?>"><?=$p_d['product_name']?></option>
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

						<?php echo form_open('filters/filter_by_client'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">

											<select name="client_id" >
												<?php	foreach($client_dropdown as $c_d) { ?>
												<option value="<?=$c_d['client_id']?>"><?=$c_d['cname']?></option>
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

						<?php echo form_open('filters/filter_by_admin'); ?>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<select name="admin_id" >
											<?php
											foreach($admin_dropdown as $a_d)
											{
											?>
											<option value="<?=$a_d['admin_id']?>"><?=$a_d['admin_name']?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col-lg-6">
										<div class="form-error-custom">
											<?php echo form_error('admin_id'); ?>
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
								<th>Days Left</th>
						    </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($filtered_data)):
						   	foreach ($filtered_data as $k): ?>
								<tr>

									<td>
										<div class="blue-service">
											<?= $k->service_id ?>
										</div>
									</td>
									<td><?= $k->service_name ?></td>
									<?php
										$s = $k->service_status;
										if($s=="Active")
										{ $c = "green-py"; }
										elseif ($s=="Cancelled")
										{ $c = "gold-py"; }
										else
										{ $c = "red-py"; }
									?>

								<td>
									<div class="<?= $c ?>">
										<?php echo $s ?>
									</div>
								</td>

									<td><?= $k->client_name ?></td>
									<td><?= date("d-m-Y", strtotime($k->p_date));?></td>
									<td><?= $k->years ?></td>
									<td><?= date("d-m-Y", strtotime($k->expiry_date));?></td>
									<td><?= $k->product_name ?></td>
									<td><?= $k->days_left ?></td>

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
