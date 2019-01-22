$(document).ready(function(){

	$(".monthPicker").datepicker({
		dateFormat: 'MM yy',
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,

		onClose: function(dateText, inst) {
			var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));

			month++;

			var token  = $('meta[name=_token]').attr('content');
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': token }});     

			$.ajax({
				method: "POST",
				url: "/contract/getContractMonthAndYear",
				cache: false,
				data: {
					'_token' : token,
					'month': month,
					'year': year
				},
				dataType: 'json', 
				success: function (response) {
					$('tr.contract').hide();
					$('table').show();

					if (response['msg'] != 'Empty') {
						var contracts = JSON.parse(response);

						var total_price = 0;
						var total_commission = 0;

						for (contract in contracts) {
							var current = $('[data-id="'+contracts[contract]+'"]');
							current.show()
							total_price += Number.parseInt(current.find(".price").html());
							total_commission += Number.parseInt(current.find(".commission").html());
						}   



						$("#total_sum").html(total_price);
						$("#total_commission").html(total_commission);
					} else {
						var total_price = 0;
						var total_commission = 0;
						$("#total_sum").html(total_price);
						$("#total_commission").html(total_commission);
					}

					
				},
				error: function (e) {
					console.log(e);
				}
			});


		}
	});

	$(".monthPicker").focus(function () {
		$(".ui-datepicker-calendar").hide();
		$("#ui-datepicker-div").position({
			my: "center top",
			at: "center bottom",
			of: $(this)
		});
	});


});
