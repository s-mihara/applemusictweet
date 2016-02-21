<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SystemResponseTest extends TestCase
{
    /**
     * functional test
     * 基本的に、全パスを通すテストを実施。
     * コメントで画面を表す文言を記載しており、200番でかつその文言が含まれていたら
     * OKとする。
     *
     * @return void
     */
    public function testResponse()
    {
        // top
        $this->visit('/')
            ->see('<!--__top__-->');
        $this->visit('/?is_sp=t')
            ->see('<!--__sp_top__-->');

        // random
        $this->visit('/random')
            ->see('<!--__list__-->');
        $this->visit('/random?is_sp=t')
            ->see('<!--__sp_list__-->');

        // all
        $this->visit('/all')
            ->see('<!--__list__-->');
        $this->visit('/all?is_sp=t')
            ->see('<!--__sp_list__-->');


        // playlist
        $this->visit('/playlist')
            ->see('<!--__list__-->');
        $this->visit('/playlist?is_sp=t')
            ->see('<!--__sp_list__-->');

        // search
        $this->visit('/search?search=stone')
            ->see('<!--__list__-->');
        $this->visit('/search?is_sp=t&search=stone')
            ->see('<!--__sp_list__-->');

        // detail
        $this->visit('/detail/The%20Stone%20Roses')
            ->see('<!--__detail__-->');
        $this->visit('/detail/The%20Stone%20Roses?is_sp=t')
            ->see('<!--__sp_detail__-->');

        // detail-sort(date sort)
        $this->visit('/detail/The%20Stone%20Roses?sort=date')
            ->see('<!--__detail__-->');
        $this->visit('/detail/The%20Stone%20Roses?sort=date&is_sp=t')
            ->see('<!--__sp_detail__-->');

        // sitemap
        $this->visit('/sitemap.xml')
            ->see('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');


    }
}
