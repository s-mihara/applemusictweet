<!DOCTYPE html>
<html lang="jp">
  <head>
    @include('common.head')
    <title>{{$parentTitle}}のAppleMusicツイート一覧 | AppleMusicTweet </title>
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
          <form class="navbar-form " action="/search" role="search" method="get">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="search" value="">
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
        @include('ad.sp_res_1')
      </div>

        <div><a href="/" style="font-size:60%">一覧</a>　 > 「{{$parentTitle}}」 のタイトル<div>
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
