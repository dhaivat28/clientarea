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
			<li><?= anchor("dashboard",'Dashboard',['id'=>'active']); ?></li>
			<li><?= anchor("products",'Manage Products'); ?></li>
			<li><?= anchor("client/manageclient",'Manage Clients'); ?></li>
			<li><?= anchor("services/manage_services",'Manage Services'); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>


		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li id="new-li" class="active">Manage Services</li>
			</ol>
		</div><!--/.row-->
<br />

<br />
		<div class="row">
			<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								Service Information
							</div>
							<div class="panel-body">

										<?php foreach ($service_details as $key): ?>
											<b>Service Id : </b>  <?= $key->service_id ?>
											 	<br /><br />
											<b>Client Name : </b> <?= $key->client_name ?>
												<br /><br />
											<b>Service Name : </b><?= $key->service_name ?>
												<br /><br />
											<b>Start Date : </b><?= $key->p_date ?>
												<br /><br />
											<b>For : </b> <?= $key->years ?>
												<br /><br />
											<b>End Date : </b> <?= $key->expiry_date ?>
										<?php endforeach; ?>

							</div>
						</div>
					</div>
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Payment Log
							</div>

						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>

								  <th>Added By</th>
								  <th>Transaction Id</th>
						        <th>Transaction Date</th>
								  <th>Service Id</th>
								  <th>Amount Left</th>
								  <th>Amount Paid</th>
								  <th>Payment method</th>

						    </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_transactions)):
						   	foreach ($all_transactions as $k): ?>
								<tr>
									<td><?= $k->added_by ?></td>
									<td><?= $k->tr_id ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->tr_date));?></td>
									<td><?= $k->service_id ?></td>
									<td><?= $k->amount_left ?></td>
									<td><?= $k->amount_paid ?></td>
									<td><?= $k->p_method ?></td>
								</tr>
						   <?php endforeach; ?>
				   	<?php else: ?>
					   <tr>
						   <td colspan="9">No Records Found</td>
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
