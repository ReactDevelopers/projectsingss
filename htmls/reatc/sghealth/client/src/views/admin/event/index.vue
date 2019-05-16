<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button 
                type="primary"  
                icon="el-icon-plus" 
                circle 
                @click="$router.push('event/create')"
                v-if="$root.can('event.store')" 
            ></el-button>	
        </el-col>
        <el-col :span="24">
            <lq-el-tabs ref="eventtab" name="events" active-tab="upcoming" v-if="$root.can('event.index')">
                <el-tab-pane label="Upcoming" name="upcoming" >
                    <list event-type="upcoming" />
                </el-tab-pane>
                <el-tab-pane label="Today" name="today">
                    <list  event-type="today" />
                </el-tab-pane>
                <el-tab-pane label="Completed" name="completed">
                    <list  event-type="completed" />
                </el-tab-pane>
            </lq-el-tabs>
        </el-col>
    </el-row>
</template>
<script>
import List from './list';

export default {
    name: 'event_list_page',
    components: {List},
    
}
</script>

