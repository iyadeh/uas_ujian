<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
  

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
        
        //koneksi ke database
        function __construct()
        {
            $this->host = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->database = 'ujian_database';
            $this->home_page = 'http://localhost:8080/progress/master/';
    
            $this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
    
            session_start();
        }

        //redirect halaman
        function redirect($page)
        {
            header('location:'.$page.'');
            exit;
        }
        
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
            //rowCount() menghitung jumlah baris yang dikembalikan oleh query
            return $this->statement->rowCount();
        }

        function query_result()
        {
            $this->execute_query();
            //fetchAll() mengembalikan seluruh baris dalam bentuk array
            return $this->statement->fetchAll();
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
    }
    
?>