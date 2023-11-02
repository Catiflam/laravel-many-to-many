@extends('layouts.guest')

@section('content')
  <section class="container mt-5">
    <div class="row g-3">
      <div class="col-12">
        <div class="card h-100">
          <div class="card-header">{{ $project->title }}</div>
          <div class="card-body">
            {{ $project->content }}

          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('guest.projects.detail', $project->slug) }}"> vedi</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
