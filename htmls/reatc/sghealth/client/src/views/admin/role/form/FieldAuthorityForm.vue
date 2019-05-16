<template>
    <div v-if="permission">
        <el-row >
            <el-col :span="24" >
            <!-- <lq-el-radio-group
                :is-initial-value="false" 
                label="Field Selection"
                label-key="name"
                value-key="id" 
                :id="`permissions.${permission.name.toString().replaceAll('.','_')}.limitations.field_selection`" 
                :options="actions" 
            /> -->
            <lq-el-select 
                label="Security Tags"
                :is-initial-value="false"
                :id="`permissions.${permission.name.toString().replaceAll('.','_')}.limitations.tags`" 
                :clearable="true"
                :options="securityTagsOptions()" 
            />
            </el-col>
        </el-row>
        <!-- <el-table :data="$helper.getProp(permission, 'permission_fields', [])">
            <el-table-column  label="Field" >
                <template slot-scope="scope">
                    <lq-el-checkbox 
                        :id="`permission_fields.${scope.row.id}_`"
                        :label="scope.row.title"
                        :true-value="{permission_field_id: scope.row.id, permission_id: scope.row.permission_id}"
                        :false-label="null"
                        object-key="permission_field_id"
                        :is-initial-value="false"
                    >
                    </lq-el-checkbox>
                </template>
            </el-table-column>
             <el-table-column label="What action?" >
                
                <template slot-scope="scope">
                    <lq-el-radio-group
                        label-key="name"
                        :disabled="$helper.getProp(formValues, ['permission_fields', scope.row.id+'_', 'permission_field_id' ], false) ? false : true"
                        value-key="id" 
                        :is-initial-value="false" 
                        :id="`permission_fields.${scope.row.id}_.authority`" 
                        :options="getAuthorities()" 
                    />
                </template>
             </el-table-column>
        </el-table> -->

    </div>
</template>
<script>
    
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'permission-field-authority-form',
        mixins:[lqForm],
        props: {
            permission: Object,
        },
        data: function () {

            return {
                actions: [
                    {id: 'except', name: 'Except'},
                    {id: 'only', name: 'Only'}
                ]
            }
        },
        computed: {

            /**
             * To get Field section value
             */
            getFieldSelectionValue: function() {
                
                let val = this.$helper.getProp(this.formValues, `permissions.${this.permission.name.toString().replaceAll('.','_')}.limitations.field_selection`)
                return val;
            }
        },
        methods: {

            /**
             * To get permission security Tags
             */
            securityTagsOptions: function (){

                return this.permission.limitations && this.permission.limitations.tags ? this.permission.limitations.tags.map((tag) => {
                    return {id: tag, name: tag};
                }): [];
            },

            /**
             * To get authorities list
             */
            getAuthorities: function() {

                return [
                    {id: 'read', name: 'Read'},
                    {id: 'write', name: 'Write', disabled: this.getFieldSelectionValue === 'except' ? true : false},
                    {id: 'hide', name: 'Hide', disabled: this.getFieldSelectionValue === 'except' ? false : true},
                ]
            }
        }
    }
</script>