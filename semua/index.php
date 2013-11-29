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
	
	
	$dir1 = "http://sti-itb.org/BernadetteVina/csv.php";
	$dir2 = "http://sti-itb.org/testPHP2/test.xml";
	$dir3 = "http://sti-itb.org/tugas-2-pemrograman-integratif/data3.xml";
	$dir4 = "http://sti-itb.org/web-service/datasiswa.xml";
	$dir5 = "http://sti-itb.org/II3160--Pemrograman-Integratif-/DaftarIdol.xml";
	$dir6 = "http://sti-itb.org/II3160-Tugas1-Tugas2/tab2.xml";
	$dir7 = "http://sti-itb.org/IPT-Assignments/data2.xml";
	$dir8 = "http://sti-itb.org/pemrograman_integratif/informasi_xml.php?nim=all";
	$dir9 = "http://sti-itb.org/Progint/data/xml/1.xml";
	$dir10 = "http://sti-itb.org/progin/contoh.xml";
	$dir11 = "http://sti-itb.org/BernadetteVina/DataXML.xml";
	$dir12 = "http://sti-itb.org/II3160-Tugas-18211011-18211053/index.php/search/korans";
	$dir13 = "http://sti-itb.org/ningenis/II3160-Progin-18211002-18211033/getSelf.php?input=semua";
	$dir14 = "http://sti-itb.org/pemrograman-integratif/artis.php";
	$dir15 = "http://sti-itb.org/II3160-18211017-18211043/index.php/Api/xml_from_csv";
	$dir16 = "http://sti-itb.org/Progint-yogidanang/?kolom=all";
	$dir17 = "http://sti-itb.org/18211037/RestWebService/index.php/api/Liverpool/players/format/xml";
	$dir18 = "http://sti-itb.org/xmlconvert.php/pegawai";
	$dir18 = "http://sti-itb.org/18211010-18211035/searchmhs.php?tag=all";
	$dir18 = "http://sti-itb.org/18211014-dan-18211029/index.php";
	

    for($i=1; $i<19; $i++)
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

