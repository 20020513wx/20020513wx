
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>Bootstrap 2020年中国最大电商城--分类管理</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">微商城</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{url('/brand')}}">商品品牌</a></li>
        <li><a href="{{url('/category')}}">商品分类</a></li>
        <li><a href="{{url('/goods')}}">商品管理</a></li>
        <li class="active"><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/web')}}">友情链接</a></li>
        <li><a href="{{url('/end')}}">注销登录</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h2>商品添加<a style="float:right;" href="{{url('/admin')}}" class="btn btn-success">列表</a></hr></h2><hr/></center>

<form action="{{url('/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
<!-- {{csrf_field()}}
<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="admin_name" id="firstname" 
           placeholder="请输入管理员名称">
           {{$errors->first('admin_name')}}
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">管理员电话</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="admin_tel" id="firstname" 
           placeholder="请输入管理员电话">
           {{$errors->first('admin_tel')}}
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="admin_email" id="firstname" 
           placeholder="请输入管理员邮箱">
           {{$errors->first('admin_email')}}
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">管理员密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="admin_pwd" id="firstname" 
           placeholder="请输入管理员密码">
           {{$errors->first('admin_pwd')}}
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>

</body>
</html>
