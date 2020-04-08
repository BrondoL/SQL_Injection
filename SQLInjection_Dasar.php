<?php

VULN
$username = $_POST["username"];
$password = $_POST["password"];
$login = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

EXPLOIT
-- (strip strip spasi) = komentar di mysql

1. Jika diketahui username
 	username = admin'--
   	password = xxx
SELECT * FROM user WHERE username = 'admin'-- AND password = 'xxx'
AND password = 'xxx' dibaca sebagai komentar

2. Jika username tidak diketahui
	username = yyy' OR 1=1 --
	password = xxx
SELECT * FROM user WHERE username = 'yyy' OR 1=1 -- ' AND password = 'xxx'
' AND password = 'xxx' dibaca sebagai komentar

3. Jika ingin mengetahui 1 user saja
	username = yyy' OR 1=1 LIMIT 1 --
	password = xxx
SELECT * FROM user WHERE username = 'yyy' OR 1=1 LIMIT 1 -- ' AND password = 'xxx'

PATCH

1. mysqli_real_escape_string();
$username = mysqli_real_escape_string($_POST["username"]);
$password = mysqli_real_escape_string($_POST["password"]);
$login = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

Mengamankan tanda petik
SELECT * FROM user WHERE username = 'yyy\' OR 1=1 -- ' AND password = 'xxx\'

2. Prepared Statement (Recommended)
$username = $_POST["username"];
$password = $_POST["password"];
$login = mysqli_prepare($conn,"SELECT * FROM user WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($login, "ss", $_POST["username"], $_POST["password"]);
mysqli_execute($login);
mysqli_stmt_store_result($login);

