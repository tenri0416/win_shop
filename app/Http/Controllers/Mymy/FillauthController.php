<?php

namespace App\Http\Controllers\Mymy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mymy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class FillauthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:mymys');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mymys=Mymy::select('id','name','email','created_at')->paginate(6);
        return view('mymy.fillauth.index',compact('mymys'))->with('mymys',$mymys);
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
        return redirect()->route('mymy.fillauth.index')->with(['message' => '編集しました','status'=>'alert']);
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
        return redirect()->route('mymy.fillauth.index')->with(['message'=>'削除しました','status'=>'alert']);
    }

    public function deleteIndex()
    {
        $expiredMymys = Mymy::onlyTrashed()->get();
        return view(
            'mymy.fillauth.delete_index',
            compact('expiredMymys')
        );
    }

    public function restore($id){

        // dd('restore');
        Mymy::onlyTrashed()->whereId($id)->restore();//復元
        return redirect()->route('mymy.fillauth.index')->with(['message'=>'復元しました','status'=>'fukugen']);

    }

    public function forceDelete($id){
        Mymy::onlyTrashed()->whereId($id)->forceDelete();//完全削除
        return redirect()->route('mymy.expired-fillauth.index')->with(['message'=>'完全に削除しました','status'=>'sakujyo']);

    }


}
