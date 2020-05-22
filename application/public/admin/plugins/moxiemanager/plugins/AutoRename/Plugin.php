<?php
/**
 * Plugin.php
 *
 * Copyright 2003-2013, Moxiecode Systems AB, All rights reserved.
 */

/**
 * ....
 *
 */
class MOXMAN_AutoRename_Plugin implements MOXMAN_IPlugin {
	public function init() {
		MOXMAN::getPluginManager()->get("core")->bind("BeforeFileAction", "onBeforeFileAction", $this);
	}

	public function onBeforeFileAction(MOXMAN_Vfs_FileActionEventArgs $args) {
		switch ($args->getAction()) {
			case MOXMAN_Vfs_FileActionEventArgs::ADD:
				$args->setFile($this->renameFile($args->getFile()));
				break;
			case MOXMAN_Vfs_FileActionEventArgs::MOVE:
				$args->setTargetFile($this->renameFile($args->getTargetFile()));
				break;
		}
	}

	/**
	 * Fixes filenames
	 *
	 * @param MOXMAN_Vfs_IFile $file File to fix name on.
	 */
	public function renameFile(MOXMAN_Vfs_IFile $file) {
		$config = $file->getConfig();
		$autorename = $config->get("autorename.enabled", "");
		$spacechar = $config->get("autorename.space", "_");
		$custom = $config->get("autorename.pattern", "/[^0-9a-z\-_]/i");
		//$overwrite = $config->get("upload.overwrite", false);
		$lowercase = $config->get("autorename.lowercase", false);

		// @codeCoverageIgnoreStart
		if (!$autorename) {
			return $file;
		}

		// @codeCoverageIgnoreEnd
		$path = $file->getPath();
		$name = $file->getName();
		$orgname = $name;
		$ext = MOXMAN_Util_PathUtils::getExtension($path);

        //$name = $this->toSlug($name);
		$name = preg_replace("/\.". $ext ."$/i", "", $name);
		$name = str_replace(array('\'', '"'), '', $name);
		$name = htmlentities($name, ENT_QUOTES, 'UTF-8');
		$name = preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', $name);
		$name = preg_replace($custom, $spacechar, $name);
		$name = str_replace(" ", $spacechar, $name);
		$name = trim($name);

		if ($lowercase) {
			$ext = strtolower($ext);
			$name = strtolower($name);
		}

		if ($ext) {
			$name = $name .".". $ext;
		}

		// If no change to name after all this, return original file.
		if ($name === $orgname) {
			return $file;
		}

		// Return new file
		$toFile = MOXMAN::getFile($file->getParent() . "/" . $name);

		return $toFile;
	}
    function toSlug($doc)
    {
        $str = addslashes(html_entity_decode($doc));
        $str = $this->toNormal($str);
        $str = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
        $str = preg_replace("/( )/", '-', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace("\/", '', $str);
        $str = str_replace("+", "", $str);
        $str = strtolower($str);
        $str = stripslashes($str);
        return trim($str, '-');
    }
    function toNormal($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }
}

// Add plugin
MOXMAN::getPluginManager()->add("autorename", new MOXMAN_AutoRename_Plugin());

?>