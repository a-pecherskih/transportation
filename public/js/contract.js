$(document).ready(function(){

    var coefficient = 0;
    var price_kg = 0;
    var total_price = 0;
    var overpricing = 0;

    if (window.location.pathname.indexOf('create') !== -1) {
        getTrip();
    } else {
        coefficient = Number.parseInt($('#coefficient').html());
        price_kg = Number.parseInt($('#price_kg').html());
        overpricing = Number.parseInt($('#overpricing').html());
        $('#back-block').hide();
    }

    $('#arrival').on('change', function () {
        getTrip();
    });

    $('#departure').on('change', function () {
        getTrip();
    });

    $('#volume').on('change', function () {
        setTotalPrice();
    });

    $('#weight').on('change', function () {
        setTotalPrice();
    });

    function getTrip () {
        $('#trip-block').hide();
        $('#back-block').hide();
        $('#services').html('');

        arrival = $('#arrival').val();
        departure = $('#departure').val();

        var token  = $('meta[name=_token]').attr('content');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': token }});     

        $.ajax({
            method: "POST",
            url: "/trip/get",
            cache: false,
            data: {
                '_token' : token,
                'arrival': arrival,
                'departure': departure
            },
            dataType: 'json', 
            success: function (response) {
                var trip = JSON.parse(response);

                coefficient = trip['coefficient'];
                price_kg = trip['price_kg'];

                if (Number.parseInt(trip['overpricing']) > 0) {
                    overpricing = trip['overpricing']/100;
                    $('#overpricing').html(" (Цена на данном рейсе повышена на " + trip['overpricing'] + ' %)');
                }

                if (trip['services']) {
                    trip['services'].forEach(function(service) {
                        $('#services').append('<div class="form-check">'
                            +'<input class="form-check-input position-static" type="checkbox" name="services[]" value="'+service['id']+'">'
                            +service['name']+' ('+service['description']+') '
                            +'</div>');
                    });
                }
                

                $('#lasting').html(trip['lasting'] + ' ч');
                $('#coefficient').html(trip['coefficient'] + ' кг');
                $('#price_kg').html(trip['price_kg'] + ' руб');
                $('#trip_id').val(trip['id']);

                setTotalPrice();

                $('#trip-block').show();

                console.log(trip);
            },
            error: function () {
                $('#back-block').show();
            }
        });
    }

    function setTotalPrice () {
        $('#price').val("");

        var volume =  $('#volume').val();
        var weight =  $('#weight').val();

        if (volume && weight) {

            var volume_weight = volume * weight;

            if (volume_weight > coefficient) {
                total_price = volume_weight * price_kg;
                if (overpricing > 0) {
                    total_price += total_price*overpricing;
                }
            } else {
                total_price = coefficient * price_kg;
                if (overpricing > 0) {
                    total_price += total_price*overpricing;
                }
            }

            $('#price').val(total_price);

        }
    }

});


