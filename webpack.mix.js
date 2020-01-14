const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('publishable/assets').mergeManifest();

mix.js(__dirname + '/resources/assets/js/app.js', __dirname + '/js/lasinkyay.js')
	.postCss(__dirname + '/resources/assets/css/app.css', __dirname + '/css/lasinkyay.css', [
  		require('tailwindcss'),
	]);

if (mix.inProduction()) {
    mix.version();
}