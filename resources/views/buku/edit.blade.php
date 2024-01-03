@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Buku</h1>
        </div>

        <div class="section-body">
            <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input name="judul" type="text" class="form-control" placeholder="Judul"
                        value="{{ $buku->judul }}">
                </div>
                <div class="form-group">
                    <label for="id_kategori" class="form-label">Kategori</label></br>
                    <select name="id_kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" {{ $k->id == $selectedCategoryId ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" type="text" class="form-control" placeholder="Deskripsi">{{ $buku->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-label">Jumlah Buku</label>
                    <input name="jumlah" type="number" class="form-control" placeholder="Jumlah"
                        value="{{ $buku->jumlah }}">
                </div>
                <div class="form-group">
                    <label for="PDFfile" class="form-label">File PDF Buku</label>
                    <input type="hidden" name="oldFile" value="{{ $buku->file }}">
                    <p>Nama file sebelumnya: {{ $buku->file }}</p>
                    <input class="form-control @error('PDFfile') is-invalid @enderror" type="file" id="PDFfile"
                        name="PDFfile" accept=".pdf">
                    @error('PDFfile')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover" class="form-label">Cover Buku</label>
                    <input type="hidden" name="oldCover" value="{{ $buku->cover }}">
                    @if ($buku->cover)
                        @php
                            $imgLink = str_replace('public', 'storage', $buku->cover);
                        @endphp
                        <img src="{{ asset($imgLink) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover"
                        name="cover" onchange="previewImage()" accept=".jpg, .jpeg, .png" value="{{ $buku->cover }}">
                    @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2 form-group" style="margin-top:25px;">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewImage() {
            var input = document.getElementById('cover');
            var preview = document.querySelector('.img-preview');

            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>

@endsection
