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
        $todo = Todos::all();
        return response(['todos' =>
            TodosResource::collection($todo),
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

        $todo = Todos::create($data);

        return response(
            [
                'todos' => new TodosResource($todo),
                'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $todo)
    {
        return response (
            [
                'todos' => new TodosResource($todo),
                'message' => 'Success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todos $todo)
    {
        $todo->update($request->all());

        return response(
            [
                'todos' => new TodosResource($todo),
                'message' => 'Success',
                200
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $todo)
    {
        $todo->delete();

        return response(['message' => 'Todo deleted']);
    }
}
