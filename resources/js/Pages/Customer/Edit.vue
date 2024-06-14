<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Toolbar from '@/Layouts/Partials/Toolbar.vue';
import { useForm, router, Link } from '@inertiajs/vue3';
import { ref } from 'vue'


const isLoading = ref(false);

function submit(id) {
    isLoading.value = true
    router.put('/customer/' + id, form);
    isLoading.value = false
}

const props = defineProps({
    title: {
        type: String
    },
    breadcrumbs: {
        type: Object
    },
    errors: {
        type: Object
    },
    customer: {
        type: Object
    }
})

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone
})

</script>

<template>

    <Head title="Customer" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customer Edit</h2>
        </template>

        <Toolbar :title="props.title" :breadcrumbs="breadcrumbs" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form @submit.prevent="submit(customer.id)">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Form edit customer</h3>
                            <div class="card-toolbar">
                                <Link :href="route('customer')">
                                <button type="button" class="btn btn-sm btn-light">
                                    Back
                                </button>
                                </Link>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Name</label>
                                <input type="text" id="name" name="name" v-model="form.name"
                                    class="form-control form-control-solid" placeholder="eg: John Doe" />
                                <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
                            </div>
                            <div class="mb-10">
                                <label for="phone" class="required form-label">Phone</label>
                                <input type="number" id="phone" name="phone" v-model="form.phone"
                                    class="form-control form-control-solid" placeholder="eg: 0812121212" />
                                <div class="text-danger text-xs" v-if="errors.phone">{{ errors.phone }}</div>
                            </div>
                            <div class="mb-0">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" id="email" name="email" v-model="form.email"
                                    class="form-control form-control-solid" placeholder="eg: johndoe@mail.com" />
                                <div class="text-danger text-xs" v-if="errors.email">{{ errors.email }}</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" :disabled="isLoading">Submit</button>
                            <button type="reset" class="btn btn-warning ms-3" :disabled="isLoading">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
