$(document).ready(function(){

	$('[type=number]').on('click keyup', function () {
		if($(this).attr('name') == 'volume' || $(this).attr('name') == 'weight') {
			if($(this).val().length > 3) {
				$(this).val($(this).val().substr(0, 3));
			}
		} else {
			if($(this).val().length > 10) {
				$(this).val($(this).val().substr(0, 10));
			}
		}
	});

	$('.btn_delete').on('click', function(e) {
		e.preventDefault();
		var form = $(this).parent();
		$("#smallModal").modal('show');
		$('#modal_delete').click(function(){
			form.trigger('submit');
		});
	});

	$('#global_storage').on('click', function () {
		var access = 0;
		if ($(this).prop("checked")) {
			access = 1;
		}
		$.ajax({
			method: "POST",
			url: "/json/change",
			cache: false,
			data: {
				'json' : access,
			},
			dataType: 'json', 
			success: function (response) {
				alert(response['msg']);          

			},error:function(r) {
				console.log(r);
			}
		});
		
	});

});