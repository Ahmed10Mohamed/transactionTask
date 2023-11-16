<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

class ImageVideoUpload
{
    public function StoreImageSingle($upload,$model){

        $image = $upload;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/image/'.$model);
        $image->move($destinationPath, $imageName);
        $name = '/uploads/image/'.$model.'/'.$imageName;
         return $name;
    }

     public function StoreImage($upload,$model,$loop,$id,$data){
        $image = $upload;
        $imageName = $loop . "_" . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/Image/'.$model.$id);
        $image->move($destinationPath, $imageName);
        $data->pdf = '/uploads/Image/'.$model. $id.'/' . $imageName;
         $data->save();
    }

    public function StoreVideo($upload,$model){

        $video = $upload;
        $videoName = time().'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/video/'.$model);
        $video->move($destinationPath, $videoName);
        $name = '/uploads/video/'.$model.'/'.$videoName;
        return $name;
    }
    public function store_multi_images($id,$upload,$class,$modal,$parm){
        $i = 0;
        foreach ($upload as $image)
        {

            $i++;
            $himg = new $class;
            $himg->$parm = $id;
            $imageName = $i."_".time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/image/'.$modal.'/'.$id);

            $image->move($destinationPath, $imageName);
            $himg->image = '/uploads/image/'.$modal.'/'.$id.'/'.$imageName;
            $himg->save();

        }
    }

}
