<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $model = User::findOrFail($id);

      return view('change-password.edit', compact('model'));
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
      $rules = [
        'old_password'              => 'required',
        'password'                  => 'required|confirmed',
      ];

      $messages = [
        'password.required'              => 'New_password is required',
        'password.required'              => 'New_password is required',
      ];

      $this->validate($request, $rules, $messages);

      if($request->old_password == $request->user()->password)
      {
        $request->merge(['password' => bcrypt($request->password)]);
        $record = User::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التعديل بنجاح");
        return redirect(route('home'));
     }
     else{
       dd('wrong password');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
