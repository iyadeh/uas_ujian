<?php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_private();

?>

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
    <link rel="stylesheet" href="../assets/css/styles.min.css?h=afd71d53af4af9deb59ab7881120ba9e">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.css"/>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/parsley.js"></script>
    <script src="../assets/js/admin_script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.js"></script>
</head>

<body class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center" style="background: url(&quot;../assets/img/admin_bg.png?h=d48309209de4b47e32bdb528503ca658&quot;) center / cover no-repeat;height: 832px;">
    <form id="exam_form" method="post">
        <!-- Start: tambah -->
        <div class="modal fade pulse animated" role="dialog" tabindex="-1" id="formModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body" style="background: rgba(255,255,255,0.07);">
                        <div class="form-group"><input class="shadow form-control" type="text" id="online_exam_title" style="margin-bottom: 10px;" placeholder="Nama Ujian" name="online_exam_title"></div>
                        <div class="form-group"><input class="shadow form-control" id="online_exam_datetime" type="datetime-local" style="margin-bottom: 10px;" name="online_exam_datetime"></div>
                        <div class="form-group"><select class="shadow form-select" id="online_exam_duration" style="margin-bottom: 10px;" name="online_exam_duration">
                                <option value="" selected="">Durasi</option>
                                <option value="5">5 Menit</option>
                                <option value="30">30 Menit</option>
                                <option value="60">1 Jam</option>
                                <option value="120">2 Jam</option>
                                <option value="180">3 Jam</option>
                            </select></div>
                        <div class="form-group"><select class="shadow form-select" id="total_question" style="margin-bottom: 10px;" name="total_question">
                                <option value="" selected="">Jumlah pertanyaan</option>
                                <option value="5">5 Soal</option>
                                <option value="10">10 Soal</option>
                                <option value="25">25 Soal</option>
                                <option value="50">50 Soal</option>
                                <option value="100">100 Soal</option>
                                <option value="200">200 Soal</option>
                                <option value="300">300 Soal</option>
                            </select></div>
                        <div class="form-group"><select class="shadow form-select" id="marks_per_right_answer" style="margin-bottom: 10px;" name="marks_per_right_answer">
                                <option value="" selected="">Nilai untuk jawaban yang benar</option>
                                <option value="1">+1</option>
                                <option value="1.25">+1.25</option>
                                <option value="1.5">+1.50</option>
                                <option value="2">+2</option>
                                <option value="5">+5</option>
                            </select></div>
                        <div class="form-group"><select class="shadow form-select" id="marks_per_wrong_answer" style="margin-bottom: 10px;" name="marks_per_wrong_answer">
                                <option value="" selected="">Nilai untuk jawaban yang salah</option>
                                <option value="1">-1</option>
                                <option value="1.25">-1.25</option>
                                <option value="1.5">-1.50</option>
                                <option value="2">-2</option>
                            </select></div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="online_exam_id" id="online_exam_id" />
                        <input type="hidden" name="page" value="exam" />
                        <input type="hidden" name="action" id="action" value="Add" />
                        <button class="btn btn-light shadow" type="button" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary bg-success shadow" id="button_action" type="submit" name="button_action" value="Add">Tambah</button>
                    </div>
                </div>
            </div>
        </div><!-- End: tambah -->
    </form>
    <!-- Start: pertanyaan -->
    <div class="modal fade pulse animated" role="dialog" tabindex="-1" id="questionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="question_form" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" >Tambah Pertanyaan</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><input class="shadow form-control" type="text" id="question_title" style="margin-bottom: 10px;" placeholder="Pertanyaan" autocomplete="off" name="question_title"></div>
                        <div class="form-group"><input class="shadow form-control" type="text" id="option_title_1" style="margin-bottom: 10px;" autocomplete="off" placeholder="Jawaban 1" name="option_title_1"></div>
                        <div class="form-group"><input class="shadow form-control" type="text" id="option_title_2" style="margin-bottom: 10px;" autocomplete="off" placeholder="Jawaban 2" name="option_title_2"></div>
                        <div class="form-group"><input class="shadow form-control" type="text" id="option_title_3" style="margin-bottom: 10px;" autocomplete="off" placeholder="Jawaban 3" name="option_title_3"></div>
                        <div class="form-group"><input class="shadow form-control" type="text" id="option_title_4" style="margin-bottom: 10px;" autocomplete="off" placeholder="Jawaban 4" name="option_title_4"></div>
                        <div class="form-group"><select class="shadow form-select" id="answer_option" style="margin-bottom: 10px;" name="answer_option">
                                <option value=" ">Jawaban</option>
                                <option value="1" selected="">Jawaban 1</option>
                                <option value="2">Jawaban 2</option>
                                <option value="3">Jawaban 3</option>
                                <option value="4">Jawaban 4</option>
                            </select></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Tutup</button>
                        <input type="hidden" name="question_id" id="question_id" />
                        <input type="hidden" name="online_exam_id" id="hidden_online_exam_id" />
                        <input type="hidden" name="page" value="question" />
                        <input type="hidden" name="action" id="hidden_action" value="Add" />
                        <button class="btn btn-primary" id="question_button_action" type="submit" name="question_button_action" value="Add">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End: pertanyaan -->
    <!-- Start: Hapus -->
    <div class="modal fade tada animated" role="dialog" tabindex="-1" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Hapus</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" style="background: rgba(255,255,255,0.07);">
                    <div>
                        <h3 class="text-center">Yakin hapus ujian?</h3>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light shadow" type="button" data-bs-dismiss="modal">Tutup</button><button class="btn btn-primary bg-danger shadow" id="ok_button" type="button" name="ok_button">Hapus</button></div>
            </div>
        </div>
    </div><!-- End: Hapus -->
    <!-- Start: Halaman utama -->
    <div class="container" style="border-radius: 14px;background: rgba(255,255,255,0.25);">
        <div class="row">
            <div class="col-md-12">
                <!-- Start: Navigation with Button -->
                <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: rgba(255,255,255,0);">
                    <div class="container"><a class="navbar-brand" href="#">UJIAN</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Admin</a></li>
                                <li class="nav-item"><a class="nav-link" href="peserta.php">Peserta</a></li>
                            </ul><span class="navbar-text actions"> <a class="login" href="#"></a>
                            <a class="btn btn-light shadow action-button" role="button" href="logout.php" style="background: rgb(111,18,255);">Keluar</a></span>
                        </div>
                    </div>
                </nav><!-- End: Navigation with Button -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: rgba(255,255,255,0.4);">
                    <div class="card-header">
                        <nav class="navbar navbar-light navbar-expand-md">
                            <div class="container-fluid"><a class="navbar-brand" href="#">UJIAN</a>
                                <button class="btn btn-primary shadow" id="add_button" type="button" style="border-radius: 20px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body d-flex">
                        <div class="table-responsive" style="width: 1298px;">
                            <table class="table table-striped table-borderless" id="exam_data_table">
                                <thead>
                                    <tr>
                                        <th>Ujian</th>
                                        <th>Waktu</th>
                                        <th>Durasi</th>
                                        <th>Jumlah Pertanyaan</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Status</th>
                                        <th>Pertanyaan</th>
                                        <th>Hasil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End: Halaman utama -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/script.min.js?h=334b48fb223084a2659075094c4d7507"></script>
</body>

</html>
