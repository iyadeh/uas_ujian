<!DOCTYPE html>
<html lang="en" style="height: 1073px;">

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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.js"></script>
</head>

<body class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center" style="background: url(&quot;assets/img/peserta_bg.png?h=f7b1bbb9631751695e2d2b0d0bf58a9e&quot;) center / cover no-repeat;height: 832px;">
    <!-- Start: 2 Rows 1+1 Columns -->
    <div class="container" style="border-radius: 14px;background: rgba(255,255,255,0.25);height: 793.797px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: rgba(255,255,255,0);">
                    <div class="container"><a class="navbar-brand" href="#" style="color: rgb(193,197,212);">UJIANKU</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php" style="color: rgb(193,197,212);">Daftar Ujian</a></li>
                                <li class="nav-item"><a class="nav-link" href="profil.php" style="color: rgb(193,197,212);">Profil</a></li>
                            </ul><span class="navbar-text actions"> <a class="login" href="#"></a><a class="btn btn-light shadow action-button" role="button" href="logout.php" style="background: rgb(11,12,58);">Keluar</a></span>
                        </div>
                    </div>
                </nav><!-- End: Navigation with Button -->
            </div>
        </div>
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 587.797px;">
            <div class="col-md-12 d-flex d-sm-flex d-xl-flex justify-content-center align-items-start justify-content-sm-center align-items-sm-start align-items-lg-start justify-content-xl-center align-items-xl-start align-items-xxl-start" style="height: 693.797px;">
                <div class="card" style="background: rgba(255,255,255,0.4);margin: 7px;border-radius: 18px;">
                    <div class="card-header">
                        <nav class="navbar navbar-light navbar-expand-md">
                            <div class="container-fluid"><a class="navbar-brand" href="#">Daftar ujian yang sudah terdaftar</a></div>
                        </nav>
                    </div>
                    <div class="card-body d-flex" style="margin: 17px;">
                        <div class="table-responsive" style="width: 1298px;">
                            <table class="table table-striped table-borderless" id="exam_data_table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Ujian</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Durasi</th>
                                        <th class="text-center">Jumlah Pertanyaan</th>
                                        <th class="text-center">Benar</th>
                                        <th class="text-center">Salah</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
