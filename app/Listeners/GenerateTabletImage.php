<?php

namespace App\Listeners;

use App\Events\ImageUploaded;
use App\Models\Exercise;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class GenerateTabletImage implements ShouldQueue
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
        
        // Generar imagen para tablet (768px)
        $tabletImage = Image::read($imageContent)->scale(width: 768)->toJpeg(75);
        
        // Crear nombre único para tablet
        $fileName = "exercises/tablet_{$event->baseFileName}.jpg";
        
        // Subir a S3
        $uploaded = Storage::disk('s3')->put($fileName, $tabletImage, ['visibility' => 'public']);
        
        if ($uploaded) {
            // 🔥 Usar DB directo en lugar de Eloquent
            DB::table('exercises')->where('id', $event->exerciseId)->update(['tablet_path' => $fileName]);
        }
    }
}