<template>
    <div :formName="formName">
        <slot></slot>
    </div>
</template>
<script>
    export default {
        name: 'table-element',
        inject: ['tableName'],
        data: function () {

            return {
                formName: null,
            }
        },
        created: function () {

            this.formName = this.tableName+'_lq_table_form';
          
        }
    }
</script>

