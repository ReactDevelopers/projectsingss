<template>
    <lq-el-tabs name="config" active-tab="config">
        <el-tab-pane label="Site Configurations" name="config" v-if="$root.can('config.index')">
            <config-list />
        </el-tab-pane>
        <el-tab-pane label="Email/SMS Templates" name="email-sms-template" v-if="$root.can('notification-template.index')" >
            <notification-template-list />
        </el-tab-pane>
        <el-tab-pane label="FAQ" name="faq" v-if="$root.can('faq.index')">
            <faq-list/>
        </el-tab-pane>
        <el-tab-pane label="Static Pages" name="pages-list" v-if="$root.can('post.index')">
            <pages-list/>
        </el-tab-pane>
        <!-- <el-tab-pane label="Licences" name="licenses-list" v-if="$root.can('config.index')">
            <licenses-list/>
        </el-tab-pane> -->
    </lq-el-tabs>

</template>
<script>
import ConfigList from './list';
import NotificationTemplateList from '../notificationTemplate';
import FaqList from '../faq';
import PagesList from '../post';
import LicensesList from '../license';

export default {
    name: 'config_list_page',
    components: {ConfigList, NotificationTemplateList,FaqList,PagesList,LicensesList},
}
</script>

