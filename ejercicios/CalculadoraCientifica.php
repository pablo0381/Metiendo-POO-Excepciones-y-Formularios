<?php
require_once 'Calculadora.php';

class CalculadoraCientifica extends Calculadora {

    public function potencia() {
	// Potencia
        return pow($this->numero1, $this->numero2);
    }

    public function raiz() {
        if ($this->numero1 < 0) {
            throw new Exception("Error: No puedes calcular la raíz cuadrada de un número negativo.");
        }
	// Raiz cuadrada
        return sqrt($this->numero1);
    }
}
?>
