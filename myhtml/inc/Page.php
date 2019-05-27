<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/21
 * Time: 14:23
 */
namespace inc\Page;

class Page
{
    private $page_nib = 7;
    private $page_all = 1;
    private $url = "";
    private $url_suf = "";

    public function __construct($pageAll, $url)
    {
        $this->page_all = $pageAll;
        $this->url = $url;
    }

    public function setPageNib($page_nib)
    {
        $this->page_nib = $page_nib;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setUrlSuf($url_suf)
    {
        $this->url_suf = $url_suf;
    }

    public function pages($page)
    {
        $pre_page = $page - 1;
        $nex_page = $page + 1;
        for ($i = 1; $i <= $this->page_all; $i++) {
            if ($page > $this->page_nib) {
                $buf_page = $this->page_nib - ($this->page_all - $page);
                if ($buf_page < 0) {
                    $buf_page = 0;
                }
                if ($i < $page - $this->page_nib - ($buf_page)) {
                    if ($i == $page - ($this->page_nib + 1) - $buf_page) {
                        echo "<li><a href={$this->url}{$pre_page}{$this->url_suf}>上一页</a></li>";
                    }
                    continue;
                } else {
                    if ($i > $page + $this->page_nib) {
                        if ($i == $page + $this->page_nib + 1) {
                            echo "<li><a href={$this->url}{$nex_page}{$this->url_suf}>下一页</a></li>";
                        }
                        continue;
                    }
                    if ($i == $page) {
                        echo "<li><a style='color: #f40' href={$this->url}{$i}{$this->url_suf}><b>$i</b></a></li>";
                    } else {
                        echo "<li><a href={$this->url}{$i}{$this->url_suf}>$i</a></li>";
                    }
                }
            } else {
                if ($i > 2 * $this->page_nib + 1) {
                    if ($i == 2 * ($this->page_nib + 1)) {
                        echo "<li><a href={$this->url}{$nex_page}{$this->url_suf}>下一页</a></li>";
                    }
                    continue;
                }
                if ($i == $page) {
                    echo "<li><a style='color: #f40' href={$this->url}{$i}{$this->url_suf}><b>$i</b></a></li>";
                } else {
                    echo "<li><a href={$this->url}{$i}{$this->url_suf}>$i</a></li>";
                }
            }
        }
    }
}