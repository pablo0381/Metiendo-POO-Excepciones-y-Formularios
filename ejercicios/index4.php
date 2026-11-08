<!DOCTYPE html>
<html>
        <head>
                <title>Calculadora Científica</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        </head>
        <body class="container mt-4">
                <?php
                require '../menu.php';
                require_once 'CalculadoraCientifica.php';
                ?>
                <br>
                <h3>Calculadora Científica</h3>

                <?php
                $resultado_potencia = $resultado_raiz = null;
                $error = null;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        try {
                                $numero1 = $_POST['numero1'] ?? '';
                                $numero2 = $_POST['numero2'] ?? '';

                                if (!is_numeric($numero1) || !is_numeric($numero2)) {
                                        throw new Exception("Error: Introduce únicamente valores numéricos válidos (no se permiten letras).");
                                }

                                $calc = new CalculadoraCientifica($numero1, $numero2);

                                $resultado_potencia = $calc->potencia();
                                $resultado_raiz = $calc->raiz();

                        } catch (Exception $e) {
                                $error = $e->getMessage();
                        }
                }
                ?>

                <form method="POST" action="">
                        <div class="form-group">
                                <label>Número 1 (Número para raíz y base):</label>
                                <input type="text" name="numero1" class="form-control" placeholder="Escribe el primer numero" required>
                        </div>
                        <div class="form-group">
                                <label>Número 2 (Exponente):</label>
                                <input type="text" name="numero2" class="form-control" placeholder="Escribe el segundo numero" required>
                        </div>
                        <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Calcular</button>
                        </div>
                </form>

                <?php if ($error): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error; ?>
                        </div>
                <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                        <div class="card mt-3">
                                <div class="card-body">
                                        <?php
                                        echo "La potencia ($numero1^$numero2) es: $resultado_potencia <br>";
                                        echo "La raíz cuadrada del número 1 es: $resultado_raiz <br>";
                                        ?>
                                </div>
                        </div>
                <?php endif; ?>
        </body>
</html>
