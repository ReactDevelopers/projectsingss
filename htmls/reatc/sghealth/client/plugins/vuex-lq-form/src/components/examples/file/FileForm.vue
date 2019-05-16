<template>
<div>
    <lq-file id="test" :thumbs="[{width: 200, height: 200}]" value-key="path"></lq-file>    
    <lq-image :circle="true" 
		storage-url="http://14.98.73.11/sghealth_dev/server/public/storage/" 
		:update-original="true" 
		id="test1" 
		value-key="path" 
		:thumbs="[{width: 200, height: 200}]">
	</lq-image>    

	<button type="button" @click="initializeFormValues">Set Value</button>
	<button type="button" @click="reset">Reset</button>
</div>
</template>

<script type="text/javascript">

	import form from '../../../mixins/form';
	// import lqText from '../../text/LQ-Text';
	// import lqFile from '../../file/LQ-File';
	// import imageWithPreview from '../../file/ImageWithPreview';
	// //import validationRule from './MyProfileValidation';
	// import LqFileReader from '../../fileReader/LQ-FileReader';

	export default {
		name: 'example-text-form',
		inheritAttrs: true,
		mixins: [form],
		components: {
			// lqText,
			// lqFile,
			// LqFileReader,
			// imageWithPreview
		},
		methods: {
			test : function (w, value) {
				alert('ok.dd..'+ value)
			},

			initializeFormValues: function () {
				this.$lqForm.initializeValues(this.formName, {
					test1: {
						path: 'banners/splash_screen_iphone_x_max_1.png'
					}
				});
			},
			reset: function () {
				
				this.$lqForm.resetForm(this.formName);
			}
		}
	}
</script>
