<?php
session_start();

if(!isset($_SESSION['idusr'])){
    header("Location: ../login.php");
    exit;
}
if($_SESSION['level'] != 1){
    header("Location: ../main.php");
    exit;
}

include('../koneksi.php');

if(isset($_POST['tambah'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['hp'];
    $level    = $_POST['level'];

    mysqli_query($conn, "INSERT INTO user (username, password, nama, alamat, hp, level)
                         VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')");
    header("Location: user.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>

<?php include('../navbar.php'); ?>

<div class="konten">
    <h3>Data User</h3>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="text" name="hp" placeholder="HP">
        <select name="level">
            <option value="1">1 (Owner)</option>
            <option value="2">2 (Kasir)</option>
        </select>
        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th><th>Username</th><th>Password</th><th>Nama</th><th>Alamat</th><th>HP</th><th>Level</th><th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['hp']; ?></td>
            <td><?php echo $row['level']; ?></td>
            <td>
                <a href="user_edit.php?id=<?php echo $row['id_user']; ?>">Edit</a> |
                <a href="user_hapus.php?id=<?php echo $row['id_user']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>