<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        @php 
            $total = count($data);
        @endphp
        @if(!empty($data))
            @foreach($data as $k=>$v)
                @php $i = $k+1; @endphp
                <li class="breadcrumb-item '. {{ $i == $total ? 'active' : '' }} .'">
                    @if(isset($v['url']))
                        <a href="{{ $v['url'] }}">{{ $v['title'] }}</a>
                    @else
                    {{ $v['title'] }}
                    @endif
                </li>
            @endforeach
        @endif
    </ol>
</nav>