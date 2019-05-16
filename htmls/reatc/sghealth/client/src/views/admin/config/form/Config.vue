<template>
    <el-form>

        <lq-el-input v-if="elementType() ==='text'" id="data" :label="elementTitle()" :type="isSecureElement() ? 'password': 'text'" />
        
        <lq-el-select v-else-if="elementType() ==='dropdown'" id="data" :label="elementTitle()" :options="elementOptionValue()" />
         <lq-el-image
            v-else-if="elementType() ==='file' && geElementOption('fileType') === 'image'"
            id="data" 
            :label="elementTitle()"
            :storage-url="$root.storage_url"
            value-key="path"
            :update-original="true"
            :rules="{file: {acceptedFiles: 'image/*'}}" 
            :thumbs="geElementOption('thumbnails') ? geElementOption('thumbnails') :  undefined"
        />
        <lq-el-file v-else-if="elementType() ==='file' && geElementOption('fileType') !== 'image'" 
            id="data"
            :storage-url="$root.storage_url"
            :label="elementTitle()"
            value-key="path" 
        />
        <lq-el-input v-else id="data" :label="elementTitle()" :type="isSecureElement() ? 'password': 'text'" />
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {

        name: 'config-form',
        mixins:[ lqForm ],

        data: function() {

            return {
                excludeInput: [ 'id', 'options', 'name','config_group']
            }
        },
        methods: {

            elementType: function () {

                return this.$helper.getProp(this.formValues, 'options.type', 'text')
            },
            elementTitle: function () {
              
              return this.$helper.getProp(this.formValues, 'name', 'Untitled')
            },

            elementOptionValue: function () {

                if(this.elementType() === 'dropdown') {
                    
                    const values = this.$helper.getProp(this.formValues, 'options.values', []);

                    return values.map(function (v) {

                        return {id: v, name: v};
                    });
                }
                else {
                    
                    return this.$helper.getProp(this.formValues, 'options.values', '');
                }
            },

            elementOptionIsMultiple: function () {

                return this.$helper.getProp(this.formValues, 'options.isMultiple', false);
            },
            isSecureElement: function () {

                return this.$helper.getProp(this.formValues, 'options.secure', false);
            },
            geElementOption: function (name, defaultval) {

                return this.$helper.getProp(this.formValues, 'options.'+name, defaultval);
            }
        }
    }
</script>