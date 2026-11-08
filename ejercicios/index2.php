<!DOCTYPE html>
<html>
	<head>
		<title>Numero Invertido</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	</head>
	<body class="container mt-4">
		<?php
		require '../menu.php';
		?>
		<br>
		<h3>Números Ascendentes y Descendentes</h3>

		<?php
		$ascendente = [];
		$descendente = [];
		$error = null;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			try {
				$numero_base = $_POST['numero_base'] ?? '';

				if (!is_numeric($numero_base) || intval($numero_base) <= 0) {
					throw new Exception("Introduce un número entero mayor que cero (sin letras).");
				}

				$numero_base = intval($numero_base);

				for ($i = 1; $i <= $numero_base; $i++) {
					$ascendente[] = $i;
				}

				for ($i = $numero_base; $i >= 1; $i--) {
					$descendente[] = $i;
				}
			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		}
		?>

		<form method="POST" action="">
			<div class="form-group">
				<label>Número base:</label>
				<input type="text" name="numero_base" class="form-control" placeholder="Introduce el número a demostrar" required>
			</div>
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-warning">Generar</button>
			</div>
		</form>

		<?php if ($error): ?>
			<div class="alert alert-danger mt-3" role="alert"><?php echo $error; ?></div>
		<?php elseif (!empty($ascendente)): ?>
			<div class="mt-3">
				<?php
				echo "Ascendente: ";
				foreach ($ascendente as $i) {
					echo "$i ";
				}
				echo "<br>";

				echo "Descendente: ";
				foreach ($descendente as $i) {
					echo "$i ";
				}
				?>
			</div>
		<?php endif; ?>
	</body>
</html>
