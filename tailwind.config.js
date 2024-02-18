/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        fontFamily:{
            sans:['Poppins', 'sans-serif'],
        },
        colors:{
            'dark': '#181A1B',
            'offwhite': '#DAD4E0',
            'hover' : '#7917de',
            'click' : '#281541'
        }
    },
  },
  plugins: [],
}

