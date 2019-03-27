@extends('frontend::layouts.app')

@section('title', $title = $article->title )
@section('description', empty($article->description) ? $article->description : config('system.common.basic.description','') )
@section('keywords', empty($article->keywords) ? $article->keywords : config('system.common.basic.keywords','') )

@section('breadcrumb')
    <a><cite>{{$title}}</cite></a>
@endsection

@section('content')

<div class="article-content">

    <div class="layui-container">


          <div class="layui-row layui-col-space15">
            <div class="layui-col-md12 content detail">
                    @php

                    $navigations = frontend_navigation('desktop');
                    //$currentBrothersAndChildNavigation = frontend_current_brother_and_child_navigation('desktop');

                    $currentChildNavigations = frontend_current_child_navigation('desktop');
                    @endphp
                    <div class="" id="crumbs">
                        @if($breadcrumb ?? true)

                            <div class="fly-panel fly-column">
                                <div class="layui-container">
                                    @include('frontend::layouts._breadcrumb')
                                 </div>
                            </div>
                            @endif
                    </div>

                <div class="fly-panel detail-box">
                    <h1>{{$article->title}}</h1>
                    <div class="fly-detail-info">
                        <div class="article-icon">
                            <span class="layui-badge new-bg-blue fly-detail-column">{{$article->author}}</span>
                            <span class="layui-badge" style="background-color: #999;">{{ $article->created_at->toDateString()}}</span>
                        </div>

                        <div class="fly-admin-box" data-id="22739"> </div>
                        <span class="fly-list-nums">
                            <i class="iconfont" title="浏览"></i> {{$article->views}}
                        </span>
                    </div>
                    @if($article->description)
                    <div class="detail-about">
                        {{ $article->description }}
                    </div>
                    @endif
                    <div class="detail-body layui-text photos">
                        {!! $article->content !!}
                    </div>
                </div>

                <!--- ///////////////////////////////////////////////////// -->
                {{-- <div class="fly-panel detail-box" id="flyReply">
                    <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
                        <legend>回复</legend>
                    </fieldset>
                    @include('frontend::article._reply_list', ['replies' => $article->replies()->with('user')->get()])
                    @includeWhen(Auth::check(),'frontend::article._reply_box', ['article' => $article])
                    <form id="delete-reply-form" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div> --}}
            </div>

            {{-- <div class="layui-col-md4">
                @include('frontend::layouts._side')
            </div> --}}

        </div>
    </div>
    {{-- @php
    $currentBrothersAndChildNavigation = frontend_current_brother_and_child_navigation('desktop',true);
    @endphp
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
        </div> --}}
</div>
@endsection

@section('scripts')
<script>
    $(".form-reply-delete").click(function(){

    var tUrl = $(this).attr('data-url');

    layer.confirm('确认删除吗？', {
    btn: ['确认', '取消']
    }, function(index){
    $("#delete-reply-form").attr("action",tUrl).submit();
        console.log(tUrl);
        layer.close(index);
    return false;
    }, function(index){
        layer.close(index);
    return true;
    });

    return false;
    });




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
                width: "130px",
                //fontSize: "16px",
            },100,'swing')
          }).mouseleave(function () {
            $(this).not(".edge-classify-this").stop().animate({
                width: "0px",
                //fontSize: "0px",
            },100)
            })
</script>
@endsection
