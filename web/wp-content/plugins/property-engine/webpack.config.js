const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
  ...defaultConfig,
  entry: {
    index: "./assets/src/index.tsx",
  },
  output: {
    ...defaultConfig.output,
    path: __dirname + "/assets/build",
  },
};
