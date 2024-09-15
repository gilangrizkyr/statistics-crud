<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabatan</title>
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

        #chartJabatan {
            max-width: 100%;
            max-height: 450px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            padding: 20px;
            margin: 20px;
        }

        #chartJabatanCanvas {
            width: 100%;
            height: 100%;
            /* display: block; */
        }

        .jabatanStyle {
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

        .fade-out {
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }
    </style>
</head>

<body class="fade-out">
    <center>
        <div class="jabatanStyle">
            <h2>STATISTIK TINGKAT JABATAN PEGAWAI PENGADILAN TINGGI PONTIANAK</h2>
        </div>
    </center>
    <div id="chartJabatan">
        <canvas id="chartJabatanCanvas"></canvas>
    </div>
    <!-- <button>
        <a href="<?= base_url('auth/pendidikan_chart') ?>"><- Back</a>
        or
        <a href="<?= base_url('auth/umur') ?>">Next -></a>
    </button> -->

    <script>
        var ctx = document.getElementById('chartJabatanCanvas').getContext('2d');
        var dataJabatan = {
            labels: [
                <?php
                foreach ($data_jabatan as $row) {
                    echo "'" . $row['jabatan'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Jabatan',
                data: [
                    <?php
                    foreach ($data_jabatan as $row) {
                        echo $row['jumlah'] . ",";
                    }
                    ?>
                ],
                backgroundColor: '#FF6384',
                borderColor: '#ffffff',
                borderWidth: 1,
                hoverBackgroundColor: '#FF6384',
                hoverBorderColor: '#ffffff'
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: dataJabatan,
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            stepSize: 5,
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: false,
                            text: 'Jabatan',
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
                window.location.href = '<?= base_url('auth/golongan') ?>';
            }, 1000);
        }, 10000);
    </script>
</body>

</html>