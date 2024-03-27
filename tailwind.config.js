/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}'],
  theme: {
    extend: {
      keyframes:{
        moveY: {
          '0%': {transform: 'translate(0px, 0px)'},
          '100%': {transform: 'translate(300px,0px'},
        }
      },
      spacing: {
        '34': '130px',
      },
      boxShadow: {
        'thin': '0px 3px 8px rgba(0, 0, 0, 0.24)',
      },
    },
  },
  plugins: [],
}

