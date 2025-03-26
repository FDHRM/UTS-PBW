<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subjek = htmlspecialchars($_POST["subject"]);
    $pesan = htmlspecialchars($_POST["message"]);

    // Validasi input tidak boleh kosong
    if (empty($nama) || empty($email) || empty($subjek) || empty($pesan)) {
        echo "<script>alert('Harap isi semua kolom!'); window.location.href='contact.html';</script>";
        exit();
    }

    // Simpan data ke file atau kirim ke email (opsional)
    $file = fopen("messages.txt", "a");
    fwrite($file, "Nama: $nama\nEmail: $email\nSubjek: $subjek\nPesan: $pesan\n\n");
    fclose($file);

    echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='contact.html';</script>";
}
?>
