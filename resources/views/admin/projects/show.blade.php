@extends('layouts.back')

@section('content')

<div class="container">
    <div class="row">
        <div class="col my-3 p-4 border">
            <img src="{{ $project->cover_img }}" class="img-fluid" alt="{{ $project->title }}">
            <h2>{{ $project->title }}</h2>
            <h6>Slug: {{ $project->slug }}</h6>
            <h4>Tipologia: {{ $project->type?$project->type->name:'Nessuna tipologia' }}</h4>
            <h4>Creato il: {{ $project->date }}</h4>
            <p>{{ $project->content }}</p>
        </div>
    </div>
</div>
@endsection