<?php
namespace App\FileOperation;

use App\Traits\ImagePathTraits;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class StoreImageCar{
    use ImagePathTraits;
    private $file,$car_Id ;
    public function __construct($image,$car_id)
    {
        $this->file = $image;
        $this->car_Id = $car_id;
    }
    public function storeImage(){
        $file_path = '/medias/image/car/'. $this->car_Id .'/' . Carbon::now()->format('y');
        $path = Storage::disk('public_uploads')->put($file_path,$this->file);
        return $this->url.'/'.$path;
    }
}