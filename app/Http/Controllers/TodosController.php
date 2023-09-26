<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodosResource;
use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todos::all();
        return response(['todos' =>
            TodosResource::collection($todos),
            'message' => 'succesful'
        ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'error' => $validator->errors(),
                    'Validation Error in Todos'
                ]
            );
        }

        $todos = Todos::create($data);

        return response(
            [
                'todos' => new TodosResource($todos),
                'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $todos)
    {
        return response (
            [
                'todos' => new TodosResource($todos),
                'message' => 'Success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todos $todos)
    {
        $todos->update($request->all());

        return response(
            [
                'todos' => new TodosResource($todos),
                'message' => 'Success',
                200
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $todos)
    {
        $todos->delete();

        return response(['message' => 'Todo deleted']);
    }
}
