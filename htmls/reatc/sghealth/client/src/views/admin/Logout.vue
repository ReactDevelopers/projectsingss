<template>
    <p>Log Out...</p>
</template>
<script>

import { logOutUser} from '@/utils/auth';

export default {
    
    name: 'logout-page',

    created: function () {

        logOutUser();
    }
}
</script>

