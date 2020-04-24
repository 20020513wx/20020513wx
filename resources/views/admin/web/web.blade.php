
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 一个简单的网页</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<meta name="csrf-token" content="{{csrf_token()}}">
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
        <li class="active"><a href="{{url('/brand')}}">商品品牌</a></li>
        <li><a href="{{url('/category')}}">商品分类</a></li>
        <li><a href="{{url('/goods')}}">商品管理</a></li>
        <li><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/web')}}">友情链接</a></li>
        <li><a href="{{url('/end')}}">注销登录</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h2>品牌管理 <a style="float:right;" href="{{url('/web/create')}}" class="btn btn-success">添加</a></hr></h2></center>
<form>
	<input type="text" name="web_name" value="{{$web_name}}" placeholder="请输入网站名称关键字">
	<button>搜索</button>
</form>
<table class="table table-striped">
	<caption></caption>
	<thead>
		<tr>
			<th>网站ID</th>
			<th>网站名称</th>
			<th>网站类型</th>
			<th>网站LOGO</th>
			<th>网站联系人</th>
			<th>网站介绍</th>
			<th>是否显示</th>
			<td>操作</td>
		</tr>
	</thead>
	@foreach($webInfo as $v)
	<tbody>
		<tr>
			<td>{{$v->web_id}}</td>
			<td>{{$v->web_name}}</td>
			<td>{{$v['web_leixing']==1?'logo链接':'文字链接'}}</td>
			<td>@if($v->web_logo)<img src="{{env('UPLOADS_URL')}}{{$v->web_logo}}" width="100">@endif</td>
			<td>{{$v->web_man}}</td>
			<td>{{$v->web_desc}}</td>
			<td>{{$v['is_show']==1?'是':'否'}}</td>
			<td><a href="{{url('/web/edit/'.$v->web_id)}}" class="btn btn-success">
			编辑</a> | <a  href="{{url('/web/destroy/'.$v->web_id)}}" class="btn btn-danger del">
			删除</a></td>
		</tr>
		</tbody>
		@endforeach
		<tr>
			<td colspan="6" align="center">{{$webInfo->appends(['web_name'=>$web_name])->links()}}</td>
		</tr>
			
</table>
</body>
</html>
<script>
	$(document).on('click','.del',function(){
		var _this=$(this)
		var url=_this.attr('href')
		if(window.confirm("确认删除吗？")){
			$.get(url,function(res){
				_this.parents("tr").remove();
			});
			
		}
		return false;
	})
</script>