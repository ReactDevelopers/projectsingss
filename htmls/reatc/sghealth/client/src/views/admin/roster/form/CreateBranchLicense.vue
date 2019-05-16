<template>
    <el-form class="roster_popup_form">
        <lq-el-select 
            id="license_id" 
            label="License"
            store-key="table.license_drop_down.data"
        />
        <lq-el-select 
            id="license_for" 
            label="License For"
            :options="[{id: 'branch', name: 'Branch'}, {id: 'service', name: 'Service'}]"
        />
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>

<script>
import {lqForm} from 'vuex-lq-form';
import {list as LicenseListApi} from '@/api/license';

export default {
    name: 'branch-license-form',
    mixins: [lqForm],
    props: {
        institute: Object
    },
    created: function () {

        this.$lqForm.setElementVal(this.formName, 'institute_id', this.institute.id);
        
        this.$lqTable.fetchListData('license_drop_down', LicenseListApi, {
            data_key: 'data.data',
        })
    }
}
</script>

<style>

</style>

