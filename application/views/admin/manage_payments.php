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
			<li><?= anchor("payments/manage_payments",'Manage Payments',['id'=>'active']); ?></li>


		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li id="new-li" class="active">Manage Services</li>
			</ol>
		</div><!--/.row-->
<br />
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
		<?php if($feedback = $this->session->flashdata('incorrect_amount')):
			$feedback_class = $this->session->flashdata('i_class'); ?>

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
								Payments
							</div>

						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>

								  <th>Sr. no</th>
								  <th>Added By</th>
								  <th>Service Id</th>
								  <th>Service Details</th>
								  <th>Service Charges</th>
						        <th>Amount Paid</th>
								  <th>Payment Status</th>
								  <th>Payment method</th>
								  <th>Amount Left</th>

						    </tr>
						    </thead>
							 <tbody>

								 <?php

				   	 		$count = 0;
					 			if( count($all_payments)):
						   	foreach ($all_payments as $k): ?>
								<tr>
									<td><?= ++$count; ?></td>
									<td><?=$k->added_by ?></td>
									<td>
										<div class="blue-service">
											<?= $k->service_id ?>
										</div>
									</td>
									<td><?= $k->service_details ?></td>
									<td><?= $k->service_charges ?></td>
									<td><?= $k->amount_paid ?></td>
										<?php
											$s = $k->p_status;
											if($s=="no payments yet")
											{ $c = "red-py"; }
											elseif ($s=="partial")
											{ $c = "gold-py"; }
											else
											{ $c = "green-py"; }
										?>

									<td>
										<div class="<?= $c ?>">
											<?php echo $s ?>
										</div>
									</td>

									<td><?= $k->p_method ?></td>
									<td><?= $k->amount_left ?></td>
									<td>		<?=anchor("payments/add_payment/{$k->service_id}",'Pay',['class'=>'btn btn-success	']); ?>
									</td>
									<td>		<?=anchor("payments/check_log/{$k->service_id}",'Log',['class'=>'btn btn-primary']); ?>
									</td>
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
