<?php include('admin_header.php') ?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="main-logo" width="200"  alt=""/>
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
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
				<li id="new-li" class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
				<div class="welcome-box">
					<div class="row">
						<div class="col-lg-12">
							<h7>Welcome to Altec</h7>
						</div>

						<div class="col-lg-12">
							<div class="welcome-text-box">
								<h8>Current Date : <?php echo date("d / m / Y"); ?></h8>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div><!--/.row-->

		<div class="row">

			<div class="col-lg-3">
				<div class="info-box">
					<div class="info-box-top">
						<div class="row">
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-12 info-box-blue">
										<div class="info-box-count">
											232,25
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="info-img-box med-size">
									<i class="fa fa-paperclip watermark"></i>
									</div>
								</div>
						</div>
					</div>
					<div class="info-box-bottom info-box-blue-bg">
						<div class="row">
							<div class="col-lg-6">
								<div class="info-box-title-1">
								Total Clients
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="info-box">
					<div class="info-box-top">
						<div class="row">
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-12 info-box-red">
										<div class="info-box-count">
											232,25
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="info-img-box med-size">
									<i class="fa fa-ban watermark"></i>
									</div>
								</div>
						</div>
					</div>
					<div class="info-box-bottom info-box-red-bg">
						<div class="row">
							<div class="col-lg-6">
								<div class="info-box-title-1">
								Total Clients
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="info-box">
					<div class="info-box-top">
						<div class="row">
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-12 info-box-green">
										<div class="info-box-count">
											232,25
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="info-img-box med-size">
									<i class="fa fa-unlock-alt watermark"></i>
									</div>
								</div>
						</div>
					</div>
					<div class="info-box-bottom info-box-green-bg">
						<div class="row">
							<div class="col-lg-6">
								<div class="info-box-title-1">
								Total Clients
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="info-box">
					<div class="info-box-top">
						<div class="row">
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-12 info-box-yellow">
										<div class="info-box-count">
											232,25
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="info-img-box med-size">
									<i class="fa fa-file-text-o watermark"></i>
									</div>
								</div>
						</div>
					</div>
					<div class="info-box-bottom info-box-yellow-bg">
						<div class="row">
							<div class="col-lg-6">
								<div class="info-box-title-1">
								Total Clients
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>



		</div>
	</div>	<!--/.main-->

<?php include('admin_footer.php') ?>
