/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx,vue}",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#3a8b3a', // Correção aqui
        primaryHover: '#36AD36'
      }
    },
  },
  plugins: [],
}