module.exports = {
  presets : [
    ['@vue/app', {
      polyfills: [
        'es6.promise',
        'es6.symbol',
      ],
      "modules" : 'commonjs',
    }],
    [
    "@babel/preset-env", 
      {
        "targets": {
          "browsers": ["last 2 versions", "ie >= 7"]
        },
        "modules" : 'commonjs',
        "useBuiltIns": 'entry'
      }      
    ]
  ],
  
  
  // "plugins": [
  //   [ "transform-runtime", "transform-es2015-arrow-functions"]
  // ]
}