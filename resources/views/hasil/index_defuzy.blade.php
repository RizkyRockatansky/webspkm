@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
        <h2>Proses Defuzzyfikasi</h2>
    <div class="card mb-4">
        <div class="card-header">
            {{-- <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Kategori</button> --}}
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Dimensi</th>
                        <th>Persepsi</th>
                        <th>Harapan</th>
                        <th>GAP</th>
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
                        <td>{{$a->after_result2->defuzzyp}}</td>
                        <td>{{$a->after_result2->defuzzyh}}</td>
                        <td>{{$a->after_result2->defuzzyp - $a->after_result2->defuzzyh}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection