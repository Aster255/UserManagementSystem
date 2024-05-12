<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DeleteMultipleUserForm from "./Partials/DeleteMultipleUserForm.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
</script>

<template>
    <Head title="DELETE-MULTIPLE-USERS" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DELETE MULTIPLE USERS
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
                <div>
                    <DeleteMultipleUserForm class="max-w-xl" targets="[]" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
