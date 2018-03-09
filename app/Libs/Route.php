<?php

namespace App\Libs;

/**
* Define Routes
*/
class Route
{

	public static function get($req_url, $callback=false)
	{

		if ( !is_null($req_url) ) {

			if ($callback==false) {
				if ( $req_url === $url[1]) {
					print_r($req_url);
					print_r($url);
					// return view($req_url);
				} else {
					return false;
				}
			} elseif ($callback) {
				$callback();
			} else {
				return false;
			}

		} else {
			print_r('Nema vrednosi');
		}
		return false;
	}

}