<?php
namespace Opencart\Catalog\Controller\Startup;
class SeoUrl extends \Opencart\System\Engine\Controller {
	public function index(): void {
		// Add rewrite to URL class
		if ($this->config->get('config_seo_url')) {
			
			// Add rewrite to URL class
			$this->url->addRewrite($this);

			$this->load->model('design/seo_url');

			// Decode URL
			if (isset($this->request->get['_route_'])) {
				$parts = explode('/', $this->request->get['_route_']);

				// remove any empty arrays from trailing
				if (oc_strlen(end($parts)) == 0) {
					array_pop($parts);
				}

 				$count_path = count($parts);


				foreach ($parts as $part) {
					$seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword($part);

					if ($seo_url_info) {
						if ($seo_url_info['key'] != 'route') {
							if ($count_path > 1) {
								$this->request->get[$seo_url_info['key']] = html_entity_decode($seo_url_info['value'], ENT_QUOTES, 'UTF-8');

							} else {
								$this->request->get['route'] = 'error/not_found';
							}
						} else {
							$this->request->get[$seo_url_info['key']] = html_entity_decode($seo_url_info['value'], ENT_QUOTES, 'UTF-8');	
						}
						
					} else {
						$this->request->get['route'] = 'error/not_found';
					}
				}
			}
		} else {
			if (isset($this->request->get['_route_'])) {
				$this->request->get['route'] = 'error/not_found';
			}
		}
	}



/*    public function rewrite(string $link): string {
        $url_info = parse_url(str_replace('&amp;', '&', $link));

        // Build the url
        $url = '';

        if ($url_info['scheme']) {
            $url .= $url_info['scheme'];
        }

        $url .= '://';

        if ($url_info['host']) {
            $url .= $url_info['host'];
        }

        if (isset($url_info['port'])) {
            $url .= ':' . $url_info['port'];
        }

        parse_str($url_info['query'], $query);

        // Start changing the URL query into a path
        $paths = [];

        // Parse the query into its separate parts
        $parts = explode('&', $url_info['query']);



            foreach ($parts as $part) {
                [$key, $value] = explode('=', $part);

                $result = $this->model_design_seo_url->getSeoUrlByKeyValue((string)$key, (string)$value);

                if ($result) {
                    $paths[] = $result;

                    unset($query[$key]);
                }
            }

            $sort_order = [];

            foreach ($paths as $key => $value) {
                $sort_order[$key] = $value['sort_order'];
            }

            if (isset($query['product_id']) && isset($query['path'])) {
                var_dump('<pre>');
                var_dump($parts);
                $last = array_splice($parts, -1, 1); // Последний элемент
                $penultimate = array_splice($parts, -1, 1); // Предпоследний элемент
                array_push($parts, $last[0], $penultimate[0]);
            } else {
                array_multisort($sort_order, SORT_ASC, $paths);
            }

        // Build the path
        $url .= str_replace('/index.php', '', $url_info['path']);

        $keyword = '';
        foreach ($paths as $result) {
            $keyword .= '/' . $result['keyword'];
        }

        $url .= str_replace('//', '/', $keyword);

        // Rebuild the URL query
        if ($query) {
            $url .= '?' . str_replace(['%2F'], ['/'], http_build_query($query));
        }


        return $url;
    }*/








public function rewrite(string $link): string {
        $url_info = parse_url(str_replace('&amp;', '&', $link));

        // Build the url
        $url = '';

        if ($url_info['scheme']) {
            $url .= $url_info['scheme'];
        }

        $url .= '://';

        if ($url_info['host']) {
            $url .= $url_info['host'];
        }

        if (isset($url_info['port'])) {
            $url .= ':' . $url_info['port'];
        }

        parse_str($url_info['query'], $query);

        // Start changing the URL query into a path
        $paths = [];

        // Parse the query into its separate parts
        $parts = explode('&', $url_info['query']);


        foreach ($parts as $part) {
            [$key, $value] = explode('=', $part);

            $result = $this->model_design_seo_url->getSeoUrlByKeyValue((string)$key, (string)$value);

            if ($result) {
                $paths[] = $result;

                unset($query[$key]);
            }
        }


        $sort_order = [];

        foreach ($paths as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }


        array_multisort($sort_order, SORT_ASC, $paths);

        // Build the path
        $url .= str_replace('/index.php', '', $url_info['path']);

        $keyword = '';
        foreach ($paths as $result) {
            $keyword .= '/' . $result['keyword'];
        }

        $url .= str_replace('//', '/', $keyword);

        // Rebuild the URL query
        if ($query) {
            $url .= '?' . str_replace(['%2F'], ['/'], http_build_query($query));
        }

        return $url;
    }
}