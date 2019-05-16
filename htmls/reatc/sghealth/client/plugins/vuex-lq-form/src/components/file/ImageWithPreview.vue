<template>
    <lq-file :id="id" :lang="lang" 
        :need-reader="false" 
        :thumbs="thumbs" 
        :storage-url="storageUrl"
        :value-key="valueKey"
        ref="lqFile"
        v-bind="$attrs"
        >
        <template slot="button" slot-scope="props">
            <div class="lq-file-preview-wrapper" :style="{width: wrapperWidth()}">
                <label :for="id">
                    <slot>
                        Change
                    </slot>
                </label>
                <img 
                    v-if="!props.value || !props.value.file" 
                    :src="imageSource()"
                    class="image-preview"
                    :width="getFirstThumbData('width')"
                    :height="getFirstThumbData('height')"
                    alt="" />
                <lq-file-reader 
                    :elementName="id" 
                    v-else-if="props.value && props.value.file"
                    :thumbnails="thumbs"
                    :boundary="boundary"
                    :circle="circle"
                    :update-original="updateOriginal"
                    :hide-delete-btn="true"
                 />
            </div>
        </template>
    </lq-file>
</template>
<script>
//import lqFile from './LQ-File';
import defaultImageUrl from '../../assets/images/defaultImage.png';
import helper, {isImage} from 'vuejs-object-helper'
//import LqFileReader from '../fileReader/LQ-FileReader';

export default {
    name: 'image-with-preview',
    inheritAttrs: false,
    props: {
        defaultImage: {
            type: String,
            default: function() {

                return this.$root.defaultImage ? this.$root.defaultImage : null
            }
        },
        id: {
            type: String,
            required: true
        },
        lang: Object,
        thumbs: Array,
        
         /**
         * Base Url of Storage
         */
        storageUrl: String,
        /**
         * The key path where the upload file name.
         */
        valueKey: {
            type: String,
            required: true
        },
        updateOriginal: {
            type: Boolean,
            required: false,
            default: () => false
        },
        circle: {
            type: Boolean,
            default:() => false,
        },
        boundary: Object
    },
    // components: {
    //     lqFile,
    //     LqFileReader
    // },
    data: function () {

        return {
            isImage: null,
            formName: null,
            loading: false
        }
    },
    created() {

        this.formName =  this.$lqForm.getFormName(this);
    },
    computed: {

        imageValue: function () {
			return helper.getProp(this.$store.state.form,`${this.formName}.values.${this.id}`, {});
        }        
    },

    methods: {

        
        /**
         * get Default Image Source
         */
        defaultImageSource: function() {

            return this.defaultImage ? this.defaultImage : defaultImageUrl;
        },
        /**
         * get the uploaded image course
         */
        uploadedImageSource: function () {
            
            const uploaded_source = helper.getProp(this.imageValue, this.valueKey, null);
            return uploaded_source ? (this.storageUrl ? this.storageUrl+uploaded_source : uploaded_source) : null;
        },
        /**
         * To get The image sorece
         */
        imageSource: function() {
            
            const uploaded_source = this.uploadedImageSource();          
            return  uploaded_source ? uploaded_source  : this.defaultImageSource();
        },

        /**
         * Create the Uploaded image Style
         */
        getFirstThumbData: function (sytle, def_val) {

            if(this.thumbs) {

                return this.thumbs[0][sytle];
            }
            else {

                return def_val ? def_val : 'auto';
            }
        },
        wrapperWidth: function () {
        
            const width = this.boundary ? this.boundary.width : this.getFirstThumbData('width', null);

            return width ? width + 'px' : 'auth';
        }
    }
}
</script>
<style>
    
</style>

