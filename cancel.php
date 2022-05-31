<?php
include 'conn-db.php';
$price=$_GET['price'];
$query = $conn->query(" DELETE FROM addproduct WHERE price='$price'");
?>



<script>
window.location = "prof.php";
</script>