<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class TableController extends Controller
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
        return view('table.create', compact('users'));
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

        return redirect()->route('tables.index')->with('success','table created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        return view('table.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        $users= User::all();
        return (view('table.edit',compact('table','users')));
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

        return redirect()->route('tables.index')->with('success','table updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table  $table)
    {
      $columns= $table->columns()->get();
      foreach ($columns as $column)
      {
          $column->posts()->delete();
      }
      $table->columns()->delete();

        $table->delete();
        $table->users()->detach();
        return redirect()->route('tables.index')->with('success', 'table deleted successfully');

    }
}
