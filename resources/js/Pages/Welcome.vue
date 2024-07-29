<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-md rounded-lg p-10">
            <h1 class="text-2xl font-bold mb-6 text-center">Manage Your Contacts and Groups</h1>
            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-8">
                <a href="/contacts"class="w-full md:w-auto">
                    <button class="w-full bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600">
                        Manage Contacts
                    </button>
                </a>
                <a href="/groups" class="w-full md:w-auto">
                    <button class="w-full bg-green-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-600">
                        Manage Groups
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
</script>

<style></style>
