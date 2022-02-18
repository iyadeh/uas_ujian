$(document).ready(function(){
    $('#profile_form').parsley();

    $('#profile_form').on('submit', function(event){

        event.preventDefault();

        $('#user_name').attr('required', 'required');

        $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

        $('#user_address').attr('required', 'required');

        $('#user_mobile_no').attr('required', 'required');

        $('#user_mobile_no').attr('data-parsley-pattern', '^[0-9]+$');

        $('#user_image').attr('accept', 'image/*');

        if($('#profile_form').parsley().validate())
        {
            $.ajax({
                url:"user_action.php",
                method:"POST",
                data: new FormData(this),
                dataType:"json",
                contentType: false,
                cache: false,
                processData:false,				
                beforeSend:function()
                {
                    $('#user_profile').attr('disabled', 'disabled');
                    $('#user_profile').html('Tunggu');
                },
                success:function(data)
                {
                    if(data.success)
                    {
                        location.reload(true);
                    }
                    else
                    {
                        $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
                    }
                    $('#user_profile').attr('disabled', false);
                    $('#user_profile').html('Simpan');
                }
            });
        }
    });

    $('#change_password_form').parsley();

    $('#change_password_form').on('submit', function(event){
        event.preventDefault();

        $('#user_password').attr('required', 'required');

        $('#confirm_user_password').attr('required', 'required');

        $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

        if($('#change_password_form').parsley().validate())
        {
            $.ajax({
                url:"user_action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function()
                {
                    $('#change_password').attr('disabled', 'disabled');
                    $('#change_password').html('Tunggu');
                },
                success:function(data)
                {
                    if(data.success)
                    {
                        alert(data.success);
                        location.reload(true);
                    }
                    $('#change_password').attr('disabled', false);
                    $('#change_password').html('Ubah');
                }
            })
        }
    });
});