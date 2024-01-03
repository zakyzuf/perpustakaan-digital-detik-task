<?php

namespace App\Http\Controllers;

use App\Models\Buku;
// use App\Http\Requests\Request;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $buku = Buku::with('kategori');
        $kategori = Kategori::all();

        $isAdmin = (auth()->user() && auth()->user()->role == 'admin');

        if ($isAdmin) {
            $buku = $buku->get();
        } else {
            $buku = $buku->where('id_user', auth()->user()->id)->get();
        }

        if ($request->has('kategori')) {
            $buku = $buku->where('id_kategori', $request->kategori);
        }
        
        return view('dashboard.list_buku', compact('buku', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('buku.tambah_buku', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuRequest $request)
    {
        //
        $data = $request->validated();

        if ($request->file('cover')) {
            $data['cover'] = $request->file('cover')->store('public/cover-buku');
        }

        if ($request->file('PDFfile')) {
            $pdfFile = $request->file('PDFfile');
            $randomPart = Str::random(5);
            $pdfFileName = Str::slug($request->judul) . '-' . $randomPart . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('pdf-buku', $pdfFileName, 'public');
            $data['file'] = 'pdf-buku/' . $pdfFileName; // Set the file path in your data array
        }

        $randomPart = Str::random(5);
        $data['slug'] = Str::slug($request->judul) . '-' . $randomPart;
        if (Buku::create($data)) {
            Alert::success('Berhasil', 'Data Buku Berhasil Ditambahkan');
            return redirect(route('buku.index'));
        } else {
            Alert::error('Gagal', 'Data Buku Gagal Ditambahkan');
        }

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        if (Gate::allows('view-book', $slug)) {
            $buku = Buku::where('slug', $slug)->firstOrFail();
            $kategori = Kategori::all();
            return view('buku.show', compact('buku', 'kategori'));
            return response()->json(['message' => 'Buku berhasil diperbarui.']);
        } else {
            return response()->json(['message' => 'Akses ditolak. Anda tidak memiliki izin.'], 403);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        if (Gate::allows('update-book', $slug)) {
            $buku = Buku::where('slug', $slug)->firstOrFail();
            $kategori = Kategori::all();
            $selectedCategoryId = $buku->id_kategori;
            return view('buku.edit', compact('buku', 'kategori', 'selectedCategoryId'));
            return response()->json(['message' => 'Buku berhasil diperbarui.']);
        } else {
            return response()->json(['message' => 'Akses ditolak. Anda tidak memiliki izin.'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBukuRequest  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBukuRequest $request, Buku $buku)
    {
        //
        $data = $request->validated();

        if ($request->file('cover')) {
            if ($request->oldCover) {
                Storage::delete($request->oldCover);
            }
            $data['cover'] = $request->file('cover')->store('public/cover-buku');
        }

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $pdfFile = $request->file('file');
            $randomPart = Str::random(5);
            $pdfFileName = Str::slug($request->judul) . '-' . $randomPart . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('public/pdf-buku', $pdfFileName);
            $data['file'] = 'pdf-buku/' . $pdfFileName; // Set the file path in your data array
        }

        if ($buku->update($data)) {
            Alert::success('Berhasil', 'Data Buku Berhasil Diubah');
            return redirect(route('buku.index'));
        } else {
            Alert::error('Gagal', 'Data Buku Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
        if (Gate::allows('delete-book', $buku)) {
            if ($buku->file) {
                Storage::delete($buku->file);
            }
            if ($buku->cover) {
                Storage::delete($buku->cover);
            }
            $buku->delete();
            return redirect(route('buku.index'));
            return response()->json(['message' => 'Buku berhasil diperbarui.']);
        } else {
            return response()->json(['message' => 'Akses ditolak. Anda tidak memiliki izin.'], 403);
        }
    }
}
