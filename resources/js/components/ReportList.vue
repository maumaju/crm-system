<template>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Funnel Sales Chart -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl mb-4">Funnel Sales</h1>
            <div class="border-t border-gray-200">
                <canvas
                    ref="funnelChart"
                    class="mt-4 max-w-md mx-auto"
                ></canvas>
            </div>
        </div>

        <!-- Customer Lifetime Value Chart -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl mb-4">Customer Lifetime Value</h1>
            <div class="border-t border-gray-200">
                <canvas ref="clvChart" class="mt-4 w-full mx-auto"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
import axios from "axios";

export default {
    mounted() {
        this.renderFunnelChart();
        this.renderCLVChart();
    },
    methods: {
        renderFunnelChart() {
            const ctx = this.$refs.funnelChart.getContext("2d");
            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: [
                        "Prospects",
                        "Qualifications",
                        "Proposals",
                        "Closed",
                    ],
                    datasets: [
                        {
                            data: [300, 200, 100, 50],
                            backgroundColor: [
                                "#4CAF50",
                                "#FFC107",
                                "#03A9F4",
                                "#F44336",
                            ],
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                },
            });
        },
        async renderCLVChart() {
            const ctx = this.$refs.clvChart.getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Krishna", "Nathan", "Yudha Wardana", "Putri"],
                    datasets: [
                        {
                            label: "Customer Lifetime Value",
                            data: [500, 200, 800, 430],
                            backgroundColor: [
                                "green",
                                "blue",
                                "yellow",
                                "orange",
                            ],
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    width: "100%",
                },
            });
        },
    },
};
</script>

<style></style>
