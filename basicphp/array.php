<?php
    # array reference from index number
    /*$name = array("Thailand","England","Japan");
    echo $name[2];
    echo "<hr>";
    print $name[0];
    print_r($name);*/

    # array loop foreach
    /*foreach ($name as $user) {
        echo "$user<br>";
    }*/

    # array const index 1
    /*$country = array("BKK"=>"Thailand","EN"=>"England","JP"=>"Japan");
    print_r($country);
    echo "<hr>";
    echo $country["BKK"];*/

    # array const foreach loop index
    $country = array("Bangkok" => "Thailand", "EN" => "England", "JP" => "Japan");
    foreach ($country as $user => $value) {
        echo "KEY =".$user."value = $value"."<br>";
    }

    # array const for loop index
    $name = array("Thailand","England","Japan");
    $countname = count($name);
    //echo "total data".$countname;

    for ($i=0; $i < $countname; $i++) { 
        print $name[$i]."<br>";
    }
?>