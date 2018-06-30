<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {

	
	public function index()
	
	{   
       	 $data['page_title'] = 'DCNTV - Reset Password';
         $this->load->view('forgot_password',$data);
	}
	public function mob()
	{
		
		$table=$this->input->post('table');
		unset($_POST['table']);
		$array=$this->input->post();
		$this->load->model('where');
		if($this->input->post())
			{
					$mobile = $this->where->check_where($table,$array);
					if($mobile)
					{
						$otp = rand(111763,999987);
						$mob=$this->input->post('MOBILE');
						$this->session->set_userdata('otp_for_password',$otp);
						$this->session->set_userdata('mobile_for_password',$mob);
						$this->session->set_userdata('mob_for_otp',$mob);
						$this->session->set_flashdata('mob',TRUE);
						$mobile=$mob;

						$message="Your DCNTV Forgot Password OTP is ".$otp." .Please do not disclose OTP to anybody";
					
						$username=urlencode("rohit123456");
						$password=urlencode("rohit123456");
						$sender=urlencode("DCNCTV");
						$message=urlencode($message);
									$parameters="username=".$username."&password=".$password."&mobile=".$mobile."&sendername=".$sender."&message=".$message;

						$url="http://priority.muzztech.in/sms_api/sendsms.php";

						$ch = curl_init($url);
						
								curl_setopt($ch, CURLOPT_POST,1);
							curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);


						curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
						curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
						echo	$return_val = curl_exec($ch);
						
						return redirect('forgot_password');
					}
					else
					{
						$this->session->set_flashdata('mob_invalid',"Sorry! This mobile number is not macthing with our database. Please fill a register Mobile No.");
						return redirect('forgot_password');
					}
			}
		
	}
	public function verify_otp()
	{
		$otp=$this->session->userdata('otp_for_password');
		$otp_to_check=$this->input->post('otp');
		if($otp == $otp_to_check)
		{
			$this->session->set_flashdata('otp',true);
			return redirect('forgot_password');
		}
		else
		{
			$this->session->set_flashdata('mob',TRUE);
			$this->session->set_flashdata('otp_invalid',"The number that you've entered doesn't match your code. Please try again.");
			return redirect('forgot_password');
		}
	}
	public function resend_otp()
	{
		$otp=$this->session->userdata('otp_for_password');
		$mob=$this->session->userdata('mobile_for_password');
		$this->session->set_flashdata('mob',TRUE);
		$mobile=$mob;

						$message="Your DCNTV Forgot Password OTP is ".$otp." .Please do not disclose OTP to anybody";
					
						$username=urlencode("rohit123456");
						$password=urlencode("rohit123456");
						$sender=urlencode("DCNCTV");
						$message=urlencode($message);
									$parameters="username=".$username."&password=".$password."&mobile=".$mobile."&sendername=".$sender."&message=".$message;

						$url="http://priority.muzztech.in/sms_api/sendsms.php";

						$ch = curl_init($url);
						
								curl_setopt($ch, CURLOPT_POST,1);
							curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);


						curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
						curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
						echo	$return_val = curl_exec($ch);
						
		return redirect('forgot_password');
	}
}