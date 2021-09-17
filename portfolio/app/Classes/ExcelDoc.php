<?php

namespace App\Classes;

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as ReaderXlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXlsx;

//?//use \PhpOffice\PhpWord\PhpWord;

class ExcelDoc{


	const EXCEL_TYPES = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
	'application/octet-stream'];


	/**
	* @var Spreadsheet
	*/
	public $spreadsheet;

	/**
	* @var Worksheet
	*/
	public $sheet;

	/**
	* @var ReaderXlsx
	*/
	public $reader;

	/**
	* @var WriterXlsx
	*/
	public $writer;

	public $fileName='';


	public function __construct($filename=''){
			//$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
			$this->reader = new ReaderXlsx();//$spreadsheet);
			$this->reader->setReadDataOnly(TRUE);
			$this->open($filename);

			$this->writer = new WriterXlsx($this->spreadsheet);
	}


	public function open($filename=''){

			$this->fileName = $filename;
			if($this->fileName && file_exists($this->fileName))
				$this->spreadsheet = $this->reader->load($this->fileName);//загружаем данные файла
			else
				$this->spreadsheet = new Spreadsheet();

			$this->sheet = $this->spreadsheet->getActiveSheet();		
	}



	public function save($filename=''){

		if($filename)
			$this->fileName = $filename;
		$this->writer->save($this->fileName);
		//'MyNewBook.xlsx' -> D:\STEP\PHP\OSPanel\domains\portfolio\public\MyNewBook.xlsx

	}







    public function setCell($cell,$value){
    	$this->sheet->setCellValue($cell,$value);//'A1', 'Название');
    }





/*



//load:




			$dataArray = $sheet->toArray();//двумерный числовой по-строчно со всей страницы


//save:

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		//нужен двумерный нумерованный массив из All()
	//books?	$sheet->fromArray($books,NULL,'A1');


		$sheet->setCellValue('A1', 'Название');
		$sheet->setCellValue('B1', 'Цена');
		$sheet->setCellValue('C1', 'Категория');
/ *
		$sheet->setCellValue('A1', 'Название');
		$sheet->setCellValue('B1', 'Цена');
		$sheet->setCellValue('C1', 'Категория');

		foreach ($books as $num => $book) {
			$sheet->setCellValue('A'.($num+2), $book->name);
			$sheet->setCellValue('B'.($num+2), $book->price);
			$sheet->setCellValue('C'.($num+2), $book->category);
		};
* /
		$writer = new Xlsx($spreadsheet);
		$writer->save('MyNewBook.xlsx');
		//D:\STEP\PHP\OSPanel\domains\portfolio\public\MyNewBook.xlsx





*/















}