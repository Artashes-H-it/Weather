<?php
namespace App\Services\DataSources;

use Illuminate\Support\Facades\Request;
use App\Services\DataSources\DataSource1;
use App\Services\DataSources\DataSource2;

class WeatherService {
  private $allDatas;  
  private $tempSum;
  private $dataTemps;

   public function __construct(){
       $data1 = new DataSource1();
       $data2 = new DataSource2();

      $datasourses1 = $data1->getCurrentWeather();
      $datasourses2 = $data2->getCurrentWeather();

      if($datasourses1['cod']== 404){
        $this->allDatas = $datasourses1;
      }else{
         $this->dataTemps = array($datasourses1["main"]['temp'], $datasourses2["current"]["temperature"]);
      
       $this->tempSum = array_sum($this->dataTemps) / count($this->dataTemps);

      $this->allDatas =['temperature'=> $this->tempSum,
       'country_id'=> $datasourses1['id'],
       'country'=> $datasourses2["request"]["query"],
       'wind_speed'=>$datasourses2["current"]["wind_speed"],
       'pressure' => $datasourses2["current"]["pressure"],
       'weather_icons' => $datasourses2["current"]["weather_icons"][0]
      ];
      }
   }

   public function returnData(){
     return  $this->allDatas;
   }
}