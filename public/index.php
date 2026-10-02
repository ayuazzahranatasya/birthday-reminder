<?php
// KONEKSI DATABASE
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ulangtahun_teman";

$conn = mysqli_connect($host, $user, $pass, $db);

// TAMBAH DATA
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO teman (nama, tgl_lahir, no_hp, alamat) 
        VALUES ('$nama', '$tgl_lahir', '$no_hp', '$alamat')");
    header("Location: index.php?pesan=berhasil");
}

// EDIT DATA
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE teman SET 
        nama='$nama', 
        tgl_lahir='$tgl_lahir', 
        no_hp='$no_hp', 
        alamat='$alamat' 
        WHERE id='$id'");
    header("Location: index.php?pesan=diperbarui");
}

// HAPUS DATA
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM teman WHERE id='$id'");
    header("Location: index.php?pesan=dihapus");
}

// AMBIL SEMUA DATA
$data = mysqli_query($conn, "SELECT * FROM teman");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DATA ULANG TAHUN TEMAN - SMK PGRI 3 MALANG</title>
    <style>
        * {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            padding: 30px;
            background: linear-gradient(135deg, #FEE6EE, #FDF2F8);
            min-height: 100vh;
        }
        h1 {
            color: #7B4B3A;
            margin-bottom: 25px;
            border-bottom: 3px solid #E8A8B8;
            padding-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(123,75,58,0.1);
        }
        .pesan {
            background: #F8E2E8;
            color: #7B4B3A;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border-left: 4px solid #D48C9C;
            font-weight: 500;
        }
        .btn-tambah {
            background: linear-gradient(135deg, #D48C9C, #C97B8F);
            color: white;
            padding: 10px 22px;
            text-decoration: none;
            border-radius: 20px;
            float: right;
            margin-bottom: 15px;
            font-weight: bold;
            box-shadow: 0 3px 8px rgba(212,140,156,0.3);
            transition: all 0.3s ease;
        }
        .btn-tambah:hover {
            background: linear-gradient(135deg, #C97B8F, #B86A7E);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212,140,156,0.4);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 15px rgba(123,75,58,0.1);
            border-radius: 16px;
            overflow: hidden;
        }
        th {
            background: linear-gradient(135deg, #7B4B3A, #8F5C4A);
            color: #FFF6F9;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #F6D9E2;
            color: #5C3A2E;
        }
        tr:nth-child(even) {
            background: #FEF2F6;
        }
        tr:hover {
            background: #FDE4EC;
        }
        .btn-show {
            background: linear-gradient(135deg, #E8A8B8, #D890A0);
            color: #5C2E3F;
            border: none;
            padding: 6px 14px;
            border-radius: 15px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            font-weight: 500;
            transition: 0.2s;
        }
        .btn-show:hover {
            background: linear-gradient(135deg, #D890A0, #C88090);
        }
        .btn-edit {
            background: linear-gradient(135deg, #D9B396, #C99F82);
            color: #4A3528;
            border: none;
            padding: 6px 14px;
            border-radius: 15px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            font-weight: 500;
            transition: 0.2s;
        }
        .btn-edit:hover {
            background: linear-gradient(135deg, #C99F82, #B98F72);
        }
        .btn-delete {
            background: linear-gradient(135deg, #C97080, #B86070);
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 15px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            font-weight: 500;
            transition: 0.2s;
        }
        .btn-delete:hover {
            background: linear-gradient(135deg, #B86070, #A85060);
        }
        .card {
            max-width: 460px;
            margin: 30px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(123,75,58,0.12);
            overflow: hidden;
            border: 1px solid #F6D9E2;
        }
        .card-header {
            background: linear-gradient(135deg, #7B4B3A, #8F5C4A);
            padding: 16px 24px;
            font-weight: bold;
            font-size: 18px;
            color: #FFF6F9;
        }
        .card-body {
            padding: 28px;
        }
        .card-body p {
            padding: 12px 0;
            border-bottom: 1px dashed #F0D0DC;
            font-size: 16px;
            color: #5C3A2E;
        }
        .card-body strong {
            display: inline-block;
            width: 130px;
            color: #7B4B3A;
            font-weight: 600;
        }
        label {
            color: #7B4B3A;
            font-weight: 500;
            display: inline-block;
            margin-top: 8px;
        }
        input {
            width: 100%;
            padding: 11px 14px;
            margin: 6px 0 12px;
            border: 1px solid #E8C8D4;
            border-radius: 12px;
            font-size: 15px;
            background: #FEF7FA;
            color: #5C3A2E;
            transition: 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #D48C9C;
            background: white;
            box-shadow: 0 0 0 3px rgba(212,140,156,0.15);
        }
        .btn-submit {
            background: linear-gradient(135deg, #7B4B3A, #8F5C4A);
            color: white;
            border: none;
            padding: 11px 28px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(123,75,58,0.25);
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #6A3F30, #7B4B3A);
            transform: translateY(-2px);
        }
        .btn-kembali {
            display: block;
            background: linear-gradient(135deg, #D48C9C, #C97B8F);
            color: white;
            text-align: center;
            padding: 12px;
            margin-top: 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(212,140,156,0.3);
            transition: all 0.3s ease;
        }
        .btn-kembali:hover {
            background: linear-gradient(135deg, #C97B8F, #B86A7E);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<?php
// HALAMAN DETAIL
if(isset($_GET['show'])){
    $id = $_GET['show'];
    $q = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teman WHERE id='$id'"));
?>
    <div class="card">
        <div class="card-header">🌸 Detail Teman</div>
        <div class="card-body">
            <p><strong>Nama:</strong> <?= $q['nama'] ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= date('d-m-Y', strtotime($q['tgl_lahir'])) ?></p>
            <p><strong>No Telepon:</strong> <?= $q['no_hp'] ?></p>
            <p><strong>Alamat:</strong> <?= $q['alamat'] ?></p>
            <a href="index.php" class="btn-kembali">← Kembali</a>
        </div>
    </div>

<?php
// HALAMAN EDIT
} elseif(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $q = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teman WHERE id='$id'"));
?>
    <div class="card">
        <div class="card-header">✏️ Edit Data Teman</div>
        <div class="card-body">
            <form method="post">
                <input type="hidden" name="id" value="<?= $q['id'] ?>">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $q['nama'] ?>" required>

                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?= $q['tgl_lahir'] ?>" required>

                <label>No Telepon</label>
                <input type="text" name="no_hp" value="<?= $q['no_hp'] ?>" required>

                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $q['alamat'] ?>" required>

                <button type="submit" name="update" class="btn-submit">💾 Perbarui Data</button>
            </form>
        </div>
    </div>

<?php
// HALAMAN TAMBAH
} elseif(isset($_GET['tambah'])){
?>
    <div class="card">
        <div class="card-header">➕ Tambah Data Teman</div>
        <div class="card-body">
            <form method="post">
                <label>Nama</label>
                <input type="text" name="nama" required placeholder="Masukkan nama...">

                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" required>

                <label>No Telepon</label>
                <input type="text" name="no_hp" required placeholder="Contoh: 0812xxxx">

                <label>Alamat</label>
                <input type="text" name="alamat" required placeholder="Masukkan alamat...">

                <button type="submit" name="tambah" class="btn-submit">💾 Simpan Data</button>
            </form>
        </div>
    </div>

<?php
// HALAMAN UTAMA
} else {
?>
    <h1>🎀 DATA ULANG TAHUN TEMAN - SMK PGRI 3 MALANG</h1>

    <?php if(isset($_GET['pesan'])): ?>
        <div class="pesan">✅ Data teman berhasil <?= $_GET['pesan'] ?>!</div>
    <?php endif; ?>

    <a href="?tambah" class="btn-tambah">+ Tambah Data Teman</a>
    <div style="clear:both;"></div>

    <table>
        <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= date('d-m-Y', strtotime($row['tgl_lahir'])) ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <a href="?show=<?= $row['id'] ?>" class="btn-show">Detail</a>
                <a href="?edit=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                <a href="?hapus=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php } ?>

</body>
</html>