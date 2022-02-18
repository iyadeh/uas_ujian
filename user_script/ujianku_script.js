$(document).ready(function(){

	$('#exam_data_table').DataTable({
		processing : true,
		serverSide : true,
		order : [],
		ajax : {
			url: "user_action.php",
			type:"POST",
			data:{action:'fetch', page:'enroll_exam'}
		},
		columnDefs:[
			{
				"targets":[7],
				"orderable":false,
			},
		],
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
					$('#change_password').html('tunggu');
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