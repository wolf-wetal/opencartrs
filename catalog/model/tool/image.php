<?php
namespace Opencart\Catalog\Model\Tool;
/**
 * Class Image
 *
 * @package Opencart\Catalog\Model\Tool
 */
class Image extends \Opencart\System\Engine\Model {
	/**
	 * @param string $filename
	 * @param int    $width
	 * @param int    $height
	 * @param string $default
	 *
	 * @return string
	 * @throws \Exception
	 */
	/*public function resize(string $filename, int $width, int $height, string $default = ''): string {
		if (!is_file(DIR_IMAGE . $filename) || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $filename)), 0, strlen(DIR_IMAGE)) != DIR_IMAGE) {
			return '';
		}

		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$image_old = $filename;
		$image_new = 'cache/' . oc_substr($filename, 0, oc_strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.' . $extension;

		if (!is_file(DIR_IMAGE . $image_new) || (filemtime(DIR_IMAGE . $image_old) > filemtime(DIR_IMAGE . $image_new))) {
			list($width_orig, $height_orig, $image_type) = getimagesize(DIR_IMAGE . $image_old);
				 
			if (!in_array($image_type, [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_WEBP])) {
				return $this->config->get('config_url') . 'image/' . $image_old;
			}
						
			$path = '';

			$directories = explode('/', dirname($image_new));

			foreach ($directories as $directory) {
				if (!$path) {
					$path = $directory;
				} else {
					$path = $path . '/' . $directory;
				}

				if (!is_dir(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}
			}

			if ($width_orig != $width || $height_orig != $height) {
				$image = new \Opencart\System\Library\Image(DIR_IMAGE . $image_old);
				$image->resize($width, $height, $default);
				$image->save(DIR_IMAGE . $image_new);
			} else {
				copy(DIR_IMAGE . $image_old, DIR_IMAGE . $image_new);
			}
		}
		
		$image_new = str_replace(' ', '%20', $image_new);  // fix bug when attach image on email (gmail.com). it is automatically changing space from " " to +
		
		return $this->config->get('config_url') . 'image/' . $image_new;
	}*/


    public function resize(string $filename, int $width, int $height, string $default = ''): string {

        $k_dir = '/var/www/juli.dementeva/data/www/eroticshop.kg/';
        $nm_img = $k_dir . $filename;
        if (!is_file(DIR_IMAGE . $filename) || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $filename)), 0, strlen(DIR_IMAGE)) != str_replace('\\', '/', DIR_IMAGE)) {

            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $image_old = $filename;
            $image_new = 'cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.' . $extension;

            if (!is_file(DIR_IMAGE . $image_new) || (filemtime($k_dir . $filename) > filemtime(DIR_IMAGE . $image_new)) || !is_file($nm_img)) {
                if (is_file($nm_img)) {

                    list($width_orig, $height_orig, $image_type) = getimagesize($nm_img);

                    if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF))) {

                        return $nm_img;
                    }

                    $path = '';

                    $directories = explode('/', dirname($image_new));

                    foreach ($directories as $directory) {

                        $path = $path . '/' . $directory;

                        if (!is_dir(DIR_IMAGE . $path)) {
                            @mkdir(DIR_IMAGE . $path, 0777);
                        }
                    }

                    if ($width_orig != $width || $height_orig != $height) {
                        $image = new \Opencart\System\Library\Image($nm_img);

                        $image->resize($width, $height);
                        $image->save(DIR_IMAGE . $image_new);
                    } else {

                        copy($nm_img, DIR_IMAGE . $image_new);
                    }
                }
            }

            $image_new = str_replace(' ', '%20', $image_new);  // fix bug when attach image on email (gmail.com). it is automatic changing space " " to +

            if ($this->request->server['HTTPS']) {
                return $this->config->get('config_ssl'). 'image/' . $image_new;
            } else {
                return $this->config->get('config_url'). 'image/' . $image_new;
            }


            //	return $filename;
        }


        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $image_old = $filename;
        $image_new = 'cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.' . $extension;


        if (!is_file(DIR_IMAGE . $image_new) || (filemtime(DIR_IMAGE . $image_old) > filemtime(DIR_IMAGE . $image_new))) {
//		    var_dump($extension);
            list($width_orig, $height_orig, $image_type) = getimagesize(DIR_IMAGE . $image_old);
//var_dump($extension);
            if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF)) || $extension == 'gif') {

                return$this->config->get('config_ssl') . 'image/' . $image_old;
            }

            $path = '';

            $directories = explode('/', dirname($image_new));

            foreach ($directories as $directory) {
                $path = $path . '/' . $directory;

                if (!is_dir(DIR_IMAGE . $path)) {
                    @mkdir(DIR_IMAGE . $path, 0777);
                }
            }
/*var_dump(DIR_IMAGE);
var_dump($image_old);
var_dump($image_new);
die();*/

            if ($width_orig != $width || $height_orig != $height) {
                $image = new \Opencart\System\Library\Image(DIR_IMAGE . $image_old);
                $image->resize($width, $height);
                $image->save(DIR_IMAGE . $image_new);
            } else {
                copy(DIR_IMAGE . $image_old, DIR_IMAGE . $image_new);
            }
        }

        $image_new = str_replace(' ', '%20', $image_new);  // fix bug when attach image on email (gmail.com). it is automatic changing space " " to +
/*var_dump($image_new);
die();*/
        if ($this->request->server['HTTPS']) {
            return $this->config->get('config_ssl') . 'image/' . $image_new;
        } else {
            return $this->config->get('config_url') . 'image/' . $image_new;
        }
    }
}
