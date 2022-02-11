$(document).ready(function(){
    //Untuk halaman register
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
            url:"../master/admin_action.php",
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

    //Untuk halaman login
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
});