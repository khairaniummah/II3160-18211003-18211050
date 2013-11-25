<?php 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
ini_set('auto_detect_line_endings', true);
ini_set('allow_url_fopen', 'on');
require_once('./Converter.php');
$proc = new XsltProcessor;
$t = new Converter;
//if ($_GET["search"] == 'dataxml'){ //perintah: http://localhost/get.php?search=dataxml
	$inputFile = 'Menu.xml';
	$doc = new DOMDocument();
	$doc->load('Menu.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
	//$xml = file_get_contents($inputFile);
//}

//else if ($_GET["search"] == 'datacsv'){ //perintah: http://localhost/get.php?search=datacsv
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
//}

//else if ($_GET["search"] == 'datasql'){ //perintah: http://localhost/get.php?search=datasql
	$convert = $t->sqlConverter();
	$doc = new DOMDocument();
	$doc->load('datasql.xsl');
	$proc->importStylesheet($doc);
	$inputFile = 'datasql.xml';
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
//}
$dir = "../*/*.xml";
$files = glob($dir);
    foreach($files as $file)
    {
        $xml=simplexml_load_file($file);
?>
	<table border="1"><br>
	<caption><b> <?php echo $xml->getName() . "<br>"; ?> </b></caption>
	<tr><?php foreach ($xml->children()->children() as $child) { ?>
	<th> <?php echo $child->getName(); ?> </th>
	<?php } ?> </tr>
	<?php 
	foreach ($xml->children() as $child) {
	 foreach ($child->children() as $r) :?>
	 <td><?php echo $r . "<br>"; ?></td>
	<?php endforeach;?> 
	</tr>
	<?php 
	}
 } 
?> 

