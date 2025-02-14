import typography from '@tailwindcss/typography'
import forms from '@tailwindcss/forms'
import colors from "tailwindcss/colors";
import containerQueries from '@tailwindcss/container-queries'
import tailwindTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        'resources/views/**/*.blade.php',
        './vendor/awcodes/dimmer/resources/views/**/*.blade.php',
        './vendor/awcodes/mason/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.indigo,
            },
            fontFamily: {
                display: ['Ubuntu', ...tailwindTheme.fontFamily.sans],
                body: ['Inter', ...tailwindTheme.fontFamily.sans],
            }
        },
    },
    plugins: [
        typography,
        forms,
        containerQueries
    ],
}

