<div class="card pub_image">


    <a href="{{route('profile', [$image->user->id])}}" class="show-image">
        <div class="card-header">

            @if($image->user->image)
                <img src="{{url('user/avatar/'. $image->user->image )}}" class="imageConfig perfil">
            @endif

            <span class="cursiva">{{"@" . $image->user->nick }}</span> <span class="gris">{{$image->user->name }} {{$image->user->surname}}</span>

        </div>
    </a>

    <div class="card-body">

        <div class="image_container">
            <img src="{{route('image.file', ['filename' => $image->image_path])}}" alt="">
        </div>

        <div class="likes">

        </div>

        <div class="description">
            <div class="gris">
                {{$image->user->nick}}
                <span>{{ " | " .  \FormatTime::LongTimeFilter($image->created_at)}}</span>
            </div>
            <div class="comment">
                {{$image->description}}
            </div>
        </div>

        <div class="like">
            @php
                $user_like = false;
            @endphp

            @foreach($image->likes as $like )
                @if($like->user->id == Auth::user()->id)
                    @php
                        $user_like = true;
                    @endphp
                @endif


            @endforeach

            {{-- Verificamos si es el mismo usuario quien dio like --}}
            @if($user_like)
                <img src="{{asset('images/favorite-red.png')}}" data-id="{{$image->id}}" class="btn-dislike">
            @else
                <img src="{{asset('images/favorite-black.png')}}" data-id="{{$image->id}}" class="btn-like">
            @endif

            <span class="gris suma-like" id="cuenta" data-cuenta="{{ count($image->likes) }}">{{ count($image->likes) }}</span>

        </div>


        <div class="btn-comment">
            <a href="{{ route('image.detail', ['id' => $image->id])}}" class="btn btn-warning">
                Comentario({{count($image->comments)}})
            </a>
        </div>

    </div>

</div>
