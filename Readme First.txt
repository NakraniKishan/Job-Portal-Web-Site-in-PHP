First you need to install Software Pre-Requistes, software attached with the same.

After that install the wamp server.

After installing configure the wamp server with below mentioned configuration


In Apache httpd.conf

1)  Look For "<Directory />" and Replace with
 
 <Directory />
    Options FollowSymLinks
    AllowOverride None
    Order allow,deny
    Allow from all
</Directory>

2) Look for "#   onlineoffline" and Replace with

    Order Deny,Allow
    Deny from all
    Allow from all
  
3) Look For "<Directory "cgi-bin">" and Replace with
 
 <Directory "cgi-bin">
    AllowOverride None
    Options None
    Order allow,deny
    Allow from all
</Directory>

----------------------------------------------------------------------------------------------------

In  Apache => Alias Directories=> Phpmyadmin => Edit alias

1) Look for " <Directory "> and Replace with
	
	Options Indexes FollowSymLinks MultiViews
    	AllowOverride all
        	Order Allow,Deny
		Allow from all



--------------------------------------------------------------------------------------------------------\

In PHP == php.ini


1)  Look for ";extension=php_curl.dll"  
	
	remove the ";" from the beginning and set like this

	"extension=php_curl.dll"

2)  Look for "max_execution_time"

	set time 30 to 300 

3)  Look for "memory_limit"

	set limit more than 128 as much u want.

4)  Look For "upload_max_filesize"

	set limit more than 2 as much u want. 



===================After changing the settings restart the server ==========================================




Open browser of your choice and type localhost 
go to phpmyadmin
select import from menubar
and import the job database


After this job the job folder in wamp/www/ to access the site in browser



password for the user


Job Seeker 	: jobseeker
Employer	: employer
Admin		: admin123


