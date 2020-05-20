<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createDiscussionValidate;
use App\Discussion;
use Illuminate\Support\Str;
use App\Http\Middleware\VerifyChannelCount;
use App\Reply;


class DiscussionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only(['update', 'destroy', 'edit']);
        $this->middleware(['auth','VerifyChannelCount', 'verified'])->only(['create', 'store']);
    }
  
    public function index()
    {
        return view('discussions.index')->with('discussions', Discussion::filterChannel()->paginate(1));
    }

    
    public function create()
    {
        return view('discussions.create');
    } 

   
    public function store(createDiscussionValidate $request)
    {
     
        Discussion::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content, 
            'slug' => Str::slug($request->title, '-'),
            'channel_id' => $request->channel_id
           
        ]);

        return redirect()->route('discussions.index');
    }

   
    public function show(Discussion $discussion)
    {
        
        return view('discussions.show')->with('discussion', $discussion);
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
