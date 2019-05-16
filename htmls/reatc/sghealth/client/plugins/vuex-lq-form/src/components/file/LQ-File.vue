<template>
    <div v-if="shouldDisplay()">
        <input :disabled="isDisabled()" 
            :multiple="isMultiple()" 
            type="file" 
            @change="handleFileChange" 
            :id="id" 
            class="lq-file" 
            :name="makeElementName()"
        />
        <slot name="button"  v-bind:value="LQElement">
            <label :for="id">                
                Browse
            </label>
        </slot>
        <slot name="file_preview">
            <div v-if="(isMultiple() && LQElement && needReader)">
                <lq-file-reader v-for="(item, index) in LQElement" 
                :key="`${id}_preview_${index}`" 
                :elementName="`${id}.${index}`" 
                :thumbnails="thumbs" 
                v-on:remove="deleteFile" 
                /> 
            </div>
            <div v-else-if="LQElement && LQElement.file && !isMultiple() && needReader">
                <lq-file-reader :key="`${id}_preview`" 
                :elementName="id" 
                :thumbnails="thumbs" 
                v-on:remove="deleteFile" />
            </div>
        </slot>
    </div>
</template>

<script>
import formElement from '../../mixins/formElement';
import fileMixin from './fileMixin';
import VueCropper from 'vue-cropperjs';
import LqFileReader from '../fileReader/LQ-FileReader';

export default {
    name: 'LQ-File',
    mixins:[formElement, fileMixin],
    props: {

        needReader: {
            type: Boolean,
            default: function () {return true}
        }
    },
    inheritAttrs: false,
    components: {
        VueCropper,
        LqFileReader
    },
    methods: {

        deleteFile: function (elementName) {
            this.remove(elementName)
        }
    }
}
</script>
<style>
    input[type="file"].lq-file {
        visibility: hidden;
    }
</style>
