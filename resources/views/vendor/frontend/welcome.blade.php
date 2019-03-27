@extends('frontend::layouts.app')

@section('title', $title = '首页' )
@section('description', config('system.common.basic.description',''))
@section('keywords', config('system.common.basic.index_keywords',''))

@section('breadcrumb')
@endsection

@section('content')
    {{-- <a class="dv">
        11
    </a> --}}

    <div class="layui-container">



        <div class="fly-panel layui-row" id="roi">


                @php
                $navigations = frontend_navigation('desktop');
                //$currentBrothersAndChildNavigation = frontend_current_brother_and_child_navigation('desktop');
                $currentChildNavigations = frontend_current_child_navigation('desktop');
            @endphp
            <div class="nav-box">
            <ul class="nav" lay-filter="test">
            @foreach($navigations as $navigation)
                <li class="nav-list">
                    <a target="{{ $navigation->target }}" href="javascript::">{{ $navigation->title }}</a>
                    @if($navigation->child)
                    <dl class="">
                        @foreach($navigation->child as $nav)
                            <dd>
                                <a  target="{{ $navigation->target }}" href="{{$nav->link}}">
                                    {{ $nav->title }}
                                </a>
                                <div class="nav-bar"></div>
                            </dd>
                        @endforeach
                    </dl>
                @endif
                </li>

            @endforeach
            </ul>
        </div>

                @php
                $block = get_block("2018_03_04_224524_index_slide_block");
                @endphp
                <div class="layui-carousel fly-promo" id="promo">
                    @if(isset($block->data) && $block->data)
                    <div carousel-item="">
                        @foreach($block->data as $item)
                        <div><a target="{{$item->target}}" href="{{$item->link}}"><img src="{{ storage_image_url($item->image) }}"></a></div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>


        <div class="layui-row layui-col-space15 recommend" id="">
            <div class="layui-col-md6">
                @php
                $block = get_block("2018_03_04_234810_index_enterprise_news_block");
                $category_id = get_block_params($block->content, 'category_id', 0);
                @endphp
                <div class="fly-panel focus">
                    <div class="fly-panel-title fly-filter"> <strong>{{$block->title}}</strong></div>
                    @if(isset($block->data) && $block->data)
                    <dl class="fly-panel fly-list-one">
                        @foreach($block->data as $item)
                        <dd><a href="{{$item->getLink(2,$category_id)}}">{{$item->title}}</a><span><i class="iconfont icon-liulanyanjing"></i> {{$item->views}}</span></dd>
                        @endforeach
                    </dl>
                    @endif
                    <div class="more" style="text-align: center">
                        <a href="{{$block->more_link}}" class="laypage-next">
                            {{$block->more_title}}
                            <div></div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="layui-col-md6">
                @php
                    $block = get_block("2018_03_04_235036_index_case_news_block");
                    $category_id = get_block_params($block->content, 'category_id', 0);
                @endphp
                <div class="fly-panel focus">
                    <div class="fly-panel-title fly-filter"> <strong>{{$block->title}}</strong></div>
                    @if($block->data)
                        <dl class="fly-panel fly-list-one">
                            @foreach($block->data as $item)
                                <dd><a href="{{$item->getLink(3,$category_id)}}">{{$item->title}}</a><span><i class="iconfont icon-liulanyanjing"></i> {{$item->views}}</span></dd>
                            @endforeach
                        </dl>
                    @endif
                    <div class="more" style="text-align: center">
                        <a href="{{$block->more_link}}" class="laypage-next">
                            {{$block->more_title}}
                            <div></div>
                        </a>
                    </div>
                </div>
            </div>

            {{--<div class="layui-col-md4">--}}
                {{--@include('frontend::layouts._side')--}}
            {{--</div>--}}
        </div>
        <div class="layui-row" id="ad">
                <a href="javascript::">广告条</a>
            </div>

            <div class="layui-row layui-col-space10 recommend">
                <div class="layui-col-md4">
                        @php
                        $block = get_block("2018_03_04_235036_index_case_news_block");
                        $category_id = get_block_params($block->content, 'category_id', 0);
                    @endphp
                    <div class="fly-panel focus">
                        <div class="fly-panel-title fly-filter"> <strong>{{$block->title}}</strong></div>
                        @if($block->data)
                            <dl class="fly-panel fly-list-one">
                                @foreach($block->data as $item)
                                    <dd><a href="{{$item->getLink(3,$category_id)}}">{{$item->title}}</a><span><i class="iconfont icon-liulanyanjing"></i> {{$item->views}}</span></dd>
                                @endforeach
                            </dl>
                        @endif
                        <div class="more" style="text-align: center">
                            <a href="{{$block->more_link}}" class="laypage-next">
                                {{$block->more_title}}
                                <div></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md8">
                        @php
                        $block = get_block("2018_03_04_235036_index_case_news_block");
                        $category_id = get_block_params($block->content, 'category_id', 0);
                    @endphp
                    <div class="fly-panel focus">
                        <div class="fly-panel-title fly-filter"> <strong>{{$block->title}}</strong></div>
                        @if($block->data)
                            <dl class="fly-panel fly-list-one">
                                @foreach($block->data as $item)
                                    <dd><a href="{{$item->getLink(3,$category_id)}}">{{$item->title}}</a><span><i class="iconfont icon-liulanyanjing"></i> {{$item->views}}</span></dd>
                                @endforeach
                            </dl>
                        @endif
                        <div class="more" style="text-align: center">
                            <a href="{{$block->more_link}}" class="laypage-next">
                                {{$block->more_title}}
                                <div></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection

