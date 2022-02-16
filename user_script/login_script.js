$(document).ready(function() {
    //Data dari form akan dikirim apabila tombol submit diklik
    $('#user_login_form').on('submit', function(event){
    event.preventDefault();

    //cek inputan user
    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    //apabila inputan di form sudah sesuai maka data akan dikirimkakn ke file user_action.php
    if($('#user_login_form').parsley().validate())
    {
        $.ajax({
            url:"user_action.php",
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
            $('#user_login').attr('disabled', false);

            $('#user_login').html('Login');
            }
    })
    }
});
});