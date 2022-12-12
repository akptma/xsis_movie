<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return response()->json(Movie::all());
    }

    public function create(Request $request)
    {
        $this->validate($request, ["title" => "required|unique:xsis_movie"]);
        return response()->json(Movie::create($request->all()));
    }

    public function show($id)
    {
        $search = Movie::find($id);

        if (!$search) {
            return response()->json(['msg' => 'Data Not Found'], 404);
        }
        return response()->json($search);
    }

    public function update(Request $request, $id)
    {
        $search = Movie::find($id);
        if (!$search) {
            return response()->json(['msg' => 'Data Not Found'], 404);
        }
        $this->validate($request, ['title' => "required|unique:xsis_movie"]);
        $update = $search->fill($request->all())->save();
        return response()->json(['msg' => 'Data Update successfully', 'data' => $search]);
    }

    public function destroy($id)
    {
        $search = Movie::find($id);

        if (!$search) {
            return response()->json(['msg' => 'Data Not Found'], 404);
        }
        $search->delete();
        return response()->json(['msg' => 'Data Delete successfully'], 200);
    }
}
