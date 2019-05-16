<template>
    <div>
    <el-row :gutter="0">
        <el-col :span="4" >
            <el-dropdown :hide-on-click="false" split-button type="primary">
                 Show Column
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item :key="`column_shown${col}`" v-for="(col) in Object.keys(userTableColumns)">
                        <el-checkbox  v-model="userTableColumns[col].val">{{userTableColumns[col].title}}</el-checkbox>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
        </el-col>
        <el-col :span="20" align="right" >
            <el-button v-if="$root.can('create-employee')" type="primary" @click="$router.push('users/create-employee')" icon="el-icon-plus" title="Create New Employee" >Create  Employee</el-button>
            <el-button v-if="$root.can('create-manager')" type="primary" @click="$router.push('users/create-manager')" icon="el-icon-plus" title="Create New Manager" >Create  Manager</el-button>
            <el-button v-if="$root.can('create-event-manager')" type="primary" @click="$router.push('users/create-event-manager')" icon="el-icon-plus" title="Create New Event Manager" >Create  Event Manager</el-button>
            <el-button v-if="$root.can('create-freelancer')" type="primary" @click="$router.push('users/create-freelancer')" icon="el-icon-plus" title="Create New Freelancer" >Create  Freelancer</el-button>
        </el-col>
    </el-row>
    <el-row> 
        <el-col :span="24">
            <user-filter v-if="activeTab === 'active'" :keep-alive="true" form-name="users_1_lq_table_form" key="users_1_lq_table_form" />
            <user-filter v-else form-name="users_0_lq_table_form" :keep-alive="true"  key="users_0_lq_table_form" />
        </el-col>
        <el-col :span="24">
            <lq-el-tabs ref="usertab" name="users" active-tab="active">
                <el-tab-pane label="Active" name="active">
                    <list  :shown-columns="shownColumns" />
                </el-tab-pane>
                <el-tab-pane label="Trashed" name="trashed">
                    <list :for-trashed="true" :shown-columns="shownColumns" />
                </el-tab-pane>
            </lq-el-tabs>
        </el-col>
    </el-row>
    </div>
</template>
<script>
import List from './list';
import UserFilter from './list/UserFilter';

export default {
    
    name: 'user-list-page',
    components: {List,UserFilter},
    computed: {
        activeTab: function () {
            return this.$helper.getProp(this.$store.state, 'app.tabs.users', 'active')
        },
        shownColumns : function() {

           const columns = Object.keys(this.userTableColumns);
           let shown_columns = {};
           columns.map( (col) => {
             
             if(this.userTableColumns[col].val ){
                shown_columns[col] = true;
             }
             return col;
           });

           return shown_columns;
        }
    },
    data(){
        return  {
            userTableColumns : {
                name : {val: true, title: 'Name'},
                email : {val: true, title: 'Email'},
                branch_name : {val: false, title: 'Branch'},
                institute_name : {val: false, title: 'Institute'},
                profession_name : {val: true, title: 'Profession'},
                service_name : {val: false, title: 'Service'},
                mobile_no : {val: true, title: 'Mobile No.'},
                action : {val: true, title: 'Action'},
            }
        }
    }
}
</script>

