<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Groups;
use App\Models\Subgroups;

class SubgroupController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subgroups::all();
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
      	$by = $request->id;
      
      	Subgroups::create([
          'name' => $name,
          'group_id' => $gid,
          'created_by' => $by
          ]);
      
        return redirect(route('admin.subcats'))->with('success', 'Sub-category Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group_data = Groups::where('name',$id)->get();
        $data = Subgroups::where('group_id',$group_data[0]['id'])->get();
      	return $data;
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
