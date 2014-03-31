<?php

require ('config.php');

	$id = $_GET['a'];
	$sql = "select ayat.id_ayat, ayat.nama_ayat, pasal.nama_pasal, bab.nama_bab, peraturan.nama_peraturan, jenis_hukum.nama_jenis
from ayat, pasal, bab, peraturan, jenis_hukum
where ayat.id_pasal=pasal.id_pasal and pasal.id_bab=bab.id_bab and bab.id_peraturan=peraturan.id_peraturan and peraturan.id_jenis = jenis_hukum.id_hukum
and ayat.tag LIKE '%$id%'";

$hasil=mysql_query($sql);
				$items = array();
				while($row = mysql_fetch_object($hasil)){
					array_push($items, $row);
				}
				$result["hasil"] = $items;
				$data=json_encode($result);
echo $data;

?>
