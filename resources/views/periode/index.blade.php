@extends('layouts.app')


@section('content')

<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal1"><i class="fas fa-plus-circle"></i> Tambah Periode</button>
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
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($periode as $p)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $p->nama_periode }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $p->id_periode }}"<?php '{{$p->id_periode}}' ?>><i class="fas fa-edit"></i> Edit</button>
                            <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $p->id_periode }}" href="periode/{{$p->id_periode}}/edit"><i class="fas fa-eye"></i> View</a>
                                <a href="/periode/delete/{{$p->id_periode}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Periode</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/periode/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Nama Periode</label>
                    <input type="text" class="form-control" placeholder="Nama Periode" 
                    required="Tidak Boleh Kosong" id="nama_periode" name="nama_periode">

                </div>
                <div class="from-group">
                    <label for="name">Tanggal</label>
                    <input type="date" class="form-control" placeholder="Tanggal" 
                    required="Tidak Boleh Kosong" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Tambah</button></div>
        </div>
    </form>
    </div>
</div>

@foreach ($periode as $p)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModal2{{ $p->id_periode }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Periode</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/periode/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $p->id_periode }}">
                <div class="from-group">
                    <label for="name">Nama Periode</label>
                    <input type="text" class="form-control" value="{{ $p->nama_periode }}" id="nama_periode" name="nama_periode">

                </div> 
                <div class="from-group">
                    <label for="name">Tanggal</label>
                    <input id="tanggal" type="date" class="form-control"  value="{{ $p->tanggal }}" id="tanggal" name="tanggal">
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

@foreach ($periode as $p)
<!-- Modal View -->
<div class="modal fade" id="exampleModal3{{ $p->id_periode }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Periode</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/periode/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $p->id_periode }}">
                <div class="from-group">
                    <label for="name">Nama Periode</label>
                    <input disabled type="text" class="form-control" value="{{ $p->nama_periode }}" id="nama_periode" name="nama_periode" readonly>

                </div>
                <div class="from-group">
                    <label for="name">Tanggal</label>
                    <input disabled type="date" class="form-control"  value="{{ $p->tanggal }}" id="tanggal" name="tanggal" readonly>
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