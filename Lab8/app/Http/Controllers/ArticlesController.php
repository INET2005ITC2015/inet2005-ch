<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }


    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        flash('Your article has been created')->important();

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        return redirect('articles');
    }


}
