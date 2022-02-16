$(document).ready(function(){
    /*HALAMAN REGISTRASI*/
    $('#admin_email_address').parsley();

    //cek email sudah terdafar atau belum
    window.Parsley.addValidator('checkemail', {
        validateString: function(value)
        {
        return $.ajax({
            url:"../master/admin_action.php",
            method:"POST",
            data:{page:'register', action:'check_email', email:value},
            dataType:"json",
            async: false,
            success:function(data)
            {
            return true;
            }
        });
        }
    });

    //Kirim data ke database
    $('#admin_register_form').parsley();

    $('#admin_register_form').on('submit', function(event){

        event.preventDefault();

        $('#admin_email_address').attr('required', 'required');

        $('#admin_email_address').attr('data-parsley-type', 'email');

        $('#admin_password').attr('required', 'required');

        $('#confirm_admin_password').attr('required', 'required');

        $('#confirm_admin_password').attr('data-parsley-equalto', '#admin_password');

        if($('#admin_register_form').parsley().isValid())
        {
            $.ajax({
                url:"admin_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                $('#admin_register').attr('disabled', 'disabled');
                $('#admin_register').val('please wait...');
                },
                success:function(data)
                {
                if(data.success)
                {
                    $('#message').html('<div class="alert alert-success">Please check your email</div>');
                    $('#admin_register_form')[0].reset();
                    $('#admin_register_form').parsley().reset();
                }

                $('#admin_register').attr('disabled', false);
                $('#admin_register').val('Register');
                }
            });
        }

    });
    /*HALAMAN LOGIN*/
    $('#admin_login_form').parsley();

    $('#admin_login_form').on('submit', function(event){
        event.preventDefault();

        $('#admin_email_address').attr('required', 'required');

        $('#admin_email_address').attr('data-parsley-type', 'email');

        $('#admin_password').attr('required', 'required');

        if($('#admin_login_form').parsley().validate())
        {
        $.ajax({
            url:"../master/admin_action.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
            $('#admin_login').attr('disabled', 'disabled');
            $('#admin_login').val('please wait...');
            },
            success:function(data)
            {
            if(data.success)
            {
                location.href="index.php";
            }
            else
            {
                $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
            }
            $('#admin_login').attr('disabled', false);
            $('#admin_login').val('Login');
            }
        });
        }

    });
    /*HALAMAN UJIAN*/
    //Menampilkan data ujian dari database menggunakan plugin datatables
    var dataTable = $('#exam_data_table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "responsive" : true,
        "dataSrc": "",
        "order" : [],
        "ajax" : {
            url: "../master/admin_action.php",
            type:"POST",
            data :{action:'fetch', page:'exam'}
        },
        "columnDefs":[
            {
                "targets":[7, 8, 9],
                "orderable":false,
                "defaultContent": "-",
                "targets": "_all"
            },
        ],
    });

    //fungsi untuk reset form tambah ujian
    function reset_form()
    {
        $('#modal_title').text('Tambah Ujian');
        $('#button_action').val('Add');
        $('#action').val('Add');
        $('#exam_form')[0].reset();
        $('#exam_form').parsley().reset();
    }

    //ketika tombol add di klik maka modal muncul
    $('#add_button').click(function(){
        reset_form();
        $('#formModal').modal('show');
        $('#message_operation').html('');
    });

    //menambahkan ujian baru
    $('#exam_form').parsley();

    $('#exam_form').on('submit', function(event){
        event.preventDefault();

        $('#online_exam_title').attr('required', 'required');

        $('#online_exam_datetime').attr('required', 'required');

        $('#online_exam_duration').attr('required', 'required');

        $('#total_question').attr('required', 'required');

        $('#marks_per_right_answer').attr('required', 'required');

        $('#marks_per_wrong_answer').attr('required', 'required');

        if($('#exam_form').parsley().validate())
        {
            $.ajax({
                url:"../master/admin_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#button_action').attr('disabled', 'disabled');
                    $('#button_action').html('Validate...');
                },
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');

                        reset_form();

                        dataTable.ajax.reload();

                        $('#formModal').modal('hide');
                    }

                    $('#button_action').attr('disabled', false);

                    $('#button_action').html($('#action').val());
                }
            });
        }
    });


    //Setting waktu ujian
    var date = new Date();
    date.setDate(date.getDate());

    //Fungsi untuk mereset form tambah soal
    function reset_question_form()
    {
        $('#question_modal_title').text('Add Question');
        $('#question_button_action').val('Add');
        $('#hidden_action').val('Add');
        $('#question_form')[0].reset();
        $('#question_form').parsley().reset();
    }

    //Menampilakn modal tambah soal ujian
    $(document).on('click', '.add_question', function(){
        reset_question_form();
        $('#questionModal').modal('show');
        $('#message_operation').html('');
        exam_id = $(this).attr('id');
        $('#hidden_online_exam_id').val(exam_id);
    });

    //Valiidasi inputan soal
    $('#question_form').parsley();

    $('#question_form').on('submit', function(event){
        event.preventDefault();

        $('#question_title').attr('required', 'required');

        $('#option_title_1').attr('required', 'required');

        $('#option_title_2').attr('required', 'required');

        $('#option_title_3').attr('required', 'required');

        $('#option_title_4').attr('required', 'required');

        $('#answer_option').attr('required', 'required');

        //apabila inoutan sudah valid maka data akan dikirmkan ke database
        if($('#question_form').parsley().validate())
        {
            $.ajax({
                url:"../master/admin_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#question_button_action').attr('disabled', 'disabled');

                    $('#question_button_action').html('Validate...');
                },
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');

                        reset_question_form();
                        dataTable.ajax.reload();
                        $('#questionModal').modal('hide');
                    }

                    $('#question_button_action').attr('disabled', false);

                    $('#question_button_action').val($('#hidden_action').val());
                }
            });
        }
    });

    //Menampilkan modal hapus soal
    $(document).on('click', '.delete', function(){
		exam_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});

    //Menghapus soal
	$('#ok_button').click(function(){
		$.ajax({
			url:"../master/admin_action.php",
			method:"POST",
			data:{exam_id:exam_id, action:'delete', page:'exam'},
			dataType:"json",
			success:function(data)
			{
				$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
				$('#deleteModal').modal('hide');
				dataTable.ajax.reload();
			}
		})
	});

    //edit ujian
    var exam_id = '';

	$(document).on('click', '.edit', function(){
		exam_id = $(this).attr('id');

		reset_form();

		$.ajax({
			url:"../master/admin_action.php",
			method:"POST",
			data:{action:'edit_fetch', exam_id:exam_id, page:'exam'},
			dataType:"json",
			success:function(data)
			{
				$('#online_exam_title').val(data.online_exam_title);

				$('#online_exam_datetime').val(data.online_exam_datetime);

				$('#online_exam_duration').val(data.online_exam_duration);

				$('#total_question').val(data.total_question);

				$('#marks_per_right_answer').val(data.marks_per_right_answer);

				$('#marks_per_wrong_answer').val(data.marks_per_wrong_answer);

				$('#online_exam_id').val(exam_id);

				$('#modal_title').text('Edit Exam Details');

				$('#button_action').val('Edit');

				$('#action').val('Edit');

				$('#formModal').modal('show');
			}
		})
	});

    
});
