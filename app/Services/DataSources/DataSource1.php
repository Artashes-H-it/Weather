<?php
namespace App\Services\DataSources;

use Illuminate\Support\Facades\Http;
use App\interfaces\interfaceWather\WeatherDataSource;


class DataSource1 implements WeatherDataSource {

    public $city;
    public function getCurrentWeather(){

      $this->city = request()->query('city') ? request()->query('city') : geoip()->getLocation(request()->ip())['city'];

        $response = Http::get('http://api.openweathermap.org/data/2.5/weather?q='.$this->city.'&appid=fd48bdf8a8b87b3c140f17625f4e2d57&units=metric');
       
        $result =  $response->json();


       return $result;
    }
}