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
