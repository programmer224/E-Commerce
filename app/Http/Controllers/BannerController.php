<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $banner=Banner::all();
        return view('backened.banner.index',compact('banner'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backened.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'required',
            'condition'=>'nullable|in:Banner,Promotion',
            'status'=>'nullable|in:active,inactive'
        ]);

        $data = $request->all();

        $slug = Str::slug($request->title);
        $count = Banner::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;

        $status=Banner::create($data);

        if($status){
            return redirect()->route('banner.index')->with('success','Successful created banner');
        }else{
            return back()->with('error','Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner=Banner::find($id);
        if($banner)
        {
            return view('backened.banner.edit',compact('banner'));
        }
        else{
            return back()->with('error','data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $banner=Banner::find($id);

        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'required',
            'condition'=>'nullable|in:Banner,Promotion',
            'status'=>'nullable|in:active,inactive'
        ]);

        $data = $request->all();



        $slug = Str::slug($request->title);
        $count = Banner::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;

        $status=$banner->fill($data)->save();

        if($status){
            return redirect()->route('banner.index')->with('success','Successful updated banner');
        }else{
            return back()->with('error','Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner=Banner::destroy($id);

        if($banner){
            return redirect()->route('banner.index')->with('success','Banner sucessfully deleted');
        }else{
            return back()->with('error','Something went wrong');
        }
    }


    public function bannerStatus(Request $request){
        if($request->mode=='true')
        {
            Banner::where('id', $request->id)->update(['status' => 'active']);
        }
        else
        {
            Banner::where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }
}
