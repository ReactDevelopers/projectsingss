<template>
    <td :class="!hasEmployee ? `red-bg` : ``" v-bind="$attrs" :title="serviceDayInfo ? serviceDayInfo.comments: ''" 
        @contextmenu.prevent="menu ? menu.open($event, { service, branch, date, serviceDayInfo, employees: nextBestEmployees}): null">
        <show-scheduled-person 
            @deletedSchedule="(workSchedule) => $emit('deletedSchedule', workSchedule)"
            :work-schedules="serviceSchedules"
            :auto-work-schedules="serviceAutoSchedules"
            @deleted-auto-schedule="(schedule) => $emit('deleted-auto-schedule', schedule)"
        />
        <span v-if="!hasEmployee" class="c-white-text">No staff</span>
    </td>
    
</template>
<script>
import  ShowScheduledPerson from './ShowScheduledPerson';
import rosterFormMixin from '../mixins/rosterForm';

export default {
    name: 'roster-table-cell',
    mixins: [rosterFormMixin],
    inheritAttrs:false,
    components: {
        ShowScheduledPerson
    },
    props: {
        menu: Object,
        service: Object,
        institute: Object,
        employees: Array,
        branch: Object,
        date: String,
        workSchedules: Array,
        workAutoSchedules: Array,
        dayComments: Array
    }
}
</script>
