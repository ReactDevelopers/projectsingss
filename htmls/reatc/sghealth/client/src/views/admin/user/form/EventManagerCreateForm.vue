<template>
    <el-form auto-complete="off" label-position="left"  label-width="200px">
        <el-row :gutter="20">
            <el-col :span="12">
                <lq-el-input id="name" label="Name" />
                <lq-el-select 
                id="profession_id"
                label="Profession"
                :request="getProfessionList"
                :remote="true"
                :filterable="true"
                remote-response-path="data.data"
                />
                <lq-el-input id="email" label="Email"  />
                <lq-el-image 
                    id="profile_image" 
                    label="Profile Image" 
                    :storage-url="$root.storage_url"
                    :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[200, 200]}}" 
                    :thumbs="[{width: 100, height: 100, type: 'circle'}]"
                    :circle="true"
                    :update-original="true" />
            </el-col>
        </el-row>
       
        
        <el-form-item>
            <lq-el-submit label="Create New Event Manager" @click="submit"/>
        </el-form-item> 
    </el-form>
</template>
<script>

    import {lqForm} from 'vuex-lq-form';
    import userFormMixin from './userFormMixin';

    export default {
        name: 'edit_user_form',
        mixins:[lqForm, userFormMixin]
    }
</script>