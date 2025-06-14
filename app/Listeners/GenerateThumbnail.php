<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use App\Events\ImageUploaded;
use App\Models\Exercise;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class GenerateThumbnail implements ShouldQueue
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
        
        // Generar thumbnail (300px para cards/listados)
        $thumbnail = Image::read($imageContent)->scale(width: 300)->toJpeg(70);
        
        // Crear nombre único para thumbnail
        $fileName = "exercises/thumbnail_{$event->baseFileName}.jpg";
        
        // Subir a S3
        $uploaded = Storage::disk('s3')->put($fileName, $thumbnail, ['visibility' => 'public']);
        
        if ($uploaded) {
            // 🔥 Usar DB directo en lugar de Eloquent
            DB::table('exercises')->where('id', $event->exerciseId)->update(['thumbnail_path' => $fileName]);
        }
    }
}