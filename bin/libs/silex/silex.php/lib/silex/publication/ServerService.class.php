<?php

class silex_publication_ServerService extends silex_ServiceBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.publication.ServerService::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(silex_publication_ServerService::$SERVICE_NAME);
		$GLOBALS['%s']->pop();
	}}
	public function setPublicationConfig($publicationName, $configData) {
		$GLOBALS['%s']->push("silex.publication.ServerService::setPublicationConfig");
		$»spos = $GLOBALS['%s']->length;
		try {
			$config = new silex_publication_PublicationConfig(null);
			$config->configData = _hx_anonymous(array("state" => $configData->state, "category" => $configData->category, "creation" => $configData->creation, "lastChange" => $configData->lastChange, "debugModeAction" => $configData->debugModeAction));
			$config->saveData($this->getPublicationFolder($publicationName) . "conf/" . "config.xml.php");
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("setPublicationConfig(" . $publicationName . ", " . Std::string($configData) . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublicationConfig($publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::getPublicationConfig");
		$»spos = $GLOBALS['%s']->length;
		try {
			$config = new silex_publication_PublicationConfig($this->getPublicationFolder($publicationName) . "conf/" . "config.xml.php");
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
				throw new HException("getPublicationConfig(" . $publicationName . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function setPublicationData($publicationName, $publicationData) {
		$GLOBALS['%s']->push("silex.publication.ServerService::setPublicationData");
		$»spos = $GLOBALS['%s']->length;
		try {
			sys_io_File::saveContent($this->getPublicationFolder($publicationName) . "index.html", $publicationData->html);
			sys_io_File::saveContent($this->getPublicationFolder($publicationName) . "app.css", $publicationData->css);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("setPublicationData(" . $publicationName . ", " . Std::string($publicationData) . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublicationData($publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::getPublicationData");
		$»spos = $GLOBALS['%s']->length;
		try {
			$html = sys_io_File::getContent($this->getPublicationFolder($publicationName) . "index.html");
			$css = sys_io_File::getContent($this->getPublicationFolder($publicationName) . "app.css");
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
				throw new HException("getPublicationData(" . $publicationName . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function trash($publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::trash");
		$»spos = $GLOBALS['%s']->length;
		try {
			$configData = $this->getPublicationConfig($publicationName);
			$configData->state = silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => "silexlabs", "date" => Date::now())));
			$configData->lastChange->author = "silexlabs";
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
				throw new HException("trash(" . $publicationName . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function rename($srcPublicationName, $publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::rename");
		$»spos = $GLOBALS['%s']->length;
		try {
			$this->doDuplicate($srcPublicationName, $publicationName, null);
			silex_util_FileSystemTools::recursiveDelete($this->getPublicationFolder($srcPublicationName));
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("rename(" . $srcPublicationName . ", " . $publicationName . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function duplicate($srcPublicationName, $publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::duplicate");
		$»spos = $GLOBALS['%s']->length;
		try {
			$this->doDuplicate($srcPublicationName, $publicationName, null);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("duplicate(" . $srcPublicationName . ", " . $publicationName . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function create($publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::create");
		$»spos = $GLOBALS['%s']->length;
		try {
			$configData = _hx_anonymous(array("state" => null, "category" => null, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::now())), "lastChange" => null, "debugModeAction" => null));
			$this->doDuplicate(silex_publication_PublicationConstants::$CREATION_TEMPLATE_PUBLICATION_NAME, $publicationName, $configData);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("create error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function emptyTrash() {
		$GLOBALS['%s']->push("silex.publication.ServerService::emptyTrash");
		$»spos = $GLOBALS['%s']->length;
		$publications = $this->getPublications(new _hx_array(array(silex_publication_PublicationState::Trashed(null))), null);
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			silex_util_FileSystemTools::recursiveDelete($this->getPublicationFolder($publicationName));
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublications($stateFilter = null, $categoryFilter = null) {
		$GLOBALS['%s']->push("silex.publication.ServerService::getPublications");
		$»spos = $GLOBALS['%s']->length;
		$files = sys_FileSystem::readDirectory(silex_publication_PublicationConstants::$PUBLICATION_FOLDER);
		$publications = new Hash();
		{
			$_g = 0;
			while($_g < $files->length) {
				$name = $files[$_g];
				++$_g;
				if(!StringTools::startsWith($name, ".") && _hx_index_of($name, "..", null) < 0) {
					$path = $this->getPublicationFolder($name);
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
					unset($path);
				}
				unset($name);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $publications;
		}
		$GLOBALS['%s']->pop();
	}
	public function doDuplicate($srcPublicationName, $publicationName, $newConfigData = null) {
		$GLOBALS['%s']->push("silex.publication.ServerService::doDuplicate");
		$»spos = $GLOBALS['%s']->length;
		try {
			$configData = $this->getPublicationConfig($srcPublicationName);
			silex_util_FileSystemTools::recursiveCopy($this->getPublicationFolder($srcPublicationName), $this->getPublicationFolder($publicationName));
			$configData->lastChange->author = "silexlabs";
			$configData->lastChange->date = Date::now();
			if($newConfigData !== null) {
				$_g = 0; $_g1 = Reflect::fields($newConfigData);
				while($_g < $_g1->length) {
					$fieldName = $_g1[$_g];
					++$_g;
					$value = Reflect::field($newConfigData, $fieldName);
					if($value !== null) {
						$configData->{$fieldName} = $value;
					}
					unset($value,$fieldName);
				}
			}
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
				throw new HException("doDuplicate(" . $srcPublicationName . ", " . $publicationName . ", " . Std::string($newConfigData) . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPublicationFolder($publicationName) {
		$GLOBALS['%s']->push("silex.publication.ServerService::getPublicationFolder");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = silex_publication_PublicationConstants::$PUBLICATION_FOLDER . $publicationName . "/";
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $SERVICE_NAME = "publicationService";
	function __toString() { return 'silex.publication.ServerService'; }
}
