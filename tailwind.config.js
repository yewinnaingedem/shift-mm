/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
    screens : {
      "2md" : "992px" ,
    },
    flex : {
      'flex-1' : '1 1 ',
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}