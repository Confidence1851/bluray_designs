@extends('web.layout')

@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Our Blog</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span8">
                    @foreach ($posts as $post)
                            <article>
                                <div class="row">
                                    <div class="span8">
                                        <div class="post-image">
                                            <div class="post-heading">
                                                <h3><a href="javascript:void(0)">{{ $post->title }}</a></h3>
                                            </div>
                                            <img src="{{ asset('public/post_images/' . $post->image) }}" alt="" />
                                        </div>
                                        <p>
                                        </p>
                                        <div class="bottom-article">
                                            <ul class="meta-post">
                                                <li><i class="icon-calendar"></i><a href="#">
                                                        {{ date('D, M d Y', strtotime($post->created_at)) }}</a></li>
                                                <li><i class="icon-user"></i><a href="javascript:void(0)"> Admin</a></li>
                                                <li><i class="icon-folder-open"></i><a
                                                        href="javascript:void(0)">{{ $post->category }}</a></li>
                                                <li><i class="icon-comments"></i><a href="javascript:void(0)">{{ $post->comments->count() }}
                                                        Comments</a></li>
                                            </ul>
                                            <a href="{{ route('blogpost', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                                class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        <div id="pagination">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <div class="span4">
                        <aside class="right-sidebar">
                            <div class="widget">
                                <form class="form-search">
                                    <input placeholder="Type something" type="text" class="input-medium search-query">
                                    <button type="submit" class="btn btn-square btn-theme">Search</button>
                                </form>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Categories</h5>
                                <ul class="cat">
                                    @foreach ($post_cats as $cat)
                                        @php($count = App\Post::where('category', $cat)->where("status" , 1)->count())
                                            <li><i class="icon-angle-right"></i><a href="#">{{ $cat }}</a><span>
                                                    ({{ $count }})</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="widget">
                                    <h5 class="widgetheading">Latest posts</h5>
                                    <ul class="recent">
                                        @foreach ($latests as $latest)
                                            <li>
                                                <img src="{{ asset('public/post_images/' . $latest->image) }}" class="pull-left"
                                                    alt="{{ $latest->title }}" />

                                                <h6><a
                                                        href="{{ route('blogpost', ['id' => $latest->id, 'slug' => $latest->slug]) }}">{{ $latest->title }}</a>
                                                </h6>

                                                <!-- <p>
                                  Mazim alienum appellantur eu cu ullum officiis pro pri
                                </p> -->
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
