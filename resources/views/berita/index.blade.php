@extends('master')

@section('title')
    <title>Halaman Berita</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Halaman Berita') }}</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ __('Data Berita') }}</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('berita.create') }}" class="btn btn-primary">{{ __('Tambah') }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ini judul</td>
                                            <td>Gambar0</td>
                                            <td>34323</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
