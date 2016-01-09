<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    <!--
    body {
        background-color: #f4f8f9;
        padding-top: 60px;
    }
    -->
    </style>
  </head>
  <body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample3">
    				<span class="sr-only">Toggle navigation</span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="navbar-brand" href="/">
    				AppleMusicTweet
    			</a>
    		</div>
        <div class="btn-group btn-group navbar-left" style="margin-right:10px;">
             <button type="button" class="btn btn-default navbar-btn active">回数順</button>
             <button type="button" class="btn btn-default navbar-btn ">名前順</button>
         </div>
    		<div class="collapse navbar-collapse" id="navbarEexample3">
          <ul class="nav navbar-nav">
            <li class="active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">すべて</b></a></li>
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            	あいう<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                <li><a href="#">かなカナ全て</a></li>
                <li><a href="#">かな全て</a></li>
                <li><a href="#">カナ全て</a></li>
            		<li><a href="#">あア行</a></li>
            		<li><a href="#">かカ行</a></li>
            		<li><a href="#">123</a></li>
                <li><a href="#">メニュー1-4</a></li>
                <li><a href="#">メニュー1-5</a></li>
            	</ul>
            </li>
    				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">ABC<b class="caret"></b></a></li>
    				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">OPQ<b class="caret"></b></a></li>
    				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">123<b class="caret"></b></a></li>
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">※<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">漢字とか</a></li>
              </ul>
            </li>
    			</ul>


    			<form class="navbar-form navbar-right" action="search" role="search" method="get">
    				<div class="form-group">
    					<input type="text" class="form-control" placeholder="Search" name="search">
    				</div>
    				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i>  </button>
    			</form>
    		</div>
    	</div>
    </nav>

    <ul class="nav nav-pills" >

      @foreach ($results as $result)
        <button class="btn btn-default parent-title" type="button" style="margin:5px;" value="{{ $result->parent_title }}">
          {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
        </button>
      @endforeach

      <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" >
        <div class="container">

        </div>
      </nav>

        <!--
            Modalの中身
          -->
          <div id="title-detail" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Stone Roses</h4>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>

              </div>
              </div>
            </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
    $(function(){
      $(function(){
      $('#modal-trigger').hide();
      $('.parent-title').on('click', function(elm){
        var query = "parentTitle="+encodeURIComponent($(this).val());
        $.ajax({
            type: "GET",
            url: "detailModal",
            data: query,
            async: false,
            success: function(msg){
              if(msg=='error') {
                alert("読み込み失敗m(__)m");
                return false;
              }
              $("#title-detail").html(msg);
              //alert( "sucusess");
            },

            error: function(xhr, status, error) {
              alert("読み込み失敗m(__)m");
              return false;
            }
        });
        $('.modal').modal('show');
      });
    });
    });
    </script>




  </body>
</html>
