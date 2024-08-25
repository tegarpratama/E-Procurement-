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

        <div class="row justify-content-center mt-3">
            <div class="col-5">
                <form method="POST" action="{{ Route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control pl-3" name="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control pl-3" name="description" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
