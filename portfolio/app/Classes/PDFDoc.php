<?php

namespace App\Classes;
/*
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as ReaderXlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXlsx;
*/
use \PhpOffice\PhpWord\PhpWord;

class PdfDoc{


//	const WORD_TYPES = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/octet-stream'];

	/**
	* @var PhpWord
	*/
	$word=nil;

	public $fileName='';


	public function __construct($filename=''){

		if($filename)
			$this->fileName = $filename;
		$this->word = new PhpWord();



/*
			//$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
			$this->reader = new ReaderXlsx();//$spreadsheet);
			$this->reader->setReadDataOnly(TRUE);
			$this->open($filename);

			$this->writer = new WriterXlsx($this->spreadsheet);
*/
	}


	public function open($filename=''){
/*
			$this->fileName = $filename;
			if($this->fileName && file_exists($this->fileName))
				$this->spreadsheet = $this->reader->load($this->fileName);//загружаем данные файла
			else
				$this->spreadsheet = new Spreadsheet();

			$this->sheet = $this->spreadsheet->getActiveSheet();		
*/
	}



	public function save($filename=''){

		if($filename)
			$this->fileName = $filename;
//?		$this->writer->save($this->fileName);
		//'MyNewBook.xlsx' -> D:\STEP\PHP\OSPanel\domains\portfolio\public\MyNewBook.xlsx

		$format='PDF';
/*
            'Word2007'  => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'ODText'    => 'application/vnd.oasis.opendocument.text',
            'RTF'       => 'application/rtf',
            'HTML'      => 'text/html',
            'PDF'       => 'application/pdf',
*/
		$download = false;

		$this->word->save($filename, $format , $download);
		//D:\STEP\PHP\OSPanel\domains\portfolio\vendor\phpoffice\phpword\src\PhpWord\PhpWord.php
		
		//IOFactory !!!!!!!!!!!!!!!1
		//D:\STEP\PHP\OSPanel\domains\portfolio\vendor\phpoffice\phpword\src\PhpWord\IOFactory.php

	}





	public function getBooks(){//21.1.20:

		$bookModel = new Book();


		$books = $bookModel->all();//метод от предка Model


		$mpdf = new \Mpdf\Mpdf();


		$mpdf->setFooter('|{PAGENO} из {nbpg} страниц|');//№ страницы внизу

		$mpdf->WriteHTML('<h1>Все книги из таблицы books</h1>');

		$mpdf->WriteHTML('<table>');
		foreach ($books as $book) {
			$mpdf->WriteHTML("<tr><td>$book->name</td><td>$book->price</td><td>$book->category</td></tr>");
		};
		$mpdf->WriteHTML('</table>');


		$mpdf->Output();
		//$mpdf->Output('books.pdf',\Mpdf\Output\Destination::DOWNLOAD);
		
		//$bookModel->table
		//http://mpdf.github.io/reference/mpdf-functions/output.html
		//$mpdf->filename


	}




}