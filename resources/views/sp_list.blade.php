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

        <div class="row">
            <?php $i=0; ?>
             @foreach ($results as $result)
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
