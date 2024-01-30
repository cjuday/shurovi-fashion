<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageTopImage;
use Illuminate\Support\Facades\File;

class PageTopImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PageTopImage::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PageTopImage::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'image' => 'image|mimes:png,jpg|max:6144',
            'title' => 'required'
        ]);

        if(!empty($request->file('image')))
        {
            $data = PageTopImage::find($request->eid);
            
            $img = explode('/',$data->src);
            $lnk = $img[3].'/'.$img[4].'/'.$img[5];
    
            if(File::exists(public_path($lnk))) {
                unlink(public_path($lnk));
            }

            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $new_name = 'https://new.taiammumuday.com/images/cover/'.time(). '.' . $extension;
            $image->move(public_path("images/cover"),$new_name);

            PageTopImage::where('id',$request->eid)->update([
                'title'=>$request->title,
                'src' => $new_name
            ]);

            return redirect(route('admin.covers'))->with('success', 'Cover Image Updated Successfully.');
        }
            PageTopImage::where('id',$request->eid)->update([
                'title'=>$request->title
            ]);

            return redirect(route('admin.covers'))->with('success', 'Cover Image Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
