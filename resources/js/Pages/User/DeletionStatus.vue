<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import UserRow from "./Partials/UserRow.vue";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
defineProps({
    data: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Deletion Status" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Deletion Status
            </h2>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="route('users.index')">
                    <PrimaryButton class="my-2">Index</PrimaryButton>
                </Link>
                <Link :href="route('users.create')">
                    <PrimaryButton class="my-2 mx-1">Create User</PrimaryButton>
                </Link>
                <Link :href="route('users.deleteMultiple')">
                    <DangerButton class="my-2 mx-1"
                        >Delete-Multiple-Users</DangerButton
                    >
                </Link>
                <div class="grid grid-cols-2">
                    <div>
                        <h2
                            class="font-semibold text-xl text-gray-800 leading-tight"
                        >
                            Deleted User Account ID's
                        </h2>

                        <ul>
                            <li v-for="(x, index) in data.success.deleted_ids">
                                {{ x }}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2
                            class="font-semibold text-xl text-gray-800 leading-tight"
                        >
                            Account ID's Not Found
                        </h2>
                        <ul>
                            <li v-for="(x, index) in data.errors.not_found_ids">
                                {{ x }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
