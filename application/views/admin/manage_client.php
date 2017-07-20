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
			<li><?= anchor("client/manageclient",'Manage Clients',['id'=>'active']); ?></li>
			<li><?= anchor("services/manage_services",'Manage Services'); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>
			<li><?= anchor("adminlogin/admin_logout",'Logout'); ?></li>

		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">

				<li id="new-li" class="active">Manage Clients</li>
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
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								All Clients
							</div>
							<div class="col-lg-9">
								<div class="button-box">
											<?=anchor("client/addclient",'Add Client',['class'=>'btn btn-primary']); ?>
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
						        <th>Client Name</th>
						        <th>Email</th>
								  <th>Mobile No</th>
								  <th>Remarks</th>
						        <th>Options</th>
						    </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_clients)):
						   	foreach ($all_clients as $k): ?>
								<tr>
									<td> <?= ++$count ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->created_at));?></td>
									<td><?= $k->cname ?></td>
									<td><?= $k->email ?></td>
									<td><?= $k->mobile ?></td>
									<td><?= $k->remarks ?></td>
									<td>
										<div class="row">
											<div class="col-md-4 col-md-push-2">
												<?=anchor("client/edit_client/{$k->client_id}",'Edit',['class'=>'btn btn-primary']); ?>
											</div>

											<div class="col-md-4 col-md-push-2">
												<?=anchor("client/delete_client/{$k->client_id}",'Delete',['class'=>'btn btn-danger']); ?>
											</div>

										</div>
								</tr>
						   <?php endforeach; ?>
				   	<?php else: ?>
					   <tr>
						   <td colspan="7">No Records Found</td>
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
