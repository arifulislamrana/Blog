@extends('_index')



@section('content')

<div style="margin-top: 10px" class="about">
    <div class="container_width">
       <div class="row d_flex">
              <div class="col-md-7">
             <div class="titlepage text_align_left">
                <h2>{{ $post->title }}</h2><br>

                @foreach ($post->tags as $tag)
                <a href="{{ Route('findPostsByTag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                @endforeach

                {!! $post->body !!}
             </div>
          </div>
          <div class="col-md-5">
             <div class="about_img text_align_center">
                <figure><img src="/uploads/{{$post->image}}" alt="#"/></figure>
             </div>
          </div>
         Author : {{ $post->user->name }}
       </div>
    </div>
 </div>

 <div class="cevery_bg" style="background-color: rgb(248, 141, 141)">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3>Comments</h3>
            @foreach ($post->comments as $comment)
                <p><i class="fas fa-user-circle"></i>  {{ $comment->body }}</p><br>
            @endforeach
            <br>
            <form action="{{ Route('postComment',['postId' => $post->id]) }}" id="colof" class="form_subscri" method="POST">
               @csrf
               <input class="newsl" placeholder="Comment please" type="text" name="comment">
               <button class="subsci_btn">Comment now</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection