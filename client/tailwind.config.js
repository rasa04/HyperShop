/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "index.html",
      "./src/*.vue",
      "./src/views/*.vue",
      "./src/views/NotFoundView.vue",
      "./src/views/**/*.vue",
      "./src/components/**/*.vue",
      "./src/components/**/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin'),
  ],
}
