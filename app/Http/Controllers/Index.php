<?php

namespace App\Http\Controllers;

use App\Http\Controller;

class Index extends Controller
{
    public function index()
    {
        return <<<ENT
<!DOCTYPE html><html lang="zh"><head><meta charset="UTF-8"><title>MaxPHP-基于组件的轻量PHP框架！</title><meta name="viewport"content="width=device-width, initial-scale=1.0"></head><style>html,body{margin:0;padding:0;border:none;height:100%}.box{height:100%;display:flex;justify-content:center;align-items:center}.content{text-align:center;width:15em}.icon{width:8em;height:8em}.tip-box{display:flex;justify-content:space-between;margin-top:2em}</style><body><div class="box"><div class="content"><img src="/favicon.ico"alt="MaxPHP"class="icon"><h4>基于组件的轻量PHP框架</h4><div class="tip-box"><a href="https://github.com/topyao/max">Github</a><a href="https://packagist.org/packages/max/max">Packagist</a><a href="https://www.kancloud.cn/cheng-yao/yaophp/2161148">文档</a></div></div></div></body></html>
ENT;
    }
}
