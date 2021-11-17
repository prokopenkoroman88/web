<?php

namespace App\Http\Controllers\Srv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \PhpOffice\PhpWord\PhpWord;
use App\Classes\WordDoc;
//use App\Classes\PHPDoc;

use Session;// like Shop Cart.php

class WordController extends Controller
{//+6.10.21

	/**
	* @var WordDoc
	*/
	public $doc;

	/**
	* @var String
	*/
	public static $fileName;

    //
	private function load(){


	}



	private function save(){
			//
	}



    public function index()
    {
        //
        return view('srv.word');
    }


	//ajax:
	public function createFile(Request $request){

		$doc = new WordDoc($request->fileName);
		Session::put('wordDoc',$doc);
		//return view('srv.word', compact('doc'));
		return ['doc', $doc];
	}

    //ajax:
    public function saveFile(Request $request){

//		$request->page;
//		$request->cell;
//		$request->value;



//	 	if(!$this->doc)
//			$this->doc = new ExcelDoc($this->fileName);

		//!!!!!!!!!// return ['my doc', $this->doc];
		//return ['filename=',self::$fileName]; null
		//?//return ['SESSION[excelDoc]=', $_SESSION['excelDoc'] ];
		//return ['SESSION[excelDoc]=', Session::get('excelDoc') ];


    	$doc = Session::get('wordDoc');

		$doc->save($request->fileName);
		return ['ok!', $doc];
    }


    //ajax:
    public function addText(Request $request){
    	$doc = Session::get('wordDoc');



		$sectionStyle = array(
		 
		 'orientation' => 'portrait',//'landscape',//'portrait'
		 'marginTop' => \PhpOffice\PhpWord\Shared\Converter::pixelToTwip(10),
		 'marginLeft' => 600,
		 'marginRight' => 600,
		 'colsNum' => 1,
		 'pageNumberingStart' => 1,
		 'borderBottomSize'=>100,
		 'borderBottomColor'=>'C010C0'
		 
		 );
		$section = $doc->word->addSection($sectionStyle); 




		$text = $request->text;


		$fontStyle = array('name'=>'Arial', 'size'=>36, 'color'=>'075776', 'bold'=>TRUE, 'italic'=>TRUE);
		$parStyle = array('align'=>'right','spaceBefore'=>10);
    	$section->addText(htmlspecialchars($text), $fontStyle,$parStyle);


		$fontStyle = array('name'=>'Times New Roman', 'size'=>16, 'color'=>'760757', 'bold'=>TRUE, 'italic'=>false, 'stroked'=>true );
		$text = "PHPWord is a library written in pure PHP that provides a set of classes to write to and read from different document file formats.";
    	$section->addText(htmlspecialchars($text), $fontStyle,$parStyle);

    	$doc->addImage('images/roman-prokopenko.jpg');

		return ['doc', $doc];
	}


//ajax:
	public function saveAll(Request $request){

		$doc = new WordDoc($request->fileName);
		Session::put('wordDoc',$doc);
		//$doc = Session::get('wordDoc');

		$list = $request->list;
		//dd($list);

		foreach ($list as $i => $prgr) {
			$doc->addParagraph( $prgr['parStyle'] );
			

			foreach ($prgr['parText'] as $j => $txt) {
				if(isset($txt['src']))
					$doc->addParLink($txt['src'],$txt['text'], $txt['fontStyle']);
				else{


					$fontStyle = $txt['fontStyle'];
					$fontStyle2 = array('name'=>'Arial', 'size'=>20, 'color'=>'800000', 'bold'=>TRUE, 'italic'=>TRUE, 'underlined'=>true);

					//$doc->addParText($txt['text'], $fontStyle2);
					$doc->addParText($txt['text'], array('color'=>'800000'));

					//$doc->addParText(' FONT1='.print_r($fontStyle ,true),);
					//$doc->addParText(' FONT2='.print_r($fontStyle2,true),);
					$doc->addParText(' FONT1='.var_dump($fontStyle ),);
					$doc->addParText(' FONT2='.var_dump($fontStyle2),);

				};
			};
		};


		$doc->save($request->fileName);
		return ['ok!', $doc];
		//return view('srv.word', compact('doc'));
	}
/*

			let list = [
				{
					parStyle:{
						'borderLeftColor':'f0e080',
						'borderLeftSize':100,
					},
					parText:[
						{
							text:'first text', 
							fontStyle:{
								'color':'f080e0',
								'bold':true,
							}
						},
						{
							text:'second text', 
							fontStyle:{
								'color':'80f080',
								'italic':true,
							}
						},
					]
				},

			];




    public function addParagraph($parStyle=[]){
		$this->paragraph = $this->section->addTextRun($parStyle);
    }

    public function addParText($text, $fontStyle=[]){
		$this->paragraph->addText(htmlspecialchars($text), $fontStyle);
    }

    public function addParLink($src, $text='', $fontStyle=[]){
    	if(!$text)
    		$text=$src;
		$this->paragraph->addLink($src, htmlspecialchars($text), $fontStyle);
    }
*/












}

