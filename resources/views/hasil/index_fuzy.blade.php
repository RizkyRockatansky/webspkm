@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
        <h2>Proses Fuzzyfikasi</h2>
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-success btn-sm" type="button" href="index_defuzy"><i class="fas fa-plus-circle"></i> Proses Defuzzyfikasi</a>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Dimensi</th>
                        <th>BBH</th>
                        <th>BTH</th>
                        <th>BAH</th>
                        <th>BBP</th>
                        <th>BTP</th>
                        <th>BAP</th>

                    </tr>
                </thead>
               
                <tbody>
                    <?php $no = 0; ?>
                    @foreach($hasil as $a)
                    <?php $no++; ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$a->pertanyaan}}</td>
                        <td>{{App\Kategori::where('id_kategori',$a->id_kategori)->value('nama_kategori')}}</td>
                        
                        <td>{{$a->after_result->bbh}}</td>
                        <td>{{$a->after_result->bth}}</td>
                        <td>{{$a->after_result->bah}}</td>
                        <td>{{$a->after_result->bbp}}</td>
                        <td>{{$a->after_result->btp}}</td>
                        <td>{{$a->after_result->bap}}</td>

                        {{-- <td>{{$no}}</td>
                        <td>{{ $f->id_fuzzy }}</td>
                        <td>{{ $f->hasilkuisioner->id_hasil }}</td>
                        <td>{{ $f->batasBawahHarapan }}</td>
                        <td>{{ $f->batasTengahHarapan }}</td>
                        <td>{{ $f->batasAtasHarapan }}</td>
                        <td>{{ $f->batasBawahPersepsi }}</td>
                        <td>{{ $f->batasTengahPersepsi }}</td>
                        <td>{{ $f->batasAtasPersepsi }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="number" class="form-control" placeholder="Nama NIM" 
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
@endsection