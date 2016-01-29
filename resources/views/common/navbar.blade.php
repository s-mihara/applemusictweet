<nav class="navbar navbar-inverse navbar-fixed-top container">
		<div class="navbar-header" >
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand active" style="color:white;" href="/">
				<span style="text-decoration: underline">
				<i class="glyphicon glyphicon-apple"></i>
				<i class="glyphicon glyphicon-music"></i>
				<i class="glyphicon glyphicon-comment"></i>
				</span>
			アミュツイ
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar1">
			<form class="navbar-form " action="search" role="search" method="get">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search" name="search" value="{{$inputs['word']}}">
					<select  class="form-control" name="period">
						<option value=-1>期間指定なし</option>
						<!--<option value=0>24時間以内</option>
						<option value=1>1週間以内</option>
						<option value=2>1ヶ月以内</option>
					-->
					</select>
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>  </button>
			</form>
		</div>
</nav>
