@extends("layout.main")
@section("content")
    <div class="col-sm-8">
        <div class="blog-class">
            <p><a style="font-size:18px; line-height:22px; height:22px;" href="/posts/{{$post->id}}"
                  target="_blank"><b>{{$post['title']}}</b></a>
                <a title="编辑文章" href="/posts/{{$post->id}}/edit" target="_self"><i class="glyphicon glyphicon-edit"></i></a>
                <a title="删除文章" href="/posts/{{$post->id}}/delete"><i class="glyphicon glyphicon-trash"></i></a>
            </p>
            <p class=""><a href="#"
                           title="http://carbon.nesbot.com/docs/#api-isset">{{$post->created_at->toFormattedDateString()}}</a><span>：</span>
                <a href="/posts">{{$post->user_id}}</a>
            </p>
            <div class="">
                {!!$post->content!!}
                {{--                <p title="{{$post->content}}">{{$post->content}}</p>--}}
            </div>
        </div>

    </div>
@endsection