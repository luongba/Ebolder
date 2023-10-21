/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
      container: {
          padding: {
              DEFAULT: '16px',
              sm: '16px',
              lg: '16px',
              xl: '16px',
          },
          screens: {
              DEFAULT: '100%',
              sm: '640px',
              md: '768px',
              lg: '1024px',
              xl: '1280px',
          },
      },
    extend: {
        colors: {
            'main-color': '#1435C3',
          },
    },
  },
  plugins: [],
}
