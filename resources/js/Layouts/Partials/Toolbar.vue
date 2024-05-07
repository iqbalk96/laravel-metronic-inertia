<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    title: {
        type: String,
        required: true
    },
    breadcrumbs: {
        type: Object
    }
})

</script>

<template>
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                    {{ props.title }}
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-muted fs-6 fw-semibold">
                    <li class="breadcrumb-item">
                        <Link :href="route('dashboard')" class="">Dashboard</Link>
                    </li>
                    <li v-for="(breadcrumb, index) in breadcrumbs" :key="index" class="breadcrumb-item">
                        <Link v-if="index !== breadcrumbs.length - 1" :href="route(breadcrumb.link)" class="">{{ breadcrumb.label }}</Link>

                        <b v-else>{{ breadcrumb.label }}</b>
                    </li>
                    <!-- <li class="breadcrumb-item text-muted">Active</li> -->
                </ol>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
</template>