@extends('frontend.layouts.master')

@section('navigation')
    @include('partials.navigation')
@endsection

@section('content')
    <div class="col-lg-8 px-md-5 py-5">
        @if(session()->has('add_comment'))
            <div class="alert alert-success">
                <div>{{ session('add_comment') }}</div>
            </div>
        @endif
        <div class="row pt-md-4">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>
                <img src="{{ $post->photo->path }}" alt="" class="img-fluid">
            </p>
            <p>{{ $post->description }}</p>

            <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">Life</a>
                    <a href="#" class="tag-cloud-link">Sport</a>
                    <a href="#" class="tag-cloud-link">Tech</a>
                    <a href="#" class="tag-cloud-link">Travel</a>
                </div>
            </div>
            <div class="about-author d-flex p-4 bg-light">
                <div class="bio mr-5">
                    <img src="{{$photo->path}}" alt="Image placeholder" class="img-fluid mb-4">
                </div>
                <div class="desc">
                    <h3>{{$post->user->name}}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>
            <div class="pt-5 mt-5">
                <h3 class="mb-5 font-weight-bold">6 Comments</h3>
                <ul class="comment-list">
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>
                    </li>
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>
                        <ul class="children">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>
                    </li>
                </ul>

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">نظر خود را ثبت کنید</h3>

                    {!! Form::open(['method' => 'POST' , 'route' => ['frontend.comments.store' , $post->id]]) !!}
                    <div class="form-group">
                        <label class="control-label" for="status">توضیحات نظر</label>
                        {!! Form::textarea('description' , null , ['class'=>'form-control']) !!}
                        @error('description') <span class="text-danger"> {{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::submit('ثبت' , ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar' , ['categories'=>$categories , 'recent_posts'=>$recent_posts])
@endsection
