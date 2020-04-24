
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>微商城后台登陆</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>微商城后台登陆</hr></h2><hr/></center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">{{session('msg')}}</span>
<form action="{{url('/logindo')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
<!-- {{csrf_field()}}
<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">账号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="admin_name" id="firstname" 
           placeholder="请输入账号">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="admin_pwd" id="firstname" 
           placeholder="请输入密码">
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">记住密码七天</label>
    <div class="col-sm-10">
      <input type="checkbox" name="checks" value="1" id="checks" >
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">登录</button>
    </div>
  </div>
</form>

</body>
</html>
<script>
  
</script>
