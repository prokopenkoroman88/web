<?php

namespace App\Statistic;
//  Funcs\     Services\

//use Illuminate\Http\Request;
//use App\Comment;//+

//static 
class Statistic //extends Controller
{
	//const MAX_MARK=5;

	public static function get_starmark_style($gold,$gray){
		return 
	" background: -webkit-linear-gradient(left ,gold {$gold}%, lightgray {$gold}%, lightgray {$gray}% );
	-webkit-background-clip: text; ";

	}

	public static function get_starmark($mark){
		$gold=$mark*(100/5); //MAX_MARK
		$gray=100-$gold;
		$style=self::get_starmark_style($gold,$gray);
		return "<span class='star-mark' style='$style'></span>";
	}


	public static function the_starmark($mark){
		echo self::get_starmark($mark);
	}

}

