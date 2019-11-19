@extends('layouts.front')
@section('content')
            <h1 class="display-5 text-center">Hari Ini : <br> {{date('m-d-Y')}}</h1>
            <div class="table-responsive-sm">    
                <table class="table mt-1">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no =1;
                    @endphp
                    @foreach($jadwals as $jadwal)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$jadwal->petugas->nama}}</td>
                            <td>{{$jadwal->tugas}}</td>
                            <td>{{$jadwal->lokasi->nama}}</td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection
@section('scripts')
@parent

@endsection