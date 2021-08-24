@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal0"><i class="fas fa-plus-circle"></i> Tambah Admin</button>
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
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($admin as $adm)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $adm->nama_admin }}</td>
                        <td>{{ $adm->email }}</td>
                        {{-- <td>{{ $adm->password }}</td> --}}
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $adm->id_admin }}"><i class="fas fa-edit"></i> Edit</button>
                            <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $adm->id_admin }}" href="admin/{{$adm->id_admin}}/edit"><i class="fas fa-eye"></i> View</a>
                                <a href="/admin/delete/{{$adm->id_admin}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/admin/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control"  
                    required="Tidak Boleh Kosong" id="nama_admin" name="nama_admin">

                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control"  
                    required="Tidak Boleh Kosong" name="email">

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control"  
                    required="Tidak Boleh Kosong" name="password">
                    <input type="checkbox" onclick="myFunction()"> Show Password

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Tambah</button></div>
        </div>
    </form>
    </div>
</div>

@foreach ($admin as $adm)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModal2{{ $adm->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Admin</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/admin/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $adm->id_admin }}">
                <div class="from-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control" value="{{ $adm->nama_admin }}" id="nama_admin" name="nama_admin">
                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control"  value="{{ $adm->email }}"id="email" name="email">

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input id="password" type="password" class="form-control"  value="{{ $adm->password }}" id="password" name="password">
                    <input type="checkbox" onclick="myFunction()"> Show Password

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button> --}}
                <button class="btn btn-primary" type="submit">Ubah</button>
            </div>
        </div>
    </form>
    
    </div>
</div>
@endforeach

@foreach ($admin as $adm)
<!-- Modal View -->
<div class="modal fade" id="exampleModal3{{ $adm->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Admin</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/admin/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $adm->id_admin }}">
                <div class="from-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control" value="{{ $adm->nama_admin }}" id="nama" name="nama" readonly>

                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control"  value="{{ $adm->email }}"id="email" name="email" readonly>

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input id="password" type="text" class="form-control"  value="{{ $adm->password }}" id="password" name="password" readonly>
                    

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
