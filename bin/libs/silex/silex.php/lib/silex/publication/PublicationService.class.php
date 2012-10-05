<?php

class silex_publication_PublicationService extends silex_ServiceBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(silex_publication_PublicationService::$SERVICE_NAME);
		$GLOBALS['%s']->pop();
	}}
	public function setPublicationConfig($publicationName, $configData) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::setPublicationConfig");
		$»spos = $GLOBALS['%s']->length;
		try {
			$config = new silex_publication_PublicationConfig(null);
			$config->configData = _hx_anonymous(array("state" => $configData->state, "category" => $configData->category, "creation" => $configData->creation, "lastChange" => $configData->lastChange, "debugModeAction" => $configData->debugModeAction));
			$config->saveData(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "conf/" . "/" . "config.xml.php");
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublicationConfig($publicationName) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::getPublicationConfig");
		$»spos = $GLOBALS['%s']->length;
		try {
			$config = new silex_publication_PublicationConfig(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "conf/" . "config.xml.php");
			{
				$»tmp = $config->configData;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function setPublicationData($publicationName, $publicationData) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::setPublicationData");
		$»spos = $GLOBALS['%s']->length;
		try {
			sys_io_File::saveContent(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "index.html", $publicationData->html);
			sys_io_File::saveContent(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "app.css", $publicationData->css);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublicationData($publicationName) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::getPublicationData");
		$»spos = $GLOBALS['%s']->length;
		try {
			$html = sys_io_File::getContent(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "index.html");
			$css = sys_io_File::getContent(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "app.css");
			{
				$»tmp = _hx_anonymous(array("html" => $html, "css" => $css));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function trash($publicationName) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::trash");
		$»spos = $GLOBALS['%s']->length;
		try {
			$configData = $this->getPublicationConfig($publicationName);
			$configData->state = silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => "todo: authors and security", "date" => Date::now())));
			$configData->lastChange->author = "to do this author";
			$configData->lastChange->date = Date::now();
			$this->setPublicationConfig($publicationName, $configData);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function rename($srcPublicationName, $publicationName) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::rename");
		$»spos = $GLOBALS['%s']->length;
		try {
			$publicationData = $this->getPublicationData($srcPublicationName);
			$this->create($publicationName, $publicationData);
			silex_util_FileSystemTools::recursiveDelete(silex_publication_PublicationService::$PUBLICATION_FOLDER . $srcPublicationName);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function duplicate($srcPublicationName, $publicationName) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::duplicate");
		$»spos = $GLOBALS['%s']->length;
		try {
			$publicationData = $this->getPublicationData($srcPublicationName);
			$this->create($publicationName, $publicationData);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function create($publicationName, $publicationData) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::create");
		$»spos = $GLOBALS['%s']->length;
		try {
			$configData = _hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::now())), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::now())), "debugModeAction" => null));
			@mkdir(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName, 493);
			@mkdir(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/" . "conf/", 493);
			$this->setPublicationConfig($publicationName, $configData);
			$this->setPublicationData($publicationName, $publicationData);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function emptyTrash() {
		$GLOBALS['%s']->push("silex.publication.PublicationService::emptyTrash");
		$»spos = $GLOBALS['%s']->length;
		$publications = $this->getPublications(new _hx_array(array(silex_publication_PublicationState::Trashed(null))), null);
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			silex_util_FileSystemTools::recursiveDelete(silex_publication_PublicationService::$PUBLICATION_FOLDER . $publicationName . "/");
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublications($stateFilter = null, $categoryFilter = null) {
		$GLOBALS['%s']->push("silex.publication.PublicationService::getPublications");
		$»spos = $GLOBALS['%s']->length;
		$files = sys_FileSystem::readDirectory(silex_publication_PublicationService::$PUBLICATION_FOLDER);
		$publications = new Hash();
		{
			$_g = 0;
			while($_g < $files->length) {
				$name = $files[$_g];
				++$_g;
				$path = silex_publication_PublicationService::$PUBLICATION_FOLDER . $name . "/";
				if(is_dir($path)) {
					$configData = $this->getPublicationConfig($name);
					$fitStateFilter = false;
					$fitCategoryFilter = false;
					if($stateFilter === null || $stateFilter->length === 0) {
						$fitStateFilter = true;
					} else {
						$»t = ($configData->state);
						switch($»t->index) {
						case 2:
						{
							if(Lambda::has($stateFilter, silex_publication_PublicationState::$Private, null)) {
								$fitStateFilter = true;
							}
						}break;
						case 0:
						$data = $»t->params[0];
						{
							if(Lambda::has($stateFilter, silex_publication_PublicationState::Trashed(null), null)) {
								$fitStateFilter = true;
							}
						}break;
						case 1:
						$data = $»t->params[0];
						{
							if(Lambda::has($stateFilter, silex_publication_PublicationState::Published(null), null)) {
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
							if(Lambda::has($categoryFilter, silex_publication_PublicationCategory::$Publication, null)) {
								$fitCategoryFilter = true;
							}
						}break;
						case 1:
						{
							if(Lambda::has($categoryFilter, silex_publication_PublicationCategory::$Utility, null)) {
								$fitCategoryFilter = true;
							}
						}break;
						case 2:
						{
							if(Lambda::has($categoryFilter, silex_publication_PublicationCategory::$Theme, null)) {
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
		{
			$GLOBALS['%s']->pop();
			return $publications;
		}
		$GLOBALS['%s']->pop();
	}
	static $SERVICE_NAME = "publicationService";
	static $PUBLICATION_FOLDER = "./publications/";
	static $BUILDER_PUBLICATION_NAME = "admin";
	function __toString() { return 'silex.publication.PublicationService'; }
}
