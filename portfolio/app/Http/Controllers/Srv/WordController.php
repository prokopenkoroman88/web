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


    	$this->doc = Session::get('wordDoc');

		$this->doc->save($request->fileName);
		return ['ok!', ];
    }


    //ajax:
    public function addText(Request $request){
    	$this->doc = Session::get('wordDoc');



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
		$section = $this->doc->word->addSection($sectionStyle); 




		$text = $request->text;


		$fontStyle = array('name'=>'Arial', 'size'=>36, 'color'=>'075776', 'bold'=>TRUE, 'italic'=>TRUE);
		$parStyle = array('align'=>'right','spaceBefore'=>10);
    	$section->addText(htmlspecialchars($text), $fontStyle,$parStyle);


		$fontStyle = array('name'=>'Times New Roman', 'size'=>16, 'color'=>'760757', 'bold'=>TRUE, 'italic'=>false, 'stroked'=>true );
		$text = "PHPWord is a library written in pure PHP that provides a set of classes to write to and read from different document file formats.";
    	$section->addText(htmlspecialchars($text), $fontStyle,$parStyle);

    	$this->doc->addImage('images/roman-prokopenko.jpg');

	}









	public function open($filename=''){

		$this->doc = new ExcelDoc($filename);
		self::$fileName = $filename;

		$doc = $this->doc;
		//$_SESSION['excelDoc']=$this->doc;
		Session::put('excelDoc',$this->doc);
		return view('srv.word', compact('doc'));
    	//return "my service/excel/open($name)";
    }

	//ajax:
	public function openFile(Request $request){//+17.9.21

		$doc = new ExcelDoc($request->fileName);
		Session::put('excelDoc',$doc);
		//return view('srv.word', compact('doc'));
		return ['doc', $doc];
	}
	//ajax:
	public function choiceSheet(Request $request){//+17.9.21

		$doc = Session::get('excelDoc');
		//$this->doc->spreadsheet->setActiveSheetIndexByName($pValue)
		$doc->spreadsheet->setActiveSheetIndex($request->sheetIndex);
		$doc->sheet = $doc->spreadsheet->getActiveSheet();
		$sheetCells = $doc->sheet->toArray();//двумерный числовой по-строчно со всей страницы

		//Session::put('excelDoc',$doc);
		//return view('srv.word', compact('doc'));
		return ['sheetCells', $sheetCells];
    }






    //ajax:
    public function setValue(Request $request){

//		$request->page;
//		$request->cell;
//		$request->value;



//	 	if(!$this->doc)
//			$this->doc = new ExcelDoc($this->fileName);

		//!!!!!!!!!// return ['my doc', $this->doc];
		//return ['filename=',self::$fileName]; null
		//?//return ['SESSION[excelDoc]=', $_SESSION['excelDoc'] ];
		//return ['SESSION[excelDoc]=', Session::get('excelDoc') ];


    	$this->doc = Session::get('excelDoc');

		//$this->doc->spreadsheet->setActiveSheetIndexByName($pValue)
		$this->doc->spreadsheet->setActiveSheetIndex($request->page);
		$this->sheet = $this->doc->spreadsheet->getActiveSheet();


		$this->doc->setCell($request->cell, $request->value);
		$this->doc->save();
		return ['ok!', ];
    }







}

