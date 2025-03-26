<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Chart with PHP and MySQL</title>
    <style>
        .chart-container {
            position: relative;
            height: 40vh;
            width: 80vw;
            margin: 20px auto;
        }
        #downloadPdf {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        #downloadPdf:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container pt-5">
        <h1>Membuat Grafik dengan PHP dan MySQL</h1>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <button id="downloadPdf">Download PDF</button>
    </div>

    <!-- Include Chart.js and jsPDF libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        <?php
        // Database connection
        include 'koneksi.php';
        
        // Query to get student count by major
        $query = "SELECT jurusan, COUNT(*) AS jml_mahasiswa FROM mahasiswa GROUP BY jurusan;";
        $result = mysqli_query($koneksi, $query);
        
        // Initialize arrays
        $jurusan = array();
        $jumlah = array();
        
        // Fetch data from database
        while ($data = mysqli_fetch_array($result)) {
            $jurusan[] = $data['jurusan'];
            $jumlah[] = $data['jml_mahasiswa'];
        }
        ?>

        // Create chart
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($jurusan); ?>,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: <?php echo json_encode($jumlah); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 71, 0.8)',
                        'rgba(9, 31, 242, 0.8)',
                        'rgba(255, 128, 6, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 71, 1)',
                        'rgba(9, 31, 242, 1)',
                        'rgba(255, 128, 6, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // PDF download functionality
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            const canvas = document.getElementById('myChart');
            
            // Convert canvas to image
            const imgData = canvas.toDataURL('image/png');
            
            // Add image to PDF (image, format, x, y, width, height)
            pdf.addImage(imgData, 'PNG', 10, 10, 180, 100);
            
            // Download PDF
            pdf.save('chart.pdf');
        });
    </script>
</body>
</html>