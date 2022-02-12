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

<body style="background: url(&quot;assets/img/peserta_bg_blur.png?h=36200ad1c9f45aae9eefbcaebd0c9916&quot;) center / cover no-repeat;height: 1080px;padding: 0px;padding-top: 217px;">
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="background: rgba(241,247,252,0);padding: 0px;">
        <!-- Start: Form Container -->
        <div class="form-container" style="border-radius: 12px;height: 539px;">
            <!-- Start: Image -->
            <div class="image-holder" style="background: url(&quot;assets/img/peserta_bg.png?h=f7b1bbb9631751695e2d2b0d0bf58a9e&quot;) center / cover no-repeat;"></div><!-- End: Image -->
            <form method="post" id="user_register_form" style="background: rgba(255,255,255,0.16);">
                <h2 class="text-center" style="color: rgb(19,16,44);"><strong>REGISTER</strong></h2>
                <div class="mb-3 form-group">
                    <input class="placeholder border rounded form-control" type="email" id="user_email_address" name="user_email_address" placeholder="Email" data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail  data-parsley-checkemail-message="Email sudah ada">
                </div>
                <div class="mb-3 form-group"><input class="placeholder border rounded form-control" type="password" id="user_password" name="user_password" placeholder="Password"></div>
                <div class="mb-3 form-group"><input class="placeholder border rounded form-control" type="password" id="confirm_user_password" name="confirm_user_password" placeholder="Password (repeat)"></div>
                <div><input class="placeholder border rounded form-control" type="text" id="user_name" name="user_name" placeholder="Username" style="margin-bottom: 12px;"></div>
                <div class="d-xxl-flex justify-content-xxl-center mb-3"><select class="placeholder bg-light border rounded form-select" id="user_gender" name="user_gender" style="color: rgb(121,113,132);padding-left: 18px;">
                        <option value="Male" selected="">Male</option>
                        <option value="Female">Female</option>
                    </select></div>
                <div class="mb-3 form-group"><input class="placeholder border rounded form-control" type="text" id="user_address" name="user_address" placeholder="Address"></div>
                <div class="mb-3 form-group"><input class="placeholder border rounded form-control" type="tel" id="user_mobile_no" name="user_mobile_no" placeholder="Telephone"></div>
                <div><label class="form-label text-light d-xl-flex justify-content-xl-center" for="user_image">Foto Profil</label><input class="shadow form-control" type="file" id="user_image" style="background: rgb(161,162,175);border-radius: 4px;" name="user_image"></div>
                <div class="mb-3 form-group">
                    <input type="hidden" name='page' value='register' />
                    <input type="hidden" name="action" value="register" />
                    <button class="btn btn-primary d-block w-100" name="user_register" id="user_register" type="submit" style="background: rgb(19,16,44);">Sign Up</button>
                </div>
                <a class="already" href="login.php">You already have an account? Login here.</a>
            </form>
        </div><!-- End: Form Container -->
    </section><!-- End: Registration Form with Photo -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=334b48fb223084a2659075094c4d7507"></script>
</body>

</html>
