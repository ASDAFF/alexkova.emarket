<?php
namespace Alexkova\Emarket\Catalog;

class Image {
	public function getResizeImage($imageID, $size=200){
		if ($imageID>0){
			$arImage = \CFile::ResizeImageGet($imageID, array('width'=>$size, 'height'=>$size));
			return($arImage["src"]);
		}
	}
} 