@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        Ciudadanos por {{ ucfirst(Request::segment(3)) }}
                        <span class="float-right">
                            <a href="?type=bar">Barra</a>
                            <a href="?type=pie">Torta</a>
                            <a href="?type=radar">Radar</a>
                            <a href="?type=doughnut">Dona</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <canvas id="myChart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script>
        let colors = [];
        $.each(@json($label), function(){
            colors.push('#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6))
        });
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: "{{ request()->get('type') }}",
            data: {
                labels: @json($label),
                datasets: [{
                    label: 'Cantidad de Ciudadanos',
                    data: @json($data),
                    useRandomColors: true,
                    backgroundColor: colors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection


