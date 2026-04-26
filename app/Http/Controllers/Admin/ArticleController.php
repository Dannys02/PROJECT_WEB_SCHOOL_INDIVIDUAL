<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Major;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('jurusan');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('judul_artikel', 'like', "%{$search}%");
        }

        $articles = $query->paginate(15);
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $majors = Major::all();
        return view('admin.articles.create', ['majors' => $majors]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'gambar' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:majors,id',
        ]);

        Article::create($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dipublikasikan');
    }

    public function show(Article $article)
    {
        $article->load('jurusan');
        return view('admin.articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        $majors = Major::all();
        return view('admin.articles.edit', ['article' => $article, 'majors' => $majors]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
            'gambar' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:majors,id',
        ]);

        $article->update($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}
