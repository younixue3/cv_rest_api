<?php

namespace App\Http\Controllers\rest_api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blog = Blog::get();
        $data = compact('blog');

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);

        return response()->json('Sukses Store');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $blog = Blog::query()->findOrFail($id)->update([
           'title' => $request->title,
           'content' => $request->content
        ]);

        return response()->json(dd($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::query()->findOrFail($id)->delete();

        return response()->json('Sukses Hapus');
    }
}
