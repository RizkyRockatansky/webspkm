@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" 
            data-bs-target="#exampleModal1"><i class="fas fa-plus-circle"></i> Tambah Kuisioner</button>
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
                        <th>Pertanyaan</th>
                        <th>Kategori</th>
                        <th>Kode Kuis</th>
                        {{-- <th>Pilihan A</th>
                        <th>Pilihan B</th>
                        <th>Pilihan C</th>
                        <th>Pilihan D</th>
                        <th>Pilihan E</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $no=0; ?>
                    @foreach ($kuisioner as $k)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $k->pertanyaan }}</td>
                        <td>{{ App\Kategori::where('id_kategori',$k->id_kategori)->value('nama_kategori') }}</td>
                        {{-- <td>{{ $k->id_kategori }}</td> --}}
                        <td>{{ $k->kode_kuis }}</td>
                        {{-- <td>{{ $k->pilihanA }}</td>
                        <td>{{ $k->pilihanB }}</td>
                        <td>{{ $k->pilihanC }}</td>
                        <td>{{ $k->pilihanD }}</td>
                        <td>{{ $k->pilihanE }}</td> --}}
                        <td>
                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $k->id_kuis }}"><i class="fas fa-edit"></i> Edit</button>
                           <a class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $k->id_kuis }}" href="mahasiswa/{{$k->id_k}}/edit"><i class="fas fa-eye"></i> View</a>
                            <a href="/kuisioner/delete/{{$k->id_kuis}}" class="btn btn-danger btn-sm" type="submit" data-id=""><i class="far fa-trash-alt"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Kuisioner</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url("/kuisioner/store") }}">
                    {{ csrf_field() }}
                <div class="from-group">
                    <label for="name">Pertanyaan</label>
                    <input type="text" class="form-control"
                    required="Tidak Boleh Kosong" id="pertanyaan" name="pertanyaan">
                </div>
                    <div class="form-group">
                        <label for="name">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                    <option class="dropdown" value="">Pilih Kategori</option>
                    @foreach ($kategori as $t)
                    <option value="{{$t->id_kategori}}">{{ App\Kategori::where('id_kategori',$t->id_kategori)->value('nama_kategori') }}</option>  
                    @endforeach
                    
                    </select>
                    </div>
                    <div class="from-group">
                        <label for="name">Kode Kuis</label>
                        <input type="text" class="form-control" 
                        required="Tidak Boleh Kosong" id="kode_kuis" name="kode_kuis">
                    </div>
                    <input hidden value="1" name="pilihanA">
                    <input hidden value="2" name="pilihanB">
                    <input hidden value="3" name="pilihanC">
                    <input hidden value="4" name="pilihanD">
                    <input hidden value="5" name="pilihanE">
                
{{--               
                <div class="from-group">
                    <label for="name">Pilihan A</label>
                    <input type="text" class="form-control"  
                    required="Tidak Boleh Kosong" id="pilihanA" name="pilihanA">
                </div>
                <div class="from-group">
                    <label for="name">Pilihan B</label>
                    <input type="text" class="form-control"  
                    required="Tidak Boleh Kosong" id="pilihanB" name="pilihanB">
                </div>
                <div class="from-group">
                    <label for="name">Pilihan C</label>
                    <input type="text" class="form-control"  
                    required="Tidak Boleh Kosong" id="pilihanC" name="pilihanC">
                </div>
                <div class="from-group">
                    <label for="name">Pilihan D</label>
                    <input type="text" class="form-control" 
                    required="Tidak Boleh Kosong" id="pilihanD" name="pilihanD">
                </div>
                <div class="from-group">
                    <label for="name">Pilihan E</label>
                    <input type="text" class="form-control" 
                    required="Tidak Boleh Kosong" id="pilihanE" name="pilihanE">
                </div> --}}
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> --}}
                <button class="btn btn-primary" type="submit">Tambah</button></div>
        </div>
    </form>
    </div>
</div>

