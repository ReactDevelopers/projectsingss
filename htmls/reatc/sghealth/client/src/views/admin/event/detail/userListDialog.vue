<template>
    <el-form>
        <lq-el-select 
            id="user_id" 
            label="Select User"
            :request="getUserList"
            :filterable="true"
            :remote="true"
            remote-response-path="data.data"
            />
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {getAllMembers} from '@/api/event';


    export default {
        name: 'event_user_list',
        mixins:[lqForm],
        props : {
            eventData : {
                type : Object,
                default : {}
            }
        },
        created(){
            
            this.$lqForm.setElementVal(this.formName, 'event_id', this.eventData.id)
        },
        methods : {
            getUserList : function(search){
                return getAllMembers(this.eventData.id,{'status':'confirm','register_as_lucky_draw':'Yes','search':search});
            }
        }
    }
</script>