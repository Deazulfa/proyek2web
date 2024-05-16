<?php
namespace App\Channels;

use App\Services\WhatsappGatewayService;
use Illuminate\Notifications\Notification;

class FonnteChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFonnte($notifiable);

        // Tambahkan logika pengiriman ke WhatsApp di sini
        WhatsappGatewayService::sendMessage($message['target'], $message['message']);
    }
}