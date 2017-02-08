$('#database').on('change',function(){
	var databaseName = $(this).val();
	$('.tableLoading').html('Loading...');
	if(databaseName != '' || databaseName != undefined){
		$.ajax({
			'url' 		: 'getTables.php',
			'type'		: 'POST',
			'dataType'	: 'JSON',
			'data'		: {databaseName:databaseName},
			'success'	: function(retObj){
				if(retObj.tables != ''){
					$('#tables').html('');
					$(retObj.tables).each(function(key,value){
						var tableName = value.tableName;
						$('#tables').append('<option value="'+tableName+'">'+tableName+'</option>');
						$('#tables')[0].sumo.reload();
					});
					$('.tableLoading').html('');
				}else{
					$('#tables').html('');
					$('.tableLoading').html('');
					$('#tables')[0].sumo.reload();
					alert('No tables found.');
				}
			}
		});
	}else{
		alert('Please select proper database');
	}
	
});