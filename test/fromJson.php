<?php include '../vendor/autoload.php';

$rtds = new \Rtds\RtdsObject();
$json = <<<EOT
{
	"radio": {
		"name": "Utopic",
		"slogan": "Bonne humeur garantie"
	},
	"tags": {
		"artists": ["Madeon", "Passion Pit"],
		"title": "Pay No Mind"
	}
}
EOT;
$rtds->fromJson($json);

var_dump($rtds);