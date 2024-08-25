@extends('layout.main')

@section('content')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container text-center">
            <h2><strong>List User</strong></h2>
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
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verifikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                                <tr>
                                    <td>{{ $d['name'] }}</td>
                                    <td>{{ $d['email'] }}</td>
                                     <td>
                                        @if ($d['is_verified'] == 1)
                                            <span class="badge badge-success">Terverifikasi</span>
                                        @else
                                            <span class="badge badge-warning">Belum diverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($d['is_verified'] == 0)
                                            <form action="{{ Route('users.verified', $d['id']) }}" method="PUT" class="delete d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $d['id'] }}">
                                                <button onclick="return confirm('Verifikasi akun ini?');" type="submit" class="btn btn-primary btn-sm btn-flat">
                                                Aktifkan
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada user vendor</td>
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
