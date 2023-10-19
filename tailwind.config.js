const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./resources/js/**/*.vue',
		'./tailwind-whitelist.txt',
	],

	theme: {

		extend: {
			fontFamily: {
				sans: ['Barlow', ...defaultTheme.fontFamily.sans],
			},

			colors: {
				'primary': {
					100: '#EBF3F5',
                    200: '#DAE7EB',
					400: '#99BEC8',
					500: '#388097',
					'DEFAULT': '#006983'
				},
				'brand': {
					blue: { 500: '#0A368C', 'DEFAULT': '#273271', 600: '#050C51' },
					sky: { 'DEFAULT': '#009DD4', 600: '#0194DC' },
					purple: { 500: '#9D1C80', 'DEFAULT': '#6D2280' },
					magenta: { 'DEFAULT': '#C4004B' },
					orange: { 'DEFAULT': '#D0613D', 'light': '#EC7D3E' },
					green: { 'DEFAULT': '#70B148', 'dark': '#188337' },
					red: { 'DEFAULT': '#B71C1C' },
					'blue-light': { 'DEFAULT': '#008CCE' },
					teal: { 'DEFAULT': '#009C8F' }
				},
				'color-form': '#EBF2F4',
				'gray-light': '#EBF2F4'
			},
            borderWidth:{
                '6': '6px',
            },
            lineHeight: {
                'semitight': '1.15', // Custom leading value
            },
		},
	},

	plugins: [
		require('@tailwindcss/forms')
	],
};
