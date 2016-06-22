<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      @if (!is_null($orderByField) && !is_null($orderByType) && !is_null($selectedOrderOption))
            {!! $selectedOrderOption !!}
      @else
            {!! config('project.orderby.products_list_dropdown.default.option') !!}
      @endif
      &nbsp;<i class="fa fa-angle-down"></i>
  </button>
  <ul class="dropdown-menu text-success">
      @foreach (config('project.orderby.products_list_dropdown.data') as $groupName => $group)
        @foreach ($group as $sortType => $element)
            <li><a href="{{ url()->current() }}?orderby[{{ $groupName }}]={{ $sortType }}">{!! $element['option'] !!}</a></li>
        @endforeach
        <li role="separator" class="divider"></li>
      @endforeach
  </ul>
</div>