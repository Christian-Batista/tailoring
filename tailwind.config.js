/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
import colors from 'tailwindcss/colors' 
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography' 
export default {
  presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    
  theme: {
    extend: {
      colors: {
        // Agrega tus colores personalizados
        primary: '#1D4ED8', // Este es un ejemplo de color principal
        secondary: '#9333EA', // Color secundario
        accent: '#34D399', // Color de acento
        // Puedes agregar más colores según tus necesidades
    },
    },
  },
  plugins: [
    forms, 
        typography, 
  ],
}

