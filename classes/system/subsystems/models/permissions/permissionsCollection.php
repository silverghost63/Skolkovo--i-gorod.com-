<?php
 class permissionsCollection extends singleton implements iSingleton, iPermissionsCollection {protected $methodsPermissions = array(), $user_id = 0, $tempElementPermissions = array();const E_READ_ALLOWED   = 0;const E_EDIT_ALLOWED   = 1;const E_CREATE_ALLOWED = 2;const E_DELETE_ALLOWED = 3;const E_MOVE_ALLOWED   = 4;const E_READ_ALLOWED_BIT   = 1;const E_EDIT_ALLOWED_BIT   = 2;const E_CREATE_ALLOWED_BIT = 4;const E_DELETE_ALLOWED_BIT = 8;const E_MOVE_ALLOWED_BIT   = 16;public function __construct() {if(is_null(getRequest('guest-mode')) == false) {$this->user_id = self::getGuestId();return;}$v9bc65c2abec141778ffaa729489f3e87 = cmsController::getInstance()->getModule("users");if($v9bc65c2abec141778ffaa729489f3e87 instanceof def_module) {$this->user_id = $v9bc65c2abec141778ffaa729489f3e87->user_id;}}public static function getInstance() {return parent::getInstance(__CLASS__);}public function getOwnerType($v5e7b19364b8de2dedd3aa48cf62706e3) {if($v41064781857b29db62b319b579676852 = umiObjectsCollection::getInstance()->getObject($v5e7b19364b8de2dedd3aa48cf62706e3)) {if($v1471e4e05a4db95d353cc867fe317314 = $v41064781857b29db62b319b579676852->getPropByName("groups")) {return $v1471e4e05a4db95d353cc867fe317314->getValue();}else {return $v5e7b19364b8de2dedd3aa48cf62706e3;}}else {return false;}}public function makeSqlWhere($v5e7b19364b8de2dedd3aa48cf62706e3, $v8a7ee68c0472cf0cf8e3f2cba2134c27 = false) {static $v0fea6a13c52b4d4725368f24b045ca84 = array();if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3])) return $v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3];$v72122ce96bfec66e2396d2e25225d70a = $this->getOwnerType($v5e7b19364b8de2dedd3aa48cf62706e3);if(is_numeric($v72122ce96bfec66e2396d2e25225d70a)) {$v72122ce96bfec66e2396d2e25225d70a = array();}if($v5e7b19364b8de2dedd3aa48cf62706e3) {$v72122ce96bfec66e2396d2e25225d70a[] = $v5e7b19364b8de2dedd3aa48cf62706e3;}$v72122ce96bfec66e2396d2e25225d70a[] = self::getGuestId();$v72122ce96bfec66e2396d2e25225d70a = array_unique($v72122ce96bfec66e2396d2e25225d70a);if(sizeof($v72122ce96bfec66e2396d2e25225d70a) > 2) {foreach($v72122ce96bfec66e2396d2e25225d70a as $v865c0c0b4ab0e063e5caa3387c1a8741 => $vb80bb7740288fda1f201890375a60c8f) {if($vb80bb7740288fda1f201890375a60c8f == $v5e7b19364b8de2dedd3aa48cf62706e3 && $v8a7ee68c0472cf0cf8e3f2cba2134c27) {unset($v72122ce96bfec66e2396d2e25225d70a[$v865c0c0b4ab0e063e5caa3387c1a8741]);}}$v72122ce96bfec66e2396d2e25225d70a = array_unique($v72122ce96bfec66e2396d2e25225d70a);sort($v72122ce96bfec66e2396d2e25225d70a);}$vac5c74b64b4b8352ef2f181affb5ac2a = "";$v7dabf5c198b0bab2eaa42bb03a113e55 = sizeof($v72122ce96bfec66e2396d2e25225d70a);for($v865c0c0b4ab0e063e5caa3387c1a8741 = 0;$v865c0c0b4ab0e063e5caa3387c1a8741 < $v7dabf5c198b0bab2eaa42bb03a113e55;$v865c0c0b4ab0e063e5caa3387c1a8741++) {$vac5c74b64b4b8352ef2f181affb5ac2a .= "cp.owner_id = '{$v72122ce96bfec66e2396d2e25225d70a[$v865c0c0b4ab0e063e5caa3387c1a8741]}'";if($v865c0c0b4ab0e063e5caa3387c1a8741 < ($v7dabf5c198b0bab2eaa42bb03a113e55 - 1)) {$vac5c74b64b4b8352ef2f181affb5ac2a .= " OR ";}}$vac5c74b64b4b8352ef2f181affb5ac2a = "({$vac5c74b64b4b8352ef2f181affb5ac2a})";return $v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3] = $vac5c74b64b4b8352ef2f181affb5ac2a;}public function isAllowedModule($v5e7b19364b8de2dedd3aa48cf62706e3, $v22884db148f0ffb0d830ba431102b0b5) {static $v0fea6a13c52b4d4725368f24b045ca84 = array();if($v5e7b19364b8de2dedd3aa48cf62706e3 == false) {$v5e7b19364b8de2dedd3aa48cf62706e3 = $this->getUserId();}if($this->isSv($v5e7b19364b8de2dedd3aa48cf62706e3)) return true;if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3][$v22884db148f0ffb0d830ba431102b0b5])) return $v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3][$v22884db148f0ffb0d830ba431102b0b5];$v7a310d89a58d8189e31d766fb1fb745a = $this->makeSqlWhere($v5e7b19364b8de2dedd3aa48cf62706e3);$v22884db148f0ffb0d830ba431102b0b5 = mysql_real_escape_string($v22884db148f0ffb0d830ba431102b0b5);if(substr($v22884db148f0ffb0d830ba431102b0b5, 0, 7) == "macros_") return false;$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE module, MAX(cp.allow) FROM cms_permissions cp WHERE method IS NULL AND {$v7a310d89a58d8189e31d766fb1fb745a} GROUP BY module";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);while(list($v22884db148f0ffb0d830ba431102b0b5, $vb394126a0e52e75f1e3d535d0fb0d33c) = mysql_fetch_row($result)) {$v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3][$v22884db148f0ffb0d830ba431102b0b5] = $vb394126a0e52e75f1e3d535d0fb0d33c;}return isset($v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3][$v22884db148f0ffb0d830ba431102b0b5]) ? (bool) $v0fea6a13c52b4d4725368f24b045ca84[$v5e7b19364b8de2dedd3aa48cf62706e3][$v22884db148f0ffb0d830ba431102b0b5] : false;}public function isAllowedMethod($v5e7b19364b8de2dedd3aa48cf62706e3, $v22884db148f0ffb0d830ba431102b0b5, $vea9f6aca279138c58f705c8d4cb4b8ce, $v8a7ee68c0472cf0cf8e3f2cba2134c27 = false) {if($v22884db148f0ffb0d830ba431102b0b5 == "content" && !strlen($vea9f6aca279138c58f705c8d4cb4b8ce)) return 1;if($v22884db148f0ffb0d830ba431102b0b5 == "config" && $vea9f6aca279138c58f705c8d4cb4b8ce == "menu") return 1;if($v22884db148f0ffb0d830ba431102b0b5 == "eshop" && $vea9f6aca279138c58f705c8d4cb4b8ce == "makeRealDivide") return 1;if($this->isAdmin($v5e7b19364b8de2dedd3aa48cf62706e3)) {if($this->isAdminAllowedMethod($v22884db148f0ffb0d830ba431102b0b5, $vea9f6aca279138c58f705c8d4cb4b8ce)) {return 1;}}if($this->isSv($v5e7b19364b8de2dedd3aa48cf62706e3)) return true;if(!$v22884db148f0ffb0d830ba431102b0b5) return false;$vea9f6aca279138c58f705c8d4cb4b8ce = $this->getBaseMethodName($v22884db148f0ffb0d830ba431102b0b5, $vea9f6aca279138c58f705c8d4cb4b8ce);$vcb69789460f93042a787f8d250ca26dc = &$this->methodsPermissions;if(!isset($vcb69789460f93042a787f8d250ca26dc[$v5e7b19364b8de2dedd3aa48cf62706e3]) || !is_array($vcb69789460f93042a787f8d250ca26dc[$v5e7b19364b8de2dedd3aa48cf62706e3])) {$vcb69789460f93042a787f8d250ca26dc[$v5e7b19364b8de2dedd3aa48cf62706e3] = array();}$v0fea6a13c52b4d4725368f24b045ca84 = &$vcb69789460f93042a787f8d250ca26dc[$v5e7b19364b8de2dedd3aa48cf62706e3];$v7a310d89a58d8189e31d766fb1fb745a = $this->makeSqlWhere($v5e7b19364b8de2dedd3aa48cf62706e3, $v8a7ee68c0472cf0cf8e3f2cba2134c27);if($v22884db148f0ffb0d830ba431102b0b5 == "backup" && $vea9f6aca279138c58f705c8d4cb4b8ce == "rollback") return true;if($v22884db148f0ffb0d830ba431102b0b5 == "autoupdate" && $vea9f6aca279138c58f705c8d4cb4b8ce == "service") return true;if($v22884db148f0ffb0d830ba431102b0b5 == "config" && ($vea9f6aca279138c58f705c8d4cb4b8ce == "lang_list" || $vea9f6aca279138c58f705c8d4cb4b8ce == "lang_phrases")) return true;if($v22884db148f0ffb0d830ba431102b0b5 == "users" && ($vea9f6aca279138c58f705c8d4cb4b8ce == "auth" || $vea9f6aca279138c58f705c8d4cb4b8ce == "login_do" || $vea9f6aca279138c58f705c8d4cb4b8ce == "login")) return true;$v0a42907b589a309ad94f8874eacbc63f = $v22884db148f0ffb0d830ba431102b0b5;if(!array_key_exists($v0a42907b589a309ad94f8874eacbc63f, $v0fea6a13c52b4d4725368f24b045ca84)) {$v248064bbf6355f96570c9a17b0b1f781 = cacheFrontend::getInstance()->loadData('module_perms_' . $v5e7b19364b8de2dedd3aa48cf62706e3 . '_' . $v0a42907b589a309ad94f8874eacbc63f);if(is_array($v248064bbf6355f96570c9a17b0b1f781)) {$v0fea6a13c52b4d4725368f24b045ca84[$v22884db148f0ffb0d830ba431102b0b5] = $v248064bbf6355f96570c9a17b0b1f781;}else {$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE cp.method, MAX(cp.allow) FROM cms_permissions cp WHERE module = '{$v22884db148f0ffb0d830ba431102b0b5}' AND {$v7a310d89a58d8189e31d766fb1fb745a} GROUP BY module, method";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);$v0fea6a13c52b4d4725368f24b045ca84[$v22884db148f0ffb0d830ba431102b0b5] = array();while(list($v05dd82e678780573a4af462d35d7f06d) = mysql_fetch_row($result)) {$v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f][] = $v05dd82e678780573a4af462d35d7f06d;}cacheFrontend::getInstance()->saveData('module_perms_' . $v5e7b19364b8de2dedd3aa48cf62706e3 . '_' . $v0a42907b589a309ad94f8874eacbc63f, $v0fea6a13c52b4d4725368f24b045ca84[$v22884db148f0ffb0d830ba431102b0b5], 3600);}}if (in_array($vea9f6aca279138c58f705c8d4cb4b8ce, $v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f]) || in_array(strtolower($vea9f6aca279138c58f705c8d4cb4b8ce), $v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f])) {return true;}else {return false;}}public function isAllowedObject($v5e7b19364b8de2dedd3aa48cf62706e3, $vaf31437ce61345f416579830a98c91e5, $vbd354405a20aa635025421c9edb5d41d = false) {$vaf31437ce61345f416579830a98c91e5 = (int) $vaf31437ce61345f416579830a98c91e5;if($vaf31437ce61345f416579830a98c91e5 == 0) return array(false, false, false, false, false);if($this->isSv($v5e7b19364b8de2dedd3aa48cf62706e3)) {return array(true, true, true, true, true);}if(array_key_exists($vaf31437ce61345f416579830a98c91e5, $this->tempElementPermissions)) {$vc9e9a848920877e76685b2e4e76de38d = $this->tempElementPermissions[$vaf31437ce61345f416579830a98c91e5];return array((bool)($vc9e9a848920877e76685b2e4e76de38d&1), (bool)($vc9e9a848920877e76685b2e4e76de38d&2), (bool)($vc9e9a848920877e76685b2e4e76de38d&4), (bool)($vc9e9a848920877e76685b2e4e76de38d&8), (bool)($vc9e9a848920877e76685b2e4e76de38d&16) );}static $v0fea6a13c52b4d4725368f24b045ca84;if(!is_array($v0fea6a13c52b4d4725368f24b045ca84)) {$v0fea6a13c52b4d4725368f24b045ca84 = array();}$v0a42907b589a309ad94f8874eacbc63f = $v5e7b19364b8de2dedd3aa48cf62706e3 . "." . $vaf31437ce61345f416579830a98c91e5;if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f]) && is_array($v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f])) {return $v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f];}$v7a310d89a58d8189e31d766fb1fb745a = $this->makeSqlWhere($v5e7b19364b8de2dedd3aa48cf62706e3);$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE BIT_OR(cp.level) FROM cms3_permissions cp WHERE rel_id = '{$vaf31437ce61345f416579830a98c91e5}' AND {$v7a310d89a58d8189e31d766fb1fb745a}";$vc9e9a848920877e76685b2e4e76de38d = false;cacheFrontend::getInstance()->loadSql($vac5c74b64b4b8352ef2f181affb5ac2a);if(!$vc9e9a848920877e76685b2e4e76de38d || $vbd354405a20aa635025421c9edb5d41d) {$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);list($vc9e9a848920877e76685b2e4e76de38d) = mysql_fetch_row($result);$vc9e9a848920877e76685b2e4e76de38d = array((bool)($vc9e9a848920877e76685b2e4e76de38d&1), (bool)($vc9e9a848920877e76685b2e4e76de38d&2), (bool)($vc9e9a848920877e76685b2e4e76de38d&4), (bool)($vc9e9a848920877e76685b2e4e76de38d&8), (bool)($vc9e9a848920877e76685b2e4e76de38d&16) );}if($vc9e9a848920877e76685b2e4e76de38d) {cacheFrontend::getInstance()->saveSql($vac5c74b64b4b8352ef2f181affb5ac2a, $vc9e9a848920877e76685b2e4e76de38d, 600);}$v0fea6a13c52b4d4725368f24b045ca84[$v0a42907b589a309ad94f8874eacbc63f] = $vc9e9a848920877e76685b2e4e76de38d;return $vc9e9a848920877e76685b2e4e76de38d;}public function isSv($ve8701ad48ba05a91604e480dd60899a3 = false) {static $v1b747442de0fb075fcdc59af978fa41b = array();if($ve8701ad48ba05a91604e480dd60899a3 === false) {$ve8701ad48ba05a91604e480dd60899a3 = $this->getUserId();}if(isset($v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3])) {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3];}if(is_null(getRequest('guest-mode')) == false) {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = false;}if($vee11cbb19052e40b07aac0ca060c23ee = umiObjectsCollection::getInstance()->getObject($ve8701ad48ba05a91604e480dd60899a3)) {if($ve8701ad48ba05a91604e480dd60899a3 == 15) {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = true;}if($v1471e4e05a4db95d353cc867fe317314 = $vee11cbb19052e40b07aac0ca060c23ee->getPropByName("groups")) {if(in_array(15, $v1471e4e05a4db95d353cc867fe317314->getValue())) {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = true;}else {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = false;}}else {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = false;}}else {return $v1b747442de0fb075fcdc59af978fa41b[$ve8701ad48ba05a91604e480dd60899a3] = false;}}public function isAdmin($ve8701ad48ba05a91604e480dd60899a3 = false) {static $vc60879c6b41321704ee88fbc7b9a73e4 = array();if($ve8701ad48ba05a91604e480dd60899a3 === false) $ve8701ad48ba05a91604e480dd60899a3 = $this->getUserId();if(isset($vc60879c6b41321704ee88fbc7b9a73e4[$ve8701ad48ba05a91604e480dd60899a3])) return $vc60879c6b41321704ee88fbc7b9a73e4[$ve8701ad48ba05a91604e480dd60899a3];if($this->isSv($ve8701ad48ba05a91604e480dd60899a3)) return $vc60879c6b41321704ee88fbc7b9a73e4[$ve8701ad48ba05a91604e480dd60899a3] = true;if(is_array(getSession('is_admin'))) {$vc60879c6b41321704ee88fbc7b9a73e4 = getSession('is_admin');if(isset($vc60879c6b41321704ee88fbc7b9a73e4[$ve8701ad48ba05a91604e480dd60899a3])) return $vc60879c6b41321704ee88fbc7b9a73e4[$ve8701ad48ba05a91604e480dd60899a3];}$v7a310d89a58d8189e31d766fb1fb745a = $this->makeSqlWhere($ve8701ad48ba05a91604e480dd60899a3);$vac5c74b64b4b8352ef2f181affb5ac2a = <<<SQL
SELECT SQL_CACHE COUNT(cp.allow) 
	FROM cms_permissions cp 
	WHERE method IS NULL AND {$v7a310d89a58d8189e31d766fb1fb745a} AND cp.allow IN (1, 2) GROUP BY module
SQL;
INSERT INTO cms3_permissions (level, owner_id, rel_id) 
	SELECT 1, '{$v5e7b19364b8de2dedd3aa48cf62706e3}', id FROM cms3_hierarchy WHERE type_id IN ({$vd14a8022b085f9ef19d479cbdd581127})
SQL;
INSERT INTO cms3_permissions (level, owner_id, rel_id) 
	SELECT 31, '{$v5e7b19364b8de2dedd3aa48cf62706e3}', id FROM cms3_hierarchy WHERE type_id IN ({$vd14a8022b085f9ef19d479cbdd581127})
SQL;