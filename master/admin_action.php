<?php

include('Examination.php');

$exam = new Examination;

$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
    if($_POST['page'] == 'register')
	{
		if($_POST['action'] == 'check_email')
		{
			$exam->query = "
			SELECT * FROM admin 
			WHERE admin_email_address = '".trim($_POST["email"])."'
			";

			$total_row = $exam->total_row();

			if($total_row == 0)
			{
				$output = array(
					'success'	=>	true
				);

				echo json_encode($output);
			}
		}

		if($_POST['action'] == 'register')
		{
			$admin_verification_code = md5(rand());

			$receiver_email = $_POST['admin_email_address'];

			$exam->data = array(
				':admin_email_address'		=>	$receiver_email,
				':admin_password'			=>	password_hash($_POST['admin_password'], PASSWORD_DEFAULT),
				':admin_verfication_code'	=>	$admin_verification_code,
				':admin_type'				=>	'sub_master', 
				':admin_created_on'			=>	$current_datetime
			);

			$exam->query = "
			INSERT INTO admin 
			(admin_email_address, admin_password, admin_verfication_code, admin_type, admin_created_on) 
			VALUES 
			(:admin_email_address, :admin_password, :admin_verfication_code, :admin_type, :admin_created_on)
			";

			$exam->execute_query();

			$subject = 'Verifikasi Akun Admin Ujian';

			$body = '
			<h1>Selamat akunmu sudah terdaftar.</h1>
			<p>Klik tautan ini untuk verifikasi <a href="'.$exam->home_page.'admin_action.php?type=master&code='.$admin_verification_code.'" target="_blank"><b>gaskan ujian</b></a>.</p>
			<p>Terim kasih</p>
			';

			$exam->send_email($receiver_email, $subject, $body);

			$output = array(
				'success'	=>	true
			);

			echo json_encode($output);
		}
	}

    if($_POST['page'] == 'login')
	{
		if($_POST['action'] == 'login')
		{
			$exam->data = array(
				':admin_email_address'	=>	$_POST['admin_email_address']
			);

			$exam->query = "
			SELECT * FROM admin
			WHERE admin_email_address = :admin_email_address
			";

			$total_row = $exam->total_row();

			if($total_row > 0)
			{
				$result = $exam->query_result();

				foreach($result as $row)
				{
					if($row['email_verified'] == 'yes')
					{
						if(password_verify($_POST['admin_password'], $row['admin_password']))
						{
							$_SESSION['admin_id'] = $row['admin_id'];
							$output = array(
								'success'	=>	true
							);
						}
						else
						{
							$output = array(
								'error'	=>	'Password salah'
							);
						}
					}
					else
					{
						$output = array(
							'error'		=>	'Email belum diverfikasi'
						);
					}
				}
			}
			else
			{
				$output = array(
					'error'		=>	'Alamat email salah'
				);
			}
			echo json_encode($output);
		}

	}

}

//verifikasi email
if(isset($_GET['type'], $_GET['code']))
{
	if($_GET['type'] == 'master')
	{
		$exam->data = array(
			':email_verified'		=>	'yes'
		);

		$exam->query = "
		UPDATE admin 
		SET email_verified = :email_verified 
		WHERE admin_verfication_code = '".$_GET['code']."'
		";

		$exam->execute_query();

		$exam->redirect('login.php?verified=success');
	}
}