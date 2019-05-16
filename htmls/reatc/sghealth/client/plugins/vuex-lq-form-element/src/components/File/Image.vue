<template>
    <el-form-item
        :prop="id" 
        :error="elError()" 
        :label="label"
    >        
        <lq-image ref="lqImage" v-bind="$attrs" :id="id" :value-key="valueKey" >
              <i :class="`el-icon-${haveUpdatedImage? 'edit': 'plus'} primary`"></i>
        </lq-image>
    </el-form-item>
</template>
<script>

import helper from 'vuejs-object-helper';
import elementMixin from '../../mixins/elementMixin';

export default {
    
    name: 'lq-element-image',
    inheritAttrs: false,
    mixins:[elementMixin],
    props: {
        id: {
            type: String,
            required: true
        },
        // label: String,
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
        haveUpdatedImage: function () {

            return helper.getProp(this.$store.state.form, [this.formName, 'values', this.id, this.valueKey], null);
        }
    },
    data: function () {

        return {
            formName: null
        }
    },
    created() {

        this.formName = this.$lqForm.getFormName(this);
    }
}
</script>
<style>
    .lq-file-preview-wrapper .image-preview {
        max-width: 100%;
        max-height: 100%;
    }
    .lq-file-preview-wrapper {
        position: relative
    }
    /* .lq-file-preview-wrapper {
        display: inline;
        position: relative;
    } */
    .lq-file-preview-wrapper label {
        position: absolute;
        right: 0;
        background: #409eff;
        height: 24px;
        width: 24px;
        color: #fff;
        display: inline;
        line-height: 24px;
        padding-left: 4px;
        border-radius: 100%;
        cursor: pointer;
        top: 18px;
        z-index: 99;
    }
</style>


