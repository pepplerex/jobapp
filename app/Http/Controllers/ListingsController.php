<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class ListingsController extends Controller
{
    
    public function manage(){

        $user = auth()->user()->id;
        return view('/listings.manage', [
            'listings' => Listings::where('user_id', $user)->orderBy('id', 'desc')->get()
        ]);
    }


    public function post(){
        return view('/listings.post');
    }

    public function create(Request $data){
        $formData = $data->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', Rule::unique('listings', 'email'), 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        $formData["user_id"] = auth()->user()->id;

        if($data->hasFile('logo')){
            $formData['logo'] = $data->file('logo')->store('uploads', 'public');
        }


        Listings::create($formData);
        return redirect('/manage')->with('message', 'You have posted a new Gig')->with('title', 'Success');
    }

    public function show(Request $req){

        $listing = Listings::find($req->id);

        if($listing){
            if(auth()->user()->id != $listing->user_id){
                return view('/unauthorized');
            }else{
                return view('listings.edit', [
                    'listing' => $listing
                ]);
            }
        }else{
            return view('/unauthorized');
        }
        
    }

    public function update(Request $data){

        $up = Listings::find($data->id);
        
        $data->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        $up->company = $data->company;
        $up->title = $data->title;
        $up->location = $data->location;
        $up->email = $data->email;
        $up->website = $data->website;
        $up->tags = $data->tags;
        $up->description = $data->description;

        // $up->user_id = auth()->user()->id;
        
        if($data->hasFile('logo')){
            $up['logo'] = $data->file('logo')->store('uploads', 'public');
        }
        

       if($up->save()){
            return back()->with('message', 'Listing updated')->with('title', 'Your listing has been succesfully updated');
       }else{
        echo "error";
       }
    }

    public function del(Listings $id){
        $id->delete();
        return redirect('/manage');
    }

    public function filterTags(Request $req){
        $data = $req->data;
        return view('listings.listings', [
            'listings' => Listings::where('tags', 'like', '%'. $data . '%')->orderBy('id', 'desc')->get()
        ]);
    }

    public function search(Request $req){
        $data = $req->key;
        return view('/listings.listings', [
            'listings' => Listings::where('title', 'like', '%'.$data.'%')->orWhere('tags', 'like', '%'.$data.'%')
            ->orWhere('location', 'like', '%'.$data.'%')->orWhere('company', 'like', '%'.$data.'%')->orderBy('id', 'desc')->get()
        ]);
    }
}
