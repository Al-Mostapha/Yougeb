const HtmlWebpackPlugin = require('html-webpack-plugin');
const VueLoaderPlugin = require("vue-loader").VueLoaderPlugin;
const webpack = require('webpack');

module.exports = {
  entry: './Client/main.js',
  module: {
    rules: [
      { test: /\.js$/, use: 'babel-loader' },
      { test: /\.vue$/, use: 'vue-loader' },
      { test: /\.css$/, use: ['vue-style-loader', 'css-loader']},
    ]
  },
  devServer: {
    open: true,
    hot: true,
  },
  output: {
    filename: '[name].js',
    path: __dirname + '/public',
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: './Client/index.html',
    }),
    new VueLoaderPlugin(),
    new webpack.HotModuleReplacementPlugin(),
  ]
};



