<?php
session_start();
include '../php/db_connect.php';

session_destroy();
header("Location: login.html");
exit;
