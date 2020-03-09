<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store()
      {
        request()-> validate([
          'content' => ['required'],
        ]);
          Comment::create([
            'name' => 'Alex',
            'url' => 'url',
            'body' => request ('content'),
          ]);

          return "Votre commentaire a bien été ajouté";
      }
}
