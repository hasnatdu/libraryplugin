update

<?php

global $wpdb;
$results = $wpdb->get_results(
$wpdb->prepare("SELECT * FROM wp_lib_documents", ""),ARRAY_A );?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Accession_date</th>
      <th scope="col">Accession_no.</th>
      <th scope="col">Title</th>
      <th scope="col">Sub_title</th>
      <th scope="col">Author</th>
      <th scope="col">Author2</th>
      <th scope="col">Author3</th>
      <th scope="col">imprint</th>
      <th scope="col">pagination</th>
      <th scope="col">price</th>
      <th scope="col">isbn_issn</th>
      <th scope="col">key_word</th>
      <th scope="col">clssification_no</th>
      <th scope="col">Status</th>
      <th scope="col">Update</th>
    </tr>
  </thead>  

  <tbody>
    <?php
    $i=1;
    foreach ($results as $value) 
        {?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $value['accession_date']?></td>
            <td><?php echo $value['accession_no']?></td>
            <td><?php echo $value['title']?></td>
            <td><?php echo $value['sub_title']?></td>
            <td><?php echo $value['author']?></td>
            <td><?php echo $value['author2']?></td>
            <td><?php echo $value['author3']?></td>
            <td><?php echo $value['imprint']?></td>
            <td><?php echo $value['pagination']?></td>
            <td><?php echo $value['price']?></td>
            <td><?php echo $value['isbn_issn']?></td>
            <td><?php echo $value['key_word']?></td>
            <td><?php echo $value['clssification_no']?></td>
            <td><?php echo $value['Status']?></td>
            <td><a href="admin.php?page=update-final&action=edit&sl=<?php echo $value['sl'];?>">Update</a>delete</td>
        </tr>
    <?php } ?>
  </tbody>
</table>
