@if(isset($show))
  @can($show['gate'])
    <a href="{{ $show['url'] }}" class="btn btn-link">
      @if(isset($show['icon']) && $show['icon'])
        <i class="text-muted {{ $show['icon'] ?? null }}"></i>
      @else 
        <i class="far text-muted fa-eye"></i>
      @endif
      {!! $show['title'] ?? null !!}
    </a>
  @endcan
@endif

@if(isset($edit))
  @can($edit['gate'])
    <a href="{{ $edit['url'] }}" class="btn btn-link text-muted">
      @if(isset($edit['icon']) && $edit['icon'])
        <i class="text-muted {{ $edit['icon'] ?? null }}"></i>
      @else 
        <i class="far text-muted fa-edit"></i>
      @endif
      {!! $edit['title'] ?? null !!}
    </a>
  @endcan
@endif

@if(isset($destroy))
  @can($destroy['gate'])
    <a href="{{ $destroy['url'] }}" class="btn btn-link" data-toggle="modal" data-target="#action-{{ Str::slug($destroy['url']) }}">
      @if(isset($destroy['icon']) && $destroy['icon'])
        <i class="text-muted {{ $destroy['icon'] ?? null }}"></i>
      @else 
        <i class="far text-muted fa-trash-alt"></i>
      @endif
      {!! $destroy['title'] ?? null !!}
    </a>

    <div class="modal fade" id="action-{{ Str::slug($destroy['url']) }}" tabindex="-1" role="dialog" aria-labelledby="action-{{ Str::slug($destroy['url']) }}Label" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <form action="{{ $destroy['url'] }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-header border-0">
              <h5 class="modal-title" id="action-{{ Str::slug($destroy['url']) }}Label">Confirmation!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Do you want to delete this item?
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">NO</button>
              <button type="submit" class="btn btn-sm btn-danger">YES</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endcan
@endif