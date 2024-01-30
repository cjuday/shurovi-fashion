<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use App\Models\Brand;

class BrandController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::orderBy('visiblity','asc')->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:png,jpg|max:2048',
        ]);
        $image = $request->file('image');
        $extension = $request->file('image')->extension();
        $new_name = 'https://new.taiammumuday.com/images/brands/'.time(). '.' . $extension;
        $image->move(public_path("images/brands"),$new_name);
        
        $data = Brand::create([
            'img_src' => $new_name,
            'visiblity' => $request->vsbl,
            'updated_by' => $request->id
        ]);

        if($data) {
            return redirect(route('admin.client'))->with('success', 'Client Image Added Successfully.');
        }else{
            return redirect(route('admin.client'))->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Brand::where('id',$id)->get();
      	return $data;
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
            'image' => 'image|mimes:png,jpg|max:2048',
        ]);

        if(!empty($request->file('image')))
        {
            $data = Brand::find($request->eid);
            
            $img = explode('/',$data->img_src);
            $lnk = $img[3].'/'.$img[4].'/'.$img[5];
    
            if(File::exists(public_path($lnk))) {
                unlink(public_path($lnk));
            }

            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $new_name = 'https://new.taiammumuday.com/images/brands/'.time(). '.' . $extension;
            $image->move(public_path("images/brands"),$new_name);

            Brand::where('id',$request->eid)->update([
                'img_src' => $new_name
            ]);
        }

        $main_data = Brand::find($request->eid);
        if($main_data->visiblity != $request->vsbl)
        {
            $updata = Brand::where('visiblity',$request->vsbl)->get();
            $aid = $updata[0]['id'];
            $avis = $updata[0]['visiblity'];

            Brand::where('id',$aid)->update([
                'visiblity' => $main_data->visiblity
            ]);

            Brand::where('id',$main_data->id)->update([
                'visiblity' => $avis
            ]);
        }
        
        return redirect(route('admin.client'))->with('success', 'Client Image Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::find($id);

        $other_data = Brand::where('visiblity','>',$data->visiblity)->get();

        foreach($other_data as $ot) {
            Brand::where('id',$ot->id)->update(['visiblity'=> $ot->visiblity-1]);
        }

        $img = explode('/',$data->img_src);
        $lnk = $img[3].'/'.$img[4].'/'.$img[5];

        if(File::exists(public_path($lnk))) {
            unlink(public_path($lnk));
        }

        Brand::destroy($id);

        return redirect(route('admin.client'))->with('success', 'Client Image Deleted Successfully.');
    }
}
