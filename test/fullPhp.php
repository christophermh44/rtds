<?php include '../vendor/autoload.php';

$rtds = new \Rtds\RtdsObject();
$radio = new \Rtds\FirstLevel\Radio();
$radio->setName('Utopic');
$radio->setSlogan('Bonne Humeur Garantie !');
$tags = new \Rtds\FirstLevel\Tags();
$tags->setArtists(['Madeon', 'Passion Pit']);
$tags->setTitle('Pay No Mind');
$rtds->radio = $radio;
$rtds->tags = $tags;
$json = $rtds->send(200, 'Success.');

echo $json;
