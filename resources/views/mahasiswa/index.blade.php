@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal0"><i class="fas fa-plus-circle"></i> Tambah Mahasiswa</button>
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
                        <th>NIM</th>
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($mahasiswa as $mhs)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $mhs->nama_mhs }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->email }}</td>
                        {{-- <td>{{ $mhs->password }}</td> --}}
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $mhs->id_mhs }}"><i class="fas fa-edit"></i> Edit</button>
                            <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $mhs->id_mhs }}" href="mahasiswa/{{$mhs->id_mhs}}/edit"><i class="fas fa-eye"></i> View</a>
                                <a href="/mahasiswa/delete/{{$mhs->id_mhs}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                <form method="POST" action="{{ url("/mahasiswa/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Nama Mahasiswa</label>
                    <input type="text" class="form-control" placeholder="Nama Mahasiswa" 
                    required="Tidak Boleh Kosong" id="nama_mhs" name="nama_mhs">

                </div>
                <div class="from-group">
                    <label for="name">Nomor Induk Mahasiswa</label>
                    <input type="text" class="form-control" placeholder="Nama NIM" 
                    required="Tidak Boleh Kosong" id="nim" name="nim">

                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" placeholder="Email Mahasiswa" 
                    required="Tidak Boleh Kosong" id="email" name="email">

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input id="password" type="password" class="form-control" placeholder="Password" 
                    required="Tidak Boleh Kosong" id="password" name="password">
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

@foreach ($mahasiswa as $mhs)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModal1{{ $mhs->id_mhs }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/mahasiswa/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $mhs->id_mhs }}">
                <div class="from-group">
                    <label for="name">Nama Mahasiswa</label>
                    <input type="text" class="form-control" value="{{ $mhs->nama_mhs }}" id="nama_mhs" name="nama_mhs">

                </div>
                <div class="from-group">
                    <label for="name">Nomor Induk Mahasiswa</label>
                    <input type="number" class="form-control"  value="{{ $mhs->nim }}" id="nim" name="nim">

                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control"  value="{{ $mhs->email }}"id="email" name="email">

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input id="password" type="password" class="form-control"  value="{{ $mhs->password }}" id="password" name="password">
                    <input type="checkbox" onclick="myFunction()"> Show Password

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

@foreach ($mahasiswa as $mhs)
<!-- Modal View -->
<div class="modal fade" id="exampleModal2{{ $mhs->id_mhs }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/mahasiswa/update") }}">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $mhs->id_mhs }}">
                <div class="from-group">
                    <label for="name">Nama Mahasiswa</label>
                    <input disabled type="text" class="form-control" value="{{ $mhs->nama_mhs }}" id="nama" name="nama" readonly>

                </div>
                <div class="from-group">
                    <label for="name">Nomor Induk Mahasiswa</label>
                    <input disabled type="number" class="form-control"  value="{{ $mhs->nim }}" id="nim" name="nim" readonly>

                </div>
                <div class="from-group">
                    <label for="name">Email</label>
                    <input disabled type="text" class="form-control"  value="{{ $mhs->email }}"id="email" name="email" readonly>

                </div>  
                <div class="from-group">
                    <label for="name">Password</label>
                    <input disabled id="password" type="text" class="form-control"  value="{{ $mhs->password }}" id="password" name="password" readonly>
                    

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

