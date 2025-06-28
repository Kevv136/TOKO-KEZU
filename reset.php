// File: send-reset-email.php (Backend)
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32)); // Generate token aman
    $resetLink = "https://yourdomain.com/reset-password.html?email=$email&token=$token";

    // Simpan token ke database (contoh sederhana)
    file_put_contents("tokens/$email.txt", $token);

    // Isi email
    $subject = "Permintaan Reset Password KEZU STORE";
    $message = "
    Halo Pelanggan KEZU STORE,

    Kami menerima permintaan reset password untuk akun Anda. Klik link berikut:
    $resetLink

    Link berlaku 24 jam. Abaikan email ini jika Anda tidak memintanya.

    Terima kasih,
    Tim KEZU STORE
    ";

    // Kirim email (ini contoh sederhana, produksi gunakan library seperti PHPMailer)
    mail($email, $subject, $message);
    echo "Link reset telah dikirim ke email Anda";
}
?>