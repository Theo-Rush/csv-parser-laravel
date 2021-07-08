const colors = require('tailwindcss/colors')

module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      gray: colors.trueGray,
      red: colors.red,
      lime: colors.lime,
      blue: colors.lightBlue,
      yellow: colors.amber,
    }
  },
  corePlugins: {
    borderColor: false,
  }
}
