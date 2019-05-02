#!C:\Users\Kesavan\Desktop\WPy64-3720\python-3.7.2.amd64\python.exe
print("Content-Type: text/html\n")
import os

os.remove("store.csv")
redirectURL="index.php"

print("<html>")
print("<head>")
print("<meta http-equiv='refresh' content='0;url="+str(redirectURL)+"' />")
print("</head>")
print("</html>")

