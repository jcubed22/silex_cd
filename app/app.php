<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";

    $app = new Silex\Application();

    $app->get("/",function(){
        $first_cd = new CD("Aeroplane Over the Sea", "Neutral Milk Hotel", "images/aeroplane.jpg", 10.99);
        $second_cd = new CD("Abbey Road", "The Beatles", "images/abbeyroad.jpg", 39.99);
        $third_cd = new CD("Like the Exorcist, But With More Breakdancing", "Murder by Death", "images/mbd.jpg", 29.99);
        $fourth_cd = new CD("Whokill", "The Tune-Yards", "images/whokill.jpeg", 10.99);
        $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

        $output = "";
        foreach ($cds as $album) {
            $output = $output . "<div class='row'>
                <div class='col-md-6'>
                    <img src=" . $album->getCoverArt() . ">
                </div>
                <div class='col-md-6'>
                    <p>" . $album->getTitle() . "</p>
                    <p>By " . $album->getArtist() . "</p>
                    <p>$" . $album->getPrice() . "</p>
                </div>
            </div>
            ";
        }
        return $output;
    });

    return $app;
?>
