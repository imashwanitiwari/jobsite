<?php 
$config =  array(
        'signup' => array(
                                array(
										'field' => 'FIRST_NAME',
										'label' => 'First Name',
										'rules' => 'required|alpha|min_length[3]'
								),
								array(
										'field' => 'LAST_NAME',
										'label' => 'Last Name',
										'rules' => 'alpha|min_length[3]',
										),
								
								array(
										'field' => 'EMAIL',
										'label' => 'Password Confirmation',
										'rules' => 'required|valid_email|min_length[5]'
								),
								array(
										'field' => 'MOBILE',
										'label' => 'Contact',
										'rules' => 'required|integer|min_length[10]|max_length[10]'
								)

						),


		'staff' => array(
							array(
									'field' => 'F_NAME',
									'label' => 'First Name',
									'rules' => 'required|alpha|min_length[3]'
							),
							array(
									'field' => 'ADDRESS',
									'label' => 'ADDRESS',
									'rules' => 'min_length[10]',
									),
									array(
										'field' => 'EMAIL',
										'label' => 'EMAIL',
										'rules' => 'required|valid_email|min_length[3]'
								),		
							
							array(
									'field' => 'USER_NAME',
									'label' => 'User Name',
									'rules' => 'required|min_length[3]'
							),
							array(
									'field' => 'PASSWORD',
									'label' => 'Password',
									'rules' => 'required|integer|min_length[4]|max_length[10]'
							)

						),
							'customer' => array(
													array(
															'field' => 'FIRST_NAME',
															'label' => 'First Name',
															'rules' => 'required|alpha|min_length[3]'
													),
													array(
															'field' => 'ADDRESS',
															'label' => 'ADDRESS',
															'rules' => 'required|min_length[10]',
															),
													array(
																'field' => 'MOBILE',
																'label' => 'Mobile Number',
																'rules' => 'required|max_length[10]'
														),	
													array(
																'field' => 'EMAIL',
																'label' => 'EMAIL',
																'rules' => 'required|valid_email'
														),		
													
													array(
															'field' => 'USER_NAME',
															'label' => 'User Name',
															'rules' => 'required|min_length[3]|alpha_numeric'
													),
													array(
															'field' => 'PASSWORD',
															'label' => 'Password',
															'rules' => 'required|alpha_numeric|min_length[4]|max_length[10]'
													),
													/*  array(
														'field' => 'PAN',
														'label' => 'PAN Number',
														'rules' => 'alpha_numeric|min_length[10]'
													),

													array(
														'field' => 'ADHAR',
														'label' => 'ADHAR Number',
														'rules' => 'min_length[12]'
													) ,
													
	                                                array(
														'field' => 'GST',
														'label' => 'GST Number',
														'rules' => 'alpha_numeric|min_length[15]'
													) */

													),




													'normal_form' => array(
														array(
																						'field' => 'NAME',
																						'label' => 'Name',
																						'rules' => 'required|min_length[3]'
																				),
																				array(
																						'field' => 'FIRM_NAME',
																						'label' => 'Firm Name',
																						'rules' => 'required|is_unique[broadcaster.FIRM_NAME]|min_length[3]',
																						),
																				
																				array(
																						'field' => 'EMAIL',
																						'label' => 'Email',
																						'rules' => 'required|valid_email|min_length[5]'
																				),
																				array(
																						'field' => 'MOBILE',
																						'label' => 'Mobile',
																						'rules' => 'required|integer|min_length[10]|max_length[10]'
																				),
																				array(
																					'field' => 'ALT_MOBILE',
																					'label' => 'Alternate Mobile',
																					'rules' => 'integer|min_length[10]|max_length[10]'
																				),
																				array(
																					'field' => 'PHONE',
																					'label' => 'Phone',
																					'rules' => 'integer|min_length[6]|max_length[12]'
																				),
																				array(
																					'field' => 'PAN',
																					'label' => 'PAN Card No.',
																					'rules' => 'alpha_numeric|min_length[10]|is_unique[broadcaster.PAN]|max_length[10]'
																				),
																				array(
																					'field' => 'GST',
																					'label' => 'GSTIN',
																					'rules' => 'alpha_numeric|is_unique[broadcaster.GST]|min_length[15]|max_length[15]'
																				),
																				array(
																					'field' => 'ADHAR',
																					'label' => 'Aadhar',
																					'rules' => 'integer|min_length[12]|is_unique[broadcaster.ADHAR]|max_length[12]'
																				),
																				array(
																					'field' => 'ADDRESS',
																					'label' => 'Street',
																					'rules' => 'min_length[3]'
																				),
																				array(
																					'field' => 'PINCODE',
																					'label' => 'Post Code',
																					'rules' => 'required|integer|min_length[6]|max_length[6]'
																				),
																				array(
																					'field' => 'USER_NAME',
																					'label' => 'Username',
																					'rules' => 'required|is_unique[broadcaster.USER_NAME]|min_length[6]|max_length[30]'
																				),
																				array(
																					'field' => 'PASSWORD',
																					'label' => 'Password',
																					'rules' => 'required|alpha_numeric|min_length[6]|max_length[15]'
																				),
																				array(
																					'field' => 'PASSCONF',
																					'label' => ' ',
																					'rules' => 'required|matches[PASSWORD]'
																				)
												
												),
										
												'mso_form' => array(
																			array(
																					'field' => 'FIRST_NAME',
																					'label' => 'Middle Name',
																					'rules' => 'required|min_length[3]'
																			),
																			array(
																				'field' => 'MIDDLE_NAME',
																				'label' => 'Middle Name',
																				'rules' => 'min_length[3]'
																			),
																			array(
																				'field' => 'LAST_NAME',
																				'label' => 'Last Name',
																				'rules' => 'min_length[3]'
																			),
																			array(
																					'field' => 'FIRM_NAME',
																					'label' => 'Firm Name',
																					'rules' => 'required|is_unique[mso.FIRM_NAME]|min_length[3]',
																					),
																			
																			array(
																					'field' => 'EMAIL',
																					'label' => 'Email',
																					'rules' => 'required|valid_email|min_length[5]'
																			),
																			array(
																					'field' => 'MOBILE',
																					'label' => 'Mobile',
																					'rules' => 'required|integer|min_length[10]|max_length[10]'
																			),
																			array(
																				'field' => 'ALT_MOBILE',
																				'label' => 'Alternate Mobile',
																				'rules' => 'integer|min_length[10]|max_length[10]'
																			),
																			array(
																				'field' => 'PHONE',
																				'label' => 'Phone',
																				'rules' => 'integer|min_length[6]|max_length[12]'
																			),
																			array(
																				'field' => 'PAN',
																				'label' => 'PAN Card No.',
																				'rules' => 'alpha_numeric|min_length[10]|is_unique[broadcaster.PAN]|max_length[10]'
																			),
																			array(
																				'field' => 'GST',
																				'label' => 'GSTIN',
																				'rules' => 'alpha_numeric|is_unique[broadcaster.GST]|min_length[15]|max_length[15]'
																			),
																			array(
																				'field' => 'ADHAR',
																				'label' => 'Aadhar',
																				'rules' => 'integer|min_length[12]|is_unique[broadcaster.ADHAR]|max_length[12]'
																			),
																			array(
																				'field' => 'ADDRESS',
																				'label' => 'Street',
																				'rules' => 'min_length[3]'
																			),
																			array(
																				'field' => 'PINCODE',
																				'label' => 'Post Code',
																				'rules' => 'required|integer|min_length[6]|max_length[6]'
																			),
																			array(
																				'field' => 'USER_NAME',
																				'label' => 'Username',
																				'rules' => 'required|is_unique[broadcaster.USER_NAME]|min_length[6]|max_length[30]'
																			),
																			array(
																				'field' => 'PASSWORD',
																				'label' => 'Password',
																				'rules' => 'required|alpha_numeric|min_length[6]|max_length[15]'
																			),
																			array(
																				'field' => 'PASSCONF',
																				'label' => ' ',
																				'rules' => 'required|matches[PASSWORD]'
																			)
											
																),
										
										
												'add_company' => array(
													array(
																					'field' => 'NAME',
																					'label' => 'Company',
																					'rules' => 'required|is_unique[companies.NAME]|min_length[3]'
																			),
																		
																			array(
																				'field' => 'GST',
																				'label' => 'GSTIN',
																				'rules' => 'alpha_numeric|is_unique[companies.GST]|min_length[15]|max_length[15]'
																			),
																			array(
																				'field' => 'ADHAR',
																				'label' => 'Aadhar',
																				'rules' => 'integer|is_unique[companies.ADHAR]|min_length[12]|max_length[12]'
																			)
											
																),
												'add_vc' => array(
															array(
															'field' => 'VC_NO',
															'label' => 'VC No.',
															'rules' => 'integer|required|is_unique[company_vc.VC_NO]|min_length[3]'
															)
										
																),
													
												'channel_type' => array(
													array(
																				  'field' => 'NAME',
																				  'label' => 'Channel Type',
																				  'rules' => 'required|is_unique[channel_types.NAME]'
																		  )
																		 
										  
													),
												'add_service' => array(
													array(
																					'field' => 'NAME',
																					'label' => 'Service Type',
																					'rules' => 'required|is_unique[services.NAME]'
																			)
																			
											
													),
													'channel_company' => array(
														array(
																						'field' => 'NAME',
																						'label' => 'Channel Company',
																						'rules' => 'required|is_unique[channel_companies.NAME]'
																				)
																				
												
														),
													'channel_category' => array(
														array(
																						'field' => 'NAME',
																						'label' => 'Channel Category',
																						'rules' => 'required|is_unique[channel_categories.NAME]'
																				)
																				
												
														),
														'stbox' => array(
															array(
																							'field' => 'BOX_NO',
																							'label' => 'Set Top Box',
																							'rules' => 'required|is_unique[company_stb.BOX_NO]'
															),
															array(
																							'field' => 'VC_NO',
																							'label' => 'VC No',
																							'rules' => 'required|is_unique[company_vc.VC_NO]'
														)
														
																					
													
															),
														'box_type' => array(
															array(
																							'field' => 'BOX_TYPE',
																							'label' => 'Box Type',
																							'rules' => 'required|is_unique[box_type.BOX_TYPE]'
																					)
																					
													
															)

                );
    ?>