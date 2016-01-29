<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://applemusictweet.pyroz.net</loc>
  </url>
  @foreach ($results as $result)
  <url>
    <loc>http://applemusictweet.pyroz.net/detail/{{ rawurlencode(str_replace('/', '   sla_escape   ',$result->parent_title)) }}</loc>
  </url>
  @endforeach
</urlset>
