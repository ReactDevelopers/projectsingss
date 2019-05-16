import {list as serviceListApi} from '@/api/service';
import {list as instituteListApi} from '@/api/institute';
import {list as branchListApi} from '@/api/branch';
import {list as professionListApi} from '@/api/profession';

export default {

    data: function() {

        return {
            institute_key_name: 'institute_ids'
        }
    },
    computed: {
        
        /**
         * Taking branches from the selected institutes.
         */
        branchOptions: function () {

            const institutes =  this.$helper.getProp(this.$store.state, ['form', this.formName, 'fields', this.institute_key_name, 'selected'], []);
            let branches = [];

            institutes ? institutes.map((institue) => {
                
                institue.branches.map((branch) => {
                    branches.push(branch)
                })
            }) : null;

            return branches.length ? branches : null;
        },
        selectedBranchIds: function () {
            
            return this.$helper.getProp(this.$store.state, ['form', this.formName, 'fields', 'branch_ids', 'selected'], []);
        },
        selectedBranchId: function () {
            
            return this.$helper.getProp(this.$store.state, ['form', this.formName, 'fields', 'branch_id', 'selected'], null);
        }
    },
    methods: {
        /**
         * To get the services list from server.
         */
        getServiceList: function(query) {

            return serviceListApi({search: query})
        },

        /**
         * To get the branch list from server.
         */
        // getBranchList: function(query) {
        //     return branchListApi({search: query, institute_id:this.formValues[this.institute_key_name]})
        // },
        /**
         * To get the institute list from server.
         */
        getInstituteList: function(query) {
            
            return instituteListApi({search: query})
        },
        /**
         * To get the profession list from server.
         */
        getProfessionList: function(query) {
            
            return professionListApi({search: query})
        },

        instituteChange: function (val) {
            
            const selectedInstitues = val ? val.slice() : [];    
            
            this.formRemoveBranchId('branch_ids', true, selectedInstitues);
            this.formRemoveBranchId('branch_id', false, selectedInstitues);
            //let branch_ids_should_remove = [];
            // let branch_ids = this.formValues.branch_ids ? this.formValues.branch_ids.slice(): [];
            // let branch_id = this.formValues.branch_id ? this.formValues.branch_id: null;

            // if(branch_ids.length) {

            //     this.selectedBranchIds.map((branch) => {
            //         if(!selectedInstitues.includes(branch.institute_id)){

            //             const index =  branch_ids.indexOf(branch.id);
            //             if(index !== -1) {

            //                 branch_ids.splice(index, 1);
            //             }
            //         }
            //     })

            //     this.$lqForm.setElementVal(this.formName, 'branch_ids', branch_ids);
            // }

            // if(branch_id) {

            //     this.selectedBranchId.map((branch)=> {

            //         if(!selectedInstitues.includes(branch.institute_id)){
                        
            //             branch_id = null;
            //         }
            //     }) 
                
            //     this.$lqForm.setElementVal(this.formName, 'branch_id', branch_id);
            // }

        },

        branchChange: function (val) {
            
            let has = false;
            this.formValues.branch_ids.map((branch_id) => {
                if(branch_id === val) {
                    has = true;
                }
            });

            if(has===false) {
                
                let branch_ids = this.formValues.branch_ids ? this.formValues.branch_ids.slice(): [];
                branch_ids.push(val);
                this.$lqForm.setElementVal(this.formName, 'branch_ids', branch_ids);
                this.$lqForm.removeError(this.formName, 'branch_ids');
            }
        },

        formRemoveBranchId: function (keyName, multiple, selectedInstitues) {

            let branch_ids = this.formValues[keyName] ? ( multiple ? this.formValues[keyName].slice() : this.formValues[keyName]) : null;
            const selected = keyName == 'branch_id' ? this.selectedBranchId : this.selectedBranchIds;

            //if(multiple) {

                if(branch_ids && branch_ids.toString().length) {

                    selected.map((branch) => {

                        if(!selectedInstitues.includes(branch.institute_id)){
                            
                            if(multiple) {
                                const index =  branch_ids.indexOf(branch.id);
                                if(index !== -1) {
        
                                    branch_ids.splice(index, 1);
                                }
                            } else {

                                branch_ids = null;
                            }
                        }
                    })
    
                    this.$lqForm.setElementVal(this.formName, keyName, branch_ids);
                }
           // }
        }
    }
}