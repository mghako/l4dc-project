<?php
include('dbcon.php');

session_destroy();
echo "<script>window.alert('Logout Success !')</script>";
echo "<script>window.location='adminlogin.php'</script>";

?>