<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 40%; margin: auto;">
        <canvas id="monthlyIncomeChart"></canvas>
    </div>

    <script>
        var monthlyIncomeData = @json($monthlyIncomeData);

        var labels = monthlyIncomeData.map(data => `${data.month_name}  `);
        var monthIncome = monthlyIncomeData.map(data => data.month_income);
       

        var ctx = document.getElementById('monthlyIncomeChart').getContext('2d');
        var monthlyIncomeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Month Income',
                    data: monthIncome,
                    borderColor: '#004aad',
                    backgroundColor: '#004aad',
                    pointBackgroundColor: '#004aad',
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
    </script>
</body>
</html>



