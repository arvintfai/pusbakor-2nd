@extends('layouts/master')
@section('tittle')
    Kecamatan
@endsection
@section('content')
        @section('table-content')
            @include('layouts.table_content')
        @endsection
        @include('layouts.tabel')
@endsection