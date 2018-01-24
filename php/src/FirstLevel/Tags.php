<?php namespace \Rtds\FirstLevel;

class Tags {
	public \Array $artists;
	public \String $title;
	public \String $album;
	public \Integer $year;
	public \Rtds\Util\Cover $cover;
	public \Array $genres;
	public \Array $categories;
	public \Float $length;
	public \Float $remaining;
	public \Rtds\Shared\Urls $urls;
	public \Array $extra;
	public \Rtds\FirstLevel\Tags $previous;
	public \Rtds\FirstLevel\Tags $next;
}
