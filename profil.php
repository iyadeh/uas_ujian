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
</head>

<body class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center" style="background: url(&quot;assets/img/peserta_bg.png?h=f7b1bbb9631751695e2d2b0d0bf58a9e&quot;) center / cover no-repeat;height: 832px;">
    <!-- Start: 2 Rows 1+1 Columns -->
    <div class="container" style="border-radius: 14px;background: rgba(255,255,255,0.25);height: 793.797px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: rgba(255,255,255,0);">
                    <div class="container"><a class="navbar-brand" href="#" style="color: rgb(193,197,212);">PROFIL</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link" href="ujianku.php" style="color: rgb(193,197,212);">Ujianku</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php" style="color: rgb(193,197,212);">Ujian</a></li>
                            </ul><span class="navbar-text actions"> <a class="login" href="#"></a><a class="btn btn-light shadow action-button" role="button" href="index_admin.html" style="background: rgb(11,12,58);">Keluar</a></span>
                        </div>
                    </div>
                </nav><!-- End: Navigation with Button -->
            </div>
        </div>
        <div class="row d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 587.797px;">
            <div class="col-md-12 d-flex d-sm-flex d-xl-flex justify-content-center align-items-start justify-content-sm-center align-items-sm-start align-items-lg-start justify-content-xl-center align-items-xl-start align-items-xxl-start" style="height: 693.797px;">
                <div class="card" style="width: 344.406px;height: 691.797px;border-radius: 21px;background: rgba(255,255,255,0.26);">
                    <div class="card-body shadow-lg" style="height: 407.797px;">
                        <h4 class="text-center card-title">Profil</h4>
                        <form id="profile_form" method="post">
                            <div>
                                <hr style="margin: 5px 0px;margin-top: 2px;margin-bottom: 2px;"><label class="form-label">Username :</label><input class="form-control" type="text" id="user_name" style="margin-bottom: 12px;" name="user_name" value="" >
                            </div>
                            <div>
                                <hr style="margin: 5px 0px;margin-top: 2px;margin-bottom: 2px;"><label class="form-label" style="margin-bottom: 0px;">Gender :</label><select class="form-select" id="user_gender" style="margin-bottom: 12px;" name="user_gender">
                                    <option value="Female" selected="">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                            <div>
                                <hr style="margin: 5px 0px;margin-top: 2px;margin-bottom: 2px;"><label class="form-label">Alamat :</label><input class="form-control" type="text" id="user_address" style="margin-bottom: 12px;" name="user_address" value= "">
                            </div>
                            <div>
                                <hr style="margin: 5px 0px;margin-top: 2px;margin-bottom: 2px;"><label class="form-label" style="margin-bottom: 0px;">Telp :</label><input class="form-control" type="tel" id="user_mobile_no" style="margin-bottom: 12px;" name="user_mobile_no" value="">
                            </div>
                            <div>
                                <hr style="margin: 5px 0px;margin-top: 2px;margin-bottom: 2px;"><label class="form-label">Gambar Profil :</label><input class="form-control" type="file" id="user_image" style="margin-bottom: 12px;" name="user_image">
                                <div class="d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center">
                                    <img id="user_image" class="rounded-circle shadow-lg" width="250" scr="" />
					                <input type="hidden" name="hidden_user_image" value="" />
                                </div>
                                <hr>
                            </div>
                            <div class="d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
                                <input type="hidden" name="page" value="profile" />
                                <input type="hidden" name="action" value="profile" />
                                <button class="btn btn-primary text-center bg-success shadow" type="submit" style="border-radius: 16px;width: 221.6719px;margin: 10px;border-color: rgba(255,255,255,0);">Simpan</button>
                            </div>
                            <div class="d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"><button class="btn btn-primary text-center bg-danger shadow" id="user_profile" type="button" style="border-radius: 16px;width: 221.6719px;border-color: rgba(255,255,255,0);" data-bs-target="#change_password" data-bs-toggle="modal" name="user_profile">Ganti Password</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End: 2 Rows 1+1 Columns -->
    <div class="modal fade shake animated" role="dialog" tabindex="-1" id="change_password">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="change_password_form" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Ganti Password</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div><label class="form-label">Passoword :&nbsp;</label><input class="form-control" type="password" id="user_password" name="user_password"></div>
                        <div><label class="form-label">Konfirmasi Password :&nbsp;</label><input class="form-control" type="password" id="confirm_user_password" name="confirm_user_password"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="page" value="profile" />
                        <input type="hidden" name="action" value="change_password" />
                        <button class="btn btn-light shadow-lg" type="button" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary bg-danger shadow-lg" id="user_password" type="submit" style="border-style: none;" name="user_password">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=334b48fb223084a2659075094c4d7507"></script>
</body>

</html>
