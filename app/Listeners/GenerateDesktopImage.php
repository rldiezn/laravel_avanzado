<?php

namespace App\Listeners;

use App\Events\ImageUploaded;
use App\Models\Exercise;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class GenerateDesktopImage
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImageUploaded $event): void
    {
        // Decodificar base64 a contenido binario
        $imageContent = base64_decode($event->imageContent);
        
        // Generar imagen para desktop (1200px) - LA MÁS IMPORTANTE
        $desktopImage = Image::read($imageContent)->scale(width: 1200)->toJpeg(80);
        
        // Crear nombre único para desktop
        $fileName = "exercises/desktop_{$event->baseFileName}.jpg";
        
        // Subir a S3
        $uploaded = Storage::disk('s3')->put($fileName, $desktopImage, ['visibility' => 'public']);
        
        if ($uploaded) {
            // 🔥 Usar DB directo en lugar de Eloquent
            DB::table('exercises')->where('id', $event->exerciseId)->update(['desktop_path' => $fileName]);
            
        }
    }
}