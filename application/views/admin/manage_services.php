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
											<?=anchor("services/add_service",'Add Service',['class'=>'btn btn-primary']); ?>
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
								  <th>Service Id</th>
								  <th>Domain Name</th>
						        <th>Client Name</th>
						        <th>Domain Reg. Date</th>
								  <th>Years</th>
						        <th>Domain Exp. Date</th>
							    <th>Service_type</th>
								 <th>Service_Charges</th>
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
									<td><?= $k->service_id ?></td>
									<td><?= $k->service_name ?></td>
									<td><?= $k->client_name ?></td>
									<td><?= date("d-m-Y", strtotime($k->p_date));?></td>
									<td><?= $k->years ?></td>
									<td><?= date("d-m-Y", strtotime($k->expiry_date));?></td>
									<td>
										
									</td>

									<td>		<?=anchor("services/delete_service/{$k->service_id}",'X',['class'=>'btn btn-danger']); ?>
									</td>
									<td>		<?=anchor("payments/add_payment/{$k->service_id}",' Payment',['class'=>'btn btn-primary']); ?>
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
