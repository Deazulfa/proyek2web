<?php

namespace App\Notifications;

use App\Channels\FonnteChannel;
use App\Services\WhatsappGatewayService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class StokNotification extends Notification implements ShouldBroadcast
{
    use Notifiable;

    protected $phone;
    protected $message;

    public function __construct($phone, $message)
    {
        $this->phone = $phone;
        $this->message = $message;
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }
    public function via($notifiable)
    {
        return ['fonnte']; // Menambahkan channel 'fonnte'
    }

    public function toFonnte($notifiable)
    {
        return [
            'target' => $this->phone,
            'message' => $this->message,
            'countryCode' => '62', // optional
        ];
    }
    public function broadcastOn()
    {
        return new FonnteChannel('stok-notifications');
    }

    public function toWhatsApp($notifiable)
    {
        $whatsappData = $this->toFonnte($notifiable);

        return WhatsappGatewayService::sendMessage($whatsappData['target'], $whatsappData['message']);
    }

    // public function sendWhatsApp($notifiable)
    // {
    //     $whatsappData = $this->toWhatsApp($notifiable);
    //     WhatsappGatewayService::sendMessage($whatsappData['phone'], $whatsappData['message']);
    // }
}
