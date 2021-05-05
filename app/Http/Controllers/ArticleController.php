<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

use App\Models\Article_Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ArticlesFormRequest;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}

    /**
     * Display a listing of the articles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        // dd('index here');
        $articles = Article::with('user')->paginate(25);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // $creators = User::pluck('first_name','id')->all();
        $creators = User::pluck('first_name','id')->all();

        return view('articles.create', compact('creators'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // validate
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'slug' => 'string|min:1|nullable|unique:articles,slug',
            'content' => 'string|min:1|nullable',
            'notes' => 'string|min:1|max:1000|nullable',
        ]);

        $user = Auth::user();
        $user_id   =  Auth::Id();
        $title     =  $request->title;
        $slug      =  Str::slug($request->title);
        $content   =  $request->content;
        $notes   =  $request->notes;

        $images   =  $request->images;

        // Ok. Validated. everything is solid.

        $article = Article::create([
            'user_id'   =>  $user->id,
            'title'     =>  $title,
            'slug'      =>  $slug,
            'content'   =>  $content
            ]);

        // Image storage

        if ($images) {
            foreach($images as $image) {

                $imagePath = Storage::disk('uploads')->put($user->email . 'posts/', $image);
                Article_Image::create([
                    'article_image_caption' =>  $title,
                    'article_image_path'    =>  '/uploads' . $imagePath,
                    'article_id'            =>  $article->id
                ]);

            }
        }




        // redirect
        return redirect()->route('articles.index')->with('success_message', trans('articles.model_was_added'));

    }


    /**
     * Display the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $article = Article::with('creator')->findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $creators = User::pluck('email','id')->all();

        return view('articles.edit', compact('article','creators'));
    }

    /**
     * Update the specified article in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ArticlesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ArticlesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $article = Article::findOrFail($id);
            $article->update($data);

            return redirect()->route('articles.article.index')
                ->with('success_message', trans('articles.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
        }
    }

    /**
     * Remove the specified article from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();

            return redirect()->route('articles.article.index')
                ->with('success_message', trans('articles.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
        }
    }



}
