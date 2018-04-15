<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 22.03.2018
 * Time: 16:02
 */
class JSON_Handle {

    private $statFile;
    private $newItem;

    public function __construct($newItem) {
        $this->newItem = $newItem;
        $this->newItem = array(
            "date"   =>"18-01-2018",
            "ip"     =>"127.34.56.23",
            "name"   =>"Kinga Hajdukk",
            "email"  =>"kinga.hajdukk@gmail.com",
            "phone"  =>"500781027",
            "message"=>"Dzień dobry! Bardzo zależy mi na przymierzeniu tej sukienki: http://lucky-dress.eu/img/sessions/dayOne/_R7A1119.jpg http://lucky-dress.eu/img/sessions/dayOne/_R7A1126.jpg Kiedy ewentualnie mogłabym? Pozdrawiam, Kinga Hajduk"
        );

        $this->statFile = $_SERVER['DOCUMENT_ROOT'].'/data/requests.log';
        $this->json = '[ {
        "name":"Dorota Sokól",
        "email":"dorota.sokol@gmail.com",
        "ip":"127.34.56.23",
        "date":"29.01.2018 15:18:45",
        "message":"Xiaomi Redmi 4X (32GB) został wyposażony w większą pamięć wewnętrzną, mocniejszy procesor i większą pamięć RAM dzięki czemu działa jeszcze szybciej i płynniej. Posiada 5-calowy wyświetlacz IPS o rozdzielczości HD, który zapewnia żywe i realistyczne kolory. Wydajną baterię i dobrej klasy aparat."
    }
]';
    }

    public function countIt() {
        $json_a = json_decode($this->json, true);
        array_push($json_a, $this->newItem);
        $this->json = json_encode($json_a);
        // $this->json = json_encode($json_a, JSON_UNESCAPED_UNICODE);
//         $this->json = json_encode($json_a, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // echo "<hr><pre>"; var_dump($this->json); echo "</pre><hr>";
        // echo "<hr><pre>"; var_dump($this); echo "</pre><hr>";
        $this->writeNewData();
    }

    private function writeNewData() {
        //open or create the file
        $handle = fopen($this->statFile,'w+');
        //write the data into the file
        fwrite($handle,$this->json);
        //close the file
        fclose($handle);
    }
}