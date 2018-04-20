<?php

   $APIkey = "QLA7QU8MQ4CDSWJX";

   $json = file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=^HSI&apikey=".$APIkey);
   $details = json_decode($json,true);
   $HSI = array_slice($details["Time Series (Daily)"], 0, 1);
   foreach($HSI as $key => $value) {
     echo "<span style=\"margin-right:20px;\">" . "Hang Seng Index : " . $key  . "</span>";
     echo "<span style=\"margin-right:20px;\">" . "Open : " . substr($value["1. open"],0,5) . "</span>";
     echo "<span style=\"margin-right:20px;\">" . "High : " . substr($value["2. high"],0,5) . "</span>";
     echo "<span style=\"margin-right:20px;\">" . "Low  : " . substr($value["3. low"],0,5) . "</span>";
     echo "<span style=\"margin-right:20px;\">" . "Close: " . substr($value["4. close"],0,5) . "</span>";
   }



 ?>




<!-- https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=^HSI&apikey=QLA7QU8MQ4CDSWJX -->

<!-- https://www.quandl.com/api/v3/datasets/WIKI/^HSI/data.json?api_key=aUxXb2bsAp_xq6yPrn5F -->
