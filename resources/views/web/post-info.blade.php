@extends('web.layout')

@section('content')
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>{{$post->title}}</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="{{url('/')}}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="{{route('blog')}}">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">{{$post->title}}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{$post->title}}</a></h3>
                    </div>
                    <img src="{{ my_asset('post_images/'.$post->image ) }}" alt="{{$post->title}}" />
                  </div>
                  <p>
                  {!!  $post->message !!}
                  </p>
                  
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{date('D, M d y',strtotime($post->created_at))}}</a></li>
                      <li><i class="icon-user"></i><a href="javascript:void(0)"> Admin</a></li>
                      <li><i class="icon-folder-open"></i><a href="javascript:void(0)">{{$post->category}}</a></li>
                      <li><i class="icon-comments"></i><a href="javascript:void(0)"><span class="comment-count">{{ $post->comments->count() }}</span> Comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
        
            <div class="comment-area">
              <h4><span class="comment-count">{{ $post->comments->count() }}</span> Comments</h4>
                <div id="comment-list">
                  @foreach($comments as $comment)
                    @if(!empty($comment->user_id))
                      @php($name = App\User::find($comment->user_id)->name)
                    @else
                      @php( $name = $comment->name)
                    @endif
                  <div class="media">
                    <a href="#" class="thumbnail pull-left"><img src="{{ my_asset('web/img/avatar.png') }}" alt="" /></a>
                    <div class="media-body">
                      <div class="media-content">
                        <h6><span>{{date('D, M d Y',strtotime($comment->created_at))}}</span> {{$name}}</h6>
                        <p>
                          {{$comment->message}}
                        </p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              <h4>Leave your comment</h4>
              <form id="commentform" action="{{route('comment')}}" method="post" >{{csrf_field()}}
                <div class="row">
                  <input type="hidden" name="post_id" required value="{{$post->id}}">
                  @guest
                  <div class="span8">
                    <input type="text" name="name" class="input-block-level" required placeholder="* Enter your full name" />
                  </div>
                  @else
                  <input type="hidden" name="user_id" required value="{{Auth::user()->id}}">
                  @endguest
                  <div class="span8 margintop10">
                    <p>
                      <textarea rows="8" name="message" class="input-block-level" required placeholder="*Your comment here"></textarea>
                    </p>
                    <p>
                      <button class="btn btn-theme margintop10" id="commentbtn" type="submit">Submit comment</button>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                  <h5 class="widgetheading">Related posts</h5>
                  <ul class="recent">
                    @foreach($relates as $relate)
                    <li>
                      <img src="{{ my_asset('post_images/'.$relate->image ) }}" class="pull-left" alt="{{$relate->title}}" />

                      <h6><a href="{{ route('blogpost',['id'=> $relate->id,'slug' => $relate->slug]) }}">{{$relate->title}}</a></h6>
                     
                    </li>
                    @endforeach
                  </ul>
                </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
    @stop