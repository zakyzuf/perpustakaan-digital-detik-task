@extends('layouts.app')

@section('title', 'Buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Buku</h1>
        </div>

        <div class="section-body">
            <form method="GET" id="formkategori" action="{{ route('buku.index') }}" class="row">
                <div class="col-md-4 form-group">
                    <select name="kategori" class="form-select form-control">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" @if ($k->id == Request::get('kategori')) selected @endif>{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 form-group" style="position:relative">
                    <input type="submit" class="btn btn-primary" value="Filter">
                </div>
            </form>
            <button type="button" class="btn icon icon-left btn-primary" style="margin-bottom: 30px">
            <a href="{{ route('buku.create') }}" style="color: white"><i class="bi bi-envelope-plus"></i> Tambah Buku</a>
            </button>
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Cover Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->kategori->nama_kategori }}</td>
                        <td>{{ $b->deskripsi }}</td>
                        <td>{{ $b->jumlah }}</td>
                        <td>
                            @php
                            $imgLink = str_replace('public','storage',$b->cover,);
                            @endphp
                            <img src="{{asset($imgLink)}}" alt="" style="max-width: 90px">
                        </td>
                        <td>
                            <div class="flex">
                                <a href="{{ route('buku.show.slug', $b->slug)}}"><button type="button" class="btn icon icon-left btn-success m-1"><i class="bi bi-eye"></i></button></a>
                                <a href="{{ route('buku.edit.slug', $b->slug) }}"><button type="button" class="btn icon icon-left btn-primary m-1"><i class="bi bi-pencil-square"></i></button></a>
                                <form action="{{ route('buku.destroy', $b->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn icon icon-left btn-danger m-1"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
