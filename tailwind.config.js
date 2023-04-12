/** @type {import('tailwindcss').Config} */
module.exports = {
	purge: [
		'./resources/**/*.blade.php',
		'./resources/**/*.js',
		'./resources/**/*.vue',
	],
	content: [],
	theme: {
		extend: {
			colors: {
				'brand': '#6CA824',
				'brand-2': '#E5452F'
			}
		},
	},
	plugins: [],
}
