<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            @foreach ($breadcrumb as $page)
            <li class="breadcrumb-item  {{ $is_active($page['route']) }}">
                @if ($page['route'] == '')
                {{ $page['name'] }}
                @else
                    @if(isset($page['params']))
                        <a href="{{ route($page['route'], $page['params']) }}">{{ $page['name'] }}</a>
                    @else
                        <a href="{{ route($page['route']) }}"><i class="ti-home"></i> {{ $page['name'] }}</a>
                    @endif
                @endif
            </li>
            @endforeach
        </ol>
    </nav>
</div><!-- End Page Title -->