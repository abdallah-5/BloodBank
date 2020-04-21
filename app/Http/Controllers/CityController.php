<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Governorate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records = City::all();

      return view('cities.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $governorates = Governorate::pluck('name', 'id');

      $selectedID = Governorate::first();

      return view ('cities.create',compact('selectedID', 'governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request->all());
      $rules = [
        'name' => 'required',
        'governorate_id' =>'required',
      ];

      $messages = [
        'name.required' => 'Name is required'
      ];

      $this->validate($request, $rules, $messages);

      $record = City::create($request->all());

      flash()->success("تم إضافة مدينة بنجاح");

      return redirect(route('city.index'));
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
      $model = City::findOrFail($id);

      $governorates = Governorate::pluck('name', 'id');

      $selectedID = $model->governorate->id;

      return view('cities.edit', compact('model','governorates','selectedID'));
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
      $record = City::findOrFail($id);
      $record->update($request->all());
      flash()->success("تم التعديل بنجاح");
      return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record = City::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }
}
