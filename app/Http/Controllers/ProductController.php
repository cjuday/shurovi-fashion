<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Subgroups;
use App\Models\Groups;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::all();
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
        $name = $request->name;
      	$gid = $request->group_id;
      	$by = $request->created_by;
      
      	Subgroups::create([
          'name' => $name,
          'group_id' => $gid,
          'created_by' => $by
          ]);
      
      return response()->json(['type'=> 'success', 'message' => 'Subcategory Created Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(stripos($id, '_')==true){
            $ex = explode("_",$id);
            $group = $ex[0];
            $sub = $ex[1];

            if($sub=='All'){
                $group_data = Groups::where('name',$group)->get();
                $data = Products::where('group_id',$group_data[0]['id'])->get();
                return $data;
            }else{
                $group_data = Groups::where('name',$group)->get();
                $subgroup_data = Subgroups::where('name',$sub)->get();
                $data = Products::where([['group_id',$group_data[0]['id']],['subgroup_id',$subgroup_data[0]['id']]])->get();
                return $data;
            }
        }else{
            $data = Products::where('slug',$id)->get();
            return $data;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
