<template>
    <div>
        <h1 class="text-3xl mb-4">Sale List</h1>

        <!-- Button to open Add Sale Modal -->
        <button
            @click="showAddModal"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md mb-4"
        >
            Add Sale
        </button>

        <!-- Add Sale Modal -->
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
                            Add Sale
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="newSale.customer_id"
                                placeholder="Customer ID"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newSale.amount"
                                placeholder="Amount"
                                type="number"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="newSale.date"
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
                            @click="addSale"
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

        <!-- Edit Sale Modal -->
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
                            Edit Sale
                        </h3>
                        <div class="mt-2">
                            <input
                                v-model="editedSale.customer_id"
                                placeholder="Customer ID"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedSale.amount"
                                placeholder="Amount"
                                type="number"
                                class="border-gray-300 border-2 rounded-lg p-2 mb-2 w-full"
                            />
                            <input
                                v-model="editedSale.date"
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
                            @click="updateSale"
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

        <!-- Sale List Table -->
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Customer ID
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Amount
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Date
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
                <tr v-for="sale in sales" :key="sale.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ sale.customer_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ formatCurrency(sale.amount) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ formatDate(sale.date) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button
                            @click="editSale(sale)"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mr-2"
                        >
                            Edit
                        </button>
                        <button
                            @click="deleteSale(sale.id)"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md mr-2"
                        >
                            Delete
                        </button>
                        <button
                            @click="downloadInvoice(sale.id)"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md"
                        >
                            Download Invoice
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            sales: [],
            newSale: {
                customer_id: "",
                amount: "",
                date: "",
            },
            editedSale: {
                customer_id: "",
                amount: "",
                date: "",
            },
            showModal: false,
            showEditModal: false,
        };
    },
    mounted() {
        this.fetchSales();
    },
    methods: {
        fetchSales() {
            axios.get("/api/sales").then((response) => {
                this.sales = response.data;
            });
        },
        addSale() {
            axios.post("/api/sales", this.newSale).then((response) => {
                this.sales.push(response.data);
                this.hideAddModal();
                this.newSale = { customer_id: "", amount: "", date: "" };
            });
        },
        editSale(sale) {
            this.editedSale = { ...sale };
            this.showEditModal = true;
        },
        updateSale() {
            axios
                .put(`/api/sales/${this.editedSale.id}`, this.editedSale)
                .then((response) => {
                    const index = this.sales.findIndex(
                        (s) => s.id === this.editedSale.id
                    );
                    this.sales.splice(index, 1, response.data);
                    this.hideEditModal();
                });
        },
        deleteSale(id) {
            axios.delete(`/api/sales/${id}`).then(() => {
                const index = this.sales.findIndex((s) => s.id === id);
                this.sales.splice(index, 1);
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
        formatCurrency(amount) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(amount);
        },
        formatDate(value) {
            if (value) {
                return new Date(value).toLocaleDateString("en-GB");
            }
        },
        downloadInvoice(id) {
            axios
                .get(`/api/sales/${id}/invoice`, { responseType: "blob" })
                .then((response) => {
                    const url = window.URL.createObjectURL(
                        new Blob([response.data])
                    );
                    const link = document.createElement("a");
                    link.href = url;
                    link.setAttribute("download", `invoice_${id}.pdf`);
                    link.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch((error) => {
                    console.error("Error downloading invoice", error);
                });
        },
    },
};
</script>

<style>
/* Styles specific to this component */
</style>
