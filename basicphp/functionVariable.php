<?php
    $name = "Hello";
    $age = 20;
    $country = array("TH","LAOS",123,50.5);
    for ($i=0; $i < count($country); $i++) { 
        echo gettype($country[$i]);
        echo "<br>";
    }
?>