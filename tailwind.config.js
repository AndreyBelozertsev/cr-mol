/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      xxs: "375px",
      xs: "468px",
      sm: "540px",
      md: "720px",
      lg: "960px",
      xl: "1140px",
      "2xl": "1280px",
      "3xl": "1550px",
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "8px",
        xs: "8px",
        sm: "8px",
        md: "12px",
        lg: "20px",
      },
    },
    fontFamily: {
      "commissioner-300": "Commissioner-Light",
      "commissioner-400": "Commissioner-Regular",
      "commissioner-700": "Commissioner-Bold",
    },
    extend: {
      colors: {
        "accent-r": "#D64751",
        primary: "#8C64D7",
        accent: "#D9F06A",
        gray: "#C9C9C9",
        azure: "#0077FF",
        "primary-light": "#B78BF7",
        "accent-dark": "#B6CB28",
        "soft-blue": "#6EE3FE",
        "white-transparent": "#ffffff80",
      },
      fontSize: {
        title: [
          "89px",
          {
            lineHeight: "1",
            fontWeight: "500",
          },
        ],
      },
      boxShadow: {},
      borderRadius: {},
    },
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
            maxWidth: '100%',
              '@screen lg': {
                maxWidth: '960px',
              },
              '@screen xl': {
                maxWidth: '1140px',
              },
              '@screen 2xl': {
                maxWidth: '1280px',
              },
              '@screen 3xl': {
                maxWidth: '1550px',
              },
          }
      })
    }
  ]
}