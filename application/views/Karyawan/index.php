<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Karyawan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
            transition: opacity 1s ease-out;
        }

        .fade-out {
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }

        .container {
            margin: 20px auto;
            max-width: 1000px;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        header {
            margin-bottom: 15px;
        }

        .header-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #004d99;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
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
    </style>
</head>

<body class="fade-out">
    <div class="container">
        <header class="text-center">
            <p class="header-title">STATISTIK JENIS KELAMIN PEGAWAI PENGADILAN TINGGI PONTIANAK
            </p>
            <hr class="my-3">
        </header>
        <div class="chart-container">
            <canvas id="chartGender"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('chartGender').getContext('2d');
        var genderData = {
            labels: [
                <?php
                foreach ($jenis_kelamin_data as $row) {
                    echo "'" . $row['jenis_kelamin'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Karyawan',
                data: [
                    <?php
                    foreach ($jenis_kelamin_data as $row) {
                        echo $row['jumlah'] . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#fffa2b', '#006eee'],
                hoverOffset: 4
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: genderData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
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
                window.location.href = '<?= base_url('auth/pendidikan') ?>';
            }, 1000);
        }, 10000);
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>