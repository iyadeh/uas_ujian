$(document).ready(function(){
	
	$('#user_data_table').DataTable({
		processing : true,
		serverSide : true,
		order : [],
		ajax : {
			url:"../../master/admin_action.php",
			type:"POST",
			data:{action:'fetch', page:'user'}
		},
		columnDefs:[
			{
				"targets":[0,6],
				"orderable":false,
				"defaultContent": "-",
			},
		],
	});
});