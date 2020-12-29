<?php

use App\AppSetting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;



/** Returns a random alphanumeric token or number
 * @param int length
 * @param bool  type
 * @return String token
 */
function getRandomToken($length , $typeInt = true , $min = null){
    if($typeInt){

        $token = "";
        $ints = [0,1,2,3,4,5,6,7,8,9];
        for($i = 0; $i < $length; $i++){
            $token .= array_rand($ints , 1);
        }
        $token = (int)$token;
    }
    else{

        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
    }
    
    return $token;
}

/**Puts file in a public storage */
function putFileInStorage($file , $path ){
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($path , $filename);
        return $filename;
}

/**Puts file in a private storage */
function putFileInPrivateStorage($file , $path){
    $filename = uniqid().'.'.$file->getClientOriginalExtension();
    Storage::putFileAs($path,$file,$filename,'private');
    return $filename;
}


function resizeImageandSave($image, $path, $disk = 'local', $width = 300, $height = 300)
{
    // create new image with transparent background color
    $background = Image::canvas($width, $height, '#ffffff');

    // read image file and resize it to 262x54
    $img = Image::make($image);
    //Resize image
    // $img->resize($width, $height, function ($constraint) {
    //     $constraint->aspectRatio();
    //     $constraint->upsize();
    // });

    // insert resized image centered into background
    $background->fill($img);

    // save
    $filename = uniqid() . '.' . $image->getClientOriginalExtension();
    $path = $path . '/' . $filename;
    Storage::disk($disk)->put($path, (string) $background->encode());
    return $filename;
}


// Returns full public path
function my_asset($path = null ){
    return url('/').env('RESOURCE_PATH').'/'.$path;
}


/**Gets file from public storage */
function getFileFromStorage($fullpath , $storage = 'storage'){
    if($storage == 'storage'){
        return route('read_file',encrypt($fullpath));
    }
    return my_asset($fullpath);
}

/**Deletes file from public storage */
function deleteFileFromStorage($path){
    unlink(public_path($path));
}


/**Deletes file from private storage */
function deleteFileFromPrivateStorage($path){
    $exists = Storage::disk('local')->exists($path);
    if($exists){
        Storage::delete($path);
    }
}


/**Downloads file from private storage */
function downloadFileFromPrivateStorage($path , $name = null){
    $exists = Storage::disk('local')->exists($path);
    if($exists){
        $file_name = "file".uniqid();
        $type = Storage::mimeType($path);
        $ext = explode('.',$path)[1];
        $display_name = empty($name) ? $file_name : $name.'.'.$ext;
        // dd($display_name);
        $headers = [
            'Content-Type' => $type,
        ];

        return Storage::download($path,$display_name,$headers);
    }
    return null;
}

function readPrivateFile($path){

}


/**Reads file from private storage */
function getFileFromPrivateStorage($fullpath , $disk = 'local'){
    if($disk == 'public'){
        $disk = null;
    }
    $exists = Storage::disk($disk)->exists($fullpath);
    if($exists){
        $fileContents = Storage::disk($disk)->get($fullpath);
        $content = Storage::mimeType($fullpath);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', $content);
        return $response;
    }
    return null;
}



function str_limit($string , $limit = 20 , $end  = '...'){
    return Str::limit(strip_tags($string), $limit, $end);
}



/**Returns file size */
function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }


/** Returns File type
 * @return Image || Video || Document
 */
function getFileType(String $type)
    {
        $imageTypes = imageMimes() ;
        if(strpos($imageTypes,$type) !== false ){
            return 'Image';
        }

        $videoTypes = videoMimes() ;
        if(strpos($videoTypes,$type) !== false ){
            return 'Video';
        }

        $docTypes = docMimes() ;
        if(strpos($docTypes,$type) !== false ){
            return 'Document';
        }
    }

    function imageMimes(){
        return "image/jpeg,image/png,image/jpg,image/svg";
    }

    function videoMimes(){
        return "video/x-flv,video/mp4,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi";
    }

    function docMimes(){
        return "application/pdf,application/docx,application/doc";
    }

    function formatTimeToHuman($time) {
        $seconds =  Carbon::parse(now())->diffInSeconds(Carbon::parse($time) ,false);
        if($seconds < 1){
            return false;
        }
        return formatSecondsToHuman($seconds);
    }

    function formatDateTimeToHuman($time , $pattern = 'M d , Y h:i:A') {
       return date($pattern,strtotime($time));
    }



    function formatSecondsToHuman($seconds) {
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        $a=$dtF->diff($dtT)->format('%a');
        $h=$dtF->diff($dtT)->format('%h');
        $i=$dtF->diff($dtT)->format('%i');
        $s=$dtF->diff($dtT)->format('%s');
        if($a>0)
        {
           return $dtF->diff($dtT)->format('%a days, %h hrs, %i mins and %s secs');
        }
        else if($h>0)
        {
            return $dtF->diff($dtT)->format('%h hrs, %i mins ');
        }
        else if($i>0)
        {
            return $dtF->diff($dtT)->format(' %i mins');
        }
        else
        {
            return $dtF->diff($dtT)->format('%s seconds');
        }
    }


    function slugify($value){
        return Str::slug($value);
    }


    function slugifyReplace($value , $symbol = '-'){
        return str_replace(' ', $symbol, $value);
    }


   
    function carbon(){
        return new Carbon();
    }


   function globalSettings(){
       return AppSetting::firstOrCreate([]);
   }

   function rewardProducts($key = null){
       $products = [
           "flyers_100" => "100 copies of Flyers",
           "business_card_100" => "100 copies of Business Card",
           "product_stickers_100" => "100 copies of Product Stickers",
           "flex_banner_1" => "1 3x5ft Flex Banner"
       ];
       if(!empty($key)){
         return array_key_exists($key , $products) ? $products[$key] : null ;
       }
       return $products;
   }