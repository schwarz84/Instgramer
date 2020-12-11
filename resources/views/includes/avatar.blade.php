

@if(Auth::user()->image)
     <img src="{{url('user/avatar/'. Auth::user()->image)}}" class="imageConfig">
@endif


{{-- @if(Auth::user()->image)
<img src="{{url('user/avatar/'. Auth::user()->image) /*Packer::img(route('user.avatar', ['filename'=>Auth::user()->image]), 'resize,100')}}" */}}" class="imageConfig">
@endif --}}