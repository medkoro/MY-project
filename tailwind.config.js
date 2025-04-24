/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'comic': ['"Comic Sans MS"', 'cursive'],
        'bubblegum': ['"Bubblegum Sans"', 'cursive'],
      },
      animation: {
        'rainbow': 'rainbow 5s linear infinite',
        'bounce-slow': 'bounce 3s infinite',
        'float': 'float 3s ease-in-out infinite',
      },
      keyframes: {
        rainbow: {
          '0%, 100%': { color: '#ff0000' },
          '16.67%': { color: '#ff8000' },
          '33.33%': { color: '#ffff00' },
          '50%': { color: '#00ff00' },
          '66.67%': { color: '#0000ff' },
          '83.33%': { color: '#8000ff' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        },
      },
    },
  },
  plugins: [],
} 