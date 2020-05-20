<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Illuminate\Support\Str;


class ChannelController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('channels.create');
    }

    
    public function store(Request $request)
    {
        Channel::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-')

        ]);
        return redirect(route('discussions.index'));
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
