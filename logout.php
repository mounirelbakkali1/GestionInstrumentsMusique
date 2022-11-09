<?php
session_start();
session_destroy();
//header("Location : ./index.php");
echo "<script>window.location.replace('./index.php')</script>";
