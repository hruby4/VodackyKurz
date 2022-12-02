<?php
    $file_name = "zaci.json";
if(isset($_POST["nick"]) && isset($_POST["kanoe_kamarad"]) && isset($_POST["prijmeni"])){
    $nick = $_POST["nick"];
    $prijmeni = $_POST["prijmeni"];
    $trida = $_POST["trida"];
    $kamarad = $_POST["kanoe_kamarad"];
    $je_plavec = $_POST["je_plavec"];
    if (preg_match("/^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]{1,20}$/",$nick) && preg_match("/^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]{1,20}$/",$prijmeni) && preg_match("/^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+\s[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+$/",$kamarad)){
        $zak = array('nick' => $nick,'prijmeni' => $prijmeni,'trida' => $trida, 'je_plavec' => $je_plavec, 'kanoe_kamarad' => $kamarad);
        $current_data=file_get_contents($file_name);
        $array_data=json_decode($current_data, true);
        $myfile = fopen($file_name, "a") or die("Unable to open file!");
        $array_data[]=$zak;
        
        if(file_put_contents("$file_name", json_encode($array_data))) {
            echo 'success';
        }                
        else {
            echo 'There is some error';                
        }
    }


}
?>