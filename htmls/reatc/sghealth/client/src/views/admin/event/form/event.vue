<template>
    <el-form aria-autocomplete="off">
        <!-- First Row -->
        <el-row :gutter="10">            
            <el-col :span="8">
                <lq-el-input id="title" label="Title" />
            </el-col>
            <el-col :span="8">

                <lq-el-input v-if="$helper.getProp(formInitialvalues, 'manager', null)" id="manager.name" label="Manager Email" disabled />
                <lq-el-input v-else-if="$helper.getProp(formInitialvalues, 'manager_email', null)" id="manager_email" label="Manager Email" disabled />
                 <lq-el-select 
                    v-else 
                    id="manager_id" 
                    label="Select Manager Or Type Email"
                    :request="getUserList"
                    :filterable="true"
                    :remote="true"
                    allow-create
                    value-format="object"
                    remote-response-path="data.data"
                />
            </el-col>            
            <el-col :span="8">
                <lq-el-google-place 
                id="place" 
                label="Event Address"  
                api-key="AIzaSyCb1lKz0gDCSby9QWtaHgp2z6qDzMrmBe4"
                :options="$helper.getProp(formValues, 'place', {})" />
            </el-col>
        </el-row>
        <!-- End Fisrt Row -->

        <!-- Sencond Row -->
        <el-row :gutter="10" >
            <el-col :span="8" class="select_all_cell">
                <div class="position_as_label">
                    <lq-el-checkbox  
                        id="options.all_institute"
                        label="Select Institute"
                        true-label="Yes"
                    />
                </div>
                <lq-el-select 
                    :disabled="!($helper.getProp(formValues, 'options.all_institute') !== 'Yes')"
                    id="institute_ids"                     
                    :request="getInstituteList"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    remote-response-path="data.data"
                    @change="instituteChange"
                    :options="$helper.getProp(formValues, 'institutes', {})"
                />
            </el-col>
            <el-col :span="8" class="select_all_cell">
                <div class="position_as_label">
                    <lq-el-checkbox  
                        id="options.all_branches"
                        label="Select Branches"
                        true-label="Yes"
                    />
                </div>
                <lq-el-select 
                    :disabled="!($helper.getProp(formValues, 'options.all_branches') !== 'Yes')"
                    id="branch_ids"
                    :filterable="true"
                    :multiple="true"
                    :options="branchOptions"                    
                />
            </el-col>
            <el-col :span="8" class="select_all_cell">
                <div class="position_as_label">
                    <lq-el-checkbox  
                        id="options.all_profession"
                        label="Select Professions"
                        true-label="Yes"
                    />
                </div>
                <lq-el-select 
                    :disabled="!($helper.getProp(formValues, 'options.all_profession') !== 'Yes')"
                    id="profession_ids"                     
                    :request="getProfessionList"
                    :filterable="true"
                    :remote="true"
                    :multiple="true"
                    remote-response-path="data.data"
                    :options="$helper.getProp(formValues, 'professions', {})"
                />
            </el-col>
        </el-row>
        <!-- End Second Row -->

        <!-- Third Row -->
        <el-row :gutter="10">
            <el-col :span="8">
                <lq-el-date-picker 
                    label="Event Date" 
                    id="event_date"                 
                    value-format="yyyy-MM-dd" 
                    format="dd/MM/yyyy" 
                    placeholder="Event Date" 
                />
            </el-col>
            <el-col :span="8">
                <lq-el-time-picker format="hh:mm A" :is-range="true" id="event_timing" label="Event Timing" value-format="HH:mm:ss"  />
            </el-col>
            <el-col :span="8">
                <lq-el-input id="vacancy" label="Vacancy" />
            </el-col>
        </el-row>
        <!-- End Third Row -->

        <el-row :gutter="10">
            <el-col :span="24">
                <rich-editor id="description" label="Description" />
            </el-col>
            <el-col :span="12">
                <lq-el-input id="payment_link" label="Payment Link " />
                
            </el-col>
            <el-col :span="12">
                <lq-el-radio-group id="is_lucky_draw"
                    :button="true"
                    label="Is Lucky Draw?"
                    :options="[{value: 'Yes', label: 'Yes'}, {value: 'No', label: 'No'}]" 
                />
            </el-col>
        </el-row>

        <el-button type="primary" v-if="getElement('event_images').length < 4" @click="push('event_images', {})" icon="el-icon-plus" circle></el-button>
        <br>
        <br>
        <el-row :gutter="10">
            <el-col  :span="6" v-for="(image, index) in getElement('event_images', {})" :key="`event_image_row${index}`">
                <el-card shadow="always" :style="{position: 'relative'}">
                        <el-button size="mini" type="danger" class="right_corner_button" v-if="index > 0" @click="remove(`event_images.${index}`)" icon="el-icon-delete" circle></el-button>
                    <el-col :span="24">
                        <lq-el-image 
                            :custom-error="formErrors.event_images"
                            :id="`event_images.${index}`" 
                            label="Event Image" 
                            :storage-url="$root.storage_url"
                            value-key="image.thumbnails.0.path"
                            :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[1100, 300]}}" 
                            :thumbs="[{width: 200, height: 55, size: {width: 1100 }}]"
                        />
                        <lq-el-radio-group :id="`event_images.${index}.is_default`"
                            :button="true"
                            label="Is Default?"
                            @change="changedDefaultImage(index)"
                            :options="[{value: 'Yes', label: 'Yes'}, {value: 'No', label: 'No'}]" 
                        />
                    </el-col>               
                </el-card>
            </el-col>
        </el-row>
        
        <br>
        <br>
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="() => { $lqForm.removeError(formName, 'event_images'); submit(); } " />
        </el-form-item>
        
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {list as userListApi} from '@/api/users';
    import {list as instituteListApi} from '@/api/institute';
    import {list as certificateListApi} from '@/api/certificate';
    import {list as branchListApi} from '@/api/branch';
    import {list as professionCategoryListApi} from '@/api/professionCategory';
    import userFormMixins from '../../user/form/userFormMixin'

    export default {
        name: 'certificate_form',
        mixins:[lqForm, userFormMixins],
        data:function(){
            
            return {
                
                excludeInput: ['event_start_time','event_end_time','format_event_date','manager','created_at', 'updated_at', 'id','manager_id.branch','manager_id.branch_id','manager_id.can_work_at','manager_id.email','manager_id.institute','manager_id.institute_ids','manager_id.mobile_code','manager_id.mobile_code','manager_id.mobile_no','manager_id.mobile_number','manager_id.name','manager_id.profession','manager_id.profession_id','manager_id.profile_image','manager_id.profile_pic_id','manager_id.services','institutes','professions','branches','event_branches','event_professions','event_institutes']
            }
        },
        methods : {

            getUserList: function(query) {
                return userListApi({search: query,role:[2,5]})
            },
            getInstituteList: function(query) {
                return instituteListApi({search: query,page:-1})
            },
            getCerticateList : function(query){
                return certificateListApi({search:query});
            },
            /**
             * To get the branch list from server.
             */
            getBranchList: function(query) {
                
                if(this.formValues.institute_ids && this.formValues.institute_ids.length) {
                    return branchListApi({search: query, institute_id: this.formValues.institute_ids});
                }
                return undefined;

            },
            getProfessionList: function(query) {
                
                return professionCategoryListApi({search: query});

            },
            changedDefaultImage: function (index) {
               
                this.getElement('event_images', []).map((image, image_index) => {
                    if(index !== image_index) {
                        this.$lqForm.setElementVal(this.formName, `event_images.${image_index}.is_default`, 'No')
                    }
                })
            }
        }
    }
</script>

<style>
    .right_corner_button {
        position: absolute;
        right: 7px;
        top: 7px;
        z-index: 99;   
    }
    .select_all_cell {
        position: relative;
    }
    .position_as_label .el-form-item.el-form-item--medium {
        margin: 0;
        font-weight: bold;
    }
    .position_as_label .el-form-item.el-form-item--medium .el-checkbox__label {
        font-weight: bold;
    }
</style>
