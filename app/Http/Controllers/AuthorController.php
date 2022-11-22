<?php


namespace App\Http\Controllers;


use App\Models\MySQL\Authors;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(): Collection
    {
        return Authors::all();
    }

    public function update(Request $request)
    {
        $author_rq = $request->all();
        $author_id = $author_rq['id'];
        $author = Authors::find($author_id);
        if ($author) {
            $author->update($request->all());
            $author->save();
            return response()->json($author);
        } else {
            echo "Not found author with id:{$author_id}";
        }
    }

    public function show(string $id)
    {
        $author = Authors::find($id);
        if ($author) {
            return $author;
        } else {
            echo "Not found author with id :{$id}";
        }
    }

    public function create(Request $request)
    {
        $existAuthor = Authors::where('email', $request['email'])->get();
        if (count($existAuthor)) {
            echo "Exist Author in database with email:{$request['email']}";
        }
        $author = Authors::create($request->all());
        $author->save();
        return response()->json($author);
    }

    public function delete(string $id)
    {
        $existAuthor = Authors::findOrFail($id);
        if ($existAuthor) {
            $existAuthor->delete();
            return response()->json(true);
        }
    }
}

