  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <title>アミュツイ ｜ Apple Musicの曲やプレイリストをツイートから探す</title>
      <meta name="keywords" content="'apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','ツイート">
      <meta name="description" content="AppleMusicにどんな曲やプレイリストがあるのかを探すお手伝いをします。">
      @include('common.head')
    </head>
    <body>
      @include('common.navbar')
      <section class="container" >
        <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
             @foreach ($results as $result)
             <a href="/detail/{{ rawurlencode($result->parent_title) }}"  class="btn btn-default"  style="margin:5px;" ">
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
