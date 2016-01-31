  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <title>アミュツイ ｜ Apple Musicの曲やプレイリストをツイートから探す</title>
      <meta name="keywords" content="'apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','検索','ツイート'">
      <meta name="description" content="AppleMusicにどんな曲やプレイリストがあるのかを探すお手伝いをします。アーティスト名やプレイリストジャンルから、お好みのタイトルを探しましょう。">
      @include('common.head')
    </head>
    <body>
      <!--
          deploytest用コメント
        -->
      @include('common.navbar')
      <section class="container" >

        <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
            <div style="display:table; width:100%; margin:5px auto;">
             <div class="panel panel-primary" style="display:table-cell; width:68%;">
                 <div class="panel-heading" style="text-align:center;">
                     <i class="glyphicon glyphicon-search"></i> おすすめAppleMusic検索
                 </div>

                 <ul class="list-group">
                  <a class="list-group-item" href="/all">すべて</a>
               		<a class="list-group-item" href="/playlist">プレイリストの全ジャンルを表示</a>
               		<a class="list-group-item" href="/random">ランダムに50件表示</a>
                 </ul>
              </div>
              <div  style="display:table-cell; width:2%;">
              </div>

              <div class="panel panel-primary" style="display:table-cell; width:30%;">
                  <div class="panel-heading" style="text-align:center;">
                      <i class="glyphicon glyphicon-phone"></i> アミュツイのスマホサイト
                  </div>
                  <div class="panel-body" style="text-align:center;">
                    <img style="zoom:1.1;" src="/img/qr.gif">
                  </div>
               </div>
             </div>



             <div class="panel panel-default" style="clear:both">
                 <div class="panel-heading" style="text-align:center;">
                     <i class="glyphicon glyphicon-king"></i> つぶやきアーティストランキング20(全期間)
                 </div>
                 <div class="panel-body">
                   @foreach ($results as $result)
                   <a href="/detail/{{ rawurlencode(str_replace('/', '   sla_escape   ',$result->parent_title)) }}"  class="btn btn-default"  style="margin:5px;" >
                     {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
                   </a>
                   @endforeach
                   @if (count($results) === 1000)
                    </br>
                    <button class="btn btn-warning" type="button" >
                      表示件数が多いので省略されました。(1,000件まで表示されます)
                    </button>
                   @endif
                 </div>


             </div>

             <div class="panel panel-default" >

                 <div class="panel-heading" style="text-align:center;">
                     <i class="glyphicon glyphicon-king"></i> つぶやきプレイリストランキング20(全期間)
                 </div>
                 <div class="panel-body">
                   @foreach ($results2 as $result)
                   <a href="/detail/{{ rawurlencode(str_replace('/', '   sla_escape   ',$result->parent_title)) }}"  class="btn btn-default"  style="margin:5px;" >
                     {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
                   </a>
                   @endforeach
                   @if (count($results) === 1000)
                    </br>
                    <button class="btn btn-warning" type="button" >
                      表示件数が多いので省略されました。(1,000件まで表示されます)
                    </button>
                   @endif
                 </div>


             </div>

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
