@extends('layout.main')

@section('content')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container text-center">
            <h2><strong>List Product</strong></h2>
        </div>
    </section>

    <div class="container">
        @if (session('status'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-success text-center mt-2 mb-2" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
                </div>
            </div>
        @endif
        
        @if (session('error'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-success text-center mt-2 mb-2" role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col">    
                <a href="{{ Route('products.create') }}" class="btn btn-primary">
                    Tambah
                </a>
            </div>
            <div class="col">
                <form action="{{ Route('products') }}" method="GET" class="d-inline">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari nama barang" name="search">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                @if (session('role') == 'admin')
                                    <th>Vendor</th>
                                @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                                <tr>
                                    <td>#{{ $d['id'] }}</td>
                                    <td>{{ $d['name'] }}</td>
                                    <td>{{ $d['description'] }}</td>
                                    @if (session('role') == 'admin')
                                        <td>{{ $d['vendor_name'] }}</td>
                                    @endif
                                    <td>
                                        <form action="{{ Route('products.delete', $d['id']) }}" method="POST" class="delete d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $d['id'] }}">
                                            <button onclick="return confirm('Hapus barang ini?');" type="submit" class="btn btn-primary btn-sm btn-flat">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada barang</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
