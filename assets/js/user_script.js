
$(document).ready(function(){

//**Untuk halaman register**

    //Untuk halaman register
    $('#user_email_address').parsley();

    //cek email sudah terdafar atau belum
    window.Parsley.addValidator('checkemail', {
        validateString: function(value)
        {
        return $.ajax({
            url:'../../user_action.php',
            method:'POST',
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

    //validasi inputan form
    $('#user_register_form').parsley();

    $('#user_register_form').on('submit', function(event){
        event.preventDefault();

        $('#user_email_address').attr('required', 'required');

        $('#user_email_address').attr('data-parsley-type', 'email');

        $('#user_password').attr('required', 'required');

        $('#confirm_user_password').attr('required', 'required');

        $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

        $('#user_name').attr('required', 'required');

        $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

        $('#user_address').attr('required', 'required');

        $('#user_mobile_no').attr('required', 'required');

        $('#user_mobile_no').attr('data-parsley-pattern', '^[0-9]+$');

        $('#user_image').attr('required', 'required');

        $('#user_image').attr('accept', 'image/*');

        //apabila terpenuhi maka akan mengirim data ke database menggunkan ajax
        if($('#user_register_form').parsley().validate())
        {
        $.ajax({
            url:'user_action.php',
            method:"POST",
            data:new FormData(this),
            dataType:"json",
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function()
            {
            $('#user_register').attr('disabled', 'disabled');
            $('#user_register').html('please wait...');
            },
            success:function(data)
            {
            if(data.success)
            {
                $('#user_register_form')[0].reset();
                $('#user_register_form').parsley().reset();
            }

            $('#user_register').attr('disabled', false);

            $('#user_register').html('Register');
            }
        })
        }

    });

//**Untuk halaman login**

    $('#user_login_form').on('submit', function(event){
        event.preventDefault();

        $('#user_email_address').attr('required', 'required');

        $('#user_email_address').attr('data-parsley-type', 'email');

        $('#user_password').attr('required', 'required');

        if($('#user_login_form').parsley().validate())
        {
        $.ajax({
            url:"../../user_action.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function()
            {
            $('#user_login').attr('disabled', 'disabled');
            $('#user_login').html('please wait...');
            },
            success:function(data)
            {
            if(data.success)
            {
                location.href='index.php';
            }
            else
            {
                $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
            }

            $('#user_login').attr('disabled', false);

            $('#user_login').html('Login');
            }
        })
        }

    });
});