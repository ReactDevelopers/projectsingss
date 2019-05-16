'use strict';
var webpack = require('webpack')
var fs = require('fs');


const minimist = require('minimist');

let args = minimist(process.argv.slice(2));
const portal = args.portal;
const mode = args.mode;
let portalFileName = null;

if(fs.existsSync('./portals/'+portal+'.'+mode+'.local.js')){
  portalFileName = './portals/'+portal+'.'+mode+'.local';
}
else if(fs.existsSync('./portals/'+portal+'.'+mode+'.js')){
  portalFileName = './portals/'+portal+'.'+mode+'.js';
}
else if(fs.existsSync('./portals/'+portal+'.local.js')){
  portalFileName = './portals/'+portal+'.local.js';
}
else if(fs.existsSync('./portals/'+portal+'.js')){
  portalFileName = './portals/'+portal+'.js';
}
else {
  throw Error('Portal file is not preset in portals folder.');
}

const portalConfig = require(portalFileName);
const configsKeys = Object.keys(portalConfig);

configsKeys.map(function(key) {
  process.env[key] = portalConfig[key];
});


module.exports = {
  devServer: {
    port: process.env.VUE_APP_PORT,
    proxy: 'http://localhost'
  },
  pages: {
    index: {
      // entry for the page
      entry: process.env.VUE_APP_ENTRY,
      // the source template
      template: 'public/index.html',
      // output as dist/index.html
      filename: 'index.html',
      // when using title option,
      // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
      title: 'Index Page',
      // chunks to include on this page, by default includes
      // extracted common chunks and vendor chunks.
      chunks: ['chunk-vendors', 'chunk-common', 'index']
    },
    // when using the entry-only string format,
    // template is inferred to be `public/subpage.html`
    // and falls back to `public/index.html` if not found.
    // Output filename is inferred to be `subpage.html`.
    //subpage: 'src/subpage/main.js'
  },
  publicPath: process.env.VUE_APP_BASE_URL,
  outputDir: process.env.VUE_APP_OUTPUT_DIR,
  indexPath: process.env.VUE_APP_INDEX_PATH,
  
   // disable hashes in filenames
   //filenameHashing: false,
   // delete HTML related webpack plugins
   chainWebpack: config => {
    config.plugins.delete('prefetch')
   },
}