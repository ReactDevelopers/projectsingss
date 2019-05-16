export default {

    name: 'heler-to-display-branch-service',
    data: function (){
			
        return {
            selectedBranches: [],
        }
    },
    computed: {
        selectedBrancheServices: function () {

            let services = [];
            this.selectedBranches.map(function(branch) {

                branch.services.map(function (service) {
                    service.branch = branch;
                    services.push(service)
                })
            })

            return services;
        }
    },
    methods: {
        
        /**
         * This function use to selected the initial  branches when institute change
         */
        initialSelectedBranch: function () {
            // Finding Fisrt three branch
            const first_three_branch = this.$helper.getProp(this.institute, 'branches', []).slice(0, 3);

            this.selectedBranches = [];

            first_three_branch.map((branch) => {
                
                // Finding Fisrt three service of the given branch
                const first_three_services = this.$helper.getProp(branch, 'services', []).slice(0, 3);

                this.selectedBranches.push({
                    name: branch.name,
                    id: branch.id,
                    mon_fri_timing: branch.mon_fri_timing,
                    ph_timing: branch.ph_timing,
                    saturday_timing: branch.saturday_timing,
                    sunday_timing: branch.sunday_timing,
                    services: first_three_services
                });
            })
        },
        /**
         * To check the given service is displaying or not
         */
        hasServiceSelected(selectedBranch, service_id) {
            
            let has = false;
            selectedBranch.services.map((service) => {

                if(service.id === service_id) {
                    has = true
                }
            })

            return has;
        },
        hasBranchSelected (branch_id) {

            let has = false;
            this.selectedBranches.map((branch) => {

                if(branch.id === branch_id) {
                    has = true
                }
            })

            return has;
        },
        switchBranch: function (branch_id) {

            let removed_index = null;

            this.selectedBranches.map((branch, index) => {

                if(branch.id === branch_id) {
                    
                    removed_index = index
                }
            })

            if(removed_index !== null) {

                this.selectedBranches.splice(removed_index, 1);
            }
            else {

                this.institute.branches.map((branch) => {

                    if(branch.id === branch_id) {
            
                        const first_three_services = this.$helper.getProp(branch, 'services', []).slice(0, 3);

                        this.selectedBranches.push({
                            name: branch.name,
                            id: branch.id,
                            mon_fri_timing: branch.mon_fri_timing,
                            ph_timing: branch.ph_timing,
                            saturday_timing: branch.saturday_timing,
                            sunday_timing: branch.sunday_timing,
                            services: first_three_services
                        });
                    }
                })
            }
        },
        /**
         * Get All Services of given branch
         */
        getServicesOfBranch: function (branch_id) {

            const branches  = this.$helper.getProp(this.institute, 'branches', []);
            let services = [];
            branches.map((branch) => {

                if(branch.id === branch_id) {
                    services = branch.services;
                }
            })

            return services;
        },
        /**
         * Get All Services of given branch
         */
        getServicesOfSelectedBranch: function (branch_id) {

            const branches  = this.selectedBranches;
            let services = [];
            branches.map((branch) => {

                if(branch.id === branch_id) {
                    services = branch.services;
                }
            })

            return services;
        },
        switchService: function (branch_id, service_id) {
				
            let removed_index = null;
            const services = this.getServicesOfBranch(branch_id)
            let selected_branch_services =  this.getServicesOfSelectedBranch(branch_id)

            selected_branch_services.map((service, index) => {

                if(service.id === service_id) {
                    removed_index = index;           			
                }
            })

            if(removed_index !== null) {
                selected_branch_services.splice(removed_index, 1)
            }
            else {

                services.map((s) => {
                    if(s.id === service_id) {

                        selected_branch_services.push(s);
                    }
                })
            }
        }
    }
}