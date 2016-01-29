  <!DOCTYPE html>
  <html lang="jp">
    <head>
      @if (isset($inputs['is_random']))
      <title>ランダムな検索結果 ｜ アミュツイ</title>
      <meta name="keywords" content="'apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','ツイート","ランダム">
      <meta name="description" content="ランダムに検索したAppleMusicのアーティスト/プレイリストジャンルです。">
      @else
      <title>「{{empty($inputs['word'])? 'すべて':$inputs['word']}} 」の検索結果 ｜ アミュツイ</title>
      <meta name="keywords" content="'apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','ツイート">
      <meta name="description" content="「{{empty($inputs['word'])? 'すべて':$inputs['word']}}」で検索したAppleMusicのアーティスト/プレイリストジャンルです。">
      @endif
      @include('common.head')
    </head>
    <body>
      @include('common.navbar')
      <section class="container" >
        <div >
          @if (isset($inputs['is_random']))
          ランダムに50件表示
            <a href="random" class="btn btn-default" style="margin:5px;"> <i class="glyphicon glyphicon-refresh"></i> 表示を更新</a>
          @else
          「<span style="font-weight:bold;font-size:105%;">{{empty($inputs['word'])? 'すべて':$inputs['word']}}</span>」 の検索結果
          @endif
        <div>
        <div class="">
          @include('ad.sp_res_1')
        </div>

        <div class="row">
            <?php $i=0; ?>
             @foreach ($results as $result)
              <a href="/detail/{{ rawurlencode(str_replace('/', '   sla_escape   ',$result->parent_title)) }}" class="btn btn-default" style="margin:5px;white-space: normal;" >
                {{ $result->parent_title }} <span class="badge">{{ $result->count }}</span>
              </a>
              <?php $i++; ?>
              @if ($i === 25 || $i === 50)
        </div>
                <div>@include('ad.sp_res_1')</div>
        <div class="row">
              @endif
             @endforeach
             @if (count($results) === 1000)
              </br>
              <button class="btn btn-warning" type="button" style="margin:5px;white-space: normal;">
                表示件数が多いので省略されました。(1,000件まで表示されます)
              </button>
             @endif
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
