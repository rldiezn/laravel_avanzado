<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImageUploaded
{
    use Dispatchable, SerializesModels;

    public $imageContent;
    public $exerciseId;
    public $baseFileName;


    /**
     * Create a new event instance.
     */
    public function __construct($imageContent, $exerciseId, $baseFileName)
    {
        $this->imageContent = base64_encode($imageContent);
        $this->exerciseId = $exerciseId;
        $this->baseFileName = $baseFileName;
    }


}
