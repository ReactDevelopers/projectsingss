const path = require('path');
var config = {
      // entry: './main.js',
      entry: path.resolve(__dirname, './main.js'),

      output: {
        // path: './',
        path: path.resolve(__dirname, './'),
        filename: 'index.js'
      },

      devServer: {
        inline: true,
        port: 7777
      },

      module: {
        loaders: [
          {
            test: /\.jsx?$/,
            exclude: /node_modules/,
            loader: 'babel-loader',
            query: {
              presets: ['es2015', 'react']
            }
          }
        ]
      }
    }

    module.exports = config;