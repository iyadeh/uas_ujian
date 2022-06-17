<?php

$_POST['user']=true;
include('master/Examination.php');
$exam = new Examination;
$exam->user_session_private();
 
?>

<!DOCTYPE html>
<html lang="en" style="height: 1073px;">

// Path: index.php
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alumni+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=f48f749d5f1033436d1965c971a43629">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/parsley.js"></script>
    <script src="user_script/index_script.js"></script>
</head>

<body class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center" style="background: url(&quot;assets/img/peserta_bg.png?h=f7b1bbb9631751695e2d2b0d0bf58a9e&quot;) center / cover no-repeat;height: 832px;">
    <!-- Start: 2 Rows 1+1 Columns -->
    <div class="container" style="border-radius: 14px;background: rgba(255,255,255,0.25);height: 793.797px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: rgba(255,255,255,0);">
                    <div class="container"><a class="navbar-brand" href="#" style="color: rgb(193,197,212);">DAFTAR UJIAN</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link" href="ujianku.php" style="color: rgb(193,197,212);">Ujianku</a></li>
                                <li class="nav-item"><a class="nav-link" href="profil.php" style="color: rgb(193,197,212);">Profil</a></li>
                            </ul><span class="navbar-text actions"> <a class="login" href="#"></a><a class="btn btn-light shadow action-button" role="button" href="logout.php" style="background: rgb(11,12,58);">Keluar</a></span>
                        </div>
                    </div>
                </nav><!-- End: Navigation with Button -->
            </div>
        </div>
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 587.797px;">
            <div class="col-md-12 d-flex d-sm-flex d-xl-flex justify-content-center align-items-start justify-content-sm-center align-items-sm-start align-items-lg-start justify-content-xl-center align-items-xl-start align-items-xxl-start" style="height: 693.797px;">
                <div class="card shadow-lg d-xxl-flex" style="margin-top: 53px;background: rgba(255,255,255,0.53);border-radius: 12px;">
                    <div class="card-body">
                        <h4 class="d-xxl-flex justify-content-xxl-center card-title">TANTANG DIRIMU DAN PILIH UJIANMU SEKARANG JUGA!!!</h4>
                        <div class="d-flex d-xxl-flex justify-content-center justify-content-xxl-center">
                            <select class="shadow-lg form-select-lg form-control input-lg" data-bss-hover-animate="flash" id="exam_list" style="width: 242px;height: 50px;border-radius: 17px;background: rgba(255,255,255,0.15);border-color: rgba(0,0,0,0);" name="exam_list">
                                <option value="">Pilih Ujian</option>
                                <?php
                                echo $exam->Fill_exam_list();
                                ?>
                            </select>
                        </div>
                        <div class="d-flex d-xxl-flex justify-content-center align-items-start justify-content-xxl-center" style="margin-top: 14px;margin-bottom: 14px;">
                        <span id="exam_details"></span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End: 2 Rows 1+1 Columns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=d197b728335ff717d60c7a2eafac4697"></script>
</body>

</html>
