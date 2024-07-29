<script setup>
import { ref, watch } from 'vue'
import { Inertia } from '@inertiajs/inertia'

// Define props and emit
const props = defineProps({
    contact: Object,
    groups: Array,
})

const emit = defineEmits(['close'])

// Create reactive form state
const form = ref({
    name: props.contact.name,
    email: props.contact.email,
    phone: props.contact.phone,
    group_id: props.contact.group_id,
})

// Watch for changes in props.contact and update form state
watch(props.contact, (newVal) => {
    form.value = {
        name: newVal.name,
        email: newVal.email,
        phone: newVal.phone,
        group_id: newVal.group_id,
    }
})

// Function to handle updating contact
const updateContact = () => {
    Inertia.put(`/contacts/${props.contact.id}`, form.value)
}

// Function to close modal and reset form state
const closeModal = () => {
    form.value = {
        name: props.contact.name,
        email: props.contact.email,
        phone: props.contact.phone,
        group_id: props.contact.group_id,
    }
    emit('close')
}
</script>

<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50">
        <div class="relative w-full max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Contact
                </h3>
                <button type="button" @click="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form @submit.prevent="updateContact">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input v-model="form.name" id="name" type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input v-model="form.email" id="email" type="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input v-model="form.phone" id="phone" type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="group_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
                            <select v-model="form.group_id" id="group_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option :value="null">None</option>
                                <option v-for="group in props.groups" :key="group.id" :value="group.id">{{ group.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
