<div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">{{$title ?? ''}}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
            @if(isset($breadcrumb))
                @foreach($breadcrumb as $bread)
                    <li class="breadcrumb-item @if($loop->last) active @endif" @if($loop->last) aria-current="page" @endif>
                        @if($loop->last)
                          <span>{{$bread['title']}} </span>
                        @else
                         <a href="{{route(''.$bread['route'].'')}}">{{$bread['title']}}</a>
                        @endif
                    </li>
                @endforeach
            @endif
         </ol>
    </nav>
</div>