const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
			keyframes: {
				bounceX: {
					'0%, 100%': { transform: 'translateX(0px)' },
					'50%': { transform: 'translateX(-10px)' },
				}
			},
			animation: {
				bounceX: 'bounceX 1s ease-in-out infinite',
			},
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}