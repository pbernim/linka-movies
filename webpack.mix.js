const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Global
mix.sass('resources/assets/sass/app.scss', 'public/css')
	.js('resources/assets/js/app.js', 'public/js');

// Frontend
mix.sass('resources/assets/sass/frontend.scss', 'public/css');

// Backend
mix.sass('resources/assets/sass/backend.scss', 'public/css');
mix.combine([
		'node_modules/toastr/package/toastr.js', 
		'node_modules/summernote/dist/summernote.js',
		'resources/assets/js/custom_backend.js'], 'public/js/backend.js');

// Without Sass source
mix.copy([
		'node_modules/summernote/dist/summernote.css', 
		'node_modules/animate.css/animate.min.css'], 'public/css');
mix.copyDirectory('node_modules/summernote/dist/font', 'public/css/font');


	
