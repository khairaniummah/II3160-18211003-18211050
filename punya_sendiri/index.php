<?php
ini_set('auto_detect_line_endings', true);
require_once('./Converter.php');
$proc = new XsltProcessor;
$t = new Converter;
echo 'Untuk menampilkan tabel menu: http://localhost/II3160-18211003-18211050/punya_sendiri/?search=menu '; echo '<p>';
echo 'Untuk menampilkan chat log: http://localhost/II3160-18211003-18211050/punya_sendiri/?search=chat '; echo '<p>';
echo 'Untuk menampilkan tabel pegawai: http://localhost/II3160-18211003-18211050/punya_sendiri/?search=pegawai '; echo '<p>';

if ($_GET["search"] == 'menu'){ 
	ob_end_clean();
	$inputFile = 'Menu.xml';
	$doc = new DOMDocument();
	$doc->load('Menu.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
	$xml = file_get_contents($inputFile);
}
if ($_GET["search"] == 'chat'){ 
	ob_end_clean();
	$convert = $t->csvConverter();
	$inputFile = 'output.xml';
	//$xml = file_get_contents($inputFile);
	//echo $xml;
	$doc = new DOMDocument();
	$doc->load('output.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
}
if ($_GET["search"] == 'pegawai'){ 
	ob_end_clean();
	$convert = $t->sqlConverter();
	$doc = new DOMDocument();
	$doc->load('datasql.xsl');
	$proc->importStylesheet($doc);
	$inputFile = 'datasql.xml';
	$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);	
}
?>