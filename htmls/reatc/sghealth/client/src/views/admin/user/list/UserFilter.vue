<template>
    <el-form>
        <el-row :gutter="10">
            <el-col :span="4">
                <lq-el-select 
                    id="service_id"
                    label="Services"
                    :request="getServiceList"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    remote-response-path="data.data"
                    
                />
            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="institute_id"
                    label="Institution"
                    :request="getInstituteList"
                    :input-width="50"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    :max-char="22"
                    remote-response-path="data.data"
                    @change="whenInstituteChanged"
                />

            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="branch_id"
                    label="Branch"
                    :max-char="22"
                    :options="branchOptions"
                    :filterable="true"
                    :multiple="true"
                />
            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="profession_id"
                    label="Profession"
                    :request="getProfessionList"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    remote-response-path="data.data"
                />
            </el-col>
            <el-col :span="4" v-if="getConfig('role_id') === 1">
                <lq-el-select 
                    id="role_id"
                    label="Role"
                    :request="getRoleList"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    remote-response-path="data.data"
                />
            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="ahpc"
                    label="AHPC PC"
                    :multiple="true"
                    :options="[{id:'full',name:'Full'},{id:'temporary',name:'Temporary'},{id:'conditional',name:'Conditional'}]"
                />
            </el-col>
            
            
        </el-row>
    </el-form> 
</template>
<script>
    import { mapGetters } from 'vuex'
    import {lqForm} from 'vuex-lq-form';
    import {list as serviceListApi} from '@/api/service';
    import {list as instituteListApi} from '@/api/institute';
    import {list as branchListApi} from '@/api/branch';
    import {list as professionListApi} from '@/api/profession';
    import {list as roleListApi} from '@/api/role';
    import userFormMixin from '../form/userFormMixin';

    export default{
        name: 'user_filter',
        mixins:[lqForm, userFormMixin],
        data: function () {

            return {
                institute_key_name: 'institute_id'
            }
        },
        computed : {
            ...mapGetters([
                'authProfile',
            ]),
        },
        methods: {
            
            whenInstituteChanged: function (val) {
                
                const selectedInstitues = val ? val.slice() : [];                    
                this.formRemoveBranchId('branch_id', true, selectedInstitues);
            },
            /**
             * To get the role list from server.
             */
            getRoleList: function(query) {

                return roleListApi({search: query});
            },

            getConfig(name) {

                return this.$helper.getProp(this.authProfile, [name], null)
            }

            // /**
            //  * update branch fields
            //  */
            // updateBranchList: function(data) {

            //     if(data.length === 0){
            //         this.$lqForm.setElementVal(this.formName, 'branch_id', [])
                    
            //     }
            //     this.$refs.branchElement ?  this.$refs.branchElement.clearRemoteOptions() : null;
            // }
        }
    }
</script>

