<template>
    <el-form>
        <lq-el-date-picker 
            label="From Month" 
            type="month" 
            id="from_month"                
            value-format="yyyy-MM" 
            format="MMM, yyyy" 
            placeholder="From Month" 
            disabled
        />
        <lq-el-date-picker 
            label="To Month" 
            id="to_month"  
            type="month"               
            value-format="yyyy-MM" 
            format="MMM, yyyy" 
            placeholder="To Month" 
        />
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';

    export default {
        name: 'copy_form',
        mixins:[lqForm],
        props : {
            copyData : {
                type : Object,
                default : {}
            }
        },
        created(){
            
            this.$lqForm.setElementVal(this.formName, 'from_month', this.copyData.format_date)
            this.$lqForm.setElementVal(this.formName, 'institute_id', this.copyData.institute_id)
        }
    }
</script>