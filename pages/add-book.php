<?php

global $wpdb;
$tablename = $wpdb->prefix."lib_documents";

if(isset($_POST['submit'])){
	 
    	$accession_date = esc_attr($_POST['accession_date']);
		$accession_no = esc_attr($_POST['accession_no']);
		$title = esc_attr($_POST['title']);
		$sub_title = esc_attr($_POST['sub_title']);
		$author =esc_attr($_POST['author']);
		$author2 = esc_attr($_POST['author2']);
		$author3 = esc_attr($_POST['author3']);
		$imprint = esc_attr($_POST['imprint']);
		$pagination = esc_attr($_POST['pagination']);
		$price = esc_attr($_POST['price']);
		$isbn_issn = esc_attr($_POST['isbn_issn']);
		$key_word = esc_attr($_POST['key_word']);
		$clssification_no = esc_attr($_POST['clssification_no']);
		$Status = esc_attr($_POST['Status']);

    /*
    if(!is_email($email)) {
        //Display invalid email error and exit
       echo '<div class="error"><p>Invalid e-mail!</p></div>';
       exit($email);
    }
    */

    //Checking to see if the user email already exists
    $datum = $wpdb->get_results("SELECT * FROM $tablename WHERE accession_no = '".$accession_no."'");

    //Print the $datum object to see how the count is stored in it.
    //I'm assuming the key is 'count'

    if($wpdb->num_rows > 0) {
        //Display duplicate entry error message and exit
        ?>
        <div class="wrap">
            <div class="error"><p>This Accession no. already exsist!</p></div> <!-- wp class error for error notices --->
        </div>
        <?php
        exit();
    }

    //Now since the email is unique and valid, lets go ahead and enter it
    //assigning the new data to the table rows
    $newdata = array(
        'accession_date' => $accession_date,
		'accession_no' => $accession_no,
		'title' => $title,
		'sub_title' => $sub_title,
		'author' => $author,
		'author2' => $author2,
		'author3' => $author3,
		'imprint' => $imprint,
		'pagination' => $pagination,
		'price' => $price,
		'isbn_issn' => $isbn_issn,
		'key_word' => $key_word,
		'clssification_no' => $clssification_no,
		'Status' => $Status,
		'created_by' => get_current_user_id(),
		'created_at' => current_time('mysql')
        
    );
    //inserting a record to the database
    $wpdb->insert(
        $tablename,
        $newdata
    );
    //displaying the success message when student is added
    ?>
    <div class="wrap">
        <div class="updated"><p>Book added successfully!</p></div>
    </div>
<?php }

?>







<div class="container p-5 ml-5">
	<h3 class="heading_addmaterial p-2">ADD LIBRARY MATERAIL</h3>
	<form action="" method="post" >
		
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">accession_date</label>
				</div>
				<div class="col-5">
					<input type="date" name="accession_date">
				</div>
				<div class="col-5">
					select date from here!
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">Accession_No</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="accession_no">
				</div>
				<div class="col-5">
					accession number must be unique
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">title</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="title">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">sub_title</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="sub_title">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">author</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="author">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">author2</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="author2">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">author3</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="author3">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">imprint</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="imprint">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">pagination</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="pagination">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">price</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="price">
				</div>
			</div>
		</p>								
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">isbn_issn</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="isbn_issn">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">key_word</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="key_word">
				</div>
			</div>
		</p>			
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">clssification_no</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="clssification_no">
				</div>
			</div>
		</p>		
		<p>
			<div class="row">
				<div class="col-2">
					<label for="">Status</label>
				</div>
				<div class="col-5">
					<input class="form-control" type="text" name="Status">
				</div>
			</div>
		</p>
		<p>
			<div class="row">
				<div class="col-2">
					<label for=""></label>
				</div>
				<div class="col-8">
					<button name="submit">submit</button>
				</div>
			</div>
		</p>		
		
	</form>
</div>