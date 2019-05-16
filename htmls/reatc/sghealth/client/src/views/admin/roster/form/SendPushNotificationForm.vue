<template>
    <el-form class="roster_popup_form">
        <lq-el-select :options="employees" :rules="rules.user_id" id="user_id" placeholder="Staff" />
        <lq-el-input type="text" id="title" placeholder="Title" />
        <lq-el-input type="textarea" id="body" placeholder="Body" />
        <el-form-item>
            <lq-el-submit label="Send Push Notification" @click="submit" />
        </el-form-item>
    </el-form>
</template>

<script>
import {lqForm} from 'vuex-lq-form';
import moment from 'moment';

export default {
    name: 'send-push-notificatio-form',
    mixins: [lqForm],
    props: {
        employees: {
            type: Array,
            required: true
        }
    },
    data: function(){

        return {
            rules: {
                user_id: {
                    presence: {
                        allowEmpty: false,
                        message: 'Staff is required. '
                    }
                }
            }
        }
    }
}
</script>
