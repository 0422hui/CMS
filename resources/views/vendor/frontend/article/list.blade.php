@extends('frontend::layouts.app')

@section('title', $title = $category->name )
@section('description', config('system.common.basic.description',''))
@section('keywords', config('system.common.basic.keywords',''))

@section('breadcrumb')
    {{--<a><cite>列表</cite></a>--}}
@endsection

@section('content')
    @php
        $currentBrothersAndChildNavigation = frontend_current_brother_and_child_navigation('desktop',true);
    @endphp
    <div class="article-list">
    <div class="layui-container">
         <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="fly-panel">
                    <div class="fly-panel-title fly-filter"> <a>{{$title}}</a> </div>
                    @if($articles->count())
                    <ul class="fly-list">
                        @foreach($articles as $index => $article)
                        <li>
                            <a href="{{$article->getLink(request('navigation',0),request('articleCategory',0))}}" class="fly-avatar">
                                <img src="{{ storage_image_url($article->thumb) }}" alt="interlij">
                            </a>
                            <h2>
                                {{--<a class="layui-badge">最新</a>--}}
                                <a href="{{$article->getLink(request('navigation',0),request('articleCategory',0))}}">{{ $article->title  }}</a> </h2>
                                <p>{{ $article->description}}</p>
                            <div class="fly-list-info">
                                <a href="javascript:void(0);" link=""> <cite>{{ $article->getAuthor  }}</cite> </a>


                            </div>
                            <span class="icon">
                                <i class="iconfont" title="阅读"></i> {{$article->views}}
                            </span>
                            <span class="times">{{ $article->updated_at->toDateString()  }}</span>
                            <div class="fly-list-badge"></div>
                        </li>
                        @endforeach
                    </ul>

                    <div style="text-align: center">
                        {{ $articles->links('pagination::frontend') }}
                    </div>

                    @else
                        <div class="laypage-main">该专栏暂无信息</div>
                    @endif

                </div>

            </div>

            <div class="edge-classify">
                <div class="fly-panel">
                    <div class="fly-panel-main">
                        @if($currentBrothersAndChildNavigation)
                        @foreach($currentBrothersAndChildNavigation as $navigation)
                        <a target="{{ $navigation->target }}" href="{{$navigation->link}}" rel="nofollow" class="fly-category @if(request('navigation',0)==$navigation->id)edge-classify-this @endif">{{$navigation->title}}</a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

<script src="{{asset('vendor/laracms/js/jQuery.js')}}"></script>
<script>
    $(function (){
        let length=$(".article-list .fly-panel li").length;

        let zIndex=999;
        for(let i=0;i<length;i++){
            $(".article-list .fly-panel li").eq(i).css("zIndex",""+zIndex+"");
            zIndex--;
        }
        let length2=$(".article-list .fly-panel li").eq(0).nextAll().length;
        console.log($(".article-list .fly-panel li").eq(0).nextAll().eq(0));
        for(let i=1;i<=length2;i++){
            $(".article-list .fly-panel li").eq(0).nextAll().eq(i-1).css("transform","translate(0, -"+i*7+"px)");
        }
        // var zi=0;
        var fz=0;
        $(".article-list .fly-panel li").mouseenter(function () {
            fz=$(this).children("h2").children("a").css("font-size");
            $(this).css("zIndex","999");
            // $(this).children("h2").children("a").stop().animate({"fontSize":"25px"},300);
            // $(this).stop().animate({
            //     zIndex:"999",

            // },0);
          }).mouseleave(function () {
            //$(this).css("zIndex",zi);
            let zIndex=999;
        for(let i=0;i<length;i++){
            $(".article-list .fly-panel li").eq(i).css("zIndex",""+zIndex+"");
            zIndex--;
        }
        // $(this).children("h2").children("a").stop().animate({"fontSize":""+fz+""},300);
        fz=0;
            // $(this).stop().animate({
            //     zIndex:""+zi+"",
            // },0);
            // zi=0;
           })
        var listobjs=$(".edge-classify .fly-panel-main");
        console.log(listobjs);
        $(".edge-classify .fly-panel-main>a:odd").css("backgroundColor","pink");
        $(".edge-classify .fly-panel-main>a:even").css("backgroundColor","#ccc");

        $(".edge-classify .fly-panel .fly-panel-title").click(function () {
            if($(".edge-classify").children().children(".fly-panel-main").children("a").width()==0){
                        $(".edge-classify").children().children(".fly-panel-main").children("a").stop().animate({
                         width:"100px",
                         },100,'linear');

            }
            else{
                $(".edge-classify").children().children(".fly-panel-main").children("a").stop().animate({
                    width:"0px",
                },300,'linear')
            }

            // console.log($(this).children().children(".fly-panel-main"))

        // setTimeout(function () {
        //      var width=$(".edge-classify .fly-panel-main a").outerWidth(true);
        // console.log(width);
        //  });

        })

        $(".edge-classify .fly-panel-main a").mouseenter(function () {
            $(this).not(".edge-classify-this").stop().animate({
                width: "140px",
                //fontSize: "16px",
            },100,'swing')
          }).mouseleave(function () {
            $(this).not(".edge-classify-this").stop().animate({
                width: "0px",
                //fontSize: "0px",
            },100)
            })

        var w=$(".article-list .layui-col-md12 .fly-panel").offset().left;
        console.log(w);
        if(w<100){
            $(".article-list .layui-col-md12 .fly-panel").stop().animate({
                paddingLeft:"140px"
            },300)
        }
        $(window).resize(function () {
            var w=$(".article-list .layui-col-md12 .fly-panel").offset().left;
        if(w<100){
            $(".article-list .layui-col-md12 .fly-panel").stop().animate({
                paddingLeft:"140px"
            },300)
        }else{
            $(".article-list .layui-col-md12 .fly-panel").stop().animate({
                paddingLeft:"0px"
            },300)
        }
        })
     })
</script>
