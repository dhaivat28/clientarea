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
						Filter
					</div>
					<div class="panel-body">
						<h5>Services Expiring in</h5>
						<div class="btn-group-vertical" role="group" aria-label="Vertical button group"> <button type="button" class="btn btn-default">Button</button> <button type="button" class="btn btn-default">Button</button> <div class="btn-group" role="group"> <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1"> <li><a href="#">Dropdown link</a></li> <li><a href="#">Dropdown link</a></li> </ul> </div> <button type="button" class="btn btn-default">Button</button> <button type="button" class="btn btn-default">Button</button> <div class="btn-group" role="group"> <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2"> <li><a href="#">Dropdown link</a></li> <li><a href="#">Dropdown link</a></li> </ul> </div> <div class="btn-group" role="group"> <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <li><a href="#">Dropdown link</a></li> <li><a href="#">Dropdown link</a></li> </ul> </div> <div class="btn-group" role="group"> <button id="btnGroupVerticalDrop4" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </button> <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop4"> <li><a href="#">Dropdown link</a></li> <li><a href="#">Dropdown link</a></li> </ul> </div> </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-11">
								Manage Services
							</div>

							<div class="col-lg-1">
								<div class="button-box">
											<?=anchor("filters/filter_service",'Filters',['class'=>'btn 	btn-primary']); ?>
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
								  <th>Domain Name</th>
						        <th>Client Name</th>
						        <th>Domain Reg. Date</th>
								  <th>Years</th>
						        <th>Domain Exp. Date</th>
							    <th>Products</th>

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
									<td><?= $k->service_name ?></td>
									<td><?= $k->client_name ?></td>
									<td><?= date("d-m-Y", strtotime($k->p_date));?></td>
									<td><?= $k->years ?></td>
									<td><?= date("d-m-Y", strtotime($k->expiry_date));?></td>
										<td><?= $k->product_id ?></td>


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