@section('scripts')
    <script>

   
        layui.use(['carousel', 'form'], function(){
            var carousel = layui.carousel
                ,form = layui.form;

            //图片轮播
            carousel.render({
                anim:'fade'
                ,arrow:'none'
                ,elem: '#promo'
                ,width: '100%'
                ,height: '100%'
                ,interval: 5000
            });

            //事件
            carousel.on('change(test4)', function(res){
                console.log(res)
            });

            var $ = layui.$, active = {
                set: function(othis){
                    var THIS = 'layui-bg-normal'
                        ,key = othis.data('key')
                        ,options = {};

                    othis.css('background-color', '#5FB878').siblings().removeAttr('style');
                    options[key] = othis.data('value');
                    ins3.reload(options);
                }
            };

            //监听开关
            form.on('switch(autoplay)', function(){
                ins3.reload({
                    autoplay: this.checked
                });
            });

            $('.demoSet').on('keyup', function(){
                var value = this.value
                    ,options = {};
                if(!/^\d+$/.test(value)) return;

                options[this.name] = value;
                ins3.reload(options);
            });

            //其它示例
            $('.demoTest .layui-btn').on('click', function(){
                var othis = $(this), type = othis.data('type');
                active[type] ? active[type].call(this, othis) : '';
            });
        });

    </script>
    <script src="{{asset('vendor/laracms/js/jQuery.js')}}"></script>
    <script>
        var titleSum=$(".nav-list").length;
        var totalHeight=$("#roi").height();
        console.log(titleSum);
        var arr=[];
        for(var i=0;i<titleSum;i++){
            var length=$(".nav-list").eq(i).children("dl").children("dd").length;
            //console.log(tr);
            arr.push(length);
        }

        var max=Math.max.apply( Math, arr );


        var sum=titleSum+max;
        var fz1=parseInt($(".nav-list>a").css("font-size"));
        var fz2=parseInt($(".nav-list>dl>dd>a").css("font-size"));
        var navListTitle=parseInt(totalHeight/sum);
        var navListContent=parseInt(totalHeight/sum);

        $(".nav-list>a").css({"height":""+navListTitle+"px","line-height":""+navListTitle+"px"});
        $(".nav-list>dl>dd>a").css({"height":""+navListContent+"px","line-height":""+navListContent+"px"});



        //console.log($("#nav-list-title"))
        $(".nav>li").eq(0).nextAll().children("dl").addClass("height-0");
            $(".nav-list>a").click(function(){
                //console.log($(this).siblings("dl"))
                if($(this).siblings("dl").hasClass("height-0")){
                    $(this).parent().siblings().children("dl").animate({
                        height: "0px",
                    },100);
                    $(this).siblings("dl").animate({
                        height:""+$(this).siblings("dl").children("dd").height()*$(this).siblings("dl").children("dd").length+"px",
                    },100);
                    $(this).siblings("dl").removeClass("height-0");
                    $(this).parent().siblings().children("dl").addClass("height-0");
                }
                else{
                    $(this).siblings("dl").animate({
                        height: "0px",
                    },100);
                    $(this).siblings("dl").addClass("height-0");
                }
            });
        $(".nav li dl dd").mouseenter(function () {

            $(this).children("div").stop().animate({
                width:"8px",
            },150);
            // $(this).children("a").css("color","rgb(87, 255, 227)");
         }).mouseleave(function () {
            $(this).children("div").stop().animate({
                width:"0px",
            },150);
            $(this).children("a").css("color","#dee4e3");
           });
        $(".recommend .more a").mouseenter(function () {
            $(this).children("div").stop().animate({
                width:"100%",
            },200);
          }).mouseleave(function () {
            $(this).children("div").stop().animate({
                width:"0px",
            },200);
            })
        //console.log($(".layui-nav-tree li").eq(1));
        // $(".layui-nav-tree li").eq(0).addClass('layui-nav-itemed');
        // $(".layui-nav-tree li").eq(1).click(function () {
        //     if($(".layui-nav-tree li").eq(0).hasClass('layui-nav-itemed')){
        //         $(".layui-nav-tree li").eq(0).removeClass('layui-nav-itemed');
        //         $(this).addClass('layui-nav-itemed');
        //         $(".layui-nav-bar").remove();
        //     };
        //   });
        //   $(".layui-nav-tree li").eq(0).click(function () {
        //     if($(".layui-nav-tree li").eq(1).hasClass('layui-nav-itemed')){
        //         $(".layui-nav-tree li").eq(1).removeClass('layui-nav-itemed');
        //         $(this).addClass('layui-nav-itemed');
        //         $(".layui-nav-bar").remove();
        //     };
        //   });
        //$(".layui-nav-tree li").children("0").hasClass('layui-nav-itemed')
        var hasClick = false;
        xiala.onclick = function button_onclick(){
            if(hasClick==false){
                $(".fly-header").css({
                    "transform":'translateY(0)',
                    "transition": '.5s'
                })

                // document.getElementById("xiala").value="上拉导航栏";
                // document.getElementById("xiala").style.transform="translateY(-25px)";

                hasClick=true;
            }else{

                $(".fly-header").css({
                    "transform":'translateY(-61px)',
                    "transition": '.5s'
                })
                hasClick=false;
            }
        }



        $(".xiala").hover(
            function () {


                $(".shu").css({
                    "height" : "20px",
                    "transition" : ".5s"
                })
                $(".shu , .yuan").css({
                    "border" : "4px solid orange",
                    "transition" : ".5s"
                })
            },
            function () {
                $(".shu").css({
                    "height" : "0px",
                    "transition" : ".5s"
                })
                $(".shu , .yuan").css({
                    "border" : "4px solid #000",
                    "transition" : ".5s"
                })
            },
        );



        //滚轮事件
        $(window).scroll( function() {
            let y = document.documentElement.scrollTop
            if(y >= 100){
                $(".xiala").css({
                    "visibility" : "visible"
                })
                $(".fly-header").css({
                    "transform": 'translateY(-61px)',
                    "transition": '.5s'
                })

                hasClick =false;
            }else{
                $(".xiala").css({
                    "visibility" : "hidden"
                })
                $(".fly-header").css({
                    "transform":'translateY(0)',
                    "transition": '.5s'
                })
            }
        });
    </script>
@endsection
