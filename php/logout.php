<?php
include '../php/db_connect.php';
session_start();
session_destroy();
header("Location: login.html");
exit;
