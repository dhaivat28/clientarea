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

		'add_domain'	=> [
									[
										'field'=>'cname',
										'label'=>'cd_name',
										'rules'=>'required|trim'
									],
									[
										'field'=>'domain_field',
										'label'=>'domain',
										'rules'=>'required|trim'
									],
									[
										'field'=>'p_date',
										'label'=>'Purchase date',
										'rules'=>'required|trim'
									],
									[
										'field'=>'service_type',
										'label'=>'service_type',
										'rules'=>'required|trim'
									],
									[
										'field'=>'years',
										'label'=>'years',
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
