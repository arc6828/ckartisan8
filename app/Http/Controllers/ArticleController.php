<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $article = Article::where('title', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('guid', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('creator', 'LIKE', "%$keyword%")
                ->orWhere('pubDate', 'LIKE', "%$keyword%")
                ->orWhere('contentEncoded', 'LIKE', "%$keyword%")
                ->orWhere('image_url', 'LIKE', "%$keyword%")
                ->orWhere('first_paragraph', 'LIKE', "%$keyword%")
                ->orWhere('credit', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $article = Article::latest()->paginate($perPage);
        }

        return view('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Article::create($requestData);

        return redirect('article')->with('flash_message', 'Article added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // $article = Article::findOrFail($id);
        $url = url("api/article/" . $id);
        // echo $url;

        $article_set = json_decode(file_get_contents($url));
        $article = $article_set->article;
        $latest = $article_set->related;
        $tagged = $article_set->tagged;

        return view('article.show', compact('article','latest','tagged'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $article = Article::findOrFail($id);
        $article->update($requestData);

        return redirect('article')->with('flash_message', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect('article')->with('flash_message', 'Article deleted!');
    }
}
