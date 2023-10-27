@extends('layouts.guest')

@section('content')
  <section class="container mt-5">
    <h1>{{ $title }}</h1>

    <div class="row g-3">

      @forelse($projects as $project)
        <div class="col-4">
          @include('partials.project.card')
        </div>
      @empty
        <div class="col-12">
          <h2>Non ci sono Featured Posts</h2>
        </div>
      @endforelse
    </div>

    <a href="{{ route('guest.projects.all') }}">Vedi tutti</a>

    {{-- {{ $projects->links('pagination::bootstrap-5') }} --}}

  </section>
  <section class="container mt-5">
    <h1>Altra sezione...</h1>



  </section>
@endsection
