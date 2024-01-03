@extends('layouts.app')

@section('title', 'Buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $buku->judul }}</h1>
        </div>

        <div class="section-body">
            <div class="form-group">
                <label for="" class="form-label">Kategori</label>
                <p>{{ $buku->kategori->nama_kategori }}</p>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Deskripsi</label>
                <p>{{ $buku->deskripsi }}</p>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Jumlah</label>
                <p>{{ $buku->jumlah }}</p>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Cover Buku</label></br>
                @php
                    $imgLink = str_replace('public', 'storage', $buku->cover);
                @endphp
                <img src="{{ asset($imgLink) }}" alt="">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Isi Buku</label></br>
                @php
                    $fileLink = str_replace('pdf-buku', 'storage/pdf-buku', $buku->file);
                @endphp
                <iframe src="{{ asset($fileLink) }}"
                width="100%" height="700px" frameborder="0"></iframe>
            </div>
        </div>
    </section>
@endsection
