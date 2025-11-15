<?php
include("db_connect.php");

$result = pg_query($conn, "SELECT NOW()");
$row = pg_fetch_row($result);

echo "✅ Connected! Supabase time: " . $row[0];
?>
