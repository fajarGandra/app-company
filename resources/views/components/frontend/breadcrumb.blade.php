    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h1>{{ $title }}</h1>
            <ol>
                @foreach ($breadcrumb as $page)
                <li class="breadcrumb-item {{ $is_active($page['route']) }}">
                    @if ($page['route'] == '')
                        {{ $page['name'] }}
                    @else
                        @if(isset($page['params']))
                            <a href="{{ route($page['route'], $page['params']) }}">{{ $page['name'] }}</a>
                        @else
                            <a href="{{ route($page['route']) }}"><i class="ti-home"></i> {{ $page['name'] }}</a>
                        @endif
                    @endif
                @endforeach
                </li>
            </ol>
          </div>
  
        </div>
      </div><!-- End Breadcrumbs -->