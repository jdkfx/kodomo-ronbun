@extends('layouts.app')
@section('content')
    <h3 class="text-center">404 Not Found</h3>
    <p class="text-center">{!! $exception->getMessage() !!}</p>
@endsection
