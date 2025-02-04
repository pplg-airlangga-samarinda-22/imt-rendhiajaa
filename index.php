<?php
function hitung_bmi($berat_badan, $tinggi_badan) {
    $tinggi_meter = $tinggi_badan;
    $bmi = $berat_badan / ($tinggi_meter * $tinggi_meter);
    return $bmi;
}

function kategori_bmi($bmi){
    if ($bmi < 17.0) {
        return " Sangat Kurus, Kekurangan berat badan berat";
    } elseif ($bmi >= 17.0 && $bmi <= 18.4 ){
        return "Kurus, Kekurangan berat badan ringan";
    } elseif ($bmi >= 18.5 && $bmi <= 25.0){
        return "Normal";
    } elseif ($bmi >= 25.1 && $bmi <= 27.0){
        return "Gemuk, Kekurangan berat badan ringan";
    } else {
        return "Gemuk, Kelebihan berat badan berat";
    }
}

$result = ""; 

if (isset($_POST['submit'])) {
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];

    $bmi = hitung_bmi($berat_badan, $tinggi_badan);
    $kategori = kategori_bmi($bmi);
    $result = "BMI: " . number_format($bmi, 2) . " (" . $kategori . ")";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kalkulator IMT</title>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-5">
            <h2>Kalkulator IMT</h2>
            <form method="post">
                <div class="mb-2">
                <label class="form-label">Berat badan</label>
                    <input type="number" name="berat_badan" step="any" class="form-control form-control-sm" placeholder="Masukin bb" required>
                </div>
                <div class="mb-2">
                <label class="form-label">Tinggi badan</label>
                    <input type="number" name="tinggi_badan" step="any" class="form-control form-control-sm" required placeholder="Masukin tb">
                </div>
                <button type="submit" name="submit" class="btn btn-secondary btn-sm w-100">Hitung</button>
            </form>
            <?php if (!empty($result)) { ?>
                <div class="alert alert-info mt-2 p-1 text-center"><?php echo $result; ?></div>
            <?php } ?>
        </div>
    </div>
</body>
</html>