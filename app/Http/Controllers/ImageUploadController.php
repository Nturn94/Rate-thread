<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Postimage;
use App\Models\Postcomment;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_image');
    }
    //View post
    public function viewImage(){
        $imageData= Postimage::all();
        // new
        $imagecomment = Postcomment::all();
        return view('Image.view_image', compact('imageData', 'imagecomment'));
    }


    //Store image
        public function storeImage(Request $request){
            $data= new Postimage();

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/Image'), $filename);
                $data['image']= $filename;
            }
            $data->save();
            return redirect()->route('images.view');
        
        }

    //Store image
    public function storeComment(Request $request){
        $gata= new Postcomment();
        $this->validate($request, [
            'comment' => 'required|max:255',
            'image_id' => 'required|numeric|gte:0',
            ]);

        
        $gata->comment = $request->comment;
        $gata->image_id= $request->image_id;
        $gata->save();
        return redirect()->route('images.view');
    
    }

        //Store image
        public function DeleteComment(Request $request){
            
            $id = $request->input('idd');
            Postcomment::find($id)->delete();
            // $comment->delete();
            return redirect()->route('images.view');
        
        }

        //Store image
        public function DeleteImage(Request $request){

            $id = $request->input('iddd');
            Postimage::find($id)->delete();
            // $comment->delete();
            return redirect()->route('images.view');
        
        }
}