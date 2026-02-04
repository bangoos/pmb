<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransPaymentService implements PaymentGatewayInterface
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createSnapTransaction(string $orderId, float $amount, array $customerDetail, array $itemDetails = []): array
    {
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $amount,
            ],
            'customer_details' => $customerDetail,
        ];

        if (! empty($itemDetails)) {
            $params['item_details'] = $itemDetails;
        }

        $snapToken = Snap::getSnapToken($params);

        return [
            'token' => $snapToken,
        ];
    }

    public function getTransactionStatus(string $orderId): array
    {
        return \Midtrans\Transaction::status($orderId);
    }

    public function createPayment(Payment $payment, array $customerDetail): string
    {
        $result = $this->createSnapTransaction(
            $payment->order_id,
            (float) $payment->jumlah,
            $customerDetail,
            [
                [
                    'id' => $payment->id,
                    'name' => $payment->jenis === Payment::JENIS_REGISTRASI
                        ? 'Biaya Registrasi PMB UMBK'
                        : 'Biaya Tahap Awal PMB UMBK',
                    'quantity' => 1,
                    'price' => (int) $payment->jumlah,
                ],
            ]
        );

        return $result['token'];
    }
}
