<?php

namespace App\Http\Controllers;

use App\Jobs\SyncMedia;
use App\Models\Comment;
use App\Events\Newcomment;
use App\Mail\Reviewcomment;
use Illuminate\Http\Request;
use App\Mail\SupportcommentDeleted;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::all();

        return view('comment.index', compact('comments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('comment.create');
    }

    /**
     * @param \App\Http\Requests\CommentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->validated());

        SyncMedia::dispatch($comment);

        $comment->author->notify(new Reviewcomment($comment));

        Mail::to($comment->author)->send(new Reviewcomment($comment));

        $request->session()->flash('comment.title', $comment->title);

        event(new Newcomment($comment));

        return redirect()->route('comment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([]);

        SyncMedia::dispatch($comment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $request->session()->flash('comment.title', $comment->title);

        Mail::to($support)->send(new SupportcommentDeleted($comment));

        $comment->delete();

        return redirect()->route('comment.index');
    }
}
