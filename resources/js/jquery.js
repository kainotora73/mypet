const { reduce } = require("lodash");
// 前日までのグラフ
$(function (){
    $('.pet-meal').each(function(){
            var pet_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'chart',
                type: 'POST',
                data: {'pet_id' : pet_id},
                dataType: 'json',
            })
                    .done(function (data) {
                        var dtt = data;
                        if(dtt.length < 2){
                            return false;
                        }
                        google.charts.load('current', {'packages':['corechart']});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {

                            var cvs_chart = document.getElementById(pet_id);
                            var dataIn = google.visualization.arrayToDataTable(dtt);
                            var options = {
                                title: '前日までの朝・昼・夜 餌の時間',
                                legend: { position: 'top' },
                                colors:['#ff0000','#ffed4a','#3490dc']
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




function morning_chart(pet_id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'morning',
        type: 'POST',
        data: {'pet_id' : pet_id},
        dataType: 'json',
    })
            .done(function (data) {
                var dtt = data;
                if(dtt.length < 2){
                    return false;
                }
                google.charts.load('current', {'packages':['corechart']});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var cvs_chart = document.getElementById(pet_id+'morning');
                    var dataIn = google.visualization.arrayToDataTable(dtt);
                    var options = {
                        title: '朝 餌の時間',
                        legend: { position: 'top' },
                        colors:['#ff0000'],
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
            })


};
function noon_chart(pet_id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'noon',
        type: 'POST',
        data: {'pet_id' : pet_id},
        dataType: 'json',
    })
            .done(function (data) {
                var dtt = data;
                if(dtt.length < 2){
                    return false;
                }
                google.charts.load('current', {'packages':['corechart']});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var cvs_chart = document.getElementById(pet_id+'noon');
                    var dataIn = google.visualization.arrayToDataTable(dtt);
                    var options = {
                        title: '昼 餌の時間',
                        legend: { position: 'top' },
                        colors:['#ffed4a']
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
            })


};
function night_chart(pet_id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'night',
        type: 'POST',
        data: {'pet_id' : pet_id},
        dataType: 'json',
    })
            .done(function (data) {
                var dtt = data;
                if(dtt.length < 2){
                    return false;
                }
                google.charts.load('current', {'packages':['corechart']});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var cvs_chart = document.getElementById(pet_id+'night');
                    var dataIn = google.visualization.arrayToDataTable(dtt);
                    var options = {
                        title: '夜 餌の時間',
                        legend: { position: 'top' },
                        colors:['#3490dc']
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
            })


};


$(function (){
    $('.pagetab').each(function(){
        $(this).on('click',function(){
            var pet_id = $(this).data('id');
            morning_chart(pet_id);
            noon_chart(pet_id);
            night_chart(pet_id);
        });
    });
});



// 時間記録
$(function () {
    $('.record-btn').each(function(){
        $(this).on('click', function() {
        var $this = $(this);
        var bld = $this.data('name');
        var pet_id = $this.data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: bld,
            type: 'POST',
            data: {'pet_id' : pet_id},
            dataType: 'json',
            })
                    .done(function () {
                        switch(bld){
                            case"breakfast":
                            $this.prop('disabled', true);
                            var btn = document.getElementById(pet_id+'morning-back');
                            $(btn).prop('disabled',false);
                            morning_chart(pet_id);
                            break;

                            case"lunch":
                            $this.prop('disabled', true);
                            var btn = document.getElementById(pet_id+'noon-back');
                            $(btn).prop('disabled',false);
                            noon_chart(pet_id);
                            break;

                            case"dinner":
                            $this.prop('disabled', true);
                            var btn = document.getElementById(pet_id+'night-back');
                            $(btn).prop('disabled',false);
                            night_chart(pet_id);
                            break;
                        }

                    })
                    .fail(function (data, xhr, err) {
                        alert('エラー');
                        console.log(err);
                        console.log(xhr);
                        return false;
                    });
        });
    });
});

// 削除処理
$('.delete-btn').each(function(){
    $(this).on('click', function() {
    id = $(this).data('id');
    $this = $(this);
    if(!confirm("一度データを削除すると戻りません。本当に削除してもよろしいですか？")){
        return false;
    }
    form (submit);

    });
});

$(function (){
    $('.back-btn').each(function(){
        $(this).on('click',function(){
        var $this = $(this);
        var pet_id = $this.data('id');
        var mnn = $this.data('name');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:mnn,
            type: 'POST',
            data: {'pet_id' : pet_id,"_method": "DELETE"},
            dataType: 'json',
        })
                .done(function () {
                    switch(mnn){
                        case"morning-back":
                        $this.prop('disabled', true);
                        var btn = document.getElementById(pet_id+'morning-record');
                        $(btn).prop('disabled',false);
                        morning_chart(pet_id);
                        break;

                        case"noon-back":
                        $this.prop('disabled', true);
                        var btn = document.getElementById(pet_id+'noon-record');
                        $(btn).prop('disabled',false);
                        noon_chart(pet_id);
                        break;

                        case"night-back":
                        $this.prop('disabled', true);
                        var btn = document.getElementById(pet_id+'night-record');
                        $(btn).prop('disabled',false);
                        night_chart(pet_id);
                        break;
                    }
                })
                .fail(function (data, xhr, err) {
                    console.log('エラー');
                    console.log(err);
                    console.log(xhr);
                    return false;
                });
        });
    });
});





$('[data-toggle="tooltip"]').tooltip();
