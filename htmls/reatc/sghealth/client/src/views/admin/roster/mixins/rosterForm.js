export default {

    computed: {

        /**
         * To Get the schedule list base barnch and service
         */
        serviceSchedules: function () {
            
            let service_work_schedule = [];

            this.workSchedules.map( (schedule) => {

                if(schedule.date === this.date && this.branch.id === schedule.branch_id && schedule.service_id === this.service.id) {
                    service_work_schedule.push(schedule);
                }
            })

            return service_work_schedule;
        },

        /**
         * To Get the schedule list base barnch and service
         */
        serviceAutoSchedules: function () {
            
            let service_work_schedule = [];
            this.workAutoSchedules.map((schedule) => {

                if(schedule.schedule_start_date === this.date && this.branch.id === schedule.branch_id && schedule.service_id === this.service.id) {
                    service_work_schedule.push(schedule);
                }
            })

            return service_work_schedule;
        },

        serviceDayInfo: function () {
            
            let dayComments = null;
            this.dayComments.map( (dayInfo) => {

                if(dayInfo.date === this.date && this.branch.id === dayInfo.branch_id && dayInfo.service_id === this.service.id) {
                    dayComments = dayInfo;
                }
            })

            return dayComments;
        },
        /**
         * To check is any Employee available for given branch and Services
         */
        hasEmployee: function () {
            
            return this.nextBestEmployees.length ? true : false;
        },

        /**
         * To get next best employee for the schedule.
         */
        nextBestEmployees: function () {
            
            const branch_id = this.branch.id;
            const service_id = this.service.id;
            let nextBestEmployees = [];

            this.employees.map(function (employee) {
                let hasBranch = null;
                let hasService = null;
                // Check the Branch 
                employee.can_work_at && employee.can_work_at.map(function(cwa) {
                    if(cwa.id === branch_id) {
                        hasBranch = true;
                    }
                });

                // Check the Service
                employee.services && employee.services.map(function(service) {
                    if(service.id === service_id) {
                        hasService = true;
                    }
                });

                if(hasBranch && hasService) {
                    nextBestEmployees.push(employee)
                }

            })

            return nextBestEmployees;
        }
    }
}