<?php

class org_silex_publication_PublicationService extends org_silex_service_ServiceBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct("publicationService");
	}}
	public function setPublicationConfig($publicationName, $configData, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$config = new org_silex_publication_PublicationConfig(null);
			$config->configData = _hx_anonymous(array("state" => $configData->state, "category" => $configData->category, "creation" => $configData->creation, "lastChange" => $configData->lastChange, "debugModeAction" => $configData->debugModeAction));
			$config->saveData($publicationFolder . $publicationName . "/" . "conf/" . "/" . "config.xml.php");
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function getPublicationConfig($publicationName, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$config = new org_silex_publication_PublicationConfig($publicationFolder . $publicationName . "/" . "conf/" . "config.xml.php");
			return $config->configData;
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function setPublicationData($publicationName, $publicationData, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			sys_io_File::saveContent($publicationFolder . $publicationName . "/" . "index.html", $publicationData->html);
			sys_io_File::saveContent($publicationFolder . $publicationName . "/" . "app.css", $publicationData->css);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function getPublicationData($publicationName, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$html = sys_io_File::getContent($publicationFolder . $publicationName . "/" . "index.html");
			$css = sys_io_File::getContent($publicationFolder . $publicationName . "/" . "app.css");
			return _hx_anonymous(array("html" => $html, "css" => $css));
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function trash($publicationName, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$configData = $this->getPublicationConfig($publicationName, $publicationFolder);
			$configData->state = org_silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => "todo: authors and security", "date" => Date::now())));
			$configData->lastChange->author = "to do this author";
			$configData->lastChange->date = Date::now();
			$this->setPublicationConfig($publicationName, $configData, $publicationFolder);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function rename($srcPublicationName, $publicationName, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$publicationData = $this->getPublicationData($srcPublicationName, $publicationFolder);
			$this->create($publicationName, $publicationData, $publicationFolder);
			org_silex_util_FileSystemTools::recursiveDelete($publicationFolder . $srcPublicationName);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function duplicate($srcPublicationName, $publicationName, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$publicationData = $this->getPublicationData($srcPublicationName, $publicationFolder);
			$this->create($publicationName, $publicationData, $publicationFolder);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function create($publicationName, $publicationData, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		try {
			$configData = _hx_anonymous(array("state" => org_silex_publication_PublicationState::$Private, "category" => org_silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::now())), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::now())), "debugModeAction" => null));
			@mkdir($publicationFolder . $publicationName, 493);
			@mkdir($publicationFolder . $publicationName . "/" . "conf/", 493);
			$this->setPublicationConfig($publicationName, $configData, $publicationFolder);
			$this->setPublicationData($publicationName, $publicationData, $publicationFolder);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				throw new HException($e);
			}
		}
	}
	public function emptyTrash($publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		$publications = $this->getPublications(new _hx_array(array(org_silex_publication_PublicationState::Trashed(null))), null, $publicationFolder);
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			org_silex_util_FileSystemTools::recursiveDelete($publicationFolder . $publicationName . "/");
		}
	}
	public function getPublications($stateFilter = null, $categoryFilter = null, $publicationFolder = null) {
		if($publicationFolder === null) {
			$publicationFolder = "publications/";
		}
		$files = sys_FileSystem::readDirectory($publicationFolder);
		$publications = new Hash();
		{
			$_g = 0;
			while($_g < $files->length) {
				$name = $files[$_g];
				++$_g;
				$path = $publicationFolder . $name . "/";
				if(is_dir($path)) {
					$configData = $this->getPublicationConfig($name, $publicationFolder);
					$fitStateFilter = false;
					$fitCategoryFilter = false;
					if($stateFilter === null || $stateFilter->length === 0) {
						$fitStateFilter = true;
					} else {
						$»t = ($configData->state);
						switch($»t->index) {
						case 2:
						{
							if(Lambda::has($stateFilter, org_silex_publication_PublicationState::$Private, null)) {
								$fitStateFilter = true;
							}
						}break;
						case 0:
						$data = $»t->params[0];
						{
							if(Lambda::has($stateFilter, org_silex_publication_PublicationState::Trashed(null), null)) {
								$fitStateFilter = true;
							}
						}break;
						case 1:
						$data = $»t->params[0];
						{
							if(Lambda::has($stateFilter, org_silex_publication_PublicationState::Published(null), null)) {
								$fitStateFilter = true;
							}
						}break;
						}
					}
					if($categoryFilter === null || $categoryFilter->length === 0) {
						$fitCategoryFilter = true;
					} else {
						$»t = ($configData->category);
						switch($»t->index) {
						case 0:
						{
							if(Lambda::has($categoryFilter, org_silex_publication_PublicationCategory::$Publication, null)) {
								$fitCategoryFilter = true;
							}
						}break;
						case 1:
						{
							if(Lambda::has($categoryFilter, org_silex_publication_PublicationCategory::$Utility, null)) {
								$fitCategoryFilter = true;
							}
						}break;
						case 2:
						{
							if(Lambda::has($categoryFilter, org_silex_publication_PublicationCategory::$Theme, null)) {
								$fitCategoryFilter = true;
							}
						}break;
						}
					}
					if($fitStateFilter && $fitCategoryFilter) {
						$publications->set($name, $configData);
					}
					unset($fitStateFilter,$fitCategoryFilter,$configData);
				}
				unset($path,$name);
			}
		}
		return $publications;
	}
	static $SERVICE_NAME = "publicationService";
	function __toString() { return 'org.silex.publication.PublicationService'; }
}
