## Requirements
* PHP >= 5.4
* The following PHP extensions are required:
 * bcmath
 * pdo_pgsql
 * curl
 * mcrypt
 * intl

* postgresql >= 9.1
* apache 2.2 or newer

## Installation

1. Clone the repository

	git clone https://github.com/CanalTP/navitia-mobility-manager.git

2.In your project

	app/config/parameters.yml.dist

	app/config/config.nmm_portal.yml.dist

create the files above without the `.dist` extension .

You can also export environment variables (see the different .dist files above)

3. Install PHP dependencies

	curl -sS https://getcomposer.org/installer | php

	composer.phar install --prefer-source

4 .Set permissions to cache, logs and uploads directories

copy the command line below in terminal in project

If you already have  cache and logs.

	rm -rf app/cache/*
	rm -rf app/logs/*

otherwise
follow this link  
In the rubric `Setting up Permissions` 3rd part `Using ACL on a system that supports setfacl (most Linux/BSD)`.

http://symfony.com/doc/current/book/installation.html

5. Install database

Create database with the same name,the same user and same password than there is in parameter.yml:
 `database_name ,database_user ,data database_password `.

in terminal run this command below to initialize your database

	php app/console sam:database:reset

6.Install asset,translation,rounting

	php app/console assets:install --symlink
	php app/console braincrafted:bootstrap:generate
	php app/console assetic:dump
	php app/console bazinga:js-translation:dump
	php app/console fos:js-routing:dump
	


# Configuration VHost

	<VirtualHost *:80>
    		
    		ServerName your servername

    		DocumentRoot /path/to/your/project/web/

    		<Directory /path/to/your/project/web>
        		AllowOverride All
        		Allow from All
        		RewriteEngine On
        		RewriteRule !\.(css|less|jst?|ico|png|jpg|jpeg|gif|xml|xsl|swf|htm|php|woff|pdf)$ app_dev.php
        		RewriteRule ^javascript/(.*\.jst?)$ javascript/$1 [L,NC]
        		RewriteRule ^images/(.*\.(ico|jpe?g|png|gif))$ images/$1 [L,NC]
        		RewriteRule ^css/(.*\.css|less)$ css/$1 [L,NC]
    		</Directory>
	</VirtualHost>

**Note**

If your Apache version is >= 2.4, `AllowOverride All` and `Allow from All` must be replaced with `Require all granted`

