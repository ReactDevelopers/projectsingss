
var copy = require('recursive-copy');


var options = {

	overwrite: true,
	expand: false,
	dot: true,
	junk: false,
}

const locations = [
	{srcPath:'../element-ui/src', destPath: './node_modules/lq-element-ui/src' },
	{srcPath:'../element-ui/lib', destPath: './node_modules/lq-element-ui/lib' },
	{srcPath:'../element-ui/packages', destPath: './node_modules/lq-element-ui/packages' },
	{srcPath:'../element-ui/package.json', destPath: './node_modules/lq-element-ui/package.json' },
	
	{srcPath:'../vuejs-object-helper/src', destPath: './node_modules/vuejs-object-helper/src' },
	{srcPath:'../vuejs-object-helper/dist', destPath: './node_modules/vuejs-object-helper/dist' },
    {srcPath:'../vuejs-object-helper/package.json', destPath: './node_modules/vuejs-object-helper/package.json' },
    {srcPath:'../vuex-lq-form/src', destPath: './node_modules/vuex-lq-form/src' },
	{srcPath:'../vuex-lq-form/dist', destPath: './node_modules/vuex-lq-form/dist' },
	{srcPath:'../vuex-lq-form/package.json', destPath: './node_modules/vuex-lq-form/package.json' },
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
