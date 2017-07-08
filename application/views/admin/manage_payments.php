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

<br />
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

								  <th>Added By</th>
								  <th>Service Id</th>
								  <th>Transaction Id</th>
						        <th>Transaction Date</th>
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
									<td><?= $k->added_by ?></td>
									<td><?= $k->service_id ?></td>
									<td><?= $k->tr_id ?></td>
									<td><?= $k->tr_date ?></td>
									<td><?= $k->service_charges ?></td>
									<td><?= $k->amount_paid ?></td>
										<?php
											$s = $k->p_status;
											if($s=="no payments yet")
											{ $c = "red-py"; }
											elseif ($s=="partial")
											{ $c = "blue-py"; }
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
