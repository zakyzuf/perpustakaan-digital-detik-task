@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Kategori</h1>
        </div>

        <div class="section-body">
            <!-- Button trigger for Create Form Modal -->
            <button type="button" class="btn icon icon-left btn-primary" data-toggle="modal" data-target="#createFormModal"
                style="margin-bottom: 20px">
                <i class="bi bi-envelope-plus"></i> Tambah Kategori
            </button>

            <!-- Create Form Modal -->
            <div class="modal fade" id="createFormModal" tabindex="-1" role="dialog" aria-labelledby="kategoriCreateModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="kategoriCreateModal">Buat Kategori </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('kategori.store') }}" id="create-form">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input name="nama_kategori" type="text" class="form-control"
                                        placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1" data-dismiss="modal" onclick="create()">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Create Form Modal -->

            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kategori }}</td>
                            <td>
                                <div class="flex">
                                    <button type="button" class="btn icon icon-left btn-primary m-1" data-toggle="modal"
                                        data-target="#editFormModal{{ $k->id }}"><i
                                            class="bi bi-pencil-square"></i></button>

                                    <form id="delete-form-{{ $k->id }}"
                                        action="{{ route('kategori.destroy', $k->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn icon btn-danger m-1 delete-btn"
                                            data-id="{{ $k->id }}" onclick="confirmDelete({{ $k->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Form Modal -->
                        <div class="modal fade text-left" id="editFormModal{{ $k->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="kategoriEditModal{{ $k->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="kategorieditModal{{ $k->id }}">Edit
                                            Kategori
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form id="edit-form-{{ $k->id }}" method="POST"
                                        action="{{ route('kategori.update', $k->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                                <input name="nama_kategori" type="text" class="form-control"
                                                    placeholder="Nama Kategori" value="{{ $k->nama_kategori }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button type="button" type="button" class="btn btn-primary ml-1 edit-btn"
                                                data-id="{{ $k->id }}" data-dismiss="modal"
                                                onclick="confirmEdit({{ $k->id }})">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Submit</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Form Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        function create() {
            document.getElementById('create-form').submit();
            Swal.fire(
                        'Ditambahkan!',
                        'Kategori telah ditambahkan.',
                        'success'
                    )
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya, Hapus!", kirimkan permintaan penghapusan ke server
                    document.getElementById('delete-form-' + id).submit();
                    Swal.fire(
                        'Dihapus!',
                        'Kategori telah dihapus.',
                        'success'
                    )
                }
            });
        }

        function confirmEdit(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data akan diupdate!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Update!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya, Hapus!", kirimkan permintaan penghapusan ke server
                    document.getElementById('edit-form-' + id).submit();
                    Swal.fire(
                        'Diupdate!',
                        'Kategori telah diupdate.',
                        'success'
                    )
                }
            });
        }
    </script>

@endsection
