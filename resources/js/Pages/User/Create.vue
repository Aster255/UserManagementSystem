<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
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

const submit = () => {
    form.post(route("users.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Create User" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
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

                <form @submit.prevent="submit">
                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div>
                        <InputLabel for="first_name" value="First Name" />
                        <TextInput
                            id="first_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="given-name"
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
                            required
                            autofocus
                            autocomplete="family-name"
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
                            required
                            autofocus
                            autocomplete="street-address"
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
                            required
                            autofocus
                            autocomplete="postal-code"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.postal_code"
                        />
                    </div>

                    <div>
                        <InputLabel for="phone_number" value="Phone Number" />
                        <TextInput
                            id="address"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.phone_number"
                            required
                            autofocus
                            autocomplete="tel-national"
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
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.username"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Store User
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
