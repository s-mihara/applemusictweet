<!DOCTYPE html>
<html lang="jp">
  <head>
    <title>AppleMusicで「{{$parentTitle}}」に関してツイートされた曲/プレイリスト | アミュツイ </title>
    <meta name="keywords" content="'{{$parentTitle}}','apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す'">
    <meta name="description" content="AppleMusicには「{{$parentTitle}}」のこんな曲やプレイリストがあります">
    @include('common.head')
  </head>
  <body>
    @include('common.navbar')
    <section class="container" >
      <div >
        「<span style="font-weight:bold;font-size:105%;">{{$parentTitle}}</span>」 のタイトル
      <div>
      <div style="margin-top:5px;" >
        @include('ad.sp_res_1')
      </div>


        <table class="table">
          <?php $i=0 ?>
          @foreach ($results as $result)
          <?php $i++ ?>
          <tr class="active"><td style="font-size:70%;">{{ $result['tweet_date'] }}　＠{{ $result['t_user_screen_name']}} {{ $result['t_user_name'] }}　</td></tr>
          <tr><td>
            @if ($result['url_first'] != null and $result['url_first'] != "")
            <a href="{{ $result['url_first'] }}" target="_blank" style="font-color:brack;">
              <i class="glyphicon glyphicon-play"></i>
            　{{ $result['title'] }}</a>
            @else
            {{ $result['title'] }}
            @endif

            @if ($i === 12 | $i === 24)
            </td></tr>
        </table>
            <div>  @include('ad.sp_res_1') </div>
        <table class="table">
              <tr><td>
            @endif
          </td></tr>
        @endforeach
    </table>
    </section>

    @include('common.footer')


    @include('ad.google_analytics')
</body>
</html>
