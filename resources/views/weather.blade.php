<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    .wrap_weather {
        width: 35%;
        /* height: 300px; */
        margin: 0 auto;
        margin-top: 100px;
        border-radius: 20px;
        padding: 15px;
        box-shadow: 0px 3px 13px #bbbfbe;
        background: lightblue;
    }

    .paragraph {
        color: gray;
        text-align: center;
        margin-top: 0;
    }

    input[type='text'] {
        width: 96%;
        display: block;
        padding: 10px;
        border-radius: 5px;
        border: none;
        outline: none;
    }

    input[type='submit'] {
        display: block;
        margin: 0 auto;
        margin-top: 20px;
        border: navajowhite;
        border-radius: 6px;
        padding: 10px;
        cursor: pointer;
        background-color: lightsteelblue;
    }

    p img {
        width: 35px;
        border-radius: 7px;
    }

    p {
        margin-top: 0px;
        margin-bottom: 10px;
    }

    .error {
        font-weight: bold;
        text-align: center;
        color: red;
    }
    </style>
</head>

<body class="antialiased">
    <div class="wrap_weather">
        <h2 class="paragraph">Weather info</h2>

        @if($weatherInfo['cod'])
        <p class="error">{{$weatherInfo['message']}}</p>
        @else
        <p><img src="{{$weatherInfo->weather_icons}}" alt=""></p>
        <p>Temperature - {{$weatherInfo->temperature}} C </p>
        <p>City/Country - {{$weatherInfo->country}} </p>
        <p>Wind-speed - {{$weatherInfo->wind_speed}} m/s</p>
        <p>Pressure - {{$weatherInfo->pressure}}</p>
        @endif
        <form action="" method="get">
            <input type="text" name="city" id="" value="{{isset($_GET['city']) ? $_GET['city']: ''}}"
                placeholder="Enter your city or country">
            <input type="submit" id="" value="Your city">
        </form>
    </div>
</body>

</html>