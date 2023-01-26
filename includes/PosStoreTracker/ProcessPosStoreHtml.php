<?php

class ProcessPosStoreHtml{
    public function populateLinks($html){
        $html=str_replace('/DNYInterfaceServer/images/logo.png', plugin_dir_url( __FILE__ ) . './../../public/images/logo.png', $html);
        return $html;
    }

    public function replaceText($html){
        $html=str_replace('http://www.posstore.info/','',$html);
        $html=str_replace('】','] ',$html);
        $html=str_replace('【',' [',$html);
        
        $html=str_replace('<link rel="stylesheet" href="/DNYInterfaceServer/css/app.css">','',$html);
        $html=str_replace('<link rel="stylesheet" href="/DNYInterfaceServer/css/query.css">','',$html);
        $html=str_replace('<link rel="stylesheet" href="/DNYInterfaceServer/dist/css/winbox.min.css">','',$html);
        $html=str_replace('<link rel="stylesheet" href="/DNYInterfaceServer/dist/css/themes/modern.min.css">','',$html);
        $html=str_replace('<link rel="stylesheet" href="/DNYInterfaceServer/dist/css/themes/white.min.css">','',$html);
        $html=str_replace('<script src="/DNYInterfaceServer/js/jquery-3.4.1.min.js"></script>','',$html);
        $html=str_replace('<script src="/DNYInterfaceServer/dist/js/winbox.min.js"></script>','',$html);
        $html=str_replace('<script src="/DNYInterfaceServer/js/poplayer.js"></script>','',$html);
        return $html;
    }

    public function getJavascript($html){
        $start = "<script type=\"text/javascript\">";
        $end = "</script>";
        $startsAt = strpos($html, $start) + strlen($start);
        $endsAt = strpos($html, $end, $startsAt);
        $javascript = substr($html, $startsAt, $endsAt - $startsAt);
        return $javascript;
    }
}