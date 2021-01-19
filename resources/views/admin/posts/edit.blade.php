@extends('admin.layout.app')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    @if(empty($post->id))
                    <h4>New Post</h4>
                    @else
                    <h4>Edit Post</h4>
                    @endif
                  </div>
                <form action="{{ route('savepost') }}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                  <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input class="form-control" type="text" name="title" value="{{ old('title') ?? $post->title }}" required autofocus>
                                @error('title')
                                    <span class="error-form" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Category</label>
                                <select type="text" class="form-control" name="category" required>
                                    @foreach($post_cats as $cat)
                                        <option value="{{$cat}}" {{$post->category == $cat ? 'selected' : ''}}> {{$cat}} </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="error-form" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Post Status</label>
                                        <select type="text" class="form-control" name="status" required>
                                                <option value="1" {{$post->status == '1' ? 'selected' : ''}}> Active </option>
                                                <option value="0" {{$post->status == '0' ? 'selected' : ''}}> Inactive </option>
                                        </select>
                                        @error('status')
                                            <span class="error-form" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Post Image</label>
                                       <input type="file" name="image" id="image"  class="form-control">
                                       @error('image')
                                            <span class="error-form" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            

                        
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Post Story</label>
                            <textarea name="message" id="mytextarea" class="form-control" cols="30" rows="8" required>{{ old('message') ?? $post->message }}</textarea>
                            @error('message')
                                <span class="error-form" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">SEO keywords</label>
                            <input class="form-control" type="text" name="seo_keywords" value="{{ old('seo_keywords') ?? $post->seo_keywords }}" required autofocus>
                            @error('seo_keywords')
                                <span class="error-form" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-7">
                            <label for="">SEO description</label>
                            <input class="form-control" type="text" name="seo_description" value="{{ old('seo_description') ?? $post->seo_description }}" required autofocus>
                            @error('seo_description')
                                <span class="error-form" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary offset-md-11 mt-3">Submit</button>
                    </div>
                </form>
            </div>
    </div>
 </section>
</div>
@stop