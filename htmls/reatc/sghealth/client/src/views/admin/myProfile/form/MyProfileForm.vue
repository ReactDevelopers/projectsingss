<template>
    <el-form  auto-complete="on" label-width="300px" >
        <lq-el-input id="name" label=" Name" />
        <!-- <lq-el-input id="last_name" label="Last Name"/> -->
        <lq-el-input id="email" label="Email" />
        <mobile-no id="mobile_no" label="Mobile Number" />
        
        <lq-el-image 
            id="profile_image" 
            label="Profile Image" 
            :storage-url="$root.storage_url"
            :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[200, 200]}}" 
            :thumbs="[{width: 200, height: 200, type: 'circle'}]"
            :circle="true"
            :update-original="true"
        />
         <el-form-item>
            <lq-el-submit label="Update" @click="submit" />
          </el-form-item>
    </el-form>
</template>
<script>

import {lqForm} from 'vuex-lq-form';

export default {
    name: 'my-profile-form',
    mixins:[lqForm],
}
</script>
<style>
    .image-preview, .lq-cropper_wrapper {
        width: 200px;
    }
</style>
