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
			<li><?= anchor("products",'Manage Products',['id'=>'active']); ?></li>
			<li><?= anchor("client/manageclient",'Manage Clients'); ?></li>
			<li><?= anchor("services/manage_services",'Manage Services'); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>
			<li><?= anchor("adminlogin/admin_logout",'Logout'); ?></li>

		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">

				<li id="new-li" class="active">Manage Products</li>
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
								All Products
							</div>
							<div class="col-lg-9">
								<div class="button-box">
											<?=anchor("products/add_product",'Add Products',['class'=>'btn btn-primary']); ?>
								</div>
							</div>
						</div>

					</div>
					<div class="panel-body">
						<table class="domain-table">
						    <thead>
						    <tr>
						        <th>product_id</th>
								  <th>Added On</th>
						        <th>product Name</th>
						        <th>product Mrp</th>
								  <th>profit</th>
							</tr>
						    </thead>
							 <tbody>

								 <?php
				   	 		$count = 0;
					 			if( count($all_products)):
						   	foreach ($all_products as $k): ?>
								<tr>

										<td><?= $k->product_id ?></td>
									<td><?= date("d - M - Y h:ia",  strtotime($k->added_on));?></td>
									<td><?= $k->product_name ?></td>
									<td><?= $k->product_mrp ?></td>
									<td><?= $k->profit ?></td>
									<td>
											<?=anchor("products/delete_product/{$k->product_id}",'Delete',['class'=>'btn btn-danger']); ?>
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
