import "./bootstrap";

import focus from "@alpinejs/focus";
import Alpine from "alpinejs";
import Swal from "sweetalert2";
// resources/js/chart.js
window.Swal = Swal;
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Livewire Hooks
document.addEventListener("livewire:load", function () {
    Livewire.on("userInteractionChart", function (data) {
        // Render daily chart
        new Chart(document.getElementById("daily-chart"), {
            type: "bar",
            data: data.daily,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });

        // Render monthly chart
        new Chart(document.getElementById("monthly-chart"), {
            type: "line",
            data: data.monthly,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });

        // Render yearly chart
        new Chart(document.getElementById("yearly-chart"), {
            type: "bar",
            data: data.yearly,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    });

    Livewire.on("userCountChart", function (data) {
        // Render user count chart
        new Chart(document.getElementById("user-count-chart"), {
            type: "line",
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    });
});
