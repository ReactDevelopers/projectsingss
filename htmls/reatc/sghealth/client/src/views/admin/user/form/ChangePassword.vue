<template>
    <el-form  auto-complete="on" label-width="300px">
        <lq-el-input id="password" label="Password" type="password"/>
        <lq-el-input id="confirm_password" label="Confirm Password" type="password"/>       
        
        <el-form-item>
            <lq-el-submit label="Reset" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>

import {lqForm} from 'vuex-lq-form';

export default {
    name: 'reset-password-form',
    mixins:[lqForm],
}
</script>
