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
        $articles = Article::with('user')->orderBy('created_at','desc')->paginate(7);

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
            'featured' => 'mimes:jpg,png,jpeg,gif,svg|max:2048|nullable',

        ]);
        // dd($request->all());

        $user = Auth::user();
        $user_id   =  Auth::Id();
        $title     =  $request->title;
        $slug      =  Str::slug($request->title);
        $content   =  $request->content;
        $notes   =  $request->notes;

        // Ok. Validated. everything is solid.

        $article = Article::create([
            'user_id'   =>  $user->id,
            'title'     =>  $title,
            'slug'      =>  $slug,
            'content'   =>  $content
            ]);
            if ($request->has('images'))  {
                // dd($request->images);
                $article->addMediaFromRequest('images.0.image')->toMediaCollection('featured');
            }



           return redirect()->route('articles.index')->with('success_message', trans('articles.model_was_added'));

    }


    /**
     * Display the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();
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
    public function update($slug, ArticlesFormRequest $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'string|min:1|nullable',
            'notes' => 'string|min:1|max:1000|nullable',
            'featured' => 'nullable',
        ]);
        // dd($request->all());

        $article = Article::where('slug', $slug)->first();

        $user = Auth::user();
        $user_id   =  Auth::Id();
        $title     =  $request->title;
        $slug      =  Str::slug($request->title);
        $content   =  $request->content;
        $notes   =  $request->notes;
        if ($request->has('images'))  {
            $article->addMediaFromRequest('images.0.image')->toMediaCollection('featured');
        }

        // $article->addMediaFromRequest('image')->toMediaCollection('media');
        $article->update([
            'user_id'   =>  $user->id,
            'title'     =>  $title,
            'slug'      =>  $slug,
            'content'   =>  $content
            ]);

        return redirect()->route('articles.show', $article->slug)->with('success_message','<b> <i>' . $title .  '</i></b>' .  ' is Updated successfully ');

    }

    /**
     * Remove the specified article from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($slug)
    {
        try {
            $article = Article::where('slug', $slug)->first();
            $title = $article->title;
            $article->delete();

            // return redirect()->route('articles.index')
            //     ->with('success_message', trans('articles.model_was_deleted'));

            return redirect()->route('articles.index', $article->slug)->with('success_message','<b> <i>' . $title .  '</i></b>' .  ' is deleted successfully ');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('articles.unexpected_error')]);
        }
    }



}
