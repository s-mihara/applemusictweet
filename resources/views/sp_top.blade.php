  <!DOCTYPE html>
  <html lang="jp">
    <head>
      @include('common.head')
      <title>アミュツイ ｜ Apple MusicでTweetされた情報を検索</title>
    </head>
    <body>
      @include('common.navbar')

      <section class="container" >
        <div class="">
          @include('ad.sp_res_1')
        </div>

        <!--
          id : ここで指定したidとタイトル部分のdata-parentを合わせる
        -->

        <div class="panel-group" id="accordion" style="margin-top:5px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">

                <!--
                  data-toggle : Collapseを起動させる
                  data-parent : アコーディオン風に閉じたり開いたりするためのもの
                  href : 指定した場所のパネルを開く
                -->
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  おすすめAppleMusic検索 <i style="float:right;"class="glyphicon glyphicon-chevron-down"></i>
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
              <div class="panel-body">
                <ul>
                  <li><a href="/playlist">プレイリスト</a></li>
                  <li><a href="/all">全て</a></li>
                </ul>
                <i class="glyphicon glyphicon-info-sign"></i> 詳細な検索は、上部の
                <i class="glyphicon glyphicon-menu-hamburger"></i>
                で！
              </div>

            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  このサイトについて<i style="float:right;"class="glyphicon glyphicon-chevron-down"></i>
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                ツイッターで「@AppleMusicで聴こう」とつぶやかれたデータを収集して、一覧にしています。</br>
                アーティスト名からタイトル一覧に飛んで、タイトルを押してください。</br>
                「ミュージック」アプリが起動して、そのタイトルが表示されます。</br>
                お気に入りの曲を見つけてください!</br>
                あと、一部アーティスト名につぶやきと一体化している事がありますが、ご容赦ください。
              </div>
            </div>
          </div>
        </div>



        <div class="panel panel-danger">
          <h5>
            <div class="panel-body">
                <i class="glyphicon glyphicon-king"></i> つぶやきアーティスト20(全期間) <i class="glyphicon glyphicon-king"></i>
            </div>
          </h5>
        </div>
        <div class="row">
            <?php $i=0; ?>
             @foreach ($results as $result)
              <a href="/detail/{{ rawurlencode($result->parent_title) }}" class="btn btn-default" style="margin:5px;white-space: normal;" >
                {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
              </a>
              <?php $i++; ?>
              @if ($i === 25 || $i === 50)
        </div>
        <div class="row">
              @endif
             @endforeach
      　</div>

        <div>@include('ad.sp_res_1')</div>
             <div class="panel panel-danger" style="margin-top:15px;">
               <h5>
                 <div class="panel-body">
                     <i class="glyphicon glyphicon-king"></i> つぶやきプレイリスト20(全期間) <i class="glyphicon glyphicon-king"></i>
                 </div>
               </h5>
             </div>
             <div class="row">
                 <?php $i=0; ?>
                  @foreach ($results2 as $result)
                   <a href="/detail/{{ rawurlencode($result->parent_title) }}" class="btn btn-default" style="margin:5px;white-space: normal;" >
                     {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
                   </a>
                   <?php $i++; ?>
                   @if ($i === 25 || $i === 50)
             </div>
                     <div>@include('ad.sp_res_1')</div>
             <div class="row">
                   @endif
                  @endforeach

        <div>@include('ad.sp_res_1')</div>
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


      </script>
        @include('ad.google_analytics')
    </body>
  </html>