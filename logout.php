<?php
include 'header.php';
include 'footer.php';

session_unset();
session_destroy();
echo "<script>location.href='index.php';</script>";
