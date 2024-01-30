<?php

namespace App\Http\Controllers;

use App\Models\Groups;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Groups::all();
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
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:6144',
        ]);
        $image = $request->file('image');
        $extension = $request->file('image')->extension();
        $new_name = 'https://new.taiammumuday.com/images/category/'.time(). '.' . $extension;
        $image->move(public_path("images/category"),$new_name);
        
        $data = Groups::create([
            'src' => $new_name,
            'name' => $request->name,
            'created_by' => $request->id
        ]);

        if($data) {
            return redirect(route('admin.cats'))->with('success', 'Category Added Successfully.');
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
            $data = Groups::find($request->eid);
            
            $img = explode('/',$data->src);
            $lnk = $img[3].'/'.$img[4].'/'.$img[5];
    
            if(File::exists(public_path($lnk))) {
                unlink(public_path($lnk));
            }

            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $new_name = 'https://new.taiammumuday.com/images/category/'.time(). '.' . $extension;
            $image->move(public_path("images/category"),$new_name);

            Groups::where('id',$request->eid)->update([
                'src' => $new_name
            ]);
        }

        Groups::where('id',$request->eid)->update([
            'name' => $request->name,
        ]);
        
        return redirect(route('admin.cats'))->with('success', 'Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Groups::find($id);

        $img = explode('/',$data->src);
        $lnk = $img[3].'/'.$img[4].'/'.$img[5];

        if(File::exists(public_path($lnk))) {
            unlink(public_path($lnk));
        }

        Groups::destroy($id);

        return redirect(route('admin.cats'))->with('success', 'Category Deleted Successfully.');
    }
}
