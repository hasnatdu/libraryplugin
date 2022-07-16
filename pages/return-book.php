<?php

global $wpdb;
$msg ="";



if(isset($_POST['submit'])){

	$wpdb->insert("wp_lib_documents", array(			
		'accession_date' => $_POST['accession_date'],
		'accession_no' => $_POST['accession_no'],
		'title' => $_POST['title'],
		'sub_title' => $_POST['sub_title'],
		'author' => $_POST['author'],
		'author2' => $_POST['author2'],
		'author3' => $_POST['author3'],
		'imprint' => $_POST['imprint'],
		'pagination' => $_POST['pagination'],
		'price' => $_POST['price'],
		'isbn_issn' => $_POST['isbn_issn'],
		'key_word' => $_POST['key_word'],
		'clssification_no' => $_POST['clssification_no'],
		'Status' => $_POST['Status'],
		'created_by' => get_current_user_id(),
		'created_at' => current_time('mysql')

		
	));

	

	
		if ($wpdb->insert_id>0) {
			$msg = "data saved";
		}else{
			$msg = "failed";
		}	
	
	



}?>

<p><?php echo $msg;?></p>
<form action="" method="post">
	
	<p>
		<label for="">accession_date</label>
		<input type="date" name="accession_date">
	</p>
	<p>
		<label for="">Accession_No</label>
		<input type="text" name="accession_no">

	</p>
	<p>
		<label for="">title</label>
		<input type="text" name="title">
	</p>
	<p>
		<label for="">sub_title</label>
		<input type="text" name="sub_title">

	</p>
	<p>
		<label for="">author</label>
		<input type="text" name="author">
	</p>
	<p>										
		<label for="">author2</label>
		<input type="text" name="author2">
	</p>
	<p>
		<label for="">author3</label>
		<input type="text" name="author3">

	</p>
	<p>
		<label for="">imprint</label>
		<input type="text" name="imprint">
	</p>
	<p>	
		<label for="">pagination</label>
		<input type="text" name="pagination">
	</p>
	<p>		
		<label for="">price</label>
		<input type="text" name="price">
	</p>
	<p>
		<label for="">isbn_issn</label>
		<input type="text" name="isbn_issn">
	</p>
	<p>
		<label for="">key_word</label>
		<input type="text" name="key_word">
	</p>
	<p>
		<label for="">clssification_no</label>
		<input type="text" name="clssification_no">
	</p>
	<p>
		<label for="">Status</label>
		<input type="text" name="Status">
	</p>
	<p>
		<label for=""></label>
		<button name="submit">submit</button>
	</p>
</form>