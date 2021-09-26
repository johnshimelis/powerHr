<?php

namespace App\Http\Controllers;

use App\Models\Disorder;
use Illuminate\Http\Request;
class DisorderController extends Controller
{

    public function inputDisorderRecord()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'disorders' => Disorder::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disorder = Disorder::create([
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'record saved successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disorder  $disorder
     * @return \Illuminate\Http\Response
     */
    public function show(Disorder $disorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disorder  $disorder
     * @return \Illuminate\Http\Response
     */
    public function edit(Disorder $disorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disorder  $disorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disorder $disorder)
    {
        $disorder = Disorder::find($disorder->id);
        $disorder->name = $request->name;
        $disorder->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disorder  $disorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disorder $disorder)
    {
        //
    }
    // add Disorderities
   public function insert_disorder(Request $req){
            return response(Disorder::create($req->all()),201);
       }
    //delete disorderity
    public function delete_disorder($id){
        $disorder_del=Disorder::find($id);
        return response($disorder_del->delete(),201);
    }
    //fetch disorders with related therapist
    public function disorder_related_therapists(){
         $disorder_with_therapist=Disorder::with('therapists')->get();
         return response($disorder_with_therapist,201);
    }
    //all disorderity
    public function all_disorders(){
        $all_disorderities=Disorder::all();
        return response($all_disorderities);
    }
    
}
