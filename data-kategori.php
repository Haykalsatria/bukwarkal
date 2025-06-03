<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Kategori | BukaWarung</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

	<!-- Header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">BukaWarung</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profile</a></li>
				<li><a href="data-kategori.php">Data Category</a></li>
				<li><a href="data-produk.php">Data Product</a></li>
				<li><a href="keluar.php">Exit</a></li>
			</ul>
		</div>
	</header>

	<!-- Content -->
	<section class="section">
		<div class="container">
			<h3>Data Category</h3>

			<div class="box">
				<p style="margin-bottom: 20px;">
					<a href="tambah-kategori.php" style="display: inline-block; background-color: #4CAF50; color: white; padding: 10px 16px; text-decoration: none; border-radius: 4px;">
    				Add Data
  					</a>
				</p>

				<table class="table" border="1" cellspacing="0">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Category</th>
							<th width="150px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");

							if (mysqli_num_rows($kategori) > 0) {
								while ($row = mysqli_fetch_array($kategori)) {
						?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= htmlspecialchars($row['category_name']) ?></td>
							<td>
								<a href="edit-kategori.php?id=<?= $row['category_id'] ?>" class="btn">Edit</a>
								<a href="proses-hapus.php?idk=<?= $row['category_id'] ?>" class="btn delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
							</td>
						</tr>
						<?php 
								}
							} else {
						?>
						<tr>
							<td colspan="3">No data available</td>
						</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2025 - BukaWarung.</small>
		</div>
	</footer>

</body>
</html>