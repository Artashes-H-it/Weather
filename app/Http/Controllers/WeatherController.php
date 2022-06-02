<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DataSources\DataSource1;
use App\Services\DataSources\WeatherService;





class WeatherController extends Controller
{
    public function __invoke(WeatherService $data, Weather $weather){
     
      if( isset($data->returnData()['cod'])){
        $weatherInfo = $data->returnData();
      }else{
          if(Weather::count() > 0){
          $country_id =  Weather::pluck('country_id')[0];

          $weatherInfo = Weather::updateOrCreate(
            ['country_id' => $country_id],
            $data->returnData(),
          );
       }else{
            $weatherInfo = Weather::create($data->returnData());
       } 
      }

       return view('weather', compact('weatherInfo'));
    }
}