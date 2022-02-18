$(document).ready(function(){
	var code = "<?php echo $_GET['code']; ?>";

	var dataTable = $('#enroll_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"admin_action.php",
			type:"post",
			data:{action:'fetch', page:'exam_enroll', code:code},
		},
		"columnDefs" : [
			{
				"targets" : [0],
				"orderable" : false
			}
		]
	});
});