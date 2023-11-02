@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content-header')
  <h1 class="my-3">Lista projects cestinati</h1>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-success">
    <i class="fa-solid fa-arrow-left"></i>
    Torna alla lista
  </a>
@endsection

@section('content')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Type</th>
        <th scope="col">Technology</th>
        <th scope="col">Slug</th>
        <th scope="col">Deleted at</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @forelse($projects as $project)
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td>{{ $project->title }}</td>
          <td>{!! $project->getTypeBadge() !!}</td>
          <td>{!! $project->getTechnologyBadge() !!}</td>
          <td>{{ $project->slug }}</td>
          <td>{{ $project->deleted_at }}</td>
          <td>

            <a href="#" class="d-inline-block mx-1 text-succ" data-bs-toggle="modal"
            data-bs-target="#restore-project-modal-{{ $project->id }}">
            <i class="fa-solid fa-arrow-turn-up fa-rotate-270"></i>
          </a>

            <a href="#" class="d-inline-block mx-1 text-danger" data-bs-toggle="modal"
              data-bs-target="#delete-project-modal-{{ $project->id }}">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6"><i>Non ci sono projects</i></td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $projects->links('pagination::bootstrap-5') }}
@endsection

@section('modals')
  @foreach ($projects as $project)
    <div class="modal fade" id="delete-project-modal-{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma eliminazione</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Sei sicuro di voler eliminare <strong>definitivamente</strong>  "{{ $project->title }}"?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

            <form method="POST" action="{{ route('admin.projects.trash.force-delete', $project) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger">Elimina</button>
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="restore-project-modal-{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma ripristino</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Sei sicuro di voler ripristinare il Project  "{{ $project->title }}"?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

            <form method="POST" action="{{ route('admin.projects.trash.restore', $project) }}">
              @method('PATCH')
              @csrf
              <button class="btn btn-success">Ripristina</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
