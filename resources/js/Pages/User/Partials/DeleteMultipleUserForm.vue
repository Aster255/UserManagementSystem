<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
import TargetsInput from "./TargetsInput.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

defineProps({
    user: {
        type: Object,
    },
});

const form = useForm({
    password: "",
    user_ids: [1],
});

const arrayInput = ref("");

const confirmUserDeletion = () => {
    const idsArray = arrayInput.value.split(",").map((item) => item.trim());
    form.user_ids = idsArray;
    console.log(form.user_ids);
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.post(route("users.destroyMultiple"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Delete User Accounts
            </h2>
            <div>
                <textarea
                    v-model="arrayInput"
                    id="arrayInput"
                    rows="4"
                    cols="50"
                    placeholder="1, 2, 3, 4"
                ></textarea
                ><br />
            </div>
            <p class="mt-1 text-sm text-grey-600">
                Enter the user ID's of the accounts you want deleted
            </p>
            <p class="mt-1 text-sm text-red-600">
                Once these accounts are deleted, login and api-tokens would also
                be deleted. Please, take extra care before deleting any account.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Mass Account Deletion
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Once these accounts are deleted, login and api-tokens would
                    also be deleted. Please, take extra care before deleting any
                    account.
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        value="Password"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser(user)"
                    >
                        Delete Account
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
