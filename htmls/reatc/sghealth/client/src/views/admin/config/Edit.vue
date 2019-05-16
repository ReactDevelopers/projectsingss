<template>
     <el-dialog
        width="40%"
        title="Update Settings"
        :visible="(configData ? true : false)"
        @close="$emit('close')"
        append-to-body>
        <config-form :form-name="formName" ref="cform" :request="request" @submited-success="success" />
        
        <div slot="footer" class="dialog-footer">
            <el-button type="primary" :disabled="isSubmiting" @click="save"> {{isSubmiting ? 'Saving...': 'Save'}}</el-button>
        </div>
     </el-dialog>
</template>
<script>
    
    import configForm from './form/Config';
    import {update as updateApi} from '@/api/config';

export default {
    name: 'config-edit-page',
    components:{
        
        configForm
    },
    props: {
        configData: {
            type: Object,
            required: true
        }
    },
    data: function () {

        return {
            formName: 'config_form',
        }
    },
    created: function () {
        this.$lqForm.initializeValues(this.formName, this.configData)
        //this.$lqForm.setPermission(this.formName, response.current_permission)
    },

    computed: {

        isSubmiting: function () {

			return this.$helper.getProp(this.$store.state.form,`${this.formName}.isSubmiting`, false);
		},
    },
    methods: {

            request: function (data) {
                const type = this.$helper.getProp(this.configData,'options.type', 'text');

                return updateApi(this.configData.id, data, (type==='file'));
            },
            success: function (resposne) {

                this.$message.success('Setting has been updated.');
                this.$lqTable.updateRow('site_configs', resposne.data.config, 'id');
                this.$emit('close')
            },
            save: function () {

                if(this.configData.options && this.configData.options.secure) {
                    
                    this.$confirm('Do you really want to update the secure field.?', 'Warning', {
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel',
                        type: 'warning'
                        }).then(() => {

                            this.$refs.cform  ?  this.$refs.cform.submit() :  null;
                        });
                        
                }
                else {
                    this.$refs.cform  ?  this.$refs.cform.submit() :  null;
                }
            }
        }

}
</script>
