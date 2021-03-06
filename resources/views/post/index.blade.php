@extends("layout.main")
@section("content")
    <div class="col-sm-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="http://www.bz55.com/uploads/allimg/140619/1-140619152320-50.jpg" alt="...">
                    <div class="carousel-caption">
                        美女1号
                    </div>
                </div>
                <div class="item">
                    <img src="http://www.bz55.com/uploads/allimg/140619/1-140619152320-50.jpg" alt="...">
                    <div class="carousel-caption">
                        美女2号
                    </div>
                </div>
                <div class="item">
                    <img src="http://www.bz55.com/uploads/allimg/140619/1-140619152320-50.jpg" alt="...">
                    <div class="carousel-caption">
                        美女4号
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        {{--文章主体--}}
        <div>
            @foreach($posts as $post)
                <div class="blog-class">
                    <p><a style="font-size:18px; line-height:22px; height:22px;" href="/posts/{{$post->id}}"
                          target="_blank"><b>{{$post['title']}}</b></a></p>
                    <p class=""><a href="#"
                                   title="http://carbon.nesbot.com/docs/#api-isset">{{$post->created_at->toFormattedDateString()}}</a><span>：</span>
                        <a href="/posts">{{$post->user_id}}</a>
                    </p>
                    <div class="">
                        {!! str_limit($post->content,200,'...') !!}
{{--                        <p title="{{$post->content}}">{{str_limit($post->content,200,'...')}}</p>--}}
                    </div>
                </div>
            @endforeach

            {{--分页--}}
            {{$posts->links()}}
            {{--<nav aria-label="Page navigation">--}}
            {{--<ul class="pagination">--}}
            {{--<li>--}}
            {{--<a href="#" aria-label="Previous">--}}
            {{--<span aria-hidden="true">&laquo;</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li><a href="#">1</a></li>--}}
            {{--<li><a href="#">2</a></li>--}}
            {{--<li><a href="#">3</a></li>--}}
            {{--<li><a href="#">4</a></li>--}}
            {{--<li><a href="#">5</a></li>--}}
            {{--<li>--}}
            {{--<a href="#" aria-label="Next">--}}
            {{--<span aria-hidden="true">&raquo;</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</nav>--}}


        </div>
    </div>
@endsection