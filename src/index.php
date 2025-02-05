<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCalc</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">MyCalc</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" class="p-2 border rounded bg-light">
                    <label class="form-label">Angka Pertama</label>
                    <input type="number" name="angka1" class="form-control" autocomplete="off" min="0" autofocus required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : '' ?>">
                    <label class="form-label">Angka Kedua</label>
                    <input type="number" name="angka2" class="form-control" autocomplete="off" min="0" autofocus required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <button type="submit" class="btn btn-primary" name="operator" value="+" title="Tambah">+</button>
                        <button type="submit" class="btn btn-secondary" name="operator" value="-" title="Kurang">-</button>
                        <button type="submit" class="btn btn-success" name="operator" value="*" title="Kali">x</button>
                        <button type="submit" class="btn btn-info" name="operator" value="/" title="Bagi">&divide;</button>
                        <button type="reset" class="btn btn-warning" name="reset" value="reset" title="Clear Entry">CE</button>
                    </div>
                </form>
                <div class="p-2 border rounded bg-light">
                    <h4 class="text-center">
                        <?php
                        if (isset($_POST['operator'])) {
                            $angka1 = $_POST['angka1'];
                            $angka2 = $_POST['angka2'];
                            $operator = $_POST['operator'];

                            if (!is_numeric($angka1) || !is_numeric($angka2)) {
                                echo "<script>alert('Input harus berupa angka')</script>";
                            } elseif($operator == '/' && $angka2 == 0) {
                                echo "<script>alert('Tidak dapat membagi dengan Nol')</script>";
                            } else {
                                switch ($operator) {
                                    case '+':
                                        $hasil = $angka1 + $angka2;
                                        break;
                                    case '-':
                                        $hasil = $angka1 - $angka2;
                                        break;
                                    case '*':
                                        $hasil = $angka1 * $angka2;
                                        break;
                                    case '/':
                                        $hasil = $angka1 / $angka2;
                                        break;

                                    default:
                                        echo "Operator tidak valid";
                                        break;
                                }
                                echo "$angka1 $operator $angka2 = $hasil";
                            }
                        } else {
                            echo "Hasil : ";
                        }
                        ?>
                    </h4>
                    <div class="row">
                        <div class="col-6">
                            <?php if(!empty($hasil)) : ?>
                                <form method="post">
                                    <input type="hidden" name="hasil" value="<?php echo $hasil ?>">
                                    <button type="submit" class="btn btn-primary" title="Memory Entry">ME</button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <?php if(isset($hasil) && $hasil !== null) : ?>
                                <form method="post">
                                    <button type="submit" class="btn btn-danger" name="resethasil" title="Memory Clear">MC</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center">&copy; Lawifly 2025</p>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>