<?php

namespace App\Contracts;

use App\Models\Payment;

interface PaymentGatewayInterface
{
    /**
     * Buat transaksi Snap untuk pembayaran.
     */
    public function createSnapTransaction(string $orderId, float $amount, array $customerDetail, array $itemDetails = []): array;

    /**
     * Buat token Snap untuk model Payment (registrasi/awal).
     */
    public function createPayment(Payment $payment, array $customerDetail): string;

    /**
     * Verifikasi status transaksi (untuk webhook/notification).
     */
    public function getTransactionStatus(string $orderId): array;
}
