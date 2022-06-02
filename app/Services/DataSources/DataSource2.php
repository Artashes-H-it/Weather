<?php
namespace App\Services\DataSources;

use Illuminate\Support\Facades\Http;
use App\interfaces\interfaceWather\WeatherDataSource;


class DataSource2 implements WeatherDataSource {

    public $city;
   
    public function getCurrentWeather(){
    
    $this->city = request()->query('city') ? request()->query('city') : geoip()->getLocation(request()->ip())['city'];

    $response = Http::get('http://api.weatherstack.com/forecast?access_key=4e98e70cf9c25b2150f17f03a4c47c40&query='.$this->city.'');
      
    $result =  $response->json();

    //dd($result);
    return $result;
    }
}