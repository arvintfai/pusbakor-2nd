@extends('layouts/master')
@section('tittle')
Skala Usaha
@endsection
@section('content')
        @section('table-content')
            @include('layouts.table_content')
        @endsection
        @include('layouts.tabel')
@endsection