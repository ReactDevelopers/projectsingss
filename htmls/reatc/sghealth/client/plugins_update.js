var path = require('path');
//var copydir = require('copy-dir');
var copy = require('recursive-copy');


var options = {

	overwrite: true,
	expand: false,
	dot: true,
	junk: false,
	// filter: [
    //     '**/',
    //     '!.htpasswd'
    // ]
}

//ncp.limit = 16;

// var srcPath = path.dirname('/plugins/vuejs-object-helper/src'); //current folder
// var destPath = '/node_modules/vuejs-object-helper/src'; //Any destination folder

const locations = [
	{srcPath:'./plugins/element-ui/src', destPath: './node_modules/lq-element-ui/src' },
	{srcPath:'./plugins/element-ui/lib', destPath: './node_modules/lq-element-ui/lib' },
	{srcPath:'./plugins/element-ui/packages', destPath: './node_modules/lq-element-ui/packages' },
	{srcPath:'./plugins/element-ui/package.json', destPath: './node_modules/lq-element-ui/package.json' },

	{srcPath:'./plugins/vuejs-object-helper/src', destPath: './node_modules/vuejs-object-helper/src' },
	{srcPath:'./plugins/vuejs-object-helper/dist', destPath: './node_modules/vuejs-object-helper/dist' },
	{srcPath:'./plugins/vuejs-object-helper/package.json', destPath: './node_modules/vuejs-object-helper/package.json' },

	{srcPath: './plugins/vuex-lq-form/src', destPath: './node_modules/vuex-lq-form/src'},
	{srcPath: './plugins/vuex-lq-form/dist', destPath: './node_modules/vuex-lq-form/dist'},
	{srcPath: './plugins/vuex-lq-form/package.json', destPath: './node_modules/vuex-lq-form/package.json'},

	{srcPath: './plugins/vuex-lq-form-element/src', destPath:'./node_modules/vuex-lq-form-element/src' },
	{srcPath: './plugins/vuex-lq-form-element/dist', destPath:'./node_modules/vuex-lq-form-element/dist' },
	{srcPath: './plugins/vuex-lq-form-element/package.json', destPath:'./node_modules/vuex-lq-form-element/package.json' },

	{srcPath: './plugins/vuex-lq-table/src', destPath: './node_modules/vuex-lq-table/src'},
	{srcPath: './plugins/vuex-lq-table/dist', destPath: './node_modules/vuex-lq-table/dist'},
	{srcPath: './plugins/vuex-lq-table/package.json', destPath: './node_modules/vuex-lq-table/package.json'},
]


locations.map(async function(location, index) {
	
	///console.log('Copying files...', location.srcPath);

	await copy(location.srcPath, location.destPath, options)
		.on(copy.events.COPY_FILE_START, function(copyOperation) {
	        console.info('Copying file ' + copyOperation.src + '...');
	    })
	    .on(copy.events.COPY_FILE_COMPLETE, function(copyOperation) {
	        console.info('Copied to ' + copyOperation.dest);
	    })
	    .on(copy.events.ERROR, function(error, copyOperation) {
	        console.error('Unable to copy ' + copyOperation.dest);
	    })
	    .then(function(results) {
	        console.info(results.length + ' file(s) copied');
	    })
	    .catch(function(error) {
	        return console.error('Copy failed: ' + error);
	    });
})
