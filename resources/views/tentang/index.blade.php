@extends('layouts.app')


@section('content')

<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal1"><i class="fas fa-plus-circle"></i> Tambah Tentang</button>
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
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($tentang as $t)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $t->deskripsi }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModa{{ $t->id_tentang }}"><i class="fas fa-edit"></i> Edit</button>
                            <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $t->id_tentang }}" href="tentang/{{$t->id_tentang}}/edit"><i class="fas fa-eye"></i> View</a>
                                <a href="/tentang/delete/{{$t->id_tentang}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Tentang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/tentang/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Deskripsi</label>
                    {{-- <input type="text" class="form-control" placeholder="Deskripsi" 
                    required="Tidak Boleh Kosong" id="deskripsi" name="deskripsi"> --}}
                    <textarea class="form-control"  style="min-width: 100%" id="deskripsi" name="deskripsi"></textarea>

                </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Tambah</button></div>
        </div>
    </form>
    </div>
</div>
</div>

@foreach ($tentang as $t)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModa{{ $t->id_tentang }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tentang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/tentang/update") }}">
                    {{ csrf_field() }}
                    
                <input type="hidden" name="id" value="{{ $t->id_tentang }}">
                <div class="from-group">
                    <label for="name">Deskripsi</label>
                    {{-- <input type="text" class="form-control" placeholder="Deskripsi" 
                    required="Tidak Boleh Kosong" id="deskripsi" name="deskripsi"> --}}
                    <textarea class="form-control"  style="min-width: 100%" id="deskripsi" value="{{ $t->deskripsi}}" name="deskripsi">{{ $t->deskripsi}}</textarea>

                </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Ubah</button></div>
        </div>
    </form>
    </div>
</div>
</div>
@endforeach

@foreach ($tentang as $t)
<!-- Modal View -->
<div class="modal fade" id="exampleModal3{{ $t->id_tentang }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tentang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/tentang/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $t->id_tentang}}">
                <div class="from-group">
                    <label for="name">Deskripsi</label>
                    <input disabled type="text" class="form-control" value="{{ $t->deskripsi }}" id="deskripsi" name="deskripsi" readonly>

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button> --}}
                
        </div>
    </form>
    </div>
</div>
</div>
@endforeach

@endsection