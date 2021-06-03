@extends('_index')



@section('content')

<div class="cases">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage text_align_center ">
                <h2>{{ $tagName }}</h2>
             </div>
          </div>
       </div>
       <div class="row d_flex">

          @foreach ($posts as $post)

          <div class=" col-md-4">
            <div class="latest text_align_center">
               <figure><img src="/uploads/{{$post->image}}" alt="#"/></figure>
                <a class="read_more" href="{{Route('blogdetails', ['id' => $post->id])}}">Read More</a>
               <div class="nostrud">
                  <h3>{{ $post->title }}</h3>

                  @foreach ($post->tags as $tag)
                  <a href="">#{{ $tag->name }}</a>
                  @endforeach

                  <br>
                  {!! $post->body !!} 
               </div>
            </div>
         </div>
              
          @endforeach


       </div>
    </div>
 </div>
 


@endsection