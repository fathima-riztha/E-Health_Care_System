var specialties = @json($specialties);
var appointmentCounts = @json($appointmentsBySpecialty->values());

var ctx = document.getElementById('linegraph').getContext('2d');
var appointmentsChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: specialties,
        datasets: [{
            label: 'Total Appointments',
            data: appointmentCounts,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
