<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reply;
use App\Notifications\NewAddedReply;
use App\Discussion;
class RepliesController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request, Discussion $discussion)
    {
        auth()->user()->replies()->create([
           'content' => $request->reply, 
           'discussion_id' => $discussion->id
       ]);

        if(auth()->user()->id != $discussion->user->id)
        {
            $discussion->user->notify(new NewAddedReply($discussion));
        }
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Discussion $discussion, Reply $reply)
    {
        $reply->delete();
        return redirect()->back();
    }
}
