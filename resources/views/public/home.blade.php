@extends('layouts.app')

@section('css')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100%;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <style>
        /* fonts */
        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700);
        /* colour names */
        /* colours */
        /* gradients */
        /* mixins */
        /* globals */

        h1, h2 {
            font-weight: 400;
        }

        /* elements */
        /* card */
        .card {
            border-radius: 5px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.25);
            box-sizing: border-box;
            background-image: linear-gradient(110deg, #4d4d4d, #3c3f3b, #141414);
            color: white;
            font-family: "Ubuntu", Helvetica, Arial, sans-serif;
            margin: 40px auto auto;
            padding: 30px;
            width: 80%;
        }
        .card-heading {
            font-size: 18px;
            color: #939393;
            text-align: center;
        }
        .card-subheading {
            font-size: 22px;
            color: white;
            margin-bottom: 50px;
            text-align: center;
        }
        .card-chart .card-value {
            font-size: 22px;
        }
        .card-smallchart .card-value {
            font-size: 14px;
        }
        .card-stats .card-value {
            font-size: 22px;
        }
        .card-remaining .card-value {
            color: #4d4d4d;
        }
        .card-chart {
            position: relative;
        }
        .card-center {
            line-height: 1.5;
            position: absolute;
            top: 75px;
            width: 100%;
        }
        .card-label {
            color: #b2b2b2;
            font-weight: 400;
        }
        .card-chart .card-label {
            font-size: 16px;
        }
        .card-smallchart .card-label {
            font-size: 14px;
        }
        .card-stats .card-label {
            font-size: 16px;
        }
        .card-consumed .card-label {
            color: white;
        }
        .card-chart {
            margin-bottom: 30px;
            text-align: center;
        }
        .card-smallchart .card-type, .card-stats .card-type {
            float: left;
            width: 50%;
        }

        .card-smallchart .card-donut {
            float: left;
            margin-right: 10px;
        }
        .box {
            display: flex;
            justify-content: space-around;
        }


        /* animations */
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h1 class="card-heading">Tiempo restante</h1>
                    <br>
                    <h2 id="demo" class="card-subheading"></h2>

                    <h1 class="card-heading">Progeso</h1>
                    <br>

                    <div class="box">
                        <div class="card-chart">
                            <div class="card-donut card-personal" data-size="200" data-thickness="18"></div>
                            <div class="card-center">
                        <span class="card-value">
                            {{ auth()->user()->ciudadanos->count() }}/
                            {{ auth()->user()->meta->total }}
                        </span>
                                <div class="card-label">Tu meta</div>
                            </div>
                        </div>
                        <div class="card-chart">
                            <div class="card-donut card-global" data-size="200" data-thickness="18"></div>
                            <div class="card-center">
                        <span class="card-value">
                            {{ \App\Ciudadano::count() }}/
                            {{ \App\Setting::first()->total }}
                        </span>
                                <div class="card-label">Global</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.js"></script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date( "{{ \App\Setting::first()->fecha }}".replace( /(\d{2})\/(\d{2})\/(\d{4})/, "$2/$1/$3") );

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "TERMINADO";
            }
        }, 30);
    </script>

    <script>
        $(document).ready(function() {
            // animate 'card-remaining' box
            $('.card-remaining').addClass('card-remaining-active');

            $('.card-personal').circleProgress({
                startAngle: 1.5 * Math.PI,
                lineCap: 'round',
                value: parseInt('{{ auth()->user()->ciudadanos->count() }}', 10) / parseInt('{{ auth()->user()->meta->total }}', 10),
                emptyFill: '#5a5959',
                fill: { 'color': '#cdfeac' }
            });

            $('.card-global').circleProgress({
                startAngle: 1.5 * Math.PI,
                lineCap: 'round',
                value: parseInt('{{ \App\Ciudadano::count() }}', 10) / parseInt('{{ \App\Setting::first()->total }}', 10),
                emptyFill: '#5a5959',
                fill: { 'color': '#cdfeac' }
            });
        });
    </script>
@endsection
