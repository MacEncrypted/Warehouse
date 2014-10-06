Warehouse Installation Guide
==========
Following file will help you in installation and configuration of Warehouse.

Dictionary
==========
W - is name of the folder to which you will copy script.
SITE - is web adress of your W. 

Instructions
==========
1. Copy all files from Warehouse folder to your web server (localhost or ftp server).
2. Execute scripts from W/scripts/db.sql on your database (MySQL 5 or newer).
3. Copy file W/application/config/database_DEFAULT.php to W/application/config/database.php
4. Open newly created file W/application/config/database.php and fill your database connection data.
5. Open your SITE in browser.
6. You should be able to login with following data:
	login:		root
	password:	root
7. If you would like to change language to english please edit W/application/config/config.php
	$config['language']	= 'english';
