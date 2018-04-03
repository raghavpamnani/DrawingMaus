<?php 
namespace App\Library;

use App\model\User;
use Illuminate\Http\Request;

class Common 
{
	function uploadFile($file,$path){

		$image_path=''; 
 
        $input['imagename'] = time().'.'.$file->getClientOriginalExtension();  // Renaming Image

        $destinationPath = public_path('images/'.$path);  //Path where Image to be uploaded

        if($file->move($destinationPath, $input['imagename'])){
        	$image_path = '/images/'.$path.'/'.$input['imagename'];  
        }
 		return $image_path;
	}
	
}
