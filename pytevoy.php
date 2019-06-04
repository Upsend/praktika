<?php  
require_once ('putevka.php');
$date = $_POST["dateoday"];
	$auto = $_POST["auto"];
	$nomera = $_POST["nomera"];
	$imya = $_POST["imya"];
	$prava = $_POST["prava"];
	$klass = $_POST["klass"];
	$garage_nom = $_POST["garage_nom"];
	$tab_nom = $_POST["tab_nom"];

	if (isset($_POST['go'])){
		$_doc = new \PhpOffice\PhpWord\TemplateProcessor('templates/template1.docx');
		$_doc->setValue('dateoday', $date); 
		$_doc->setValue('auto', $auto); 
		$_doc->setValue('nomera', $nomera); 
		$_doc->setValue('imya', $imya); 
		$_doc->setValue('prava', $prava); 
		$_doc->setValue('klass', $klass); 
		$_doc->setValue('garage_nom', $garage_nom); 
		$_doc->setValue('tab_nom', $tab_nom); 
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="first.docx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($_doc, 'Word2007');
		$objWriter->save("php://output");

		$insert = mysqli_query($db, "INSERT INTO putevki VALUES ('','$imya','$prava','$klass','$tab_nom','$nomera','$garage_nom','$auto','$date')");

	}
?>