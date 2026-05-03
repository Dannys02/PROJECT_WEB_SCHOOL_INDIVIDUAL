<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('major');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
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
            'title' => 'required|string|max:255',
            'article' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'major_id' => 'nullable|exists:majors,id',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('articles', $filename, 'public');
            $validated['image'] = $filename;
        }

        Article::create($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dipublikasikan');
    }

    public function show(Article $article)
    {
        $article->load('major');
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
            'title' => 'required|string|max:255',
            'article' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'major_id' => 'nullable|exists:majors,id',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete('articles/' . $article->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('articles', $filename, 'public');
            $validated['image'] = $filename;
        }

        $article->update($validated);
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete('articles/' . $article->image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}
