<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\PageHeading;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageHeadingController extends Controller
{
    protected object $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model            = new PageHeading();
    }


    public function index()
    {
        $headings      = $this->model->orderBy('id','desc')->get();
        $type        =  ['team'=>'Team Page','service'=>'Our Services','testimonial'=>'Testimonial Page','album'=>'Album Page','director'=>'Directors Page','video'=>'Video Gallery'];

        return view('backend.page_heading.index',compact('headings','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());

            Session::flash('success','Page Heading was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error','Page Heading  was not created. Something went wrong.');
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        $edit   = $this->model->find($id);

        return response()->json(["edit"=>$edit]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);

            $data['row']->update($request->all());

            Session::flash('success','Page Heading was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error','Page Heading was not updated. Something went wrong.');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $deletealbum      = Album::find($id);
        $rid             = $deletealbum->id;


        $delete = $deletealbum->delete();
        if($delete){
            $status ='success';
            return response()->json(['status'=>$status,'message'=>'Page Heading been removed successfully!']);
        } else{
            $status ='error';
            return response()->json(['status'=>$status,'message'=>'Page Heading could not be removed. Try Again later !']);
        }
    }
}
