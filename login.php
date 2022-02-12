<!DOCTYPE html>

<?php

$_POST['user']=true;
include('master/Examination.php');
$exam = new Examination;
$exam->user_session_public();
 
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alumni+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=afd71d53af4af9deb59ab7881120ba9e">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 843px;background: url(&quot;assets/img/peserta_bg.png?h=f7b1bbb9631751695e2d2b0d0bf58a9e&quot;) center / cover no-repeat;min-height: 715px;">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="d-flex d-sm-flex d-lg-flex flex-row flex-grow-1 flex-shrink-1 justify-content-center align-items-center justify-content-sm-center justify-content-lg-center align-items-lg-center">
            <form class="shadow-lg" id="user_login_form" style="border-radius: 17px;background: rgba(13,28,95,0.33);width: 409px;height: 439px;padding: 49px;" method="post">
                <div class="d-flex justify-content-center align-items-center form-group" style="margin: 46px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none" class="d-lg-flex" style="transform: scale(3.23);color: #b591d1;">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1.94446C7.91528 3.81033 5.17437 4.95809 2.16611 4.99891C2.05686 5.64968 2 6.31821 2 7.00003C2 12.2249 5.33923 16.6698 10 18.3172C14.6608 16.6698 18 12.2249 18 7.00003C18 6.31821 17.9431 5.64968 17.8339 4.99891C14.8256 4.95809 12.0847 3.81033 10 1.94446ZM11 14C11 14.5523 10.5523 15 10 15C9.44771 15 9 14.5523 9 14C9 13.4477 9.44771 13 10 13C10.5523 13 11 13.4477 11 14ZM11 7C11 6.44772 10.5523 6 10 6C9.44771 6 9 6.44772 9 7V10C9 10.5523 9.44771 11 10 11C10.5523 11 11 10.5523 11 10V7Z" fill="currentColor"></path>
                    </svg></div>
                <div class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center form-group" style="height: 55px;width: 327px;"><i class="fa fa-envelope" style="transform: scale(1.47);margin: 5px;color: #b591d1;"></i><input class="placeholder shadow form-control" type="email" id="user_email_address" style="margin: 15px;margin-top: 22px;color: rgb(53,24,91);" name="user_email_address" placeholder="Email"></div>
                <div class="d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center form-group" style="width: 327px;height: 55px;"><i class="fa fa-lock" style="transform: scale(1.47);margin: 5px;margin-left: 11px;color: #9e91c6;"></i><input class="placeholder shadow form-control" type="password" id="user_password" style="margin: 15px;margin-top: 22px;background: rgb(34,20,69);" name="user_password" placeholder="Password"></div>
                <div class="d-flex justify-content-center align-items-center form-group" style="margin-top: 22px;">
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login" />
                    <button class="btn btn-primary shadow d-xxl-flex justify-content-xxl-center align-items-xxl-center" id="user_login" type="submit" style="margin: 10px;background: #b591d1;border-radius: 11px;border-color: rgba(255,255,255,0);" name="user_login">Login</button>
                </div>
                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center align-items-xxl-center"><a href="register.php" style="color: #444f51;">Register</a></div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=334b48fb223084a2659075094c4d7507"></script>
</body>

</html>
