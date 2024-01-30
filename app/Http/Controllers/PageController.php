<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Models*/
use App\Models\Slider;
use App\Models\Brand;
use App\Models\PageTopImage;
use App\Models\Groups;
use App\Models\Subgroups;
use App\Models\About;
use App\Models\Services;
use App\Models\Testimonials;

class PageController extends Controller
{
    /*Slider start*/
    public function slider() {
        $data = Slider::orderBy('visiblity','asc')->get();
        return view('admin/slider')->with('data',$data);
    }

    public function addslider() {
        $data = Slider::orderBy('visiblity','desc')->first();
        $id = $data->visiblity;
        return view('admin/add-slider')->with('data',$id+1);
    }

    public function editslider($id) {
        $data = Slider::find($id);
        return view('admin/edit-slider')->with('data',$data);
    }
    /*Slider end*/

    /*Clients start*/
    public function clients() {
        $data = Brand::orderBy('visiblity','asc')->get();
        return view('admin/clients')->with('data',$data);
    }

    public function addclient() {
        $data = Brand::orderBy('visiblity','desc')->first();
        $id = $data->visiblity;
        return view('admin/add-client')->with('data',$id+1);
    }

    public function editclient($id) {
        $data = Brand::find($id);
        return view('admin/edit-client')->with('data',$data);
    }

    /*Clients end*/
    /*Cover starts*/
    public function covers() {
        $data = PageTopImage::orderBy('id','asc')->get();
        return view('admin/covers')->with('data',$data);
    }

    public function editcover($id) {
        $data = PageTopImage::find($id);
        return view('admin/edit-cover')->with('data',$data);
    }
    /*Cover end*/

    /*Category starts*/
    public function cat() {
        $data = Groups::orderBy('id','asc')->get();
        return view('admin/category')->with('data',$data);
    }

    public function addcat() {
        return view('admin/add-category');
    }
    
    public function editcat($id) {
        $data = Groups::find($id);
        return view('admin/edit-category')->with('data',$data);
    }
    /*Category ends*/

    /*Category starts*/
    public function subcat() {
        $data = Subgroups::orderBy('id','asc')->paginate(10);
        return view('admin/sub-category')->with('data',$data);
    }

    public function addsubcat() {
        $data = Groups::all();
        return view('admin/add-sub-category')->with('data',$data);
    }
    
    public function editsubcat($id) {
        $datag = Groups::all();
        $data = Subgroups::find($id);
        return view('admin/edit-sub-category')->with('data',$data)->with('grp',$datag);
    }
    /*Sub-category ends*/
    /*About us*/
    public function wwa() {
        $data = About::find(1);
        return view('admin/abouts')->with('data',$data);
    }
    public function ov() {
        $data = About::find(2);
        return view('admin/abouts')->with('data',$data);
    }
    public function om() {
        $data = About::find(3);
        return view('admin/abouts')->with('data',$data);
    }
    public function val() {
        $data = About::find(4);
        return view('admin/abouts')->with('data',$data);
    }
    
    public function srvc() {
        $data = Services::all();
        return view('admin/services')->with('data',$data);
    }
    
    public function addsrvc(){
        return view('admin/add-services');
    }
    
    public function editsrvc($id) {
        $data = Services::find($id);
        return view('admin/edit-services')->with('data',$data);
    }
    
    public function tst() {
        $data = Testimonials::all();
        return view('admin/testimonials')->with('data',$data);
    }
    
    public function addtst(){
        return view('admin/add-testimonials');
    }
    
    public function edittst($id) {
        $data = Testimonials::find($id);
        return view('admin/edit-testimonials')->with('data',$data);
    }
    /*About us end*/
}
