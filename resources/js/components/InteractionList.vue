<template>
    <div>
        <h1 class="text-3xl mb-4">Interaction List</h1>

        <!-- Button to open Add Interaction Modal -->
        <button
            @click="showAddModal"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md mb-4"
        >
            Add Interaction
        </button>

        <!-- Add Interaction Modal -->
        <div v-if="showModal" class="fixed inset-0 z-10 overflow-y-auto">
            <div
                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div
                    class="fixed inset-0 transition-opacity"
                    aria-hidden="true"
                >
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    >&#8203;</span
                >
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3
                            class="text-lg leading-6 font-medium text-gray-900 mb-2"
                        >
                            Add Interaction
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="newInteraction.customer_id"
                                placeholder="Customer ID"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newInteraction.type"
                                placeholder="Type"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newInteraction.description"
                                placeholder="Description"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newInteraction.date"
                                placeholder="Date"
                                type="date"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            @click="addInteraction"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Add
                        </button>
                        <button
                            @click="hideAddModal"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Interaction Modal -->
        <div v-if="showEditModal" class="fixed inset-0 z-10 overflow-y-auto">
            <div
                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div
                    class="fixed inset-0 transition-opacity"
                    aria-hidden="true"
                >
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    >&#8203;</span
                >
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3
                            class="text-lg leading-6 font-medium text-gray-900 mb-2"
                        >
                            Edit Interaction
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="editedInteraction.customer_id"
                                placeholder="Customer ID"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedInteraction.type"
                                placeholder="Type"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedInteraction.description"
                                placeholder="Description"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedInteraction.date"
                                placeholder="Date"
                                type="date"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            @click="updateInteraction"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Update
                        </button>
                        <button
                            @click="hideEditModal"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interaction List -->
        <ul>
            <li
                v-for="interaction in interactions"
                :key="interaction.id"
                class="bg-gray-100 p-4 mb-2 rounded-lg shadow-md"
            >
                <div>
                    <span class="font-semibold"
                        >{{ interaction.customer_name }} ({{
                            interaction.type
                        }})</span
                    >
                    - {{ interaction.description }} on
                    {{ formatDate(interaction.date) }}
                </div>
                <div class="mt-2">
                    <button
                        @click="editInteraction(interaction)"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    >
                        Edit
                    </button>
                    <button
                        @click="deleteInteraction(interaction.id)"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Delete
                    </button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            interactions: [],
            newInteraction: {
                customer_id: "",
                type: "",
                description: "",
                date: "",
            },
            editedInteraction: {
                id: "",
                customer_id: "",
                type: "",
                description: "",
                date: "",
            },
            showModal: false,
            showEditModal: false,
        };
    },
    mounted() {
        this.fetchInteractions();
    },
    methods: {
        fetchInteractions() {
            axios.get("/api/interactions").then((response) => {
                this.interactions = response.data;
            });
        },
        addInteraction() {
            axios
                .post("/api/interactions", this.newInteraction)
                .then((response) => {
                    this.interactions.push(response.data);
                    this.hideAddModal();
                    this.newInteraction = {
                        customer_id: "",
                        type: "",
                        description: "",
                        date: "",
                    };
                });
        },
        editInteraction(interaction) {
            this.editedInteraction = { ...interaction };
            this.showEditModal = true;
        },
        updateInteraction() {
            axios
                .put(
                    `/api/interactions/${this.editedInteraction.id}`,
                    this.editedInteraction
                )
                .then((response) => {
                    const index = this.interactions.findIndex(
                        (i) => i.id === this.editedInteraction.id
                    );
                    this.interactions.splice(index, 1, response.data);
                    this.hideEditModal();
                });
        },
        deleteInteraction(id) {
            axios.delete(`/api/interactions/${id}`).then((response) => {
                const index = this.interactions.findIndex((i) => i.id === id);
                this.interactions.splice(index, 1);
            });
        },
        showAddModal() {
            this.showModal = true;
        },
        hideAddModal() {
            this.showModal = false;
        },
        hideEditModal() {
            this.showEditModal = false;
        },
        formatDate(value) {
            if (value) {
                return new Date(value).toLocaleDateString("en-GB");
            }
        },
    },
};
</script>

<style>
/* Styles specific to this component */
</style>
