@php

$navigations = frontend_navigation('desktop');
//$currentBrothersAndChildNavigation = frontend_current_brother_and_child_navigation('desktop');

$currentChildNavigations = frontend_current_child_navigation('desktop');
@endphp

<div class="fly-header  navbar navbar-dark bg-dark">
    <div class="layui-container">
        <a class="fly-logo" href="/"><img src="{{ asset('vendor/laracms/images/logo1.png')}}"style="width:50px" alt="模具云"></a>

        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item"><a class="box-two-two" href="/">首页</a></li>
            <li class="layui-nav-item" ><a class="box-two-two" target="_blank" href="http://47.103.39.1">商城</a></li>
            <li class="layui-nav-item"><a class="box-two-two" target="_blank" href="http://www.tzmc.com/home.asp">官网</a></li>
               <div class="fly-column-right c-search">
                <form class="form-inline" action="/search" >
                    <input autocomplete="off" type="text" class="form-control" name="query" placeholder="搜索">
                    <button type="submit" class="layui-icon"></i></button>
                </form>
            </div>

               
        </ul>

   
    </div>
    <div class="xiala" id="xiala" type="button" value="" ">
        <div class="shu"></div>
        <div class="yuan"></div>
    </div>
</div>




