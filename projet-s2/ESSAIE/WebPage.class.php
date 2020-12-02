<?php

class WebPage{
    private $head;
    private $body;
    private $title ;

    public function __construct(string $title = null)
    {
        $this->title = $title;
        $body = '';
        $head = '';
    }

    public function appendContent(string $content)
    {
        $this->body .= $content."\n";
    }

    public function appendToHead(string $content)
    {
        $this->head .= $content;
    }

    public function appendCss(string $css)
    {
        $this->appendToHead("<style type='text/css'> $css </style>");
    }

    public function appendCssUrl(string $url)
    {
        $this->appendToHead('<link href = '.$url.' rel="steelsheet" type="text/css">');
    }	

    public function appendJs(string	$js)	
    {
        $this->appendToHead("<script type='text/javascript'>$js</script>");
    }

    public function appendJsUrl(string $url)
    {
        $this->appendToHead("<script type='text/javascript' src = $url></script>");
    }

    public function body() : string
    {
        return $this->body;
    }

    public function head() : string
    {
        return $this->head;
    } 
    
    public static function escapeString(string $string) : string
    {
        $caractere = htmlspecialchars($string, $flag = ENT_QUOTES | ENT_HTML401 | ENT_HTML5);
        return $caractere;
    }

    public function getLastModification() : string
    {
        $time = strftime("%d/%m/%Y",getlastmod());
        return $time;
    }	

    public function setTitle(string	$title)
    {
        $this->title = $title;
        $this->appendToHead("<title>$title</title>");
    }

    public function toHTML() :string
    {
        $html =<<<HTML
            <!doctype html>
            <html lang='fr'>
            <head>
                <meta charset="utf-8">
HTML;
        $html .= $this->head()."\n";
        $html .=<<<HTML
            </head>
            <body>
HTML;
        $html .= $this->body()."\n";
        $html .=<<<HTML
            </body>
        </html>

HTML;
    return $html;
    
    }
}