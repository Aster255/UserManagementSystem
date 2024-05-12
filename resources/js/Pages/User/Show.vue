<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    user: {
        type: Object,
    },
});
</script>

<template>
    <Head :title="'User#' + user.id" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User#{{ user.id }}
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

                <div>
                    <div
                        class="px-5 py-3 border-solid border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                    >
                        Attributes
                    </div>
                    <ul>
                        <li v-for="(item, key) in user" :key="key">
                            <div>
                                <span class="font-semibold">{{ key }}</span>
                                :
                                {{ item === null ? "null" : item }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
