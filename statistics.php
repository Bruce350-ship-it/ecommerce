<?php
	include("includes/connection.php");
	include("includes/header.php");

	$stat_products = 0;
	$stat_categories = 0;
	$stat_members = 0;

	if ($link) {
		$r = mysqli_query($link, "SELECT COUNT(*) AS c FROM item");
		if ($r) {
			$row = mysqli_fetch_assoc($r);
			$stat_products = (int) ($row['c'] ?? 0);
		}

		$r = mysqli_query($link, "SELECT COUNT(*) AS c FROM category");
		if ($r) {
			$row = mysqli_fetch_assoc($r);
			$stat_categories = (int) ($row['c'] ?? 0);
		}

		$r = mysqli_query($link, "SELECT COUNT(*) AS c FROM register");
		if ($r) {
			$row = mysqli_fetch_assoc($r);
			$stat_members = (int) ($row['c'] ?? 0);
		}
	}

	$bar_max = max($stat_products, $stat_categories, $stat_members, 1);
	$h_products = (int) round(100 * $stat_products / $bar_max);
	$h_categories = (int) round(100 * $stat_categories / $bar_max);
	$h_members = (int) round(100 * $stat_members / $bar_max);

	$total_items = max($stat_products + $stat_categories + $stat_members, 1);
	$deg_products = round(360 * $stat_products / $total_items);
	$deg_categories = round(360 * $stat_categories / $total_items);
	
	$start_products = 0;
	$end_products = $deg_products;
	$start_categories = $end_products;
	$end_categories = $start_categories + $deg_categories;
	$start_members = $end_categories;
	
	if ($stat_products + $stat_categories + $stat_members > 0) {
		$conic_gradient = "conic-gradient(#0f766e {$start_products}deg {$end_products}deg, #1d4ed8 {$start_categories}deg {$end_categories}deg, #c2410c {$start_members}deg 360deg)";
	} else {
		$conic_gradient = "conic-gradient(#e2e8f0 0deg 360deg)";
	}
?>

<style>
/* Premium Glassmorphic Theme for Stats */
.stats-dashboard {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    border-radius: 16px;
    padding: 40px;
    color: #e2e8f0;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.4);
    margin-bottom: 30px;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}
.stats-header-premium {
    text-align: center;
    margin-bottom: 40px;
}
.stats-header-premium h2 {
    font-size: 2.5rem;
    color: #f8fafc;
    margin: 0 0 10px;
    background: linear-gradient(to right, #38bdf8, #818cf8, #c084fc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 800;
    letter-spacing: -0.02em;
}
.stats-header-premium p {
    color: #94a3b8;
    font-size: 1.1rem;
    margin: 0;
}
.stats-grid-premium {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}
.stats-card-premium {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 24px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.stats-card-premium:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -8px rgba(0,0,0,0.5);
    background: rgba(255, 255, 255, 0.06);
    border-color: rgba(255, 255, 255, 0.15);
}
.stats-card-premium h3 {
    margin-top: 0;
    font-size: 1.2rem;
    color: #f1f5f9;
    font-weight: 600;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    padding-bottom: 16px;
    margin-bottom: 24px;
}
.chart-container-premium {
    position: relative;
    height: 280px;
    width: 100%;
}
</style>

<div class="stats-dashboard">
    <div class="stats-header-premium">
        <h2>Store Analytics</h2>
        <p>A premium visual overview of your store's ecosystem.</p>
    </div>
    
    <div class="stats-grid-premium">
        <div class="stats-card-premium">
            <h3>Inventory Overview</h3>
            <div class="chart-container-premium">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="stats-card-premium">
            <h3>Data Composition</h3>
            <div class="chart-container-premium">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <div class="stats-card-premium">
            <h3>Percentage Distribution</h3>
            <div class="chart-container-premium">
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.color = '#94a3b8';
    Chart.defaults.font.family = "'Segoe UI', system-ui, -apple-system, sans-serif";
    
    const dataValues = [<?php echo $stat_products; ?>, <?php echo $stat_categories; ?>, <?php echo $stat_members; ?>];
    const dataLabels = ['Products', 'Categories', 'Members'];
    
    // Vibrant gradient-like colors
    const bgColors = [
        'rgba(56, 189, 248, 0.85)', // Sky Blue
        'rgba(129, 140, 248, 0.85)', // Indigo
        'rgba(192, 132, 252, 0.85)'  // Purple
    ];
    const borderColors = [
        'rgba(56, 189, 248, 1)',
        'rgba(129, 140, 248, 1)',
        'rgba(192, 132, 252, 1)'
    ];

    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        animation: { duration: 2500, easing: 'easeOutQuart' },
        plugins: {
            legend: { position: 'bottom', labels: { padding: 25, usePointStyle: true, font: { size: 13 } } }
        }
    };

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: dataLabels,
            datasets: [{
                label: 'Records',
                data: dataValues,
                backgroundColor: bgColors,
                borderColor: borderColors,
                borderWidth: 1,
                borderRadius: 8,
                barThickness: 'flex',
                maxBarThickness: 45
            }]
        },
        options: {
            ...commonOptions,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.05)' }, border: { display: false } },
                x: { grid: { display: false }, border: { display: false } }
            }
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: dataLabels,
            datasets: [{
                data: dataValues,
                backgroundColor: bgColors,
                borderColor: '#1e293b', // Matches container background
                borderWidth: 4,
                hoverOffset: 12
            }]
        },
        options: commonOptions
    });

    // Donut Chart
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: dataLabels,
            datasets: [{
                data: dataValues,
                backgroundColor: bgColors,
                borderColor: '#1e293b', // Matches container background
                borderWidth: 4,
                hoverOffset: 12,
                cutout: '72%'
            }]
        },
        options: commonOptions
    });
</script>

<?php include("includes/footer.php"); ?>

