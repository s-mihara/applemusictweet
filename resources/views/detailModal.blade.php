
    <!--
    モーダル
    -->
    <div id="title-detail" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">{{ $results[0]['parent_title'] }}</h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xs-3 col-sm-6 col-md-4  "><strong>タイトル</strong></div>
                <div class="col-xs-3 col-sm-2 col-md-3  "><strong>ツイート日▼</strong></div>
                <div class="col-xs-3 col-sm-2 col-md-3  "><strong>名前</strong></div>
                <div class="col-xs-3 col-sm-2 col-md-2  "><strong>ID</strong></div>
              </div>
              @foreach ($results as $result)
                <div class="row">
                  <div class="col-xs-3 col-sm-6 col-md-4  ">
                    @if ($result['url_first'] != null and $result['url_first'] != "")
                    <a href="{{ $result['url_first'] }}" target="_blank" style="font-color:brack;">{{ $result['title'] }}</a>
                    @else
                    {{ $result['title'] }}
                    @endif
                  </div>
                  <div class="col-xs-3 col-sm-2 col-md-3  ">{{ $result['tweet_date'] }}</div>
                  <div class="col-xs-3 col-sm-2 col-md-3  ">{{ $result['t_user_name'] }}</div>
                  <div class="col-xs-3 col-sm-2 col-md-2  ">@ {{ $result['t_user_screen_name']}}</div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          </div>

        </div>
        </div>
      </div>
