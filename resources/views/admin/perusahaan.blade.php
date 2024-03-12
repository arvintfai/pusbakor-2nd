@extends('layouts/master')
@section('tittle')
    Daftar Perusahaan
@endsection
@section('content')
        @section('table-content')
            @include('layouts.table_content')
        @endsection
        @include('layouts.tabel')
@endsection