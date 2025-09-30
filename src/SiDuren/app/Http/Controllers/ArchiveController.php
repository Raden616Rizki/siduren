<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $archives = Archive::query()
            ->when($search, function ($query, $search) {
                $query->where('letter_number', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.archives.index', [
            'archives' => $archives,
            'search' => $search,
        ]);
    }


    public function show($id)
    {
        $archive = Archive::with('category')->findOrFail($id);
        return view('pages.archives.show', compact('archive'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.archives.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'letter_number' => 'required|max:20',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:pdf|max:2048', // hanya PDF, max 2MB
        ]);

        // Simpan file PDF ke storage/app/public/archives
        $filePath = $request->file('file')->store('archives', 'public');

        Archive::create([
            'title' => $request->title,
            'letter_number' => $request->letter_number,
            'file_path' => $filePath,
            'category_id' => $request->category_id,
        ]);

        return redirect('/archive')->with('success', 'Berhasil menambahkan arsip.');
    }


    public function edit($id)
    {
        $archive = Archive::findOrFail($id);
        $categories = Category::all();

        return view('pages.archives.edit', [
            'archive' => $archive,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'letter_number' => 'required|max:20',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|mimes:pdf|max:2048', // file opsional saat update
        ]);

        $archive = Archive::findOrFail($id);

        $data = [
            'title' => $request->title,
            'letter_number' => $request->letter_number,
            'category_id' => $request->category_id,
        ];

        // Jika ada file baru yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama kalau ada
            if ($archive->file_path && Storage::disk('public')->exists($archive->file_path)) {
                Storage::disk('public')->delete($archive->file_path);
            }

            // Simpan file baru
            $filePath = $request->file('file')->store('archives', 'public');
            $data['file_path'] = $filePath;
        }

        $archive->update($data);

        return redirect('/archive')->with('success', 'Berhasil memperbarui arsip.');
    }

    public function destroy($id)
    {
        $archive = Archive::findOrFail($id);
        $archive->delete();
        return redirect('/archive')->with('success', 'Berhasil menghapus arsip.');
    }
}
