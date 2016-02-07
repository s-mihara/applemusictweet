  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <title>Apple Musicの曲やプレイリストを検索するなら アミュツイ</title>
      <meta name="keywords" content="'apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','検索','ツイート'">
      <meta name="description" content="AppleMusicにどんな曲やプレイリストがあるのかを探すお手伝いをします。お気に入りの曲を探しましょう。">
      @include('common.head')
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

        <div class="panel-group"  style="margin-top:5px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  おすすめAppleMusic検索
                </a>
              </h4>
            </div>

              <ul class="list-group">
                <a class="list-group-item" href="/random">ランダムに50件表示  <i class="glyphicon glyphicon-thumbs-up" style="margin-left:10px;"></i>
                   <span style="font-size:60%">オススメ</span>
                </a>
               <a class="list-group-item" href="/playlist">プレイリストの全ジャンルを表示</a>
               <a class="list-group-item" href="/all">すべて</a>
              </ul>
              <div class="panel-footer">
                <i class="glyphicon glyphicon-info-sign"></i> 詳細な検索は、上部の
                <i class="glyphicon glyphicon-menu-hamburger"></i>
                で！
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
                ツイッターでAppleMusicに関してつぶやかれたデータを収集して、一覧にしています。</br>
                アーティスト名やプレイリストジャンルからタイトル一覧に飛んで、タイトルを押してください。</br>
                「ミュージック」アプリが起動して、そのタイトルが表示されます。</br>
                お気に入りの曲を見つけてください!
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-danger">
          <h5>
            <div class="panel-body">
                <i class="glyphicon glyphicon-king"></i> ホットなアーティスト10(週間) <i class="glyphicon glyphicon-king"></i>
            </div>
          </h5>
        </div>
        <div class="row">
            <?php $i=0; ?>
             @foreach ($results_weekly as $result)
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
      <div class="panel panel-danger">
        <h5>
          <div class="panel-body">
              <i class="glyphicon glyphicon-king"></i> ホットなプレイリスト10(週間) <i class="glyphicon glyphicon-king"></i>
          </div>
        </h5>
      </div>
      <div class="row">
          <?php $i=0; ?>
           @foreach ($results_weekly2 as $result)
            <a href="/detail/{{ rawurlencode($result->parent_title) }}" class="btn btn-default" style="margin:5px;white-space: normal;" >
              {{ str_replace('Apple Music','',$result->parent_title) }}  <span class="badge">{{ $result->count }}</span>
            </a>
            <?php $i++; ?>
            @if ($i === 25 || $i === 50)
      </div>
      <div class="row">
            @endif
           @endforeach
    　</div>
        <div>@include('ad.sp_res_1')</div>
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
                    {{ str_replace('Apple Music','',$result->parent_title) }}  <span class="badge">{{ $result->count }}</span>
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
