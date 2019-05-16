<template>
    <el-form-item  v-if="insideFormElement && shouldDisplay()"
        :showMessage="showMessage" 
        :prop="id" :error="elError()" 
        :label="label"
    >
        <el-time-picker
            v-model="LQElement"
            :id="id"
            :disabled="isDisabled()"
            :is-range="isRange"
            :name="makeElementName()"
            @blur="emitNativeEvent($event)"
            @focus="emitNativeEvent($event)"
            @change="emitEvent('change', $event)"
            v-bind="$attrs" />
    </el-form-item>
    <el-time-picker v-else-if="shouldDisplay()"          
        v-model="LQElement"
        :id="id"
        :is-range="isRange"
        :disabled="isDisabled()"
        :name="makeElementName()"
        @blur="emitNativeEvent($event)"
        @focus="emitNativeEvent($event)"
        @change="emitEvent('change', $event)"
        v-bind="$attrs" />        
</template>

<script>

    import {lqFormElement} from 'vuex-lq-form';
    import elementMixin from '../mixins/elementMixin';

    export default {
        name: 'lq-el-time-pciker',
        mixins: [lqFormElement, elementMixin],
        inheritAttrs: false,
        props: {
            isRange: Boolean,
            defaultValue: Array
        },
        data: function () {

            return {
                initialValue: this.isRange ? ( this.defaultValue ? this.defaultValue : null) : null
            }
        }
    }
</script>
