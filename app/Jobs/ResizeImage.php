<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    public $imagePath;
    public $resizedFileName;

    /**
     * Create a new job instance.
     */
    public function __construct($imagePath,$resizedFileName)
    {
        $this->imagePath = $imagePath;
        $this->resizedFileName = $resizedFileName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        // Leer la imagen desde el disco local
        $imageContent = Storage::disk('local')->get($this->imagePath);
        
        // Procesar con Intervention Image
        $imageResized = Image::read($imageContent)->scale(width: 1200)->toJpeg(70);
        
        // Subir a S3
        $uploaded = Storage::disk('s3')->put( $this->resizedFileName, $imageResized, ['visibility' => 'public']);
        if ($uploaded) {
            // Eliminar la imagen original del disco local
            Storage::disk('local')->delete($this->imagePath);
        } else {
            // Manejar el error de subida
            throw new \Exception('Error uploading resized image to S3');
        }
    }
}
