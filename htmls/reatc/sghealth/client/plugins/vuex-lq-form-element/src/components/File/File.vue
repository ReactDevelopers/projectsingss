<template>
    <el-form-item
        :prop="id" 
        :error="elError()" 
        :label="label"
    > 
   
        <lq-file ref="lqFile" v-bind="$attrs" :id="id" :value-key="valueKey" >
            <template slot="button">
                <label :for="id">
                    <el-tag>Select Document</el-tag>
                </label>
            </template>

            <template slot="file_preview">
                <transition-group
                    tag="ul"
                    :class="[
                    'el-upload-list',
                    ]"
                    v-if="allData().length"
                    name="lq-el-file-preview"
                >
                    <li v-if="file && (file[valueKey] || file.file )" :class="['el-upload-list__item']" v-for="(file, index) in allData()" :key="`file_${index}`">
                        <a class="el-upload-list__item-name" >
                            <i class="el-icon-document"></i>{{getFileName(file)}}
                        </a>                        
                        <i class="el-icon-close" v-if="file.file" @click="$emit('remove', file)"></i>
                    </li>
                </transition-group>

            </template>
        </lq-file>
    </el-form-item>
</template>
<script>
import helper from 'vuejs-object-helper';

export default {
    
    name: 'lq-element-file',
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            required: true
        },
        label: String,
        valueKey: {
            type: String,
            default: function () {
                return 'path'
            }
        }
    },
    computed: {

        error: function () {
            const file_error = helper.getProp(this.$store.state.form, [this.formName, 'errors', this.id+'.file'], null);
            const element_error = helper.getProp(this.$store.state.form, [this.formName, 'errors', this.id], null);
			return element_error ? element_error : file_error;
        },
        fileData: function () {

            return helper.getProp(this.$store.state.form, `${this.formName}.values.${this.id}`, {} );
        },
        haveUpdatedImage: function () {

            return helper.getProp(this.$store.state.form, `${this.formName}.values.${this.id}.${this.valueKey}`, null);
        }
    },
    data: function () {

        return {
            formName: null
        }
    },
    created() {

        this.formName = this.$lqForm.getFormName(this);
    },
    methods: {

        elError: function () {
            return this.error ? this.error.join(', ') : undefined;
        },

        allData: function () {

            const isMultiple = this.$refs.lqFile ? this.$refs.lqFile.isMultiple() : false
            
            return isMultiple ?   this.fileData  : [this.fileData ]
        },

        getFileName: function (file) {

            return file.file ? file.file.name : this.$helper.getProp(file, 'info.original_name', null)
        }
    }
}
</script>

<style>
    .lq-file{
        display: none;
    }
</style>



