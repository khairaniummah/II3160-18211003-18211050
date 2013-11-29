<?php
    error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', true);
	ini_set('auto_detect_line_endings', true);
	ini_set('allow_url_fopen', 'on');
	
	$file1 = "http://sti-itb.org/II3160-18211003-18211050/punya_sendiri/?search=menu";
	$file2 = "http://sti-itb.org/II3160-18211003-18211050/punya_sendiri/?search=chat";
	$file3 = "http://sti-itb.org/II3160-18211003-18211050/punya_sendiri/?search=pegawai";
	for($i=1; $i<4; $i++)
	 {
		$filename="file".$i;
		//$xml= simplexml_load_file($$filename);
		echo $load = file_get_contents($$filename);
	}
	
	$dir1 = "http://sti-itb.org/pemrograman-integratif/artis.php";
	$dir2 = "http://sti-itb.org/tugas-2-pemrograman-integratif/tugas2.php?db=data1";
	$dir3 = "http://sti-itb.org/tugas-2-pemrograman-integratif/tugas2.php?db=data2";
	$dir4 = "http://sti-itb.org/tugas-2-pemrograman-integratif/tugas2.php?db=data3";;
	$dir5 = "http://sti-itb.org/18211014-dan-18211029/index2.php?state=state1&submit2=Submit";
	$dir6 = "http://sti-itb.org/18211014-dan-18211029/index2.php?state=state2&submit2=Submit";
	$dir7 = "http://sti-itb.org/18211014-dan-18211029/index2.php?state=state3&submit2=Submit";
	$dir8 = "http://sti-itb.org/pemrograman_integratif/informasi_xml.php?nim=all";
	$dir9 = "http://sti-itb.org/nyoba/all.php";
	$dir10 = "http://sti-itb.org/BernadetteVina/csv.php";
	$dir11 = "http://sti-itb.org/18211014-dan-18211029/index.php";
	$dir12 = "http://sti-itb.org/II3160-Tugas-18211011-18211053/index.php/search/korans";
	$dir13 = "http://sti-itb.org/ningenis/II3160-Progin-18211002-18211033/getSelf.php?input=semua";
	$dir14 = "http://sti-itb.org/18211010-18211035/searchmhs.php?tag=all";
	$dir15 = "http://sti-itb.org/II3160-18211017-18211043/index.php/Api/xml_from_csv";
	$dir16 = "http://sti-itb.org/Progint-yogidanang/?kolom=all";
	$dir17 = "http://sti-itb.org/18211037/RestWebService/index.php/api/Liverpool/players/format/xml";
	$dir18 = "http://sti-itb.org/xmlconvert.php/pegawai";
	

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

