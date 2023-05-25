@extends('layouts.back')

@section('content')
    <h3>Crea un nuovo progetto</h3>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Seleziona tipologia</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option @selected(old('type_id')=='') value="">Nessuna tipologia</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id')==$type->id) value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_img" class="form-label">URL dell'immagine di copertina</label>
            <input type="text" class="form-control @error('cover_img') is-invalid @enderror" id="cover_img" name="cover_img">
            @error('cover_img')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data di creazione</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
            @error('date')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Descizione</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content"></textarea>
            @error('content')
                <div class='invalid-feedback'>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for=""></label>
            @foreach ($technologies as $technology)   
                <input id="technology_{{ $technology->id }}" type="checkbox" name="technology[]"  value="{{ $technology->id }}">
                <label for="technology_{{ $technology->id }}" class="form-label">{{ $technology->name }}</label>
                <br>
            @endforeach
        </div>

        <button class="btn btn-primary" type="submit">Crea nuovo progetto</button>
    </form>

@endsection