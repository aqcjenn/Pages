function createPage(){

	var formData = $("#createPageForm").serializeArray();
	console.log(formData);

	$.ajax({
    		url: '/page/create',
    		type: 'POST',
    		data: formData,
			dataType: 'json',
			success: function(data){
				console.log(data);
				if(data.success){

					var page = data.data;
					var html = '<tr id="'+page.page_id+'">'+
								'<td>'+ page.title +'</td>'+
								'<td>'+ page.created_by_username+'</td>'+
								'<td>'+ page.date_created+'</td>'+
								'<td>'+ page.status+'</td>'+
						'</tr>';
					$("#pages_rows").prepend(html);

					$("#createPageForm").trigger("reset");
					$("#exampleModal").modal('hide');
				}
				
			}
    });

}

function createComment(){

	var formData = $("#commentForm").serializeArray();
	console.log(formData);

	$.ajax({
    		url: '/comment/create',
    		type: 'POST',
    		data: formData,
			dataType: 'json',
			success: function(data){
				console.log(data);
				if(data.success){



				}
				
			}
    });
}

function getAllPages(){
	$.ajax({
    		url: '/page/all',
    		type: 'GET',
			dataType: 'html',
			success: function(data){
				$("#pages").empty().html(data);
			}
    });
}

$(function(){

	$.ajaxSetup({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$("#createPage").on('click', function(){
		createPage();
	});

	$(".pages").on('click', function(){
		console.log($(this).attr('id'));
	});

	$("#postComment").on('click', function(){
		createComment();
	});


	




});