
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const path = require('path');

let mode = "development"; 
let target = "web"; 

if(process.env.NODE_ENV === "production") {
  mode = "production";
  target = "browerslist"; 

}
module.exports = {
  mode: mode,
  target: target,
  module: {
    rules: [
      {
        test: /\.s?css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader", "sass-loader"],
      },
      {
        test: /\.js$/, 
        exclude: /node_modules/, 
        use: {
          loader: "babel-loader"
        }
      },
    ],
  },
  plugins: [new MiniCssExtractPlugin(
    {
      filename: './styles/style.css'
    }
  )],
  devtool: "source-map",
  entry: './src/index.js',
  output: {
    filename: 'js/main.js',
    path: path.resolve(__dirname, './src'),
  },
};