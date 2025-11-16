<?php
include("db_connect.php");

$sql = "SELECT NOW() AS current_time";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
echo "✅ Connected! MySQL time: " . $row['current_time'];
?>
