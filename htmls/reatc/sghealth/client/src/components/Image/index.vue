<template>
    <img v-if="url" :src="`${storageUrl}${url}`" alt="sd" />
    <svg-icon v-else name="svg/user" ></svg-icon>
</template>
<script>
export default {
    name: 'app-image',
    props: {
        url: String,
        storageUrl: {
            type: String,
            default() {
                return process.env.VUE_APP_STORAGE_URL;
            }
        }
    },
}
</script>
