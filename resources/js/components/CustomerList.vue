<template>
    <div>
        <h1 class="text-3xl mb-4">Customer List</h1>

        <!-- Button to open Add Customer Modal -->
        <button
            @click="showAddModal"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md mb-4"
        >
            Add Customer
        </button>

        <!-- Add Customer Modal -->
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
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3
                            class="text-lg leading-6 font-medium text-gray-900 mb-2"
                        >
                            Add Customer
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="newCustomer.name"
                                placeholder="Name"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newCustomer.company"
                                placeholder="Company"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newCustomer.email"
                                placeholder="Email"
                                type="email"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newCustomer.phone"
                                placeholder="Phone"
                                type="tel"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            @click="addCustomer"
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

        <!-- Edit Customer Modal -->
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
                            Edit Customer
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="editedCustomer.name"
                                placeholder="Name"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedCustomer.company"
                                placeholder="Company"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedCustomer.email"
                                placeholder="Email"
                                type="email"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedCustomer.phone"
                                placeholder="Phone"
                                type="tel"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            @click="updateCustomer"
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

        <!-- Customer List Table -->
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Name
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Company
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Email
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Phone
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="customer in customers" :key="customer.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ customer.name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ customer.company }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ customer.email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ customer.phone }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button
                            @click="editCustomer(customer)"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mr-2"
                        >
                            Edit
                        </button>
                        <button
                            @click="deleteCustomer(customer.id)"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import Chart from "chart.js/auto";

export default {
    data() {
        return {
            customers: [],
            newCustomer: {
                name: "",
                company: "",
                email: "",
                phone: "",
            },
            showModal: false,
            showEditModal: false,
            selectedCustomerId: null,
        };
    },
    mounted() {
        this.fetchCustomers();
    },
    methods: {
        fetchCustomers() {
            axios.get("/api/customers").then((response) => {
                this.customers = response.data;
            });
        },
        addCustomer() {
            axios.post("/api/customers", this.newCustomer).then((response) => {
                this.customers.push(response.data);
                this.hideAddModal();
            });
        },
        editCustomer2(customer) {
            const updatedCustomer = {
                ...customer,
                name: prompt("Enter new name:", customer.name),
            };
            axios
                .put(`/api/customers/${customer.id}`, updatedCustomer)
                .then((response) => {
                    const index = this.customers.findIndex(
                        (c) => c.id === customer.id
                    );
                    this.customers.splice(index, 1, response.data);
                });
        },
        editCustomer(customer) {
            this.editedCustomer = { ...customer };
            this.showEditModal = true;
        },
        updateCustomer() {
            axios
                .put(
                    `/api/customers/${this.editedCustomer.id}`,
                    this.editedCustomer
                )
                .then((response) => {
                    const index = this.customers.findIndex(
                        (c) => c.id === this.editedCustomer.id
                    );
                    this.customers.splice(index, 1, response.data);
                    this.hideEditModal();
                });
        },
        showAddModal() {
            // Mengosongkan data customer yang baru ketika modal add ditampilkan
            this.newCustomer = {
                name: "",
                company: "",
                email: "",
                phone: "",
            };
            this.showModal = true;
        },
        hideEditModal() {
            this.showEditModal = false;
        },
        deleteCustomer(id) {
            axios.delete(`/api/customers/${id}`).then((response) => {
                const index = this.customers.findIndex((c) => c.id === id);
                this.customers.splice(index, 1);
            });
        },
        showAddModal() {
            this.showModal = true;
        },
        hideAddModal() {
            this.showModal = false;
        },
    },
};
</script>

<style></style>
