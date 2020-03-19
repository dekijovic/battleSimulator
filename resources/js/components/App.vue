<template>
    <div>
        <div
        class="container">
        <transition
            name="page"
            enter-active-class="animated fadeInUp" mode="out-in">
            <router-view/>
        </transition>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'ProApp'
}
</script>
