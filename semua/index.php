<?php
    error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', true);
	ini_set('auto_detect_line_endings', true);
	ini_set('allow_url_fopen', 'on');
	require_once('./Converter.php');
$proc = new XsltProcessor;
$t = new Converter;

	$inputFile = 'Menu.xml';
	$doc = new DOMDocument();
	$doc->load('Menu.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
	$xml = file_get_contents($inputFile);
	
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
	
	
	$dir1 = "http://localhost/BernadetteVina/csv.php";
	$dir2 = "http://localhost/testPHP2/test.xml";
	$dir3 = "http://localhost/tugas-2-pemrograman-integratif/data3.xml";
	$dir4 = "http://localhost/web-service/datasiswa.xml";
	$dir5 = "http://localhost/II3160--Pemrograman-Integratif-/DaftarIdol.xml";
	$dir6 = "http://localhost/II3160-Tugas1-Tugas2/tab2.xml";
	$dir7 = "http://localhost/IPT-Assignments/data2.xml";
	$dir8 = "http://localhost/pemrograman_integratif/output.xml";
	$dir9 = "http://localhost/Progint/data/xml/1.xml";
	$dir10 = "http://localhost/progin/contoh.xml";
	$dir11 = "http://localhost/BernadetteVina/DataXML.xml";
	$dir12 = "http://localhost/II3160-Tugas-18211011-18211053/index.php/search/korans";
	$dir13 = "http://localhost/ningenis/II3160-Progin-18211002-18211033/getSelf.php?input=semua";
	$dir14 = "http://localhost/pemrograman-integratif/artis.php";
	$dir15 = "http://localhost/II3160-18211017-18211043/index.php/Api/xml_from_csv";
	$dir16 = "http://localhost/Progint-yogidanang/?kolom=all";

    for($i=1; $i<17; $i++)
    {
		$filename="dir".$i;
        $xml=simplexml_load_file($$filename);
?>
	<table border="1">
	<caption><b> <?php echo $xml->getName() . "<br>"; ?> </b></caption>
	<tr><?php foreach ($xml->children()->children() as $child) { ?>
	<th> <?php echo $child->getName(); ?> </th>
	<?php } ?> </tr>
	<?php 
	$n = 0;
	foreach ($xml->children() as $child) {
	 foreach ($child->children() as $r) :?>
	 <td><?php echo $r . "<br>"; ?></td>
	<?php endforeach;?> 
	</tr>
	<?php $n++;
	}
 } 
?> 

