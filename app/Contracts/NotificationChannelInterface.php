<?php

namespace App\Contracts;

interface NotificationChannelInterface
{
    /**
     * Kirim pesan WhatsApp.
     *
     * @param string $phone Nomor telepon (format 62xxx)
     * @param string $message
     * @return bool
     */
    public function sendWhatsApp(string $phone, string $message): bool;

    /**
     * Kirim notifikasi ke user (WA + email jika perlu).
     *
     * @param string $email
     * @param string|null $phone
     * @param string $subject
     * @param string $message
     * @param array $emailData Untuk view email
     * @return void
     */
    public function notifyUser(string $email, ?string $phone, string $subject, string $message, array $emailData = []): void;
}