@foreach ($kuisioner as $k)
<!-- Modal Edit -->
<div class="modal fade" id="exampleModal2{{ $k->id_kuis }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form kuisioner</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/kuisioner/update") }}">
                    {{ csrf_field() }}
                    <div class="from-group">
                        <label for="name">Pertanyaan</label>
                        <input type="text" class="form-control"
                        required="Tidak Boleh Kosong" value="{{ $k->pertanyaan }}" id="pertanyaan" name="pertanyaan">
                        <input type="hidden" class="form-control"
                        required="Tidak Boleh Kosong" value="{{ $k->id_kuis }}" id="pertanyaan" name="id">
                    </div>
                    <br>
                    <div class="row form-group">
                        {{-- <div class="col col-md-3"><label for="select" class=" form-control-label">Pilih Kategori</label></div> --}}
                        <div class="col-12 col-md-9">
                        <select name="id_kategori" id="id_kategori" class="form-control">
                        {{-- <option value="">Pilih Kategori</option> --}}
                        @foreach ($kategori as $t)
                        <option <?php if($t->id_kategori==$k->id_kategori){ echo "selected"; } ?> value="{{$t->id_kategori}}">{{ App\Kategori::where('id_kategori',$t->id_kategori)->value('nama_kategori') }}</option>  
                        @endforeach
                        
                        </select>
                        </div>
                    </div>
                    <div class="from-group">
                        <label for="name">Kode Kuis</label>
                        <input type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->kode_kuis }}" id="kode_kuis" name="kode_kuis">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan A</label>
                        <input type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanA }}" id="pilihanA" name="pilihanA">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan B</label>
                        <input type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanB }}" id="pilihanB" name="pilihanB">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan C</label>
                        <input type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanC }}" id="pilihanC" name="pilihanC">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan D</label>
                        <input type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanD }}" id="pilihanD" name="pilihanD">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan E</label>
                        <input type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanE }}" id="pilihanE" name="pilihanE">
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


@foreach ($kuisioner as $k)
<!-- Modal View -->
<div class="modal fade" id="exampleModal3{{ $k->id_kuis }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Kuisioner</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <form method="POST" action="{{ url("/mahasiswa/update") }}">
                    {{ csrf_field() }}
                    <div class="from-group">
                        <label for="name">Pertanyaan</label>
                        <input disabled type="text" class="form-control"
                        required="Tidak Boleh Kosong" value="{{ $k->pertanyaan }}" id="pertanyaan" name="pertanyaan">
                    </div>
                    <br>
                    <div class="row form-group">
                        {{-- <div class="col col-md-3"><label for="select" class=" form-control-label">Pilih Kategori</label></div> --}}
                        <div class="col-12 col-md-9">
                        <select name="id_kategori" id="id_kategori" class="form-control">
                        {{-- <option value="">Pilih Kategori</option> --}}
                        @foreach ($kategori as $t)
                        <option <?php if($t->id_kategori==$k->id_kategori){ echo "selected"; } ?> value="{{$t->id_kategori}}">{{ App\Kategori::where('id_kategori',$t->id_kategori)->value('nama_kategori') }}</option>  
                        @endforeach
                        
                        </select>
                        </div>
                    </div>
                    <div class="from-group">
                        <label for="name">Kode Kuis</label>
                        <input disabled type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->kode_kuis }}" id="kode_kuis" name="kode_kuis">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan A</label>
                        <input disabled type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanA }}" id="pilihanA" name="pilihanA">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan B</label>
                        <input disabled type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanB }}" id="pilihanB" name="pilihanB">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan C</label>
                        <input disabled type="text" class="form-control"  
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanC }}" id="pilihanC" name="pilihanC">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan D</label>
                        <input disabled type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanD }}" id="pilihanD" name="pilihanD">
                    </div>
                    <div class="from-group">
                        <label for="name">Pilihan E</label>
                        <input disabled type="text" class="form-control" 
                        required="Tidak Boleh Kosong" value="{{ $k->pilihanE }}" id="pilihanE" name="pilihanE">
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

    