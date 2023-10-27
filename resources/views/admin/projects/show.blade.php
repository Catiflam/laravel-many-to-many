@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content-header')
  <h1 class="my-3">{{ $project->title }}</h1>

  <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
    <i class="fa-solid fa-arrow-left me-1"></i>
    Torna alla lista
  </a>

  <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-secondary">
    <i class="fa-solid fa-pencil me-1"></i>
    Modifica
  </a>
@endsection


@section('content')
  <div class="row g-5 mt-3">
    <div class="col-4">
      <p>
        <strong>Types</strong><br>
        {!! $project->getTypeBadge() !!}
      </p>
    </div>
    <div class="col-4">
      <p>
        <strong>technology</strong><br>
        {!! $project->getTechnologyBadge() !!}
      </p>
    </div>
    <div class="col-4">
      <p>
        <strong>Slug</strong><br>
        {{ $project->slug }}
      </p>
    </div>
    <div class="col-4">
      <p>
        <strong>Created at</strong><br>
        {{ $project->created_at }}
      </p>
    </div>
    <div class="col-4">
      <p>
        <strong>Updated at</strong><br>
        {{ $project->updated_at }}
      </p>
    </div>
    <div class="col-12">
      <p>
        <strong>Content</strong><br>
        {{ $project->content }}
      </p>
    </div>
  </div>
@endsection
