<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Models\Table;
use Illuminate\Support\Facades\Auth;


class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        $currentUser= Auth::user();
        return view('TableUser.create', compact('users','currentUser'));
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
            'name'=>'required',

        ]);
        $table= Table::create($request->all());

        if ($request->input('users')):$table->users()->attach($request->input('users'));
        endif;


        return redirect()->route('UserTables.index')->with('success','table created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Table  $table1)
    {
        return view('tableUser.show', compact('table1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table  $table )
    {
        $users= User::all();
        return (view('tableUser.edit',compact('table','users')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $table->update($request->all());

        $table->users()->detach();
        if ($request->input('users')):
            $table->users()->attach($request->input('users'));
        endif;

        return redirect()->route('UserTables.index')->with('success','table updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table  $table)
    {
        $table->delete();
        $table->users()->detach();
        return redirect()->route('UserTables.index')->with('success', 'table deleted successfully');

    }
}
