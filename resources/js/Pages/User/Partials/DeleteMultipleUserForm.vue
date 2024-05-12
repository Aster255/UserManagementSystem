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

const confirmUserDeletion = () => {
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
const numbers = ref([1, 2, 3]);
const addForm = (index) => {
    // Add a new form element when the user presses Enter in the last input field
    if (index === form.user_ids.length - 1) {
        form.user_ids.push("");
    }
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Delete Account</h2>
            <div>
                <div v-for="(userId, index) in form.user_ids" :key="index">
                    <input
                        type="number"
                        v-model="form.user_ids[index]"
                        @keydown.enter="addForm(index)"
                    />
                </div>
            </div>

            <p class="mt-1 text-sm text-gray-600">
                Once these accounts are deleted, login and api-tokens would also
                be deleted. Please, take extra care before deleting any account.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900"></h2>
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
