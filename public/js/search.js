$(document).ready(function(){

    $('#search_client').on('click', function (e) {
        e.preventDefault();
        var number = $("#search").val(); 
        var token  = $('meta[name=_token]').attr('content');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': token }});
        $.ajax({
            method: "POST",
            url: "/client/getPassportOrContract",
            cache: false,
            data: {
                '_token' : token,
                'number': number,
            },
            dataType: 'json', 
            success: function (response) {
                var client_id = JSON.parse(response);
                $('tr.client').hide();
                $('*[data-id="'+client_id['id']+'"]').show();
                console.log(client_id);
            },error:function(r) {
               $('tr.client').hide();
               console.log(r);
           }
       });
    });

    $('#search_clear').on('click', function (e) {
        e.preventDefault();
        $('#search').val('');
        $('tr.client').show();
    });

    $('#search_departure').on('change', function () {
        var departure_id = $('#search_departure').val();
        $('tr.trip').hide();
        if (departure_id == 0) {
            $('tr.trip').show();
        } else {
            $('*[data-departure="'+departure_id+'"]').show();
        }

    });


});


