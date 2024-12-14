<?php
include('koneksi.php');
include('templates/header.php');
include('templates/sidebar.php');

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You must be logged in to add items to the cart.');window.location='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle add to cart action
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_ukuran = $_POST['product_ukuran'];
    $product_warna = $_POST['product_warna'];

    $check_cart_numbers = mysqli_query($koneksi, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        echo "<script>alert('Product already added to cart!');window.location='jual.php';</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO cart(user_id, name, price, quantity, image, ukuran, warna) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_ukuran', '$product_warna')") or die('Query failed');
        echo "<script>alert('Product added to cart!');window.location='jual.php';</script>";
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembelian Kacamata</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php
                    // Fetch products from the database
                    $datas = mysqli_query($koneksi, "SELECT * FROM daftar_barang") or die(mysqli_error($koneksi));

                    // Loop through each product and display it
                    while ($row = mysqli_fetch_assoc($datas)) {
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card h-100 shadow-sm product-card">
                                <img src="assets/img/<?= $row['foto']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['nama']; ?></h5>
                                    <p class="card-text">
                                        <strong>Stok:</strong> <?= $row['satuan']; ?><br>
                                        <strong class="price">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></strong>
                                    </p>
                                    <div class="form-group">
                                        <label for="qty-<?= $row['id']; ?>"><i class="fas fa-sort-numeric-up"></i> Jumlah:</label>
                                        <input type="number" id="qty-<?= $row['id']; ?>" min="1" name="product_quantity" value="1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="warna-<?= $row['id']; ?>"><i class="fas fa-palette"></i> Warna:</label>
                                        <select id="warna-<?= $row['id']; ?>" name="product_warna" class="form-control">
                                            <option value="Merah">Merah</option>
                                            <option value="Biru">Biru</option>
                                            <option value="Hitam">Hitam</option>
                                            <option value="Kuning">Kuning</option>
                                            <option value="Polos">Polos</option>
                                            <!-- Add more options dynamically based on your database -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas"></i> Ukuran:</label><br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="ukuran-<?= $row['id']; ?>-0.0" name="product_ukuran" value="0.0" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="ukuran-<?= $row['id']; ?>-0.0">0.0 (FRAME SAJA)</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="ukuran-<?= $row['id']; ?>-1.0" name="product_ukuran" value="1.0" class="custom-control-input">
                                            <label class="custom-control-label" for="ukuran-<?= $row['id']; ?>-1.0">1.0</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="ukuran-<?= $row['id']; ?>-2.0" name="product_ukuran" value="2.0" class="custom-control-input">
                                            <label class="custom-control-label" for="ukuran-<?= $row['id']; ?>-2.0">2.0</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="ukuran-<?= $row['id']; ?>-3.0" name="product_ukuran" value="3.0" class="custom-control-input">
                                            <label class="custom-control-label" for="ukuran-<?= $row['id']; ?>-3.0">3.0</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="ukuran-<?= $row['id']; ?>-4.0" name="product_ukuran" value="4.0" class="custom-control-input">
                                            <label class="custom-control-label" for="ukuran-<?= $row['id']; ?>-4.0">4.0</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                                        <input type="hidden" name="product_name" value="<?= $row['nama']; ?>">
                                        <input type="hidden" name="product_price" value="<?= $row['harga_jual']; ?>">
                                        <input type="hidden" name="product_image" value="<?= $row['foto']; ?>">
                                        <input type="hidden" name="product_quantity" id="qty-<?= $row['id']; ?>-input" value="1">
                                        <input type="hidden" name="product_warna" id="warna-<?= $row['id']; ?>-input" value="Merah">
                                        <input type="hidden" name="product_ukuran" id="ukuran-<?= $row['id']; ?>-input" value="0.0">
                                        <a href="https://wa.me/6281234567890" class="btn btn-sm btn-success float-left">
                                            <i class="fas fa-comment"></i>
                                        </a>
                                        <button type="submit" name="add_to_cart" class="btn btn-buy btn-sm buy-btn" onclick="updateFields(<?= $row['id']; ?>)">Beli</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <?php
// Fetch recommended products from the database
$datas = mysqli_query($koneksi, "SELECT daftar_barang.*, rekomendasi.quantity as rekomendasi_quantity, rekomendasi.color as rekomendasi_color, rekomendasi.size as rekomendasi_size 
                                 FROM rekomendasi 
                                 INNER JOIN daftar_barang ON rekomendasi.product_id = daftar_barang.id 
                                 WHERE rekomendasi.pelanggan_id = '$user_id'") or die(mysqli_error($koneksi));

// Check if there are any recommended products
if (mysqli_num_rows($datas) > 0) {
?>
    <h2 class="text-center">Barang Rekomendasi</h2>
    <div class="row">
        <?php
        // Loop through each recommended product and display it
        while ($row = mysqli_fetch_assoc($datas)) {
            $sizes = explode(',', $row['rekomendasi_size']); // Assuming sizes are stored as a comma-separated string
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card">
                    <img src="assets/img/<?= $row['foto']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama']; ?></h5>
                        <p class="card-text">
                            <strong>Stok:</strong> <?= $row['satuan']; ?><br>
                            <strong class="price">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></strong>
                        </p>
                        <div class="form-group">
                            <label for="qty-rekomendasi-<?= $row['id']; ?>"><i class="fas fa-sort-numeric-up"></i> Jumlah:</label>
                            <input type="number" id="qty-rekomendasi-<?= $row['id']; ?>" min="1" name="product_quantity" value="<?= $row['rekomendasi_quantity']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="warna-rekomendasi-<?= $row['id']; ?>"><i class="fas fa-palette"></i> Warna:</label>
                            <select id="warna-rekomendasi-<?= $row['id']; ?>" name="product_warna" class="form-control">
                                <option value="Merah" <?= ($row['rekomendasi_color'] == 'Merah') ? 'selected' : ''; ?>>Merah</option>
                                <option value="Biru" <?= ($row['rekomendasi_color'] == 'Biru') ? 'selected' : ''; ?>>Biru</option>
                                <option value="Hitam" <?= ($row['rekomendasi_color'] == 'Hitam') ? 'selected' : ''; ?>>Hitam</option>
                                <option value="Kuning" <?= ($row['rekomendasi_color'] == 'Kuning') ? 'selected' : ''; ?>>Kuning</option>
                                <option value="Polos" <?= ($row['rekomendasi_color'] == 'Polos') ? 'selected' : ''; ?>>Polos</option>
                                <!-- Add more options dynamically based on your database -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas"></i> Ukuran:</label><br>
                            <?php foreach ($sizes as $size) { ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ukuran-rekomendasi-<?= $row['id']; ?>-<?= $size; ?>" name="ukuran-rekomendasi-<?= $row['id']; ?>" value="<?= $size; ?>" class="custom-control-input" <?= ($row['rekomendasi_size'] == $size) ? 'checked' : ''; ?>>
                                    <label class="custom-control-label" for="ukuran-rekomendasi-<?= $row['id']; ?>-<?= $size; ?>"><?= $size; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <form action="" method="post">
                            <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="product_name" value="<?= $row['nama']; ?>">
                            <input type="hidden" name="product_price" value="<?= $row['harga_jual']; ?>">
                            <input type="hidden" name="product_image" value="<?= $row['foto']; ?>">
                            <input type="hidden" name="product_quantity" id="qty-rekomendasi-<?= $row['id']; ?>-input" value="<?= $row['rekomendasi_quantity']; ?>">
                            <input type="hidden" name="product_warna" id="warna-rekomendasi-<?= $row['id']; ?>-input" value="<?= $row['rekomendasi_color']; ?>">
                            <input type="hidden" name="product_ukuran" id="ukuran-rekomendasi-<?= $row['id']; ?>-input" value="<?= $row['rekomendasi_size']; ?>">
                            <a href="https://wa.me/6281234567890" class="btn btn-sm btn-success float-left">
                                <i class="fas fa-comment"></i>
                            </a>
                            <button type="submit" name="add_to_cart" class="btn btn-buy btn-sm buy-btn" onclick="updateFieldsRekomendasi(<?= $row['id']; ?>)">Beli</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <p class="text-center">Belum ada barang rekomendasi dari admin.</p>
<?php } ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('templates/footer.php');
?>

<!-- JavaScript to update the hidden quantity input field before form submission -->
<script>
    function updateQuantity(productId) {
        var quantityInput = document.getElementById('qty-' + productId);
        var formQuantityInput = document.getElementById('qty-' + productId + '-input');
        formQuantityInput.value = quantityInput.value;

        var warnaInput = document.getElementById('warna-' + productId);
        var formwarnaInput = document.getElementById('warna-' + productId + '-input');
        formwarnaInput.value = warnaInput.value;

        var ukuranInput = document.getElementById('ukuran-' + productId);
        var formukuranInput = document.getElementById('ukuran-' + productId + '-input');
        formukuranInput.value = ukuranInput.value;
    }
    function updateFields(productId) {
    var qty = document.getElementById('qty-' + productId).value;
    var warna = document.getElementById('warna-' + productId).value;
    var ukuran = document.querySelector('input[name="product_ukuran"]:checked').value;

    document.getElementById('qty-' + productId + '-input').value = qty;
    document.getElementById('warna-' + productId + '-input').value = warna;
    document.getElementById('ukuran-' + productId + '-input').value = ukuran;
}

function updateFieldsRekomendasi(productId) {
    var qty = document.getElementById('qty-rekomendasi-' + productId).value;
    var warna = document.getElementById('warna-rekomendasi-' + productId).value;
    var ukuran = document.querySelector('input[name="ukuran-rekomendasi-' + productId + '"]:checked').value;

    document.getElementById('qty-rekomendasi-' + productId + '-input').value = qty;
    document.getElementById('warna-rekomendasi-' + productId + '-input').value = warna;
    document.getElementById('ukuran-rekomendasi-' + productId + '-input').value = ukuran;
}

</script>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    /* Custom styles for the product cards */
    .product-card {
        transition: transform 0.3s;
    }

    .product-card:hover {
        transform: translateY(-10px);
    }

    .product-card img {
        border-bottom: 1px solid #e0e0e0;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .price {
        font-size: 1.2rem;
        color: #28a745;
    }

    .btn-buy {
        background-color: #28a745;
        color: #fff;
        border: none;
    }

    .btn-buy:hover {
        background-color: #218838;
    }
</style>