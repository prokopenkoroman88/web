<?php

namespace App\Http\Controllers\Srv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;
use App\Classes\ExcelDoc;

use Session;// like Shop Cart.php

class ExcelController extends Controller
{

	/**
	* @var ExcelDoc
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
        return view('srv.excel');
    }


	public function open($filename=''){

		$this->doc = new ExcelDoc($filename);
		self::$fileName = $filename;

		$doc = $this->doc;
		//$_SESSION['excelDoc']=$this->doc;
		Session::put('excelDoc',$this->doc);
		return view('srv.excel', compact('doc'));
    	//return "my service/excel/open($name)";
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

