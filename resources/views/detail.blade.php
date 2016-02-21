  <!DOCTYPE html>
  <html lang="jp">
    <head>
      <title>AppleMusicに「{{$parentTitle}}」のこんな曲が。 | アミュツイ </title>
      <meta name="keywords" content="'{{$parentTitle}}','apple music','アップルミュージック','プレイリスト','曲','ミュージックアプリ','探す','検索'">
      <meta name="description" content="AppleMusicには「{{$parentTitle}}」のこんな曲やプレイリストがあります。「{{ $results[0]['title'] }}」とか。">

      @include('common.head')
    </head>
    <body>
      @include('common.navbar')
      <section class="container" >

        <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">

             <div style="display:table; width:100%; margin:5px auto;">
              <div class="panel panel-default" style="display:table-cell; width:68%;">
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

               <div class="panel panel-default" style="display:table-cell; width:30%;">
                   <div class="panel-heading" style="text-align:center;">
                       <i class="glyphicon glyphicon-phone"></i> アミュツイのスマホサイト
                   </div>
                   <div class="panel-body" style="text-align:center;">
                     <img style="zoom:0.8;" src="/img/qr.gif"><p>トップに遷移します<i class="glyphicon glyphicon-share-alt"></i></p>
                   </div>
                </div>
              </div>


             <div class="panel panel-primary" style="margin-top:20px;">
               <div class="panel-heading">
                「<span style="font-weight:bold;font-size:105%;">{{$parentTitle}}</span>」 のタイトル
                <span  style="margin-left:20px;" >
                  <select  class="selectpicker" style="margin-left:20px;" data-width="fit">
                    <option data-icon="glyphicon glyphicon-sort-by-order-alt" value = "cnt" > つぶやき回数順</option>
                    <option data-icon="glyphicon glyphicon-sort-by-order-alt" value ="date" @if(Input::get('sort') == 'date') selected  @endif> つぶやき日付順</option>
                  </select>
                </span>
               </div>


             </div>


               <?php $i=0 ?>
               @foreach ($results as $result)
               <div class="panel panel-default" >
                   <div class="panel-heading" >
                       <i class="glyphicon glyphicon-phone"></i> {{$result['cnt']}} 回  -- {{substr($result['tweet_date'],0,10)}}
                   </div>
                  <div class="panel-body" >
                   @if ($result['ex_url_first'] != null and $result['ex_url_first'] != "")
                   <a href="{{ preg_replace('/i=.+$/','',$result['ex_url_first']) }}" target="_blank" style="font-color:brack;">
                     <i class="glyphicon glyphicon-share-alt"></i>
                   　{{ $result['title'] }}</a>
                   @elseif ($result['url_first'] != null and $result['url_first'] != "")
                   <a href="{{ $result['url_first'] }}" target="_blank" style="font-color:brack;">
                     <i class="glyphicon glyphicon-share-alt"></i>
                   　{{ $result['title'] }}</a>
                   @else
                   {{ $result['title'] }}
                   @endif
                   </div>
                </div>
               @endforeach
            </div>

          <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" >
            @include('ad.pc_side')
          </div>
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
    <!--__detail__-->
  </html>
