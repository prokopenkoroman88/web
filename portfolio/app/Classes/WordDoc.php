<?php

namespace App\Classes;
/*
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as ReaderXlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXlsx;
*/
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Style\ListItem;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Writer\PDF;

class WordDoc{


//	const WORD_TYPES = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/octet-stream'];

	/**
	* @var PhpWord
	*/
	public $word=null;

	/**
	* @var \PhpOffice\PhpWord\Metadata\DocInfo
	*/
	public $properties;

	/**
	* @var Section
	*/
	public $section=null;


	public $fileName='';


	public function __construct($filename=''){
		if($filename)
			$this->fileName = $filename;
		$this->word = new PhpWord();

		$this->properties = $this->word->getDocInfo();  



//https://hotexamples.com/ru/site/file?hash=0xa606c1ceed0b997503ae12538d0ac603dd4269ef5ff3610b20bcf8ee3e587f8a&fullName=libraries/PHPWord-master/tests/PhpWord/Tests/PDFTest.php&project=kaantunc/MYK-BOR
        $rendererName = Settings::PDF_RENDERER_DOMPDF;
        $rendererLibraryPath = realpath(__DIR__ .
        // '/../vendor/dompdf/dompdf'
        	'/../vendor/phpoffice/phpword/src/PhpWord/Writer/PDF/DomPDF'
     	);
        Settings::setPdfRenderer($rendererName, $rendererLibraryPath);


	}


	public function initProperties(){

		$this->properties->setCreator('Name');
		$this->properties->setCompany('Company');
		$this->properties->setTitle('Title');
		$this->properties->setDescription('Description');
		$this->properties->setCategory('My category');
		$this->properties->setLastModifiedBy('My name');
		$this->properties->setCreated(mktime(0, 0, 0, 3, 12, 2015));
		$this->properties->setModified(mktime(0, 0, 0, 3, 14, 2015));
		$this->properties->setSubject('My subject');
		$this->properties->setKeywords('my, key, word');   

/*
setCreator() – автор документа;
setCompany() – организация автора документа;
setTitle() – заголовок документа;
setDescription() – краткое описание документа;
setCategory() – категория документа;
setLastModifiedBy() – автор последнего редактирования документа;
setCreated() – дата создания документа;
setModified() – дата редактирования документа;
setSubject() – тема документа;
setKeywords() – ключевые слова документа.
*/
	}



	public function setDefaultFont($size=0, $name=''){
		if($size)
			$this->word->setDefaultFontSize($size);
		if($name)
			$this->word->setDefaultFontName($name);//'Times New Roman'
// 			$this->word->setDefaultParagraphStyle($styles);
	}





	public function addSection($sectionStyle=[]){

		$sectionStyle = array(
		 
		 'orientation' => 'portrait',//'landscape',//'portrait'
		 'marginTop' => Converter::pixelToTwip(10),
		 'marginLeft' => 600,
		 'marginRight' => 600,
		 'colsNum' => 1,
		 'pageNumberingStart' => 1,
		 'borderBottomSize'=>100,
		 'borderBottomColor'=>'C010C0'
		 
		 );
		$this->section = $this->word->addSection($sectionStyle); 
		return $this->section;
	}


	public function addText($text, $fontStyle=[], $parStyle=[]){

		$fontStyle = array('name'=>'Arial', 'size'=>36, 'color'=>'075776', 'bold'=>TRUE, 'italic'=>TRUE);
		$parStyle = array('align'=>'right','spaceBefore'=>10);
    	$this->section->addText(htmlspecialchars($text), $fontStyle,$parStyle);

    }




	public function addList($list, $fontStyle=[], $listStyle=[]){
		$fontStyle = array('name' => 'Times New Roman', 'size' => 16,'color' => '075776','italic'=>true);
		$listStyle = array('listType'=>ListItem::TYPE_BULLET_EMPTY);


//listType: consts of class PhpOffice\PhpWord\Style\ListItem
//TYPE_SQUARE_FILLED=1 FILLED – не нумерованный список. В виде маркеров используются квадраты.
//TYPE_BULLET_FILLED=3 – не нумерованный список (значение по умолчанию). В виде маркеров используются точки.
//TYPE_BULLET_EMPTY=5 FILLED – не нумерованный список. В виде маркеров используются не закрашенные окружности.
//TYPE_NUMBER=7 – нумерованный список.
//TYPE_NUMBER_NESTED=8 – многоуровневый нумерованный список.
//TYPE_ALPHANUM=9 – нумерованный список, с использованием букв, в качестве маркеров.

		foreach ($list as $key => $row) {
			$this->section->addListItem($row['text'],$row['depth'],$fontStyle,$listStyle); 
		};
		//$section->addListItem('Элемент 1',0,$fontStyle,$listStyle); 
		//$section->addListItem('Элемент 2',0,$fontStyle,$listStyle); 
		//$section->addListItem('Элемент 3',0,$fontStyle,$listStyle); 
		//$section->addListItem('Элемент 4',0,$fontStyle,$listStyle); 
		//$section->addListItem('Элемент 5',0,$fontStyle,$listStyle);  
	}


	public function addImage($src, $imageStyle=[]){
		if(!$this->section){
			$this->section = $this->word->addSection();
		};

		//$src='picture.jpg'
		$imageStyle=array(
		 'width' => 100,
		 'height' => 100,
		 'align' => 'right', //'left' 'center' 'right'
		 'marginTop' => 2,//in inches m.b. < 0
		 'marginLeft' => 3,//in inches m.b. < 0
		 'wrappingStyle' => 'square', //'inline' 'square' 'tight' 'behind' 'infront'
		);
		$this->section->addImage($src, $imageStyle);
	}





	public function open($filename=''){
	
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


//		$pdf = new PDF($this->word);
//		$pdf->save($this->fileName);


        $rendererName = Settings::PDF_RENDERER_DOMPDF;
        $rendererLibraryPath = realpath(__DIR__ .
        // '/../vendor/dompdf/dompdf'
        	'/../vendor/phpoffice/phpword/src/PhpWord/Writer/PDF/DomPDF'
     	);
        Settings::setPdfRenderer($rendererName, $rendererLibraryPath);


        $pdfLibraryName = Settings::getPdfRendererName();
        $pdfLibraryPath = Settings::getPdfRendererPath();
        $s='Name="'.$pdfLibraryName.'"; Path="'.$pdfLibraryPath.'";';
        //dd($s);


		if(!false){
			$format='RTF';
			$this->fileName.='RichedText_1.rtf';



			$fontStyle = array('name'=>'Arial', 'size'=>10, 'color'=>'800000', 'bold'=>TRUE, 'italic'=>TRUE, 'underlined'=>true);
			$parStyle = array('align'=>'right','spaceBefore'=>10);

			$this->word->getSection(0)->addText(htmlspecialchars($s), $fontStyle,$parStyle);

		};

		$this->word->save($this->fileName, $format , $download);
		//D:\STEP\PHP\OSPanel\domains\portfolio\vendor\phpoffice\phpword\src\PhpWord\PhpWord.php
		
		//IOFactory !!!!!!!!!!!!!!!1
		//D:\STEP\PHP\OSPanel\domains\portfolio\vendor\phpoffice\phpword\src\PhpWord\IOFactory.php

	}

}
/*
https://happymonday.ua/u-yakomu-formati-krashhe-nadsylaty-rezyume
https://webformyself.com/phpword-sozdanie-ms-word-dokumentov-sredstvami-php/
*/