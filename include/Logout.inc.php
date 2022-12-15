<?php

session_start();
session_unset();
session_destroy();
 // Going back to the front page
 header("location: ../login.php");