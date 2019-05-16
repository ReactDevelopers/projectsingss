<template>
    <el-form  auto-complete="on" label-position="top">
        <el-row>
            <el-col :span="6" v-for="(certificate, index) in getElement(`certificates`, {})" :key="`certificates${certificate.id ? certificate.id:  index }`">
                <el-card :style="{margin: '10px', height: '700px'}" 
                    :shadow="( certificate.id ? 'always' : 'never')"
                    v-if="certificate.certificate_id"
                    :class="{certcard: true, created: certificate.id ? true : false}">
                    
                    <lq-el-date-picker 
                        label="Expire Date" 
                        :id="`certificates.${index}.expiry_date`"                 
                        value-format="yyyy-MM-dd" 
                        format="MM/yyyy" 
                        type="month"
                        placeholder="Expire Date" 
                    />
                    <lq-el-date-picker 
                        label="Certified At" 
                        :id="`certificates.${index}.certified_on`"                 
                        value-format="yyyy-MM-dd" 
                        format="dd/MM/yyyy" 
                        placeholder="Certified At" 
                    />

                    <lq-el-input label="Certificate" :id="`certificates.${index}.certificate.name`" :disabled="true" v-if="$helper.getProp(certificate,'certificate.name') !== 'other'"/>

                    <lq-el-input label="Certificate Info" :id="`certificates.${index}.cert_info`" type="textarea" />
                    
                    <lq-el-radio-group :id="`certificates.${index}.is_valid`"
                        :button="true"
                        label="Validate"
                        :options="[{value: 'true', label: 'Yes'}, {value: 'false', label: 'No'}]" 
                    />
                    <lq-el-file :id="`certificates.${index}.documents`" value-key="path" />
                    <el-row>
                        <el-col :span="12" align="left">
                            <el-button type="primary" @click="save(index)">{{certificate.id  ? 'Update': 'Create'}}</el-button>
                        </el-col>
                        <el-col :span="12" align="right">
                            <el-button type="danger" @click="deleteCert(certificate, index)">Delete</el-button>
                        </el-col>
                    </el-row>
                </el-card>
                
            </el-col>
            
            <el-col :span="6" v-if="$helper.getProp(this.formValues, 'certificates', []).length < 10">
                <el-card :style="{margin: '10px', height: '700px', textAlign: 'center'}" >
                    <!-- <el-button @click="addMoreCertificate">Add</el-button> -->
                    <i class="el-icon-plus" :style="{fontSize: '150px', cursor: 'pointer', lineHeight: '625px'}" @click="addMoreCertificate"></i>
                </el-card>
            </el-col>
        </el-row>

        <!-- Dialog to select the Certificate -->
        <el-dialog
            title="Tips"
            :visible.sync="dialogVisible"
            width="30%"
        >
        
            <lq-el-select  
                id="new_certificate_id"
                label="Select Certificate"
                :request="getCertList"
                :filterable="true"
                :remote="true"
                ref="certificate"
                :rules="{presence: {allowEmpty: false}}"
                remote-response-path="data.data"
            />

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="primary" @click="selectCertificate">Confirm</el-button>
            </span>
        </el-dialog>
        <!--End Dialog of certificate-->
    </el-form>
</template>

<script>
    import {lqForm} from 'vuex-lq-form';
    import {update, create, destroy} from '@/api/userCertificate';
    import {list as certList} from  '@/api/certificate';

export default {
    name: 'user_certificate_form',
    mixins:[lqForm],
    props: {
        userId: String,
    },
    data: function () {

        return {
            dialogVisible: false
        }
    },
    methods: {
        
        /**
         * To update/Create the user certificate information
         */
        save: function (index) {

            let data = this.formValues.certificates[index];
            const id = data.id;
            
            const formdData = this.onlyData(data, ['certificate_id', 
                'user_id', 
                'cert_info', 
                'certified_on', 
                'documents.file', 
                'documents.id', 
                'expiry_date',
                'is_valid'
            ]);
            
            const loading = this.$loading({
                lock: true,
                text: 'Requesting...',
            });

            if(id) {
                // Need to update               
                
                update(id, formdData)
                    .then((response) => {
                        
                        loading.close();
                        this.$message.success('Certificate has been updated.');                       

                    }).catch((error) => {

                        loading.close();
                        if(error && error.response && error.response.status === 422 ) { 					  
                           
                           let errorskeys = Object.keys(error.response.data.errors);
                           let errors = {};
                           errorskeys.map((errorskey) => {
                               this.$helper.setProp(errors, ['certificates.'+index+'.'+errorskey], error.response.data.errors[errorskey]);
                           })

                           this.addErrors(errors);
                        }
                    })
            }
            else {

                // Need to Create
                create(formdData).then((response) => {
                    
                    loading.close();
                    this.$message.success('Certificate has been created.');
                    this.$lqForm.setElementVal(this.formName, `certificates.${index}.id`, response.data.id);
                })
                .catch((error) => {
                    
                        loading.close();
                        if(error && error.response && error.response.status === 422 ) { 					  
                           
                           let errorskeys = Object.keys(error.response.data.errors);
                           let errors = {};
                           errorskeys.map((errorskey) => {
                               this.$helper.setProp(errors, ['certificates.'+index+'.'+errorskey], error.response.data.errors[errorskey]);
                           })

                           this.addErrors(errors);
                        }
                    })
            }
        },

        /**
         * Action when user clicks on add more button
         */
        addMoreCertificate: function () {
            
            this.$lqForm.setElementVal(this.formName, 'new_certificate_id', null);
            this.dialogVisible = true;
        },

        /**
         * Api to get the certificate list.
         */
        getCertList: function (search) {
            
            const not_ids = this.formValues.certificates ? this.formValues.certificates.map(function(cert) {
                return cert.certificate_id
            }): '';

            return certList({search, not_ids});
        },

        /**
         * Action after selecting the certificate.
         */
        selectCertificate: function() {

            const certificate_id = this.formValues.new_certificate_id;

            if(certificate_id) {

                const certificate = this.$refs.certificate ? this.$refs.certificate.getFullSelectedData(): null;

                this.push('certificates', {certificate_id, certificate, user_id: this.userId})
                this.dialogVisible = false;
            }
            else {
                this.$message.error('Please select a certificate.');
            }
        },

        /**
         * To delete the user Certificates.
         */
        deleteCert: function (certificate, index) {
            
            this.$confirm('Are you sure to delete this certificate ?', 'Warning', {
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                type: 'warning'

            }).then(() => {
                
                if(certificate.id) {

                    destroy(certificate.id)
                        .then((res) => {
                            this.remove(`certificates.${index}`);
                            this.$message.success(res.message);
                        })
                }
                else {

                    this.remove(`certificates.${index}`);
                }

            })

            
        }
    }
}
</script>