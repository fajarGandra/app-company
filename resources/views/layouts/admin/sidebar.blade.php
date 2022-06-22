<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @php
          $actived = '';
        @endphp
        @foreach (getMenu() as $key => $value)
            @foreach ($value->childs as $val)
                @php
                    // if (Request::is($val->url)) {
                        if ($val->parent_id === $value->id && request()->is($val->url)) {
                            $actived = $value->id;
                        }
                    // }
                @endphp
            @endforeach
        @endforeach


        @foreach (getMenu() as $key => $value)
            @if ($value->parent_id == '0')
                <li class="nav-item">
                    @if($value->children != 0)
                    <a class="nav-link {{ ($actived === $value->id) ? '':'collapsed' }}" data-bs-target=".nav-{{ $value->id }}" data-bs-toggle="collapse" aria-expanded="true" href="{{ url($value->url) }}">
                        <i class="bi bi-{{ $value->icon }}"></i><span>{{ $value->text }}</span>
                        @if($value->children != 0)
                          <i class="bi bi-chevron-down ms-auto"></i>
                        @endif
                    </a>
                    @else
                    <li class="nav-item {{ ($actived === $value->id) ? '':'collapsed' }}">
                        <a class="nav-link collapsed" href="{{ url($value->url) }}">
                            <i class="bi bi-{{ $value->icon }}"></i>
                            <span>{{ $value->text }}</span>
                        </a>
                    </li><!-- End Dashboard Nav -->
                    @endif

                    @foreach ($value->childs as $val)
                        <ul class="nav-content collapse {{ ($actived === $val->parent_id ) ? 'show' : '' }} nav-{{ $val->parent_id }}" data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ url($val->url) }}" class="{{ ($actived === $val->parent_id && request()->is($val->url) ) ? 'active' : '' }}">
                                    <i class="{{ $val->icon }}"></i><span>{{ $val->text }}</span>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                </li><!-- End Components Nav -->
            @endif
        @endforeach
    </ul>

</aside><!-- End Sidebar-->