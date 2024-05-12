<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { defineProps, ref } from "vue";
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    user: {
        type: Object,
    },
    users: {
        type: Object,
    },
});

const isEditModalOpen = ref(false);
const isEditModalTwoOpen = ref(false);
const UserModalNumber = ref(0);
const UserModalNumberTwo = ref(0);

const openEditModal = (id) => {
    UserModalNumber.value = id;
    isEditModalOpen.value = true;
};
const openUpdateModal = (id) => {
    UserModalNumberTwo.value = id;
    isEditModalTwoOpen.value = true;
};
</script>

<template>
    <tr>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap flex justify-center">
                {{ user.id ? user.id : "-" }}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap flex justify-center">
                {{ user.last_name }}, {{ user.first_name }}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap flex justify-center">
                {{ user.email ? user.email : "-" }}
            </p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <p class="text-gray-900 whitespace-no-wrap flex justify-center">
                {{ user.username }}
            </p>
        </td>

        <td
            class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-center"
        >
            <Link :href="route('users.show', { user_id: user.id })">
                <PrimaryButton class="my-2">Show</PrimaryButton>
            </Link>
        </td>
    </tr>

    <!-- <UserEditModal
        v-if="isEditModalOpen"
        @close="isEditModalOpen = false"
        :user="user"
    />
    <UserUpdateStatModal
        v-if="isEditModalTwoOpen"
        @close="isEditModalTwoOpen = false"
        :user="user"
        :users="users"
    /> -->
</template>
