<?php

global $wpdb;
$msg ="";
$action = isset($_GET['action']) ? trim($_GET['action']) : '';
$sl = isset($_GET['sl']) ? intval($_GET['sl']): '';
$row= $wpdb->get_row( 
    $wpdb->prepare("SELECT * FROM wp_lib_documents where sl=%d", "$sl",),ARRAY_A
    );


if(isset($_POST['submit'])){

$action = isset($_GET['action']) ? trim($_GET['action']) : '';
$sl = isset($_GET['sl']) ? intval($_GET['sl']): '';

if (!empty($action)) {
	$wpdb->update("wp_lib_documents", array(
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
	),array(
		'sl'=> $sl
	));
	$msg = "data updated successfully";
}}?>

<p><?php echo $msg;?></p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=update-final<?php if(!empty($action)){echo '&action=edit&sl='.$sl;}?>" method="post">
	
	<p>
		<label for="">accession_date</label>
		<input type="date" name="accession_date" value="<?php echo isset ($row['accession_date']) ? $row['accession_date'] : ''?>">
	</p>
	<p>
		<label for="">Accession_No</label>
		<input type="text" name="accession_no" value="<?php echo isset ($row['accession_no']) ? $row['accession_no'] : ''?>">

	</p>
	<p>
		<label for="">title</label>
		<input type="text" name="title" value="<?php echo isset ($row['title']) ? $row['title'] : ''?>">
	</p>
	<p>
		<label for="">sub_title</label>
		<input type="text" name="sub_title" value="<?php echo isset ($row['sub_title']) ? $row['sub_title'] : ''?>">

	</p>
	<p>
		<label for="">author</label>
		<input type="text" name="author" value="<?php echo isset ($row['author']) ? $row['author'] : ''?>">
	</p>
	<p>										
		<label for="">author2</label>
		<input type="text" name="author2" value="<?php echo isset ($row['author2']) ? $row['author2'] : ''?>">
	</p>
	<p>
		<label for="">author3</label>
		<input type="text" name="author3" value="<?php echo isset ($row['author3']) ? $row['author3'] : ''?>">

	</p>
	<p>
		<label for="">imprint</label>
		<input type="text" name="imprint" value="<?php echo isset ($row['imprint']) ? $row['imprint'] : ''?>">
	</p>
	<p>	
		<label for="">pagination</label>
		<input type="text" name="pagination" value="<?php echo isset ($row['pagination']) ? $row['pagination'] : ''?>">
	</p>
	<p>		
		<label for="">price</label>
		<input type="text" name="price" value="<?php echo isset ($row['price']) ? $row['price'] : ''?>">
	</p>
	<p>
		<label for="">isbn_issn</label>
		<input type="text" name="isbn_issn" value="<?php echo isset ($row['isbn_issn']) ? $row['isbn_issn'] : ''?>">
	</p>
	<p>
		<label for="">key_word</label>
		<input type="text" name="key_word" value="<?php echo isset ($row['key_word']) ? $row['key_word'] : ''?>">
	</p>
	<p>
		<label for="">clssification_no</label>
		<input type="text" name="clssification_no" value="<?php echo isset ($row['clssification_no']) ? $row['clssification_no'] : ''?>">
	</p>
	<p>
		<label for="">Status</label>
		<input type="text" name="Status" value="<?php echo isset ($row['Status']) ? $row['Status'] : ''?>">
	</p>
	<p>
		<label for=""></label>
		<button name="submit">submit</button>
	</p>
</form>