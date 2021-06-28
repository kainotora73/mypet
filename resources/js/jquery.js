$(function (){
    $('.pet-meal').each(function(){
            var pet_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'chart',
                type: 'POST',
                data: {
                    'pet_id' : pet_id,
                },
                dataType: 'json',
            })
            // ダッシュボード条件分岐
            // % average
                    .done(function (data) {
                        var dtt = data;
                        google.charts.load('current', {'packages':['corechart']});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {

                            var cvs_chart = document.getElementById(pet_id);
                            var dataIn = google.visualization.arrayToDataTable(dtt);
                            var options = {
                                title: '朝・昼・夜 餌の時間',
                                legend: { position: 'top' }
                            };
                            var chart = new google.visualization.LineChart(cvs_chart);
                            chart.draw(dataIn, options);
                        };
                            console.log(data);
                    })
                    .fail(function (data, xhr, err) {
                        console.log('エラー');
                        console.log(err);
                        console.log(xhr);
                        return false;
                    });
    });
});

$(function () {
    $('.record-btn').each(function(){
        $(this).on('click', function() {
        var bld = $(this).data('name');
        var pet_id = $(this).data('id');
        var $_t = $(this).parent().parent().find('.on');

        switch(bld){
            case"breakfast":
            $(this).prop('disabled', true);
            break;
            case"lunch":
            $(this).prop('disabled', true);
            break;
            case"dinner":
            $(this).prop('disabled', true);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: bld,
            type: 'POST',
            data: {
                'pet_id' : pet_id,
            },
            dataType: 'json',
        })
                .done(function (data) {
                    if(pet_id = $('.on').data('id')){
                        $_t.text(data);
                        $_t.fadeIn("slow", function () {
                            $(this).delay(3000).fadeOut("slow");
                          });
                        console.log(data);
                    }
                })
                .fail(function (data, xhr, err) {
                    alert('エラー');
                    console.log(err);
                    console.log(xhr);
                });

        return false;
        });
    });
});


$('.delete-btn').each(function(){
    $(this).on('click', function() {
    id = $(this).data('id');
    $this = $(this);
    if(!confirm("Sure to delete?")){
        return false;
    }
    form (submit);

    });
});
$(function(){
    $('.flash_message').fadeOut(3000);
});
