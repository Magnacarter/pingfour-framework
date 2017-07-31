#Pingfour Framework Readme

####This is a barebones framework for custom theming for WordPress

	- It uses UpGulp, bourban, Sass and Twitter's Bootstrap v3.3.5 

###Move .gitignore

	1. move .gitignore to your sites root directory
	
	2. it will ignore your node modules and keep track of your
		wp-contents directory

###To run gulp tasks

	1. go to config/gulp/config.js
	
	2. edit lines 22 - 31 with your site's creds
	
	3. cd in terminal to /pingfour-framework and 
	run: npm install
	
	- this will get all the node modules listed in 
	the package.json file
	
	4. cd to /pingfour-framework and run gulp watch
	- your files will now be concat, minified etc..
		to assests/dist/
		
	5. to see all directories that UpGulp can take
	look to /config/gulp/config.js line 69
	
	6. to learn more about UpGulp visit
	https://github.com/KnowTheCode/UpGulp
	
###About

	- this framework runs on Twitter's Bootstrap v3.3.5
	
	- extends the Walker Class to compensate for Bootstrap's navigation classes
	
	- pingfour-framework has Class Pingfour_Theme
	
		- this class can be used to create custom post types
		
		- see /includes/post-types.php to build cpts
    