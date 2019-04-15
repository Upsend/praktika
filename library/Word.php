<?php
/*
Работа с обьектом - Word
генерация word документов
*/	
		
class Word {	
	const VERSION = 1.00;	
	
	/*
	ПРИМЕНЕНИЕ:
	$word=new Word();
	$word->generate($data);
	//решение проблемы с русскими буквами http://kumatoz.ru/novosti/reshenie-problemy-russkix-simvolov-v-phpword-setvalue/
	*/
	public function generate($data=NULL){	//генерация документа по шаблону с переменными			
		
		if (empty($data['template'])) 
      $template="template1";
    
    $tmp_patch=realpath(__DIR__."/../templates/".$template.".docx");//путь до шаблона юр лица biblio7.loc/example	
		
		if ($tmp_patch==false) {//есть ли файл шаблона на сервере?
			echo "Шаблон договора не найден.";
			return false;
		}
		
		$this->document = $this->phpword->loadTemplate($tmp_patch); //открываем шаблон			
		
		$title="Коммерческое предложение";
    $subject="Коммерческое предложение";
    $description="Коммерческое предложение";
		
		$this->properties = $this->phpword->getDocInfo();			
		$this->properties->setCreator($_SERVER['HTTP_HOST']); 
		$this->properties->setCompany($_SERVER['HTTP_HOST']);
		$this->properties->setTitle($this->rus2translit($title));
		$this->properties->setDescription($this->rus2translit($description));
		$this->properties->setLastModifiedBy($_SERVER['HTTP_HOST']);
		$this->properties->setCreated(time()); //time()
		$this->properties->setModified(time());
		$this->properties->setSubject($this->rus2translit($subject));
		
		//получаем переменные для подстановки в шаблон
		// в шаблоне - docx файле должны быть переменные вида ${fio} причем важно чтобы они вставлялись
		// одним элементом, т.е. без пробелов и лучше просто скопировать отсюда и вставить.
		// потому что если по частям сохранять эту пременную она может смешаться с тегами
				
		//вычисляемые поля		
		$data['fio']			="Кротов Роман";	
		$data['created']		=date("d.m.Y")." года";
        $data['id_document']	=uniqid();
		$data['url']	='http://aff.krotovroman.ru/phppro';
		
		//заменяем переменные	
		foreach($data as $field=>$value)  $this->document->setValue($field, $value);		
		
		 
		// if (!empty($data['server'])) {
      $temp_file="finish/dogovor_".$data['id_document'].".docx";
      $this->document->saveAs($temp_file); //сохранить в временную папку на сервере	    
		} 
		
      $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');//сохранять будем во временную папку  
      
//       $this->document->saveAs($temp_file); //сохранить в временную папку на сервере		    
//       //заголовки чтобы скачать сразу файл
// header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
// header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
// header ( "Cache-Control: no-cache, must-revalidate" );
// header ( "Pragma: no-cache" );
// header ( "Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
// header("Content-Disposition: attachment; filename=dogovor_".$data['id_document'].".docx");
      readfile($temp_file); 
      unlink($temp_file);
		
			
	}
	
		private function rus2translit($string){ //перевод русского текста в транслит
		$converter = array(
			'а' => 'a',   'б' => 'b',   'в' => 'v',
			'г' => 'g',   'д' => 'd',   'е' => 'e',
			'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			'и' => 'i',   'й' => 'y',   'к' => 'k',
			'л' => 'l',   'м' => 'm',   'н' => 'n',
			'о' => 'o',   'п' => 'p',   'р' => 'r',
			'с' => 's',   'т' => 't',   'у' => 'u',
			'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			'ь' => "'",  'ы' => 'y',   'ъ' => "'",
			'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
	 
			'А' => 'A',   'Б' => 'B',   'В' => 'V',
			'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			'О' => 'O',   'П' => 'P',   'Р' => 'R',
			'С' => 'S',   'Т' => 'T',   'У' => 'U',
			'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ь' => "'",  'Ы' => 'Y',   'Ъ' => "'",
			'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}
	
	public function __construct() {			
		//подключаем PHPWord для работы с вордовскими файлами
		require_once (realpath(__DIR__."/phpword/Autoloader.php"));
		\PhpOffice\PhpWord\Autoloader::register();
		$this->phpword = new  \PhpOffice\PhpWord\PhpWord();
	}

} //class