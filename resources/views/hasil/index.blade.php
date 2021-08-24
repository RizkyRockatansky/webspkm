@extends('layouts.app')


@section('content')
<br>
<br>
    <div class="container-fluid px-4">
        <h2>Hasil Pengisian Kuisioner Mahasiswa</h2>
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-success btn-sm" type="button" href="index_fuzy"><i class="fas fa-plus-circle"></i> Proses Fuzzyfikasi</a>
           
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="tables-responsive">
                <thead>
                    <tr >
                        <th rowspan="2">No</th>
                        <th rowspan="2">Pertanyaan</th>
                        <th rowspan="2">Dimensi</th>
                        {{-- <th rowspan="2">Periode</th> --}}
                        <th colspan="5">Persepsi</th>
                        <th colspan="5">Harapan</th>
                        <th rowspan="2">Total Responden</th>
                    </tr>
                    <tr>
                        <th>Tidak Puas P</th>
                        <th>Kurang Puas P</th>
                        <th>Cukup Puas P</th>
                        <th>Puas P</th>
                        <th>Sangat Puas P</th>
                        <th>Tidak Puas H</th>
                        <th>Kurang Puas H</th>
                        <th>Cukup Puas H</th>
                        <th>Puas H</th>
                        <th>Sangat Puas H</th>
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
                        {{-- <td></td> --}}
                        <td>{{$a->before_result->tpp}}</td>
                        <td>{{$a->before_result->kpp}}</td>
                        <td>{{$a->before_result->cpp}}</td>
                        <td>{{$a->before_result->pp}}</td>
                        <td>{{$a->before_result->spp}}</td>


                        <td>{{$a->before_result->tp}}</td>
                        <td>{{$a->before_result->kp}}</td>
                        <td>{{$a->before_result->cp}}</td>
                        <td>{{$a->before_result->p}}</td>
                        <td>{{$a->before_result->sp}}</td>
                        
                        <td>
                            {{$a->before_result->tpp + $a->before_result->kpp + $a->before_result->cpp + $a->before_result->pp + $a->before_result->spp}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection