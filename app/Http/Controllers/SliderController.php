<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::orderBy('visiblity','asc')->get();
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
            'image' => 'required|image|mimes:png,jpg|max:6144',
        ]);
        $image = $request->file('image');
        $extension = $request->file('image')->extension();
        $new_name = 'https://new.taiammumuday.com//images/slider/'.time(). '.' . $extension;
        $image->move(public_path("images/slider"),$new_name);
        
        $data = Slider::create([
            'img' => $new_name,
            'title' => $request->tt1,
            'title_2' => $request->tt2,
            'title_3' => $request->tt3,
            'title_4' => $request->tt4,
            'visiblity' => $request->vsbl,
            'text_align'=>$request->text_align,
            'uploaded_by' => $request->id
        ]);

        if($data) {
            return redirect(route('admin.slider'))->with('success', 'Slider Image Added Successfully.');
        }else{
            return back()->with('error','Something went wrong!');
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
        //
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
        ]);

        if(!empty($request->file('image')))
        {
            $data = Slider::find($request->eid);
            
            $img = explode('/',$data->img);
            $lnk = $img[4].'/'.$img[5].'/'.$img[6];
    
            if(File::exists(public_path($lnk))) {
                unlink(public_path($lnk));
            }

            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $new_name = 'https://new.taiammumuday.com//images/slider/'.time(). '.' . $extension;
            $image->move(public_path("images/slider"),$new_name);

            Slider::where('id',$request->eid)->update([
                'img' => $new_name
            ]);
        }

        $main_data = Slider::find($request->eid);
        if($main_data->visiblity != $request->vsbl)
        {
            $updata = Slider::where('visiblity',$request->vsbl)->get();
            $aid = $updata[0]['id'];
            $avis = $updata[0]['visiblity'];

            Slider::where('id',$aid)->update([
                'visiblity' => $main_data->visiblity
            ]);

            Slider::where('id',$main_data->id)->update([
                'visiblity' => $avis
            ]);
        }

        Slider::where('id',$request->eid)->update([
            'title' => $request->tt1,
            'title_2' => $request->tt2,
            'title_3' => $request->tt3,
            'title_4' => $request->tt4,
            'text_align' => $request->text_align
        ]);
        
        return redirect(route('admin.slider'))->with('success', 'Slider Image Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Slider::find($id);

        $other_data = Slider::where('visiblity','>',$data->visiblity)->get();

        foreach($other_data as $ot) {
            Slider::where('id',$ot->id)->update(['visiblity'=> $ot->visiblity-1]);
        }

        $img = explode('/',$data->img);
        $lnk = $img[4].'/'.$img[5].'/'.$img[6];

        if(File::exists(public_path($lnk))) {
            unlink(public_path($lnk));
        }

        Slider::destroy($id);

        return redirect(route('admin.slider'))->with('success', 'Slider Image Deleted Successfully.');
    }
}
