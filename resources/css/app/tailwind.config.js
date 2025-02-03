import typography from '@tailwindcss/typography'
import forms from '@tailwindcss/forms'
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        'resources/views/**/*.blade.php',
        './vendor/awcodes/dimmer/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.lime,
            }
        },
    },
    plugins: [
        typography,
        forms,
    ],
}

