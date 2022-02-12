<?php

$_POST['user'] = true;

include('master/Examination.php');

$exam = new Examination;

$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

//menerima data dari page user
if(isset($_POST['page']))
{
	
	if($_POST['page'] == 'register')
	{
		if($_POST['action'] == 'check_email')
		{
			$exam->query = "
			SELECT * FROM peserta 
			WHERE user_email_address = '".trim($_POST["email"])."'
			";

			$total_row = $exam->total_row();

			if($total_row == 0)
			{
				$output = array(
					'success'		=>	true
				);
				echo json_encode($output);
			}
		}

		if($_POST['action'] == 'register')
		{
			$user_verfication_code = md5(rand());

			$receiver_email = $_POST['user_email_address'];

			$exam->filedata = $_FILES['user_image'];

			$user_image = $exam->Upload_file();

			$exam->data = array(
				':user_email_address'	=>	$receiver_email,
				':user_password'		=>	password_hash($_POST['user_password'], PASSWORD_DEFAULT),
				':user_verfication_code'=>	$user_verfication_code,
				':user_name'			=>	$_POST['user_name'],
				':user_gender'			=>	$_POST['user_gender'],
				':user_address'			=>	$_POST['user_address'],
				':user_mobile_no'		=>	$_POST['user_mobile_no'],
				':user_image'			=>	$user_image,
				':user_created_on'		=>	$current_datetime
			);

			$exam->query = "
			INSERT INTO peserta 
			(user_email_address, user_password, user_verfication_code, user_name, user_gender, user_address, user_mobile_no, user_image, user_created_on)
			VALUES 
			(:user_email_address, :user_password, :user_verfication_code, :user_name, :user_gender, :user_address, :user_mobile_no, :user_image, :user_created_on)
			";

			$exam->execute_query();

			$subject= 'Online Examination Registration Verification';

			$body = '
			<p>Thank you for registering.</p>
			<p>This is a verification eMail, please click the link to verify your eMail address by clicking this <a href="'.$exam->home_page.'verify_email.php?type=user&code='.$user_verfication_code.'" target="_blank"><b>link</b></a>.</p>
			<p>In case if you have any difficulty please eMail us.</p>
			<p>Thank you,</p>
			<p>Online Examination System</p>
			';

			$exam->send_email($receiver_email, $subject, $body);

			$output = array(
				'success'		=>	true
			);

			echo json_encode($output);
		}
	}

	if($_POST['page'] == 'login')
	{
		if($_POST['action'] == 'login')
		{
			$exam->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$exam->query = "
			SELECT * FROM peserta 
			WHERE user_email_address = :user_email_address
			";

			$total_row = $exam->total_row();

			if($total_row > 0)
			{
				$result = $exam->query_result();

				foreach($result as $row)
				{
					if($row['user_email_verified'] == 'yes')
					{
						if(password_verify($_POST['user_password'], $row['user_password']))
						{
							$_SESSION['user_id'] = $row['user_id'];

							$output = array(
								'success'	=>	true
							);
						}
						else
						{
							$output = array(
								'error'		=>	'Wrong Password'
							);
						}
					}
					else
					{
						$output = array(
							'error'		=>	'Your Email is not verify'
						);
					}
				}
			}
			else
			{
				$output = array(
					'error'		=>	'Wrong Email Address'
				);
			}

			echo json_encode($output);
		}
	}
	
}

?>