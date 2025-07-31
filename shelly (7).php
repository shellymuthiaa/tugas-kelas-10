<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="POST">
        <input type="number" name="number1" placeholder="Angka Pertama" required>
        <input type="number" name="number2" placeholder="Angka Kedua" required>
        <select name="operation" required>
            <option value="add">Tambah</option>
            <option value="subtract">Kurang</option>
            <option value="multiply">Kali</option>
            
        </select>
        <button type="submit">Hitung</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $number1 = (float) ($_POST['number1'] ?? 0);
        $number2 = (float) ($_POST['number2'] ?? 0);
        $operation = $_POST['operation'] ?? '';

        if ($operation === 'divide' && $number2 == 0) {
            echo "<p style='color: red;'>Pembagian dengan nol tidak diperbolehkan.</p>";
        } elseif (in_array($operation, ['add', 'subtract', 'multiply', 'divide'])) {
            $result = match ($operation) {
                'add' => $number1 + $number2,
                'subtract' => $number1 - $number2,
                'multiply' => $number1 * $number2,
            
            };
            $symbol = match ($operation) {
                'add' => '+',
                'subtract' => '-',
                'multiply' => '×',
                
            };

            echo "<p><strong>Hasil:</strong> $number1 $symbol $number2 = $result</p>";
        } else {
            echo "<p style='color: red;'>Operasi tidak valid.</p>";
        }
    }
    ?>
</body>
</html>
