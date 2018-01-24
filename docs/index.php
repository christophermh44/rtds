<?php session_start();
define('DEBUG', true);

if (DEBUG) {
    error_reporting(-1);
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');
}

require 'vendor/autoload.php';

define('PATH_SEP', '/');
define('SITE_ROOT', __DIR__ . PATH_SEP . 'site');
define('TEMPLATE_ROOT', __DIR__ . PATH_SEP . 'template');
define('CACHE_PATH', __DIR__ . PATH_SEP . 'cache');
define('DOCUMENT_INDEX', 'index');
define('PAGE_EXT', '.md');
define('TEMPLATE_EXT', '.twig');

function documentFromQuery($query) {
	$document = null;
	if (file_exists(SITE_ROOT . $query) && is_dir(SITE_ROOT . $query) && file_exists(SITE_ROOT . $query . PATH_SEP . DOCUMENT_INDEX . PAGE_EXT)) {
		$document = SITE_ROOT . $query . PATH_SEP . DOCUMENT_INDEX . PAGE_EXT;
	} else if (file_exists(SITE_ROOT . $query . PAGE_EXT)) {
		$document = SITE_ROOT . $query . PAGE_EXT;
	}
	return $document;
}

function parseDocument($document) {
	$kurenai = new \Kurenai\Parser(
		new \Kurenai\Parsers\Metadata\YamlParser,
		new \Kurenai\Parsers\Content\MarkdownExtraParser
	);
	$contents = $kurenai->parse($document);
	$metadata = $contents->getMetadata();
	$template = ($metadata['template'] ?? DOCUMENT_INDEX) . TEMPLATE_EXT;
	$loader = new Twig_Loader_Filesystem(TEMPLATE_ROOT);
	$twig = new Twig_Environment($loader, [
	    'cache' => !DEBUG ? CACHE_PATH : false,
	]);
	return $twig->render($template, [
		'meta' => $metadata,
		'body' => $contents->getContent(),
	]);
}

function route($query) {
	$response = [
		'code' => 200,
		'body' => '',
		'headers' => []
	];
	if (strpos($query, '..') !== false) {
		$response['code'] = 403;
		$response['body'] = 'Forbidden.';
	} else {
		$document = documentFromQuery($query);
		if ($document != null) {
			$response['body'] = parseDocument($document);
		} else {
			$response['code'] = 404;
			$response['body'] = 'Page "' . $query . '" not found.';
		}
	}
	return $response;
}

$response = route($_SERVER['PATH_INFO'] ?? '/');
http_response_code($response['code']);
echo $response['body'];