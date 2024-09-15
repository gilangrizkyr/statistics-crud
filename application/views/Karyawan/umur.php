<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umur</title>
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

        #chartUmur {
            max-width: 100%;
            max-height: 450px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        .umurStyle {
            margin-bottom: 20px;
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
            /* Ukuran font footer */
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
        <div class="umurStyle">
            <h2>STATISTIK USIA PEGAWAI PENGADILAN TINGGI PONTIANAK</h2>
        </div>
    </center>
    <canvas id="chartUmur"></canvas>
    <script>
        var ctx = document.getElementById('chartUmur').getContext('2d');
        var dataUmur = {
            labels: [
                '21-30', '31-35', '36-40', '41-45', '46-50', '51-55', '56-60', '61-70'
            ],
            datasets: [{
                label: 'Jumlah Pegawai',
                data: [
                    <?php
                    foreach ($umur_ranges as $range => $jumlah) {
                        echo $jumlah . ",";
                    }
                    ?>
                ],
                backgroundColor: '#4BC0C0',
                borderColor: '#ffffff',
                borderWidth: 1,
                hoverBackgroundColor: '#00e6e6',
                hoverBorderColor: '#ffffff'
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: dataUmur,
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                tooltip: {
                    enabled: false
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            stepSize: 2.5,
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: false,
                            text: 'Kelompok Usia',
                            font: {
                                size: 16
                            }
                        },
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        enabled: false,
                    },
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: '#000',
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
                window.location.href = '<?= base_url('auth') ?>';
            }, 500);
        }, 10000);
    </script>
    <!-- <button>
        <a href="<?= base_url('auth/jabatan') ?>"><- Back</a>
    </button> -->
</body>

</html>