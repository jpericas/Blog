<div class="col mb-2">
    <div class="card" >
        @if ($post->image)
            <img class="card-img-top" src="/images/{{$post->image->image}}" alt="Card image cap">
        @endif
        <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <h5 class="card-title">{{ $post->category->title}}</h5>
        <p class="card-text">{!! $post->content  !!}</p>
        </div>
        <div class="card-footer">
            <a href="{{route('posts.show' , $post->id )}}" class="btn btn-primary  btn-sm">Veure</a>
            <a href="{{route('posts.edit' , $post->id )}}" class="btn btn-primary btn-sm">Editar</a>        
            <form action="{{route('posts.destroy' , $post->id)}}" method="POST" class="float-right" >
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
            </form>                
        </div>      
    </div>
</div>