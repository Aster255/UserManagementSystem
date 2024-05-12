<script setup>
import { defineProps, ref } from "vue";
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
            <!-- <div class="flex gap-4">
                <OrangeButton
                    class="w-[70px] rounded-[15px] bg-orange-500 hover:bg-orange-700 p-3 text-sm text-white"
                    @click="openEditModal(user.id)"
                >
                    Edit
                </OrangeButton>
                <OrangeButton
                    class="w-[130px] rounded-[15px] bg-orange-500 hover:bg-orange-700 p-3 text-sm text-white"
                    @click="openUpdateModal(user.id)"
                >
                    Update Status
                </OrangeButton>
            </div>
        </td> -->
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
