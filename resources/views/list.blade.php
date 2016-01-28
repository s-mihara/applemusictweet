  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <title>AppleMusicTweet ｜ Apple MusicでTweetされた情報を検索</title>
      @include('common.head')
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
        <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
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
            </div>

          <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" >
            @include('ad.pc_side')
          </div>
      </section>
      @include('common.footer')
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
      @include('ad.google_analytics')
    </body>
  </html>
