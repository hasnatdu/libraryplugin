<h3 class="text-center">Delete Data</h3>
<h4 class="text-danger text-center">Deleting data is very sensetive work, please rethink before deleting any data</h4>

<?php
global $wpdb;
$results = $wpdb->get_var(
$wpdb->prepare("SELECT accession_no FROM wp_lib_documents", ""),ARRAY_A );
echo "<p>User count is {$wpdb->results}</p>";
?>