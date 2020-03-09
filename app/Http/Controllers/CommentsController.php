<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
  public function index()
  {

    $comments = Comment::all();
    return view('welcome', [
      'comments' => $comments,
    ]);
  }
    public function store()
      {
        request()-> validate([
          'body' => ['required'],
          'name' => ['required'],
        ]);
          return Comment::create([
            'name' => request ('name'),
            'url' => 'url',
            'body' => request ('body'),
          ]);

          return "Votre commentaire a bien été ajouté";
      }
}
