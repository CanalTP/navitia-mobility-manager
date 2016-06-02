


<h2>Dependencies</h2>

 <h4>1. php</h4>

 	php >= 5.4.x





<h2>Requirements</h2>
<ul>
	<li>canaltp/nmm-portal-bridge-bundle": "1.0,</li>
	<li> canaltp/navitia-profiler-bundle: "0.0.2",</li>
	<li>canaltp/navitia: "v1.1.4",</li>
	<li>php5-gd,php5-psql,php5-curl,php5-mcrypt and php5-intl librairies</li>

</ul>
<h4>Database</h4>
	postgresql >= 9.0.0

<br />
<h2>Installation</h2>
<h4>1. Clone the repository</h4>


<h4>2.In your project</h4>
 
	app/config/parameters.yml.dist

	app/config.nmm_portal.yml.dist

create the files above without the `.dist` extension .


You can also export environment variables (see the different .dist files above)


<h4>3. Install PHP dependencies</h4>

 	curl -sS https://getcomposer.org/installer | php

	composer.phar install --prefer-source



<h4>4 .Set permissions to cache, logs and uploads directories</h4>

copy the command line below in terminal in project

If you already have  cache and logs.

	rm -rf app/cache/*
	rm -rf app/logs/*
otherwise

HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
 sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
 sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var



<h4>5. Install database</h4>

Create database with the same name,the same user and same password than there is in parameter.yml:
 `database_name ,database_user ,data database_password `.

in terminal run this commande below to initialize your database

	php app/console sam:database:reset

<h4>6.Install asset,translation,rounting</h4>

	php app/console assets:install --symlink
	php app/console assetic:dump
	php app/console bazinga:js-translation:dump
	php app/console fos:js-routing:dump
	php app/console braincrafted:bootstrap:generate
	


<h4> Configuration VHost </h4>

	<VirtualHost *:80>
    		
    		ServerName your servername

    		DocumentRoot path project

    		<Directory path project>
        		AllowOverride All
        		Allow from All
        		RewriteEngine On
        		RewriteRule !\.(css|less|jst?|ico|png|jpg|jpeg|gif|xml|xsl|swf|htm|php|woff)$ app_dev.php
        		RewriteRule ^javascript/(.*\.jst?)$ javascript/$1 [L,NC]
        		RewriteRule ^images/(.*\.(ico|jpe?g|png|gif))$ images/$1 [L,NC]
        		RewriteRule ^css/(.*\.css|less)$ css/$1 [L,NC]
    		</Directory>
	</VirtualHost>
 


