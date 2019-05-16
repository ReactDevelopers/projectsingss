<template>
    <el-row>
        <el-col :span="12">
            <el-form>
                <lq-el-input id="name" label="Name" />
                
                <el-form-item>
                    <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
                </el-form-item>
            </el-form>
        </el-col>
    </el-row>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'license_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        }
    }
</script>