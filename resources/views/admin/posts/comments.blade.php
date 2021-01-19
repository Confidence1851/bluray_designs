@extends('admin.layout.app')

@section('content')


    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4>Comments for 
                        <a href="{{ route("editpost" , $post->id) }}">
                        {{ $post->title }}</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">User Name</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $comment)
                                    @if (!empty($comment->user))
                                        @php($name = $comment->user->name)
                                        @else
                                            @php($name = $comment->name)
                                            @endif
                                            <tr>
                                                <td>{{ $name }}</td>
                                                <td>{{ $comment->message }}</td>
                                                <td>{{ date('D, M d Y h:i:A', strtotime($comment->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $comments->links() }}
                        </div>
                    </div>

                </section>
            </div>
        @stop
