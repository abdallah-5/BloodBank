<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records = Client::all();

      return view('clients.index',compact('records'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record = Client::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }


    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_activated' => 1]);
        flash()->success('تم التفعيل');
        return back();
    }
    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_activated' => 0]);
        flash()->success('تم إلغاء التفعيل');
        return back();
    }
}
