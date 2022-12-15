<?php
if (!isset($_SESSION['user'])) header("location:../");
else {
    if ($_SESSION['user']['role'] != 1) header('location:../');
}

include_once 'dashtop.php';
include_once "../include/autoloader.php";
include_once 'scripts.php';

