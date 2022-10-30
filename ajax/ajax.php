<?php

	$keyword = $_GET["keyword"];

	if(strlen($keyword) > 0){
		$json = file_get_contents('https://dekontaminasi.com/api/id/covid19/hospitals');
	    $obj = json_decode($json);
	    $searchResult = [];

	    $no = 0;
	    foreach ($obj as $row) :
	        if(stristr($obj[$no]->name,$keyword) or stristr($obj[$no]->address,$keyword) or stristr($obj[$no]->region,$keyword)){
	            $searchResult[] = $obj[$no];
	        }
	        $no++;
	    endforeach;
	} else {
		$json = file_get_contents('https://dekontaminasi.com/api/id/covid19/hospitals');
	    $searchResult = json_decode($json);
	}

?>
<table class="table table-hover table-striped table-bordered" cellpadding="20px">
	<tr>
		<th>#</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Daerah</th>
		<th>Telepon</th>
		<th>Province</th>
	</tr>
    <?php $no = 0; ?>
	<?php foreach ($searchResult as $row) : ?>
        <tr style="text-align: justify;">
            <td> <?= $no+1; ?> </td>
            <td> <?= $searchResult[$no]->name; ?> </td>
            <td> <?= $searchResult[$no]->address; ?> </td>
            <td> <?= $searchResult[$no]->region; ?> </td>
            <td> <?= $searchResult[$no]->phone; ?> </td>
            <td> <?= $searchResult[$no]->province; ?> </td>
        </tr>
        <?php $no++; ?>
	<?php endforeach; ?>
</table>
