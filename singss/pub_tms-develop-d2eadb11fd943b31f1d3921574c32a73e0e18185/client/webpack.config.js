
const Dotenv = require('dotenv-webpack');
const dotenv = require('dotenv');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var Path = require("path");
var FileSystem = require("fs");

const globalDotEnv = dotenv.config({
  path: __dirname + "/.env."+process.env.NODE_ENV,
  silent: true
});


module.exports = {

    entry: "./src/index.tsx",
    output: {
        filename: "bundle.js",
        path: __dirname + "/dist",
        publicPath: globalDotEnv.parsed.ASSETS_URL,
    },

   // watch: true,
    watchOptions: {
      aggregateTimeout: 300,
      poll: 1000
    },

    // Enable sourcemaps for debugging webpack's output.
    devtool: "source-map",

    resolve: {
        // Add '.ts' and '.tsx' as resolvable extensions.
        extensions: [".ts", ".tsx", ".js", ".json",".scss",".css"]
    },

    module: {
        rules: [
            // All files with a '.ts' or '.tsx' extension will be handled by 'awesome-typescript-loader'.
            { test: /\.tsx?$/, loader: "awesome-typescript-loader" ,exclude:__dirname+"/build/bundle.js"},

            // All output '.js' files will have any sourcemaps re-processed by 'source-map-loader'.
            { enforce: "pre", test: /\.js$/, loader: "source-map-loader",exclude:__dirname+"/build/bundle.js" },
            {
                test: /\.s?css$/,
                use: [{
                    loader: "style-loader" // creates style nodes from JS strings
                }, {
                    loader: "css-loader" // translates CSS into CommonJS
                }, {
                    loader: "sass-loader" // compiles Sass to CSS
                }]
            },
            {
                test: /\.(jpe?g|gif|png|ico)$/,
                exclude: /node_modules/,
                loader:'url-loader?limit=1024&name=images/[name].[ext]'
            },
            
            { 
                test: /\.((woff2?|svg)(\?v=[0-9]\.[0-9]\.[0-9]))|(woff2?|svg)$/, 
                loader: 'url-loader?limit=1024&name=fonts/[name].[ext]'
            },
            { 
              test: /\.((ttf|eot)(\?v=[0-9]\.[0-9]\.[0-9]))|(ttf|eot)$/, 
              loader: 'url-loader?limit=1024&name=fonts/[name].[ext]'
            }
        ]
    },

    // When importing a module whose path matches one of the following, just
    // assume a corresponding global variable exists and use that instead.
    // This is important because it allows us to avoid bundling all of our
    // dependencies, which allows browsers to cache those libraries between builds.
    externals: {
        "react": "React",
        "react-dom": "ReactDOM"
    },
    plugins: [
        new Dotenv({
          path: __dirname +'/.env.'+process.env.NODE_ENV, // Path to .env file (this is the default) 
          safe: true, // load .env.example (defaults to "false" which does not use dotenv-safe) 
          systemvars: true,
        }),

        new HtmlWebpackPlugin({
        title: 'Loading...',
        PUBLIC_URL: globalDotEnv.parsed.PUBLIC_URL,
        ASSETS_URL: globalDotEnv.parsed.ASSETS_URL,
        ENV: process.env.NODE_ENV,
        DEBUG: typeof globalDotEnv.parsed.DEBUG !== 'undefined' ? globalDotEnv.parsed.DEBUG : 'false',
        inject: false,
        publicPath:__dirname,
        filename:'../index.html',
        template: 'index.ejs', // Load a custom template (ejs by default see the FAQ for details) 
      })

        // function() {
        //     this.plugin("done", function(statsData) {
        //         var stats = statsData.toJson();
                
        //         if (!stats.errors.length) {
        //             var htmlFileName = "index.html";
        //             var html = FileSystem.readFileSync(Path.join(__dirname, htmlFileName), "utf8");

        //             var htmlOutput = html.replace(
        //                 /<script\s+src=(["'])(.+?)bundle\.js\1/i,
        //                 "<script src=$1$2" + stats.assetsByChunkName.main + "?v="+stats.hash+"$1");

        //             FileSystem.writeFileSync(
        //                 Path.join(__dirname, htmlFileName),
        //                 htmlOutput);
        //         }
        //     });
        // }
    ]
 
};