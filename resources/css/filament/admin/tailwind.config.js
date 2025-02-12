import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import containerQueries from '@tailwindcss/container-queries'
import tailwindTheme from "tailwindcss/defaultTheme";

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './resources/views/mason/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/mason/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                display: ['Ubuntu', ...tailwindTheme.fontFamily.sans],
                body: ['Inter', ...tailwindTheme.fontFamily.sans],
            }
        }
    },
    plugins: [
        containerQueries
    ],
}
