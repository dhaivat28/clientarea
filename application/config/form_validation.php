<?php

$config = [

		'admin_login'	=> [
									[
										'field'=>'email',
										'label'=>'Email',
										'rules'=>'required|trim|valid_email'
									],

									[
										'field'=>'password',
										'label'=>'password',
										'rules'=>'required'
									]
								],

		'filter_sale_date'	=> [
									[
										'field'=>'start_date',
										'label'=>'start_date',
										'rules'=>'required'
									],

									[
										'field'=>'end_date',
										'label'=>'end_date',
										'rules'=>'required'
									]
								],

		'filter_sale_month'	=> [
									[
										'field'=>'month',
										'label'=>'month',
										'rules'=>'required'
									],

									[
										'field'=>'year',
										'label'=>'year',
										'rules'=>'required'
									]
								],

		'add_payment'	=> [
									[
										'field'=>'amount_pay',
										'label'=>'amount_pay',
										'rules'=>'required|trim|greater_than[0]'
									],

									[
										'field'=>'p_method',
										'label'=>'p_method',
										'rules'=>'required|trim'
									]
								],


		'add_service'	=> [
									[
										'field'=>'client_id',
										'label'=>'client_id',
										'rules'=>'required|trim'
									],
									[
										'field'=>'service_name',
										'label'=>'service_name',
										'rules'=>'required|trim'
									],
									[
										'field'=>'p_date',
										'label'=>'p_date',
										'rules'=>'required|trim'
									],

									[
										'field'=>'product_id',
										'label'=>'product_id',
										'rules'=>'required|trim'
									],
									[
										'field'=>'years',
										'label'=>'years',
										'rules'=>'required|trim'
									]

								],

		'add_product'	=> [
									[
										'field'=>'product_name',
										'label'=>'product_name',
										'rules'=>'required|trim'
									],
									[
										'field'=>'product_mrp',
										'label'=>'product_mrp',
										'rules'=>'required|trim|numeric'
									],

									[
										'field'=>'profit',
										'label'=>'profit',
										'rules'=>'required|trim|numeric'
									]

								],

		'add_client'	=> [
									[
										'field'=>'cname',
										'label'=>'Full name',
										'rules'=>'required|trim'
									],

									[
										'field'=>'email',
										'label'=>'Email',
										'rules'=>'required|valid_email|trim'
									],

									[
										'field'=>'mobile',
										'label'=>'mobile',
										'rules'=>'required|trim|exact_length[10]'
									],

						]




];

?>
