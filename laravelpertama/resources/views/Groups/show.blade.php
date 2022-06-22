@extends('layouts.app')

@section('title', 'Coba')

@section('content')
<a class="btn btn-outline-dark" href="/" role="button">Back</a>
    <div class="card my-4" style="width: 20rem;">
        <div class="card-body my-2">
        <h5 class="my-2"> Name : {{ $group['name'] }} </h5>
        <h5 class="my-2"> Description : {{ $group['description'] }} </h5>
        </div>
    </div>
    
@endsection


