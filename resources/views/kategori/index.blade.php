@extends('layouts.app')


@section('content')

<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal1"><i class="fas fa-plus-circle"></i> Tambah Kategori</button>
        </div>
        <div class="card-body">
            
        {{-- ========== --}}
            @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

{{-- ===== --}}

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th style="width: 25%">Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($kategori as $k)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $k->id_kategori }}"><i class="fas fa-edit"></i> Edit</button>
                            <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $k->id_kategori }}" href="kategori/{{$k->id_kategori}}/edit"><i class="fas fa-eye"></i> View</a>
                                <a href="/kategori/delete/{{$k->id_kategori}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Modal Tambah -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/kategori/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="Nama kategori" 
                    required="Tidak Boleh Kosong" id="nama_kategori" name="nama_kategori">

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Tambah</button></div>
        </div>
    </form>
    </div>
</div>

@foreach ($kategori as $k)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModal2{{ $k->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/kategori/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $k->id_kategori }}">
                <div class="from-group">
                    <label for="name">Nama kategori</label>
                    <input type="text" class="form-control" value="{{ $k->nama_kategori }}" id="nama_kategori" name="nama_kategori">

                </div> 
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button> --}}
                <button class="btn btn-primary" type="submit">Ubah</button></div>
        </div>
    </form>
    
    </div>
</div>
@endforeach

@foreach ($kategori as $k)
<!-- Modal View -->
<div class="modal fade" id="exampleModal3{{ $k->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/kategori/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $k->id_kategori }}">
                <div class="from-group">
                    <label for="name">Nama kategori</label>
                    <input disabled type="text" class="form-control" value="{{ $k->nama_kategori }}" id="nama_kategori" name="nama_kategori" readonly>

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button> --}}
            </div>   
        </div>
    </form>
    </div>
</div>
@endforeach

    @endsection