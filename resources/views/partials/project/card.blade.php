@if (!empty($project))
  <div class="card h-100">
    <div class="card-header d-flex justify-content-between">{{ $project->title }} {!! $project->getTypeBadge() !!}</div>
    <div class="card-body">
      {{ $project->getAbstract(150) }}
    </div>

    <div class="card-footer">
      <a class="btn btn-primary" href="{{ route('guest.projects.detail', $project->slug) }}"> vedi</a>
    </div>
  </div>
@endif
