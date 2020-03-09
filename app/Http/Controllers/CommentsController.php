<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
  public function index($url)
  {
    $comments = Comment::where('url', base64_decode($url))->get();
      return $comments;
  }
    public function store()
      {
        request()-> validate([
          'body' => ['required'],
          'name' => ['required'],
          'url' => ['required'],
          ]);
          return Comment::create([
            'name' => request ('name'),
            'url' => request ('url'),
            'body' => request ('body'),
          ]);

          return "Votre commentaire a bien été ajouté";
      }
}
