<!DOCTYPE html>
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
    <link rel="stylesheet" href="../assets/css/styles.min.css?h=afd71d53af4af9deb59ab7881120ba9e">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/parsley.js"></script>
    <script src="../assets/js/admin_script.js"></script>

</head>

<body style="background: url(&quot;../assets/img/admin_bg.png?h=d48309209de4b47e32bdb528503ca658&quot;) center / cover no-repeat;height: 1080px;padding: 0px;padding-top: 217px;">
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="background: rgba(241,247,252,0);padding: 0px;">
        <!-- Start: Form Container -->
        <div class="form-container" style="border-radius: 12px;height: 539px;">
            <!-- Start: Image -->
            <div class="image-holder" style="background: url(&quot;../assets/img/Purple%20Gradient%20Cyber%20Monday%20Poster.svg?h=c11cda77c35a2a73928c0cdedb818fb2&quot;) center / cover no-repeat;border-radius: 12px;"></div><!-- End: Image -->
            <form id="admin_register_form" method="post" style="background: rgba(255,255,255,0.16);border-radius: 12px;">
            <span class="text-capitalize text-center text-danger d-xl-flex justify-content-xl-center align-items-xl-center" id="message"></span>
                <h3 class="display-3 text-center" style="color: rgb(19,16,44);font-family: 'Alumni Sans', sans-serif;"><strong>REGISTER</strong></h3>
                <div class="form-group" style="margin-bottom: 11px;">
                <input class="placeholder border rounded form-control" type="text" data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail  data-parsley-checkemail-message="Email sudah ada" id="admin_email_address" name="admin_email_address" placeholder="Email"></div>
                <div class="form-group" style="margin-bottom: 11px;"><input class="placeholder border rounded form-control" type="password" id="admin_password" name="admin_password" placeholder="Password"></div>
                <div class="form-group" style="margin-bottom: 11px;"><input class="placeholder border rounded form-control" type="password" id="confirm_admin_password" name="confirm_admin_password" placeholder="Password (repeat)"></div>
                <div class="form-group" style="margin-bottom: 11px;">
                    <button class="btn btn-primary d-block w-100" id="admin_register" type="submit" style="background: rgb(158,25,214);margin: 18px 0px 0px;" name="admin_register">Sign Up</button>
                    <input type="hidden" name="page" value="register" />
                    <input type="hidden" name="action" value="register" />
                </div>
                    <a class="already" href="login.php">You already have an account? Login here.</a>
            </form>
        </div><!-- End: Form Container -->
    </section><!-- End: Registration Form with Photo -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/script.min.js?h=334b48fb223084a2659075094c4d7507"></script>
</body>

</html>
