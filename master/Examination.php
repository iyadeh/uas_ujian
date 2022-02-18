<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//menambahkan pengondisian agar tidak bisa diakses secara langsung ketika object dibuat
if(isset($_POST['user'])){
    //untuk client
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
} else {
    //untuk admin
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
}


    class Examination
    {
        var $host;
        var $username;
        var $password;
        var $database;
        var $connect;
        var $home_page;
        var $query;
        var $data;
        var $statement;
        var $filedata;
        var $user_page;
        
        //koneksi ke database
        function __construct()
        {
            $this->host = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->database = 'ujian_database';
            $this->home_page = 'http://localhost:8080/progress/master/';
            $this->user_page = 'http://localhost:8080/progress/';
    
            $this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
    
            session_start();
        }
        function redirect($page)
        {
            header('location:'.$page.'');
            exit;
        }
        //redirect halaman admin side
        function admin_session_private()
        {
            if(!isset($_SESSION['admin_id']))
            {
                $this->redirect('login.php');
            }
        }

        function admin_session_public()
        {
            if(isset($_SESSION['admin_id']))
            {
                $this->redirect('index.php');
            }
        }

        //redirect halaman client side
        function user_session_private()
        {
            if(!isset($_SESSION['user_id']))
            {
                $this->redirect('login.php');
            }
        }
    
        function user_session_public()
        {
            if(isset($_SESSION['user_id']))
            {
                $this->redirect('index.php');
            }
        }

        //cek ke database
        
        function execute_query()
        {
            //prepare() untuk menyiapkan query untuk dijalankan
            $this->statement = $this->connect->prepare($this->query);
            //execute() untuk menjalankan query
            $this->statement->execute($this->data);
        }

        function total_row()
        {
            $this->execute_query();
            //rowCount() menghitung jumlah baris yang dikembalikan oleh query dengan memastikan apakah data ada pada tabel database
            return $this->statement->rowCount();
        }

        function query_result()
        {
            $this->execute_query();
            //fetchAll() mengembalikan seluruh baris dalam bentuk array
            return $this->statement->fetchAll();
        }

        function clean_data($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //fungsi untuk membandingkan waktu ujian dan waktu sekarang
        function Is_exam_is_not_started($online_exam_id)
        {
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    
            $exam_datetime = '';
    
            $this->query = "
            SELECT online_exam_datetime FROM ujian 
            WHERE online_exam_id = '$online_exam_id'
            ";
    
            $result = $this->query_result();
    
            foreach($result as $row)
            {
                $exam_datetime = $row['online_exam_datetime'];
            }
            //apabila watu ujian setelah waktu sekarang maka ujian belum dimulai dan akan mengembalikan nilai false
            if($exam_datetime > $current_datetime)
            {
                return true;
            }
            return false;
        }

        //menentukan apakah ujian masih dapat ditambahkan pertanyaan atau pertanyaan sudah mencapai limit
        function Is_allowed_add_question($exam_id)
        {
            $exam_question_limit = $this->Get_exam_question_limit($exam_id);
    
            $exam_total_question = $this->Get_exam_total_question($exam_id);
    
            if($exam_total_question >= $exam_question_limit)
            {
                return false;
            }
            return true;
        }

        //mengambil jumlah pertanyaan yang diinputkan oleh admin ketika membuat ujian
        function Get_exam_question_limit($exam_id)
        {
            $this->query = "
            SELECT total_question FROM ujian 
            WHERE online_exam_id = '$exam_id'
            ";
    
            $result = $this->query_result();
    
            foreach($result as $row)
            {
                return $row['total_question'];
            }
        }
        //mengambil jumlah pertanyaan yang diinputkan oleh admin sampai sekarang
        function Get_exam_total_question($exam_id)
        {
            $this->query = "
            SELECT question_id FROM pertanyaan 
            WHERE online_exam_id = '$exam_id'
            ";
    
            return $this->total_row();
        }


        function execute_question_with_last_id()
        {
            $this->statement = $this->connect->prepare($this->query);
    
            $this->statement->execute($this->data);
    
            return $this->connect->lastInsertId();
        }

        //mengirimkan email 
        function send_email($receiver_email, $subject, $body)
        {
	
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'prayogarga@gmail.com';                     //SMTP username
                $mail->Password   = 'gmnmpsfrydduvmkv';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                $mail->setFrom('prayogarga@gmail.com', 'Arga Prayoga');           
                $mail->addAddress($receiver_email);
                $mail->addAddress($receiver_email, '');

                // //Content
                $mail->isHTML(true);                                  
                $mail->Subject = $subject;
                $mail->Body    = $body;

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                                    
        }

        //upload foto profile ke database
        function Upload_file()
        {
            if(!empty($this->filedata['name']))
            {
                $extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);
    
                $new_name = uniqid() . '.' . $extension;
    
                $_source_path = $this->filedata['tmp_name'];

                //gambar profil dari peserta akan disimpan dalam folder profil
                $target_path = 'profil/' . $new_name;
    
                move_uploaded_file($_source_path, $target_path);
    
                return $new_name;
            }
        }
        
        //mengubah status ujian
        function Change_exam_status($user_id)
        {
            $this->query = "
            SELECT * FROM peserta_ujian 
            INNER JOIN ujian 
            ON ujian.online_exam_id = peserta_ujian.exam_id 
            WHERE peserta_ujian.user_id = '".$user_id."'
            ";
    
            $result = $this->query_result();
    
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    
            foreach($result as $row)
            {
                $exam_start_time = $row["online_exam_datetime"];
    
                $duration = $row["online_exam_duration"] . ' minute';
    
                $exam_end_time = strtotime($exam_start_time . '+' . $duration);
    
                $exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
    
                $view_exam = '';
    
                if($current_datetime >= $exam_start_time && $current_datetime <= $exam_end_time)
                {
                    $this->data = array(
                        ':online_exam_status'	=>	'Started'
                    );
    
                    $this->query = "
                    UPDATE ujian 
                    SET online_exam_status = :online_exam_status 
                    WHERE online_exam_id = '".$row['online_exam_id']."'
                    ";
    
                    $this->execute_query();
                }
                else
                {
                    if($current_datetime > $exam_end_time)
                    {
                        $this->data = array(
                            ':online_exam_status'	=>	'Completed'
                        );
    
                        $this->query = "
                        UPDATE ujian 
                        SET online_exam_status = :online_exam_status 
                        WHERE online_exam_id = '".$row['online_exam_id']."'
                        ";
    
                        $this->execute_query();
                    }					
                }
            }
        }

        //memastikan apakah user sudah membuat datar ujian atau belum
        function If_user_already_enroll_exam($exam_id, $user_id)
        {
            $this->query = "
            SELECT * FROM peserta_ujian 
            WHERE exam_id = '$exam_id' 
            AND user_id = '$user_id'
            ";
            if($this->total_row() > 0)
            {
                return true;
            }
            return false;
        }

        function Fill_exam_list()
        {
            $this->query = "
            SELECT online_exam_id, online_exam_title 
                FROM ujian 
                WHERE online_exam_status = 'Created' OR online_exam_status = 'Pending' 
                ORDER BY online_exam_title ASC
            ";
            $result = $this->query_result();
            $output = '';
            foreach($result as $row)
            {
                $output .= '<option value="'.$row["online_exam_id"].'">'.$row["online_exam_title"].'</option>';
            }
            return $output;
        }

        function Get_exam_id($exam_code)
        {
            $this->query = "
            SELECT online_exam_id FROM ujian 
            WHERE online_exam_code = '$exam_code'
            ";
    
            $result = $this->query_result();
    
            foreach($result as $row)
            {
                return $row['online_exam_id'];
            }
        }

        //cek status ujian
        function Get_exam_status($exam_id)
        {
            $this->query = "
            SELECT online_exam_status FROM ujian 
            WHERE online_exam_id = '".$exam_id."' 
            ";
            $result = $this->query_result();
            foreach($result as $row)
            {
                return $row["online_exam_status"];
            }
        }
        
        //cek status peserta
        function Get_user_exam_status($exam_id, $user_id)
        {
            $this->query = "
            SELECT attendance_status 
            FROM peserta_ujian 
            WHERE exam_id = '$exam_id' 
            AND user_id = '$user_id'
            ";
            $result = $this->query_result();
            foreach($result as $row)
            {
                return $row["attendance_status"];
            }
        }
    }
    
?>
