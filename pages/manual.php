<?php

global $wpdb;
$tablename = $wpdb->prefix."students";

if(isset($_POST['submit'])){
    $firstname = esc_attr($_POST['firstname']);
    $lastname = esc_attr($_POST['lastname']);
    $email = sanitize_email($_POST['email']);

    if(!is_email($email)) {
        //Display invalid email error and exit
       echo '<div class="error"><p>Invalid e-mail!</p></div>';
       exit($email);
    }

    //Checking to see if the user email already exists
    $datum = $wpdb->get_results("SELECT * FROM $tablename WHERE email = '".$email."'");

    //Print the $datum object to see how the count is stored in it.
    //I'm assuming the key is 'count'

    if($wpdb->num_rows > 0) {
        //Display duplicate entry error message and exit
        ?>
        <div class="wrap">
            <div class="error"><p>Student exsist!</p></div> <!-- wp class error for error notices --->
        </div>
        <?php
        exit();
    }

    //Now since the email is unique and valid, lets go ahead and enter it
    //assigning the new data to the table rows
    $newdata = array(
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        
    );
    //inserting a record to the database
    $wpdb->insert(
        $tablename,
        $newdata
    );
    //displaying the success message when student is added
    ?>
    <div class="wrap">
        <div class="updated"><p>Student added!</p></div>
    </div>
<?php }

?>




<form action="" method="post">
    
    
    <p>
        <label for="">firstname</label>
        <input type="text" name="firstname">
    </p>
    <p>
        <label for="">lastname</label>
        <input type="text" name="lastname">
    </p>
    <p>
        <label for="">email</label>
        <input type="text" name="email">
    </p>
    <p>
        <label for=""></label>
        <button name="submit">submit</button>
    </p>
</form>