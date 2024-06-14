<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Toolbar from '@/Layouts/Partials/Toolbar.vue';
import Pagination from '@/Components/Pagination.vue';


const props = defineProps({
    title: {
        type: String
    },
    breadcrumbs: {
        type: Object
    },
    customers: {
        type: Object
    },
})

function destroy(customerId) {
    Swal.fire({
        title: "Are you sure want to delete this customer?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Delete",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-secondary",
        }
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            router.delete("/customer/" + customerId);
        }
    });
}

function edit (id) {
    router.get('/customer/' + id + '/edit')
}

</script>

<template>

    <Head title="Customer" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customer</h2>
        </template>

        <Toolbar :title="props.title" :breadcrumbs="breadcrumbs" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">List customer</h3>
                        <div class="card-toolbar">
                            <Link :href="route('customer.create')">
                            <button type="button" class="btn btn-sm btn-dark">
                                Create Customer
                            </button>
                            </Link>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped gy-7 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="min-w-200px">Name</th>
                                        <th class="min-w-200px">Email</th>
                                        <th class="min-w-200px">Phone Number</th>
                                        <th class="min-w-200px">Created at</th>
                                        <th class="min-w-200px">Updated at</th>
                                        <th class="min-w-200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="customer in customers.data">
                                        <td>
                                            <button class="btn btn-link" @click.prevent="edit(customer.id)">
                                                {{ customer.name }}
                                            </button>
                                        </td>
                                        <td>{{ customer.email }}</td>
                                        <td>{{ customer.phone }}</td>
                                        <td>{{ customer.created_at }}</td>
                                        <td>{{ customer.updated_at }}</td>
                                        <td>
                                            <button @click.prevent="destroy(customer.id)"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <Pagination :links="customers.links" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
