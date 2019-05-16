<template >
 <el-form>
    <!-- <lq-place id="place" label="Place" /> -->
    <lq-input id="email" :rules="validations.username"  validateEvent="blur" label="Email"></lq-input>
    <lq-select id="country_code" 
        :multiple="true" 
        label="Country code" 
        :options="options"
        :non-removable="['Option1']"
        :max-char="4"
        value-key="value"
        label-key="label">
    </lq-select>
    <lq-el-image id="logo" :thumbs="[{width: 200, height: 200}]" :rules="{file: {acceptedFiles: 'image/*'}}"  />
    <lq-time-picker id="time" :is-range="true"
    range-separator="To"
    format="hh:mm A"
     />


 </el-form>
</template>
<script>
import lqInput from '../Input';
import lqSelect from '../Select';
import lqElImage from '../File/Image';
import LqTimePicker from '../TimePicker';
import { lqForm }  from 'vuex-lq-form';
import lqPlace from '../Place'

export default {
    name: 'test-form',
    mixins:[lqForm],
    components: {
        lqInput,
        lqSelect,
        lqElImage,
        LqTimePicker,
        lqPlace
    },
    data: function () {

        return {

            validations: {
                username: {
                    presence: {
                        allowEmpty: false
                    },
                    email: true,
                }
            },
            options: [{
                value: 'Option1',
                label: 'Option1'
                }, {
                value: 'Option2',
                label: 'Option2'
                }, {
                value: 'Option3',
                label: 'Option3'
                }, {
                value: 'Option4',
                label: 'Option4'
                }, {
                value: 'Option5',
                label: 'Option5'
            }]
        }
    }
}
</script>
