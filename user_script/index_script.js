$(document).ready(function(){

    $('#exam_list').parsley();

    var exam_id = '';

    $('#exam_list').change(function(){

        $('#exam_list').attr('required', 'required');

        if($('#exam_list').parsley().validate())
        {
            exam_id = $('#exam_list').val();
            $.ajax({
                url:"user_action.php",
                method:"POST",
                data:{action:'fetch_exam', page:'index', exam_id:exam_id},
                success:function(data)
                {
                    $('#exam_details').html(data);
                }
            });
        }
    });

    $(document).on('click', '#enroll_button', function(){
        exam_id = $('#enroll_button').data('exam_id');
        $.ajax({
            url:"user_action.php",
            method:"POST",
            data:{action:'enroll_exam', page:'index', exam_id:exam_id},
            beforeSend:function()
            {
                $('#enroll_button').attr('disabled', 'disabled');
                $('#enroll_button').text('please wait');
            },
            success:function()
            {
                $('#enroll_button').attr('disabled', false);
                $('#enroll_button').removeClass('btn-warning');
                $('#enroll_button').addClass('btn-success');
                $('#enroll_button').text('Enroll success');
            }
        });
    });

});