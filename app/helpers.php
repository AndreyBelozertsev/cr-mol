<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('getUploadPath')){
    function getUploadPath($prefix, $type = 'images'){
        $newDirPath = "$type/$prefix/" . date('Y') . '/' . date('m') . '/' . date('d');
        if(!Storage::disk('public')->exists($newDirPath)){
            Storage::disk('public')->makeDirectory($newDirPath);
        }
        return $newDirPath;
    }
}

if (!function_exists('getHumanDate')) {
    function getHumanDate($date, $time = false){
        $format = 'd F Y г.';
        if($time){
            $format = 'd F Y H:i';
        }
        return Illuminate\Support\Carbon::parse($date)->translatedFormat($format);
    }
}

if (!function_exists('makeThumbnail')) {
    function makeThumbnail( string $file, string $size, string $method = 'resize')
    {
        
        if(! file_exists(public_path($file)) ){
            return;
        }

        $pathParse = array_reverse(explode('/', $file));

        return route('thumbnail',[
            'size'=>$size,
            'dir'=> $pathParse[4],
            'year'=> $pathParse[3],
            'month'=> $pathParse[2],
            'day'=> $pathParse[1],
            'method'=>$method,
            'file' =>File::basename($file)
        ]);    
    }
}

if (!function_exists('isCorrectProfile')) {

    function isCorrectProfile(){
        $user = Auth::user();
        return auth()->user() && $user->first_name && $user->last_name && $user->phone && $user->birthday &&  $user->city_id;
    }
}
