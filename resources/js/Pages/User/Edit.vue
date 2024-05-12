<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    user: {
        type: Object,
    },
});

const form = useForm({
    first_name: "",
    last_name: "",
    address: "",
    postal_code: "",
    phone_number: "",
    username: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = (user) => {
    form.patch(route("users.update", user.id), {});
};
</script>

<template>
    <Head :title="'User#' + user.id" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit User#{{ user.id }}
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
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                autocomplete="email"
                                :placeholder="user.email"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>
                        <div>
                            <InputLabel for="first_name" value="First Name" />
                            <TextInput
                                id="first_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.first_name"
                                autofocus
                                autocomplete="given-name"
                                :placeholder="user.first_name"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.first_name"
                            />
                        </div>

                        <div>
                            <InputLabel for="last_name" value="Last Name" />
                            <TextInput
                                id="first_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.last_name"
                                autofocus
                                autocomplete="family-name"
                                :placeholder="user.last_name"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.last_name"
                            />
                        </div>

                        <div>
                            <InputLabel for="address" value="Address" />
                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                autofocus
                                autocomplete="street-address"
                                :placeholder="user.address"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.address"
                            />
                        </div>

                        <div>
                            <InputLabel for="postal_code" value="Postal Code" />
                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.postal_code"
                                autofocus
                                autocomplete="postal-code"
                                :placeholder="user.postal_code"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.postal_code"
                            />
                        </div>

                        <div>
                            <InputLabel
                                for="phone_number"
                                value="Phone Number"
                            />
                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.phone_number"
                                autofocus
                                autocomplete="tel-national"
                                :placeholder="user.phone_number"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.phone_number"
                            />
                        </div>

                        <div>
                            <InputLabel for="username" value="Username" />
                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.username"
                                autofocus
                                autocomplete="username"
                                :placeholder="user.username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.username"
                            />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton
                                class="ms-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                @click="submit(user)"
                            >
                                Update User
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
