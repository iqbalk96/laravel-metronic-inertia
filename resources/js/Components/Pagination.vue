<script setup>
import { router } from '@inertiajs/vue3'

function visitPage(link) {
    router.get(link);
}
const props = defineProps({
    links: {
        type: Array
    }
})


</script>
<template>
    <ul class="pagination" v-if="links.length > 3">
        <li class="page-item" :class="link.active ? 'active' : ''" v-for="link in links" :key="link.url">
            <a class="page-link" :href="link.url ?? ''"
                @click.prevent="visitPage(link.url)">
                <span v-html="link.label"></span>
            </a>
        </li>
    </ul>
</template>
