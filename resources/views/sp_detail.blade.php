<!DOCTYPE html>
<html lang="jp">
  <head>
    <title>AppleMusicに「{{$parentTitle}}」のこんな曲が。| アミュツイ </title>
    <meta name="keywords" content="'{{$parentTitle}}','apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','検索'">
    <meta name="description" content="AppleMusicには「{{$parentTitle}}」のこんな曲やプレイリストがあります。「{{ $results[0]['title'] }}」とか。">
    @include('common.head')
  </head>
  <body>
    @include('common.navbar')
    <section class="container" >
      <div >
        「<span style="font-weight:bold;font-size:105%;">{{$parentTitle}}</span>」 のタイトル
      <div>
      <div style="margin-top:5px;margin-bottom:5px;" >
        @include('ad.sp_res_1')
      </div>

      <select  class="selectpicker" data-width="fit">
        <option data-icon="glyphicon glyphicon-sort-by-order-alt" value = "cnt" > つぶやき回数順</option>
        <option data-icon="glyphicon glyphicon-sort-by-order-alt" value ="date" @if(Input::get('sort') == 'date') selected  @endif> つぶやき日付順</option>
      </select>
        <table class="table">
          <?php $i=0 ?>
          @foreach ($results as $result)
          <?php $i++ ?>
          <tr class="active">
            <td style="font-size:80%;">{{$result['cnt']}} 回 -- {{substr($result['tweet_date'],0,10)}}
            </td>
          </tr>
          <tr><td>
            @if ($result['ex_url_first'] != null and $result['ex_url_first'] != "")
            <a href="{{ preg_replace('/i=.+$/','',$result['ex_url_first']) }}" target="_blank" style="font-color:brack;">
              <i class="glyphicon glyphicon-play"></i>
            　{{ $result['title'] }}</a>
            @elseif ($result['url_first'] != null and $result['url_first'] != "")
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
    <script type="text/javascript">
            $(function(){
              $('.selectpicker').selectpicker({
                style: 'btn-default',
              });
              $('.selectpicker').on('change',function(){
                  $href = $(this).val() == "date" ? "./{{$parentTitle}}?sort=date":"./{{$parentTitle}}";
                  location.href = $href;
              });
            });
    </script>
    @include('common.footer')


    @include('ad.google_analytics')
</body>
</html>
