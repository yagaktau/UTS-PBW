<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email tidak valid!'); window.history.back();</script>";
        exit;
    }

    $to = "your-email@example.com"; // Ganti dengan email Anda
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $body = "Nama: $name\nEmail: $email\nSubjek: $subject\nPesan:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan. Coba lagi nanti.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Akses tidak diizinkan.'); window.history.back();</script>";
}
?>
