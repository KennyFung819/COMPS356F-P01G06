<?php
//get City 1668284=taiwan  , 1819730 = HK for example
//$cityID = file_get_contents("city.list.json");
//$city = json_decode($cityID,true);
//var_dump($cityID);

 $ipaddress = $_SERVER["REMOTE_ADDR"]; //Default Hong Kong

 function ip_details($ip) {
    $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
    $details = json_decode($json);
    if($details->bogon){
      return "1819730";
    }
    if(strcmp($details->city,"Tai Wan")===0){
      $id = "1668284"; //Taiwan
    }else{
      $id = "1819730"; // HK
    }
    return $id;
 }

 //get city id
 $id = ip_details($ipaddress);

 $url="http://api.openweathermap.org/data/2.5/weather?id={$id}&APPID=ebb802f07cc687a9c8a75898002c8a37";
 //get JSON
 $json = file_get_contents($url.'&units=metric&type=accurate&mode=jso‌​n');
 //decode JSON to array
 $data = json_decode($json,true);
 //show data
 echo "<span style=\"margin-right:20px;\">" . $data["name"] . "</span>";
 echo "<span style=\"margin-right:20px;\"><img src=images/icon_temperature.png alt=\"Temperature icon\"/>" . $data["main"]["temp"] . "°C</span>";
 echo "<span style=\"margin-right:20px;\"><img src=images/icon_water.png alt=\"Water droplet icon\"/>".$data["main"]["humidity"] . "%</span>";
 echo "<img src=images/icon_cloud.png alt=\"Cloud icon\"/>". $data["weather"][0]["description"];

/* -----------example array---------
array(12) {
  ["coord"]=> array(2) {
    ["lon"]=> float(114.17)
    ["lat"]=> float(22.25)
  }
  ["weather"]=> array(1) {
    [0]=> array(4) {
      ["id"]=> int(801)
      ["main"]=> string(6) "Clouds"
      ["description"]=> string(10) "few clouds"
      ["icon"]=> string(3) "02d"
    }
  }
  ["base"]=> string(8) "stations"
  ["main"]=> array(5) {
    ["temp"]=> float(22.28)
    ["pressure"]=> int(1016)
    ["humidity"]=> int(50)
    ["temp_min"]=> int(20)
    ["temp_max"]=> int(24)
  }
  ["visibility"]=> int(10000)
  ["wind"]=> array(2) {
    ["speed"]=> float(2.6)
    ["deg"]=> int(290)
  }
  ["clouds"]=> array(1) {
    ["all"]=> int(20)
  }
  ["dt"]=> int(1520841600)
  ["sys"]=> array(6) {
    ["type"]=> int(1)
    ["id"]=> int(7888)
    ["message"]=> float(0.1648)
    ["country"]=> string(2) "HK"
    ["sunrise"]=> int(1520807695)
    ["sunset"]=> int(1520850688)
  }
  ["id"]=> int(1819730)
  ["name"]=> string(39) "Hong Kong Special Administrative Region"
  ["cod"]=> int(200)
}*/
?>
