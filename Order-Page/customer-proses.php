<?php 
    include '../koneksi.php';
    if(isset($_POST['simpan'])) {
        $Nama = $_POST['nama'];
        $Alamat = $_POST['alamat'];
        $No_Telp = $_POST['no_telp'];
        $Email = $_POST['email'];
        $sql = "INSERT INTO tb_customer VALUES('', '$Nama', '$Alamat', '$No_Telp', '$Email')";
    if(empty($Nama) || empty($Alamat) ||  empty($No_Telp) || empty($Email)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'produk-entry.html';
            </script>
            ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo " 
            <script>
                alert('Data Transaction Berhasil Ditambahkan');
                window.location = '../detail-product/index.html';
            </script>
            ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'produk-entry.html';
            </script>
            ";
    }
    }elseif(isset($_POST['edit'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode_produk'];
        $nama = $_POST['nama_produk'];
       
        $harga = $_POST['harga_jual'];
        $tanggal= $_POST['tangal_transaksi'];
        $sql = "UPDATE tb_produk SET 
            kode_produk = '$kode', 
            nama_produk = '$nama',
             
            harga_jual = '$harga', 
            tanggal_transaksi = '$tanggal'
            WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Diubah');
                window.location = '../detail-product/index.html';
            </script>
            ";
    }else {
         echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'produk-edit.php';
            </script>
            ";
    }
    }elseif(isset($_POST['hapus'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM tb_produk WHERE id= $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Dihapus');
                window.location = '../detail-product/index.html';
            </script>
            ";
    }else {
        echo "
            <script>
                alert('Data Produk Gagal Dihapus');
                window.location = '../detail-product/index.html';
            </script>
            ";
    }
    }else {
        header('location: ../detail-product/index.html');
    }
?>