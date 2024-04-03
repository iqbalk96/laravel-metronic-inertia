<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-center flex-column flex-column-fluid pt-20">
            <Link href="/">
                <ApplicationLogo class="mb-12" />
            </Link>
        </div>

        <div
            class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"
        >
            <slot />
        </div>
    </div>
</template>
