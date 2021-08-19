<?php

namespace App\Http\Controllers;

use App\Models\Disorder;
use Illuminate\Http\Request;
class DisorderController extends Controller
{

   public function insert_disorder(Request $req){
            return response(Disorder::create($req->all()),201);
       }

    public function delete_disorder($id){
        $disorder_del=Disorder::find($id);
        return response($disorder_del->delete(),201);
    }

    public function disorder_related_therapists(){
         $disorder_with_therapist=Disorder::with('therapists')->get();
         return response($disorder_with_therapist,201);
    }

    public function all_disorders(){
        $all_disorderities=Disorder::all();
        return response($all_disorderities);
    }
    
}
