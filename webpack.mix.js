const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../../public').mergeManifest();

mix.js(__dirname + '/resources/assets/js/app.js', 'vendor/lasinkyay/js/lasinkyay.js')
	.postCss(__dirname + '/resources/assets/css/app.css', 'vendor/lasinkyay/css/lasinkyay.css', [
  		require('tailwindcss'),
	]);

if (mix.inProduction()) {
    mix.version();
}