<!DOCTYPE html>
<html>
	<head>
		<title>Edad</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	</head>
	<body class="container mt-4">
		<?php
		require '../menu.php';
		?>
		<br>
		<h3>Comprobar Edad</h3>

		<?php
		$mensaje = "";
		$tipoAlerta = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			try {
				$edad = $_POST['edad'] ?? '';

				if (!is_numeric($edad)) {
					throw new Exception("Por favor, introduce un número válido (no se permiten letras ni caracteres especiales).");
				}

				$edad = intval($edad);

				if ($edad < 0) {
					throw new Exception("Error: La edad no puede ser un número negativo.");
				} elseif ($edad > 100) {
					throw new Exception("No mientas");
				} elseif ($edad >= 18) {
					$mensaje = "Eres mayor de edad";
					$tipoAlerta = "alert-success";
				} else {
					$mensaje = "Eres menor de edad";
					$tipoAlerta = "alert-warning";
				}
			} catch (Exception $e) {
				$mensaje = $e->getMessage();
				$tipoAlerta = "alert-danger";
			}
		}
		?>

		<form method="POST" action="">
			<div class="form-group">
				<label>Introduce tu edad:</label>
				<input type="text" name="edad" class="form-control" placeholder="Escribe tu edad" required>
			</div>
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-warning">Comprobar</button>
			</div>
		</form>

		<?php if ($mensaje): ?>
			<div class="alert <?php echo $tipoAlerta; ?> mt-3" role="alert">
				<?php echo $mensaje; ?>
			</div>
		<?php endif; ?>
	</body>
</html>
