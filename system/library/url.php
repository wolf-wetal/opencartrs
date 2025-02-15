<?php
/**
 * @package   OpenCart
 * @author    Daniel Kerr
 * @copyright Copyright (c) 2005 - 2022, OpenCart, Ltd. (https://www.opencart.com/)
 * @license   https://opensource.org/licenses/GPL-3.0
 * @author    Daniel Kerr
 * @see       https://www.opencart.com
 */
namespace Opencart\System\Library;
/**
 * Class URL
 */
class Url {
    /**
     * @var string
     */
    private string $url;
    /**
     * @var array
     */
    private array $rewrite = [];

    /**
     * Constructor.
     *
     * @param 	string 	$url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * addRewrite
     *
     * Add a rewrite method to the URL system
     *
     * @param	object	$rewrite
     *
     * @return 	void
     */
    public function addRewrite(\Opencart\System\Engine\Controller $rewrite): void {
        $this->rewrite[] = $rewrite;
    }

    /**
     * Generates a URL
     *
     * @param 	string        	$route
     * @param 	string|array	$args
     * @param 	bool			$js
     *
     * @return string
     */
    public function link(string $route, string|array $args = '', bool $js = false): string {

        $url = $this->url . 'index.php?route=' . $route;
       // var_dump($url);
        if ($args) {
            if (is_array($args)) {
                $url .= '&' . http_build_query($args);
            } else {
                $url .= '&' . trim($args, '&');
            }
        }

        foreach ($this->rewrite as $rewrite) {
            $url = $rewrite->rewrite($url);
        }

        if (!$js) {
            return str_replace('&', '&amp;', $url);
        } else {
            return $url;
        }
    }

    /**
     *
     * @param string $url
     *
     * @return string
     */
    public function addHtmlSuffixToUrls(string $url): string {
        // Разбиваем URL на части
        $urlComponents = parse_url($url);

        // Составляем новый путь с .html
        $newPath = $urlComponents['path'] . '.html';

        // Если есть query часть, добавляем её к новому пути
        if (isset($urlComponents['query'])) {
            $newPath .= '?' . $urlComponents['query'];
        }

        // Собираем новый URL
        $newUrl = $urlComponents['scheme'] . '://' . $urlComponents['host'] . $newPath;

        return $newUrl;
    }


}
