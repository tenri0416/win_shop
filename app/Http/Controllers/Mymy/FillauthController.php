<?php

namespace App\Http\Controllers\Mymy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mymy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class FillauthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mymys=Mymy::all();
        return view('mymy.fillauth.index')->with('mymys',$mymys);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mymy=Mymy::findOrFail($id);
        return view('mymy.fillauth.edit',compact('mymy'));
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
        $mymy=Mymy::findOrFail($id);
        $mymy->name=$request->name;
        $mymy->email=$request->email;
        $mymy->password = Hash::make($request->password);
        $mymy->save();
        return redirect()->route('mymy.fillauth.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mymy::findOrFail($id)->delete();
        return redirect()->route('mymy.fillauth.index');
    }

    public function deleteIndex()
    {
        $expiredMymys = Mymy::onlyTrashed()->get();
        return view(
            'mymy.fillauth.delete_index',
            compact('expiredMymys')
        );
    }


}
