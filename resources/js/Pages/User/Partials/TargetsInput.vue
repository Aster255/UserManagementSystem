<script setup>
import { ref, defineProps, defineEmits } from "vue";

const props = defineProps({
    targets: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(["update:targets"]);

const targetsText = ref(props.targets.join(", "));

const handleTargetsChange = (event) => {
    const targets = event.target.value
        .split(",")
        .map((target) => target.trim());
    emit("update:targets", targets);
};
</script>

<template>
    <div>
        <h2>User ID'S</h2>
        <input type="text" v-model="targetsText" @input="handleTargetsChange" />
    </div>
</template>
