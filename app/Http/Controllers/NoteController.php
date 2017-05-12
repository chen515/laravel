<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Note;
use App\User;
use Hash;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::paginate(10);

        if (!$notes) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $notes,
            200
        );
    }

    public function show($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $note = Note::find($id);

        return response()->json([
            $note,
        ], 200);

    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->message = $request->input('message');
        $note->tags = $request->input('tags');

        if ($note->save()) {
            return $note;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $note = Note::find($id);
        $note->message = $request->input('message');
        $note->tags = $request->input('tags');

        if ($note->save()) {
            return $note;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'message' => 'note deleted',
        ], 200);
    }
}
