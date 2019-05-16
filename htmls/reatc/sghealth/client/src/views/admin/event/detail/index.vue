<template>
    <div>
        <el-row :gutter="10">
            <el-col :span="24">
                <h1>{{$helper.getProp(eventDetail ,'title' ,'-')}}</h1>
            </el-col>
            <el-col :span="24">
                <el-carousel indicator-position="outside" v-if="eventDetail" >
            
                    <el-carousel-item v-for="event in eventDetail.event_images" :key="event.image.id">
                        <img :src="`${$root.storage_url}${$helper.getProp(event,'image.thumbnails.0.path',null)}`" />
                    </el-carousel-item>
                </el-carousel>
            </el-col>
            <el-col :span="12" >
                <span>Date : {{$helper.getProp(eventDetail ,'format_event_date' ,'-')}}</span>
            </el-col>
            <el-col :span="12" align="right" >
                <span>{{$helper.getProp(eventDetail ,'event_start_time' ,'-')}} - {{$helper.getProp(eventDetail ,'event_end_time' ,'-')}}</span>
            </el-col>
        
        </el-row>
        <el-row :gutter="10">
            <el-col :span="12">
                <el-tag type="success">{{$helper.getProp(eventDetail ,'attendees' ,'0') }} / {{$helper.getProp(eventDetail ,'total_member' ,'0')}} Attendees</el-tag>
            </el-col>
            <el-col :span="12" align="right">
                <span>Address - {{$helper.getProp(eventDetail ,'place.formatted_address' ,'-')}}</span>
            </el-col>
            <el-col :span="24" align="center">
                <h3>{{$helper.getProp(eventDetail ,'title' ,'-')}}</h3>
                <p v-html="$helper.getProp(eventDetail ,'description' ,'-')">
                </p>
                <img :src="`data:image/png;base64, ${$helper.getProp(eventDetail ,'qr_code' ,null)}`"/>
            </el-col>
            <el-col :span="24">
                <h3>Event Owner</h3>
                <div class="" v-if="eventDetail.manager">
                    <img v-if="$helper.getProp(eventDetail.manager ,'profile_image.path')" :src="`${$root.storage_url}${$helper.getProp(eventDetail.manager ,'profile_image.path')}`" height="50px" width="50px" :circle="true"/>

                    <img v-else :src="`${$root.storage_url}profile_image/avatar.png`"  height="50px" width="50px" :circle="true"/>
                    
                    <span><h5>{{$helper.getProp(eventDetail ,'manager.name' ,'-')}}</h5></span>
                    <span>{{$helper.getProp(eventDetail ,'manager.email' ,'-')}}</span>
                </div>
                <div v-else>
                    <span>{{$helper.getProp(eventDetail ,'manager_email' ,'-')}}</span>
                </div>
            </el-col>
            <el-col :span="24" align="center">
                <h3 v-if="$helper.getProp(eventDetail ,'is_winner',null)">Lucky Draw Winner - {{$helper.getProp(eventDetail ,'is_winner.winner.name')}} </h3>    
                <el-button
                    v-else-if="$helper.getProp(eventDetail ,'is_lucky_draw')  === 'Yes'"
                    @click="openEventUserDialog()"
                    type="success"
                >Announce Winner</el-button>
            </el-col>
        </el-row>
        <hr/>
        <el-row>
            <el-col :span="12" >
                <h3>Member List</h3>
            </el-col>
            <el-col :span="12" align="right">
                <el-button
                    v-if="$root.can('event-list-member')"
                    @click="exportMembers()"
                    icon="el-icon-upload2" 
                    type="primary"
                    :circle="true"/>
            </el-col>

        </el-row>

        <!-- Dialog to select the Certificate -->
        <el-dialog
            title="Select Winner"
            :visible.sync="dialogVisible"
            width="270px"
        >

            <user-list ref="userList" :eventData="eventDetail" :form-name="formName" :request="announceWinner" @submited-success="success" v-if="$root.can('event-list-member')"/>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="primary" @click="$refs.userList ? $refs.userList.submit(true) : null">Confirm</el-button>
            </span>
        </el-dialog>
        <!--End Dialog of certificate-->

    </div>
</template>
<script>
import {getAllMembers,eventWinner} from '@/api/event';
import userList from './userListDialog';
const FileDownload = require('js-file-download');

export default {
    name: 'event_view_page',
    components : {userList},
    props : {
        eventDetail : {
            type:  Object,
        }
    },
    data(){
        return {
            formName : 'event_user_list',
            dialogVisible : false
        }
    },
    methods : {
        exportMembers:function(){
            var data = {};
            data.export = 'excel';

            return getAllMembers(this.$route.params.id,data,'arraybuffer').then((response)=>{

                FileDownload(response, 'members.xlsx');
                return;

            })
        },
        openEventUserDialog : function(){
            this.dialogVisible = true
        },

        announceWinner: function (data) {
            return eventWinner( data);
        },
        success: function (resposne) {
            this.$router.push('/event', () => {
                this.$message.success('Winner has been announced');
            })
        }
    },
    
    
}
</script>
