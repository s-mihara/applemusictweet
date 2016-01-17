  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AppleMusicTweet ｜ Apple MusicでTweetされた情報を検索</title>

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
          padding-bottom: 60px;
      }
      .ad-zone {
          float: right;
      }
      .navbar-inverse {
        /*background-color: #3e6107;*/
        /*background-image: url("img/IMG_1171.JPG");*/
      }

      -->
      </style>
    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top container">
      		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample3">
      				<span class="sr-only">Toggle navigation</span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand active" style="color:white;" href="/">
      				AppleMusicTweet
      			</a>
      		</div>

      		<div class="collapse navbar-collapse" id="navbarEexample3">
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


      <section class="container" >
        <div class="">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- 320×100 -->
          <ins class="adsbygoogle"
               style="display:inline-block;width:320px;height:100px"
               data-ad-client="ca-pub-5130603784545057"
               data-ad-slot="8954345126"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>

        <div class="row">

             @foreach ($results as $result)
             <button class="btn btn-default parent-title" type="button" style="margin:5px;" value="{{ $result->parent_title }}">
               {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
             </button>
             @endforeach
             @if (count($results) === 1000)
              </br>
              <button class="btn btn-warning" type="button" >
                表示件数が多いので省略されました。(1,000件まで表示されます)
              </button>
             @endif
      </section>

        <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" >
          <div class="container" >
            <div style="float:right;">
            powerd by <a href="https://twitter.com/mihashun" target="_blank">@mihashun</a>
            </div>
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

      </script>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-72394811-1', 'auto');
        ga('send', 'pageview');

      </script>
    </body>
  </html>
