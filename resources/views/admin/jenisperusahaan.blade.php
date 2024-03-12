@extends('layouts/master')
@section('tittle')
    Jenis Perusahaan
@endsection
@section('content')
        @section('table-content')
            @include('layouts.table_content')
        @endsection
        @include('layouts.tabel')
@endsection