***  Lwin Moe Paing [ Readmal.Com ] ***
***  OPEN WITH NODEPAD => ***
***  RIGHT CLICK => ***
***  RUN AS ADMINSTRATOR ***

=====================================================
#Open C:\Windows\System32\drivers\etc\hosts
#And Copy Paste Below (Remove #hash Tag)

127.0.0.1  greenygn.com
127.0.0.1 127.0.0.1:8000

=====================================================

#Open C:\xampp\apache\conf\httpd.conf
#Find Listen 80 And Add

Listen 8000

=====================================================

#Open C:\xampp\apache\conf\extra\httpd-vhosts.conf
#And Copy Paste Below (Remove #hash Tag)

<VirtualHost *:80>
    DocumentRoot "C:/XAMPP/htdocs/greenygn"
    ServerName greenygn.com
    <Directory "C:/XAMPP/htdocs/greenygn">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
 
<VirtualHost *:8000>
    DocumentRoot "C:/XAMPP/htdocs/greenygn"
    ServerName 127.0.0.1:8000
    <Directory "C:/XAMPP/htdocs/greenygn">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>

