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
            transition: opacity 1s ease-out;
        }

        .fade-out {
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }

        #chartPendidikan {
            max-width: 100%;
            max-height: 450px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        .pendidikanStyle {
            margin-bottom: 20px;
            text-align: center;
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
        <div class="pendidikanStyle">
            <h2>STATISTIK TINGKAT PENDIDIKAN PENGADILAN TINGGI PONTIANAK</h2>
        </div>
    </center>
    <canvas id="chartPendidikan"></canvas>
    <script>
        var ctx = document.getElementById('chartPendidikan').getContext('2d');
        var dataPendidikan = {
            labels: [
                <?php
                foreach ($data_pendidikan as $row) {
                    echo "'" . $row['pendidikan'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Pendidikan',
                data: [
                    <?php
                    foreach ($data_pendidikan as $row) {
                        echo $row['jumlah'] . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#4BC0C0'],
                hoverOffset: 1
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: dataPendidikan,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10,
                            font: {
                                size: 15,
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'right'
                    },
                    tooltip: {
                        enabled: false
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: 'black',
                        font: {
                            size: 15,
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
                window.location.href = '<?= base_url('auth/jabatan') ?>';
            }, 1000);
        }, 10000);
    </script>
    <!-- <button>
        <a href="<?= base_url('auth') ?>"><- Back</a>
    </button>
    or
    <button>
        <a href="<?= base_url('auth/jabatan') ?>">Next -></a>
    </button> -->
</body>

</html>