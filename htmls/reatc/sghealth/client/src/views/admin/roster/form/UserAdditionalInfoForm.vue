<template>
    <el-form class="roster_popup_form">
        <el-row>
            <el-col :span="3" :offset="21" align="right">
                <el-button type="danger" @click="push('additional_informations', {})" icon="el-icon-plus" circle />
            </el-col>
        </el-row>
        <el-row :gutter="10" v-for="(addtional, index) in getElement('additional_informations', {})" :key="`additional_info${index}`">
            <el-col :span="9">
                <lq-el-input :id="`additional_informations.${index}.label`" label="Label" />
            </el-col>
            <el-col :span="12">
                <lq-el-input :id="`additional_informations.${index}.value`" label="Value" />
            </el-col>
            <el-col :span="3" align="right">
                <br/><br/>
                <el-button type="danger" @click="remove(`additional_informations.${index}`)" icon="el-icon-delete" circle />
            </el-col>
        </el-row>
        <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
    </el-form>
</template>

<script>
import {lqForm} from 'vuex-lq-form';
export default {
    
    name: 'user-addtional-info-form',
    mixins: [lqForm]
}
</script>
