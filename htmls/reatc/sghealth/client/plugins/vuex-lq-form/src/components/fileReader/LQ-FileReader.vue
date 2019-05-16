<template>
    <div>
        <div v-if="loading ">
            loading...
        </div>
        <div v-else-if="!isImage">
            <p>{{file.name}}</p>
        </div>        
        <div v-if="needToCropped()" class="lq-cropper_wrapper" >
            <lq-cropper  
                :viewport="thumb"
                v-for="(thumb, index) in thumbnails" :key="`${elementName}_cropper_${index}`"
                :element-name="elementName"
                :circle="circle"
                :boundary="boundary ? boundary : thumb"
                :thumbnail-index="!updateOriginal ? index : undefined"
                v-bind="crop"
                :size="thumb.size ? thumb.size: 'original'"
            />
        </div>
        <div v-else-if="isImage && imageRawData">
            <img :src="imageRawData" alt="" />
        </div>

        <button v-if="!hideDeleteBtn" @click="$emit('remove', elementName)">Delete</button>
    </div>
</template>
<script>
import  helper, {isImage} from 'vuejs-object-helper';
import {getFormName} from '../helper';
import LqCropper from './LQ-Cropper';

export default {
    name: 'LQ-FileReader',
    props: {
        crop: {
            type: Object,
            default: () => { return {size: 'original', enableResize: false}}
        },
        thumbnails:  Array,
        updateOriginal: {
            type: Boolean,
            required: false,
            default: () => false
        },
        circle: {
            type: Boolean,
            default:() => false,
        },
        elementName:{
            type: String,
            required: true
        },
        boundary: {
            type: Object,
            default() { return null }
        },
        hideDeleteBtn: Boolean
    },
    components:{
        LqCropper
    },
    data: function () {

        return {
            isImage: null,
            formName: null,
            loading: false,
            imageRawData: null
        }
    },
    computed: {
        file: function () {

            return helper.getProp(this.$store.state.form, `${this.formName}.values.${this.elementName}.file`, null);
        }
    },
    created: function () {

        this.formName = getFormName(this);
        this.readFile();
    },
    watch: {

        file: function (newFile, oldFile) {
            
            !oldFile || newFile.name !==  oldFile.name ? this.readFile() : null;
        }
    },
    methods: {
        
        readFile: function () {

            if(!this.file) {
                return;
            }

            let fReader = new FileReader();
            this.loading = true;

            fReader.onload = (e) => {

                this.isImage  =  isImage(e.target.result) ? true : false;
                this.loading = false;
                this.imageRawData = e.target.result;
            }
            fReader.readAsDataURL(this.file);
        },
        needToCropped: function () {

            return helper.isArray(this.thumbnails) && this.file && this.isImage;
        }

    }
}
</script>

