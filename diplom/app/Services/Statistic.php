<?php

namespace App\Services;//\Statistic;
//  Funcs\     Services\

use Illuminate\Http\Request;
//use App\Comment;//+

//static 
class Statistic //extends Controller
{
	const MAX_MARK=5;

	public static function get_starmark_style($gold,$gray){
		return 
	" background: -webkit-linear-gradient(left ,gold {$gold}%, lightgray {$gold}%, lightgray {$gray}% );
	-webkit-background-clip: text; ";

	}

	public static function get_starmark($mark){

		$class='star-mark';
		$style='';
		if(round($mark,1)==round($mark)){
			$class.=(' star-mark-'.round($mark));
		}
		else{

			$gold=$mark*(100/self::MAX_MARK); //
			$gray=100-$gold;
			$style=self::get_starmark_style($gold,$gray);
		};
		if($class)$class="class='$class'";
		if($style)$style="style='$style'";

		return "<span $class $style></span>";
	}


	public static function the_starmark($mark){
		echo self::get_starmark($mark);
	}


	public static function the_fileShortName($file)
	{
		// '/update/rajah/update_95_170418.exe'
		$arr = explode('/',$file);

		$res=$arr[ count($arr)-1 ];
		// 'update_95_170418.exe'
		return $res;

	}

	public static function the_filesize($file,$format='КБ')
	{

		$fs=0;
		$path=realpath('.');//.PHP_EOL;  $file
		//dd($path);

		if($file){
			//$file='D:\STEP\PHP\OSPanel\domains\diplom\public'.$file;
			$file=$path.$file;

			$fs=filesize($file);
		};



		switch ($format) {
			case 'Б':
				# code...
				break;
			case 'КБ':
				$fs=round(($fs/1024),1);# code...
				break;
			case 'МБ':
				$fs=round(($fs/1024/1024),1);# code...
				break;
			case 'ГБ':
				$fs=round(($fs/1024/1024/1024),1);# code...
				break;
			
			default:
				# code...
				break;
		}

		//echo realpath($path), PHP_EOL;
		echo $fs.' '.$format;
	}


}

