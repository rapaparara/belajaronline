<?php 
session_start();

session_destroy();
echo "<script>alert('Anda telah keluar');document.location='../login/'</script>";
 ?>