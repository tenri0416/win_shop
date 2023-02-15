<?php

namespace App\Http\Controllers\Mymy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Owner;

class SecondOwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Owner::select('name','email','id','created_at')->paginate(3);
        return view('mymy.owner.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mymy.owner.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' .Owner::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('mymy.owners.index')->with(['message'=>'作成しました','status'=>'info']);
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
        $owner=Owner::findOrFail($id);
        return view('mymy.owner.edit',compact('owner'));
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
        $owner=Owner::findOrFail($id);
        $owner->name=$request->name;
        $owner->email=$request->email;
        $owner->password=Hash::make($request->password);
        $owner->save();
        return redirect()->route('mymy.owners.index')->with(['message'=>'更新しました','status'=>'info']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::findOrFail($id)->delete();
        return redirect()->route('mymy.owners.index')->with(['message'=>'削除しました','status'=>'alert']);
    }

    public function deleteIndex()
    {
        $expiredMymys = Owner::onlyTrashed()->get();
        return view(
            'mymy.owner.delete_index',
            compact('expiredMymys')
        );
    }

    public function restore($id){

        // dd('restore');
        Owner::onlyTrashed()->whereId($id)->restore();//復元
        return redirect()->route('mymy.owners.index')->with(['message'=>'復元しました','status'=>'fukugen']);

    }

    public function forceDelete($id){
        Owner::onlyTrashed()->whereId($id)->forceDelete();//完全削除
        return redirect()->route('mymy.expired-owners.index')->with(['message'=>'完全に削除しました','status'=>'sakujyo']);

    }
}
