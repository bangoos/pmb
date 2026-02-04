<?php

namespace App\Services;

use App\Contracts\NotificationChannelInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class WaGatewayNotificationService implements NotificationChannelInterface
{
    protected string $baseUrl;
    protected string $token;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.wagateway.url', 'https://api.fonnte.com'), '/');
        $this->token = config('services.wagateway.token', '');
    }

    public function sendWhatsApp(string $phone, string $message): bool
    {
        if (empty($this->token)) {
            return false;
        }

        $phone = preg_replace('/^0/', '62', $phone);
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strpos($phone, '62') !== 0) {
            $phone = '62' . $phone;
        }

        $response = Http::asForm()->post($this->baseUrl . '/send', [
            'target' => $phone,
            'message' => $message,
            'token' => $this->token,
        ]);

        return $response->successful();
    }

    public function notifyUser(string $email, ?string $phone, string $subject, string $message, array $emailData = []): void
    {
        if ($phone) {
            $this->sendWhatsApp($phone, $message);
        }

        if ($email) {
            $data = array_merge(['message' => $message, 'subject' => $subject], $emailData);
            Mail::send('emails.notification', $data, function ($m) use ($email, $subject) {
                $m->to($email)->subject($subject);
            });
        }
    }
}
