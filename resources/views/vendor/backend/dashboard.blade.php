@extends('backend::layouts.app')


@section('title',$title = '控制台')

@section('breadcrumb')
    <li class="active">仪表盘</li>
@endsection

@section('content')

    @php
        $type = request('type', 'article');
    @endphp

    <div class="row">
      <a href="{{ route('articles.create') }}?type={{$type}}"> 
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-primary" style="background-color: #5d9cec;">
                <div class="info-box-icon">
                    <i class="icon icon-file-text"></i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">内容添加</h4>
                </div>
            </div>
        </div>
     </a>  
     <a href="administrator/users">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-danger" style="background-color: #967adc;">
                <div class="info-box-icon">
                    <i class="icon icon-user"></i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">用户管理</h4>
                    
                </div>
            </div>
        </div>
    </a>
    <a href="administrator/slides/1/manage">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-warning" style="background-color: #aab2bd;">
                <div class="info-box-icon">
                    <i class="icon icon-bars"></i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">幻灯片管理</h4>
                </div>
            </div>
        </div>
    </a>
    <a href="administrator/site/company">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-primary" style="background-color: #a0d468;">
                <div class="info-box-icon">
                    <i class="icon  icon-home"></i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">添加公司信息</h4>
                    
                </div>
            </div>
        </div>
    </a>
    <a href="administrator/categorys/create/article/0">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-danger"  style="background-color: #ffce54;">
                <div class="info-box-icon">
                   <i class = "icon  icon-pencil"> </i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">添加分类</h4>
                    
                </div>
            </div>
        </div>
    </a>
    <a href="administrator/pages/create">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-danger" style="background-color: #fc6e51;">
                <div class="info-box-icon">
                   <i class = "icon icon-file"> </i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">添加页面</h4>
                    
                </div>
            </div>
        </div>
    </a>
    <a href="administrator/blocks">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-danger" style="background-color: #4fc1e9;">
                <div class="info-box-icon">
                   <i class = "icon  icon-list"> </i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">区块列表</h4>
                    
                </div>
            </div>
        </div>
    </a>

    <a href="administrator/navigations/desktop">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-success" style="background-color: #ed5565;">
                <div class="info-box-icon">
                   <i class = "icon  icon-tasks"> </i>
                </div>
                <div class="info-box-content" style="padding-top:25px;">
                    <h4 class="info-box-text">栏目导航</h4>
                    
                </div>
            </div>
        </div>
    </a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">产品信息</div>
                </div>
                <div class="panel-body">
                    <table class="table table-info">
                        <tr>
                            <td width="100">产品名称</td>
                            <td><a target="_blank" href="https://47.103.39.1">模具云</a></td>
                        </tr>
                        <tr>
                            <td>核心框架</td>
                            <td>Laravel / {{ app()->version() }}</td>
                        </tr>
                        <tr>
                            <td>开发作者</td>
                            <td><a target="_blank" href="https://47.103.39.1">王炸團隊</a></td>
                        </tr>

                        <tr>
                            <td>系统时区</td>
                            <td>{{ config('app.timezone') }}</td>
                        </tr>
                        <tr>
                            <td>语言环境</td>
                            <td>{{ config('app.locale') }}</td>
                        </tr>
                        <tr>
                            <td>系统模式</td>
                            <td>{{ config('app.env') }}</td>
                        </tr>
                        <tr>
                            <td>系统URL</td>
                            <td>{{ config('app.url') }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">服务器信息</div>
                </div>
                <div class="panel-body">
                    <table class="table table-info">
                        <tr>
                            <td width="100">操作系统</td>
                            <td>{{ php_uname() }}</td>
                        </tr>
                        <tr>
                            <td>运行环境</td>
                            <td>{{ array_get($_SERVER, 'SERVER_SOFTWARE') }}</td>
                        </tr>
                        <tr>
                            <td>PHP版本</td>
                            <td>PHP / {{PHP_VERSION}}</td>
                        </tr>
                        <tr>
                            <td>缓存驱动</td>
                            <td>{{ config('cache.default') }}</td>
                        </tr>
                        <tr>
                            <td>会话驱动</td>
                            <td>{{ config('session.driver') }}</td>
                        </tr>
                        <tr>
                            <td>队列驱动</td>
                            <td>{{ config('queue.default') }}</td>
                        </tr>
                        <tr>
                            <td>文件系统</td>
                            <td>{{ config('filesystems.default') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

@endsection
