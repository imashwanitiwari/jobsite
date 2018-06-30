<?php
    class MY_Controller extends CI_Controller
        {
            public function __construct()
                {
                    parent::__construct();
					if(!$this->session->has_userdata('dcn_signed_in'))
						{
							return redirect('home');
						}
                }
        }
?>