<template>
    <el-form>
        <lq-el-select 
        id="profession_category_id" 
        label="Profession Category"
        :request="getProfessionCategory"
        :filterable="true"
        :remote="true"
        remote-response-path="data.data"
        />
        <lq-el-input id="name" label="Name" />
        <lq-el-input id="description" label="Description" />
        <lq-el-radio-group id="options.can_work_at"
            :button="true"
            label="Show Can Work At"
            :options="[{value: 'true', label: 'Yes'}, {value: 'false', label: 'No'}]" 
        />
        <lq-el-radio-group id="options.isMultipleInstitute"
            :button="true"
            label="Multiple Institutes"
            :options="[{value: 'true', label: 'Yes'}, {value: 'false', label: 'No'}]" 
        />
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {list as professionCategoryApi} from '@/api/professionCategory';

    export default {
        name: 'profession_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        },
        methods : {
            getProfessionCategory : function(query){
                return professionCategoryApi({search : query,page:'-1'});
            }
        }
    }
</script>