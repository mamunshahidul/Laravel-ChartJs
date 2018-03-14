<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Charts</b></div>
            <div class="panel-body">
                <canvas id="myChart" width="1000" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" charset="utf-8"></script>
<script>
    var url = "{{ url('daily-revenue/chart') }}";
    var Months = new Array();
    var Counts = new Array();

    $.get( url, function (response)
    {

        console.log(response[0]);
        response.forEach(function (data) {
            Months.push(data.month);
            Counts.push(data.total);
        });
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Months,
                datasets: [
                    {
                        label: '# Daily Revenue',
                        data: Counts,
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) { if (Number.isInteger(value)) { return value; } },
                            stepSize: 1,
                        }
                    }],
                    xAxes: [{
                        time: {
                            unit: 'month'
                        }
                    }]
                }
            }
        });
    });
</script>
</body>
</html>