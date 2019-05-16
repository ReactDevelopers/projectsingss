<template>
    <el-button  v-bind="$attrs" @click="emitNativeEvent($event)" type="primary" :loading="isSubmiting"> 
        {{ !isSubmiting ? (label ? label : 'Submit'): 'Requesting...' }}
    </el-button>
</template>

<script>

import helper from 'vuejs-object-helper';
import {getFormName} from 'vuex-lq-form';

export default {

    name: 'lq-el-submit',
    props: {
        label: String
    },
    data: function () {

        return {
            formName: null,
        }
    },
    created() {

        this.formName =  getFormName(this);
    },
    computed: {
        
        isReady: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.isReady`, true);
		},
		isSubmiting: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.isSubmiting`, false);
		}
    },
    methods: {
        emitNativeEvent(event) {
			this.$emit(event.type, event);
		}
    }
}
</script>

