<?php include('admin_header.php') ?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="main-logo" width="200"  alt=""/>

		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li><?= anchor("dashboard",'Dashboard'); ?></li>
			<li><?= anchor("dashboard/manageclient",'Manage Clients',['id'=>'active']); ?></li>

		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manage Services</li>
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
<br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Manage Services
							</div>
							<div class="col-lg-9">
								<div class="button-box">
											<?=anchor("payments/add_payment",'Add Service',['class'=>'btn btn-primary']); ?>
								</div>
							</div>
						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>
						        <th>Sr No.</th>
								  <th>Admin Id</th>
								  <th>Added On</th>
								  <th>Service Id</th>
								  <th>Transaction Id</th>
						        <th>Transaction Date</th>
						        <th>Amount</th>
								  <th>Payment Status</th>

						    </tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_payments)):
						   	foreach ($all_payments as $k): ?>
								<tr>
									<td> <?= ++$count ?></td>
									<td><?= $k->admin_id ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->added_on));?></td>
									<td><?= $k->service_id ?></td>
									<td><?= $k->tr_id ?></td>
									<td><?= date("d-m-Y", strtotime($k->tr_date));?></td>
									<td><?= $k->amount ?></td>
									<td><?= $k->p_status ?></td>
									<td>		<?=anchor("services/delete_service/{$k->service_id}",'Delete',['class'=>'btn btn-danger']); ?>
									</td>
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
