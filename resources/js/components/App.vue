<template>
    <div>
        <!-- Navbar -->
        <nav class="bg-gray-800 p-4 flex justify-center">
            <ul class="flex space-x-4">
                <li>
                    <button
                        @click="currentMenu = 'customer'"
                        :class="{
                            'text-white': currentMenu === 'customer',
                            'border-b-2 border-white':
                                currentMenu === 'customer',
                        }"
                        class="transition duration-300 ease-in-out transform hover:scale-110 bg-gray-700 hover:bg-gray-900 text-gray-300 py-2 px-4 rounded-md"
                    >
                        Customer
                    </button>
                </li>
                <li>
                    <button
                        @click="currentMenu = 'interaction'"
                        :class="{
                            'text-white': currentMenu === 'interaction',
                            'border-b-2 border-white':
                                currentMenu === 'interaction',
                        }"
                        class="transition duration-300 ease-in-out transform hover:scale-110 bg-gray-700 hover:bg-gray-900 text-gray-300 py-2 px-4 rounded-md"
                    >
                        Interaction
                    </button>
                </li>
                <li>
                    <button
                        @click="currentMenu = 'sale'"
                        :class="{
                            'text-white': currentMenu === 'sale',
                            'border-b-2 border-white': currentMenu === 'sale',
                        }"
                        class="transition duration-300 ease-in-out transform hover:scale-110 bg-gray-700 hover:bg-gray-900 text-gray-300 py-2 px-4 rounded-md"
                    >
                        Sale
                    </button>
                </li>
                <li>
                    <button
                        @click="currentMenu = 'report'"
                        :class="{
                            'text-white': currentMenu === 'report',
                            'border-b-2 border-white': currentMenu === 'report',
                        }"
                        class="transition duration-300 ease-in-out transform hover:scale-110 bg-gray-700 hover:bg-gray-900 text-gray-300 py-2 px-4 rounded-md"
                    >
                        Report
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto mt-4">
            <customer-list v-if="currentMenu === 'customer'"></customer-list>
            <interaction-list
                v-if="currentMenu === 'interaction'"
            ></interaction-list>
            <sale-list v-if="currentMenu === 'sale'"></sale-list>
            <report-list v-if="currentMenu === 'report'"></report-list>
        </div>
    </div>
</template>

<script>
import CustomerList from "./CustomerList.vue";
import InteractionList from "./InteractionList.vue";
import SaleList from "./SaleList.vue";
import ReportList from "./ReportList.vue";

export default {
    name: "App",
    components: {
        CustomerList,
        InteractionList,
        SaleList,
        ReportList,
    },
    data() {
        return {
            currentMenu: "customer", // Default menu
        };
    },
};
</script>

<style>
/* Styles specific to this component */
button {
    transition: all 0.3s ease-in-out;
}

button:hover {
    transform: scale(1.1);
}
</style>
