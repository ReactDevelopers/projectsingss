<template>
    <el-form>
        <el-row :gutter="10" align="middle"  >
            <el-col :span="4" :offset="12">
                <lq-el-select 
                    id="institute_id"
                    label="Institute"
                    :request="getInstituteList"
                    :filterable="true"
                    :remote="true"
                    remote-response-path="data.data"
                />
            </el-col>
                        

            <el-col :span="6">
                <lq-el-date-picker 
                label="Month,Year" 
                id="date"  
                type="month"               
                value-format="yyyy-MM" 
                format="MMM, yyyy" 
                placeholder="Month,Year" 
            />
            </el-col>
            <el-col :span="2" align="right">
                <el-button v-if="$root.can('roster.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('roster')" ></el-button>	
            </el-col>
        </el-row>
    </el-form> 
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {list as instituteListApi} from '@/api/institute';

    export default{
        name: 'schedule_filter',
        mixins:[lqForm],
        
        methods: {
            
            /**
             * To get the institute list from server.
             */
            getInstituteList: function(query) {
                
                return instituteListApi({search: query})
            },
            
        },
        created: function () {
            var today = new Date();
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            this.$lqForm.setElementVal(this.formName, 'date', yyyy+'-'+mm)
        }
    }
</script>

