<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendidikan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            /* Soft background color */
            transition: opacity 1s ease-out;
            /* Transition for fade-out */
        }

        .fade-out {
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }

        #chartGolongan {
            max-width: 100%;
            max-height: 450px;
            background-color: #ffffff;
            /* White background for the chart */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 20px;
            margin: 20px;
        }

        .golonganStyle {
            margin-bottom: 20px;
            text-align: center;
            /* Center align heading */
        }

        footer {
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
        }

        footer p {
            margin: 0;
            color: #666;
            font-size: 0.8rem;
            /* Font size for footer */
        }

        button a {
            text-decoration: none;
            color: #ffffff;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            margin: 20px;
            border: none;
            background: none;
        }
    </style>
</head>

<body class="fade-out">
    <center>
        <div class="golonganStyle">
            <h2>STATISTIK TINGKAT GOLONGAN PEGAWAI PENGADILAN TINGGI PONTIANAK</h2>
        </div>
    </center>
    <canvas id="chartGolongan"></canvas>
    <!-- <button>
        <a href="<?= base_url('auth/pendidikan_chart') ?>"><- Back</a>
                or
                <a href="<?= base_url('auth/umur') ?>">Next -></a>
    </button> -->
    <script>
        var ctx = document.getElementById('chartGolongan').getContext('2d');
        var dataGolongan = {
            labels: [
                <?php
                foreach ($data_golongan as $row) {
                    echo "'" . $row['golongan'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Golongan',
                data: [
                    <?php
                    foreach ($data_golongan as $row) {
                        echo $row['jumlah'] . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#4BC0C0'],
                hoverOffset: 4
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: dataGolongan,
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5,
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'right'
                    },
                    tooltip: {
                        enabled: false,
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: 'black',
                        font: {
                            size: 14,
                            weight: 'bold'
                        },
                        formatter: function(value, context) {
                            return value;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        setTimeout(function() {
            document.body.classList.add('hidden');
            setTimeout(function() {
                window.location.href = '<?= base_url('auth/umur') ?>';
            }, 1000);
        }, 10000);
    </script>
</body>

</html>