<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }
    public function store(Request $request)
    {
            $todo = new Todo([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'country' => $request->input('country'),
        ]);
        $todo->save();
        return response()->json('ToDo created!');
    }
    public function show($id)
    {
        $contact = Todo::find($id);
        return response()->json($contact);
    }
    public function update(Request $request, $id)
    {
       $todo = Todo::find($id);
       $todo->update($request->all());
       return response()->json('ToDo updated');
    }
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json(' deleted!');
    }
}
