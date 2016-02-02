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
              <div class="panel panel-info" style="display:table-cell; width:68%;">
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

               <div class="panel panel-info" style="display:table-cell; width:30%;">
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
               </div>

             </div>

        　<table class="table">
               <?php $i=0 ?>
               @foreach ($results as $result)
               <?php $i++ ?>
               <tr class="active"><td style="font-size:80%;">{{ $result['tweet_date'] }}　＠{{ $result['t_user_screen_name']}} {{ $result['t_user_name'] }}　</td></tr>
               <tr><td>
                 @if ($result['url_first'] != null and $result['url_first'] != "")
                 <a href="{{ $result['url_first'] }}" target="_blank" style="font-color:brack;">
                   <i class="glyphicon glyphicon-play"></i>
                 　{{ $result['title'] }}</a>
                 @else
                 {{ $result['title'] }}
                 @endif

                 @if ($i === 20)
                 </td></tr>
             </table>

                 <div>  @include('ad.sp_res_1') </div>
             <table class="table">
                   <tr><td>
                 @endif
               </td></tr>
             @endforeach
         </table>

            </div>

          <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" >
            @include('ad.pc_side')
          </div>
      </section>
      @include('common.footer')

      @include('ad.google_analytics')
    </body>
  </html>
