<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Post;
use App\Models\Table;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];




        $tables= Table::all();
        $CurTable= new Table();
        foreach ($tables as $table)
        {
            if ($table->id==     substr($url, strrpos($url, '?') + 1))
                $CurTable=$table;
        }
//        $tables= Table::all();
//        $CurTable= $column->table_id;
//       $table= $tables->where('id',$CurTable);
        return redirect()->route('tables.show',$CurTable)->with('success','table updated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Table $table)
    {
        return view('column.create',compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Table $table)
    {
        $request->validate([
            'title'=>'required',
        ]);
         Column::create($request->all());



        return redirect()->back()->with('success','column created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Column  $column)
    {
        return view('column.show', compact('column'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Column $column)
    {
       return (view('column.edit',compact('column')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Column $column)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $column->update($request->all());
        return redirect()->route('columns.index',$column->table_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Column $column)
    {
        $column->posts()->delete();
        $column->delete();
        return redirect()->route('tables.show',$column->table_id)->with('success', 'column deleted successfully');
    }
}
