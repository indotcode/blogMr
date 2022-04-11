module.exports = {
    mode: 'jit',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {

            },
            outlineOffset: {

            }
        },
        screens: {
            '2xl': {'max': '1535px'},
            // => @media (max-width: 1535px) { ... }

            'xl': {'max': '1279px'},
            // => @media (max-width: 1279px) { ... }

            'lxg': {'max': '1130px'},
            // => @media (max-width: 1023px) { ... }

            'lg': {'max': '1023px'},
            // => @media (max-width: 1023px) { ... }

            'lgs': {'max': '960px'},
            // => @media (max-width: 1023px) { ... }

            'lgx': {'max': '830px'},
            // => @media (max-width: 1023px) { ... }

            'md': {'max': '767px'},
            // => @media (max-width: 767px) { ... }

            'sm': {'max': '639px'},
            // => @media (max-width: 639px) { ... }

            'smx': {'max': '551px'},
            // => @media (max-width: 639px) { ... }

            'ml': {'max': '460px'},
            // => @media (max-width: 414px) { ... }

            'mg': {'max': '375px'},
            // => @media (max-width: 375px) { ... }
        }
    },
    plugins: [

    ]
}
