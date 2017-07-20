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
	<div class="col-lg-12">
		<?php if($feedback = $this->session->flashdata('feedback')):
			$feedback_class = $this->session->flashdata('feedback_class'); ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible <?= $feedback_class ?>">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?= $feedback ?></strong>
					</div>
				</div>
			</div>
			<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<?php if($expired = $this->session->flashdata('expired')):
			$expired_service = $this->session->flashdata('expired_service'); ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-dismissible <?= $expired_service ?>">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?= $expired ?></strong>
					</div>
				</div>
			</div>
			<?php endif; ?>
	</div>
</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-9">
								All Services
							</div>

							<div class="col-lg-1">
								<div class="button-box">
											<?=anchor("filters",'Filters',['class'=>'btn 	btn-primary']); ?>
								</div>
							</div>

							<div class="col-lg-2">
								<div class="button-box">
											<?=anchor("services/add_service",'Add Service',['class'=>'btn btn-success']); ?>
								</div>
							</div>
						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>
						        <th>Sr No.</th>
								  <th>Added On</th>
								  <th>Added By</th>
								  <th>Service Id</th>
								  <th>Service Status</th>
								  <th>Service / Domain Name</th>
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
									<td> <?= ++$count ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->added_on));?></td>
									<td><?= $k->added_by ?></td>
									<td>
										<div class="blue-service">
											<?= $k->service_id ?>
										</div>
									</td>
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

									<td><?= $k->service_name ?></td>
									<td><?= $k->client_name ?></td>
									<td><?= date("d-m-Y", strtotime($k->p_date));?></td>
									<td><?= $k->years ?></td>
									<td><?= date("d-m-Y", strtotime($k->expiry_date));?></td>
									<td><?= $k->product_name?></td>

									<td>		<?=anchor("services/delete_service/{$k->service_id}",'Delete',['class'=>'btn btn-danger']); ?>
									</td>

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
