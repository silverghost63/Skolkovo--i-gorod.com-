<?php
 class umiObjectTypesCollection extends singleton implements iSingleton, iUmiObjectTypesCollection {private $types = Array();protected function __construct() {}public static function getInstance() {return parent::getInstance(__CLASS__);}public function getType($v94757cae63fd3e398c0811a976dd6bbe) {if(!$v94757cae63fd3e398c0811a976dd6bbe) {return false;}if($this->isLoaded($v94757cae63fd3e398c0811a976dd6bbe)) {return $this->types[$v94757cae63fd3e398c0811a976dd6bbe];}else {if(true) {$this->loadType($v94757cae63fd3e398c0811a976dd6bbe);return getArrayKey($this->types, $v94757cae63fd3e398c0811a976dd6bbe);}else {return false;}}throw new coreException("Unknow error");}public function addType($v6be379826b20cc58475f636e33f4606b, $vb068931cc450442b63f5b3d276ea4297, $v1945c9a2a5e2ba6133f1db6757a35fcb = false) {$this->disableCache();$v6be379826b20cc58475f636e33f4606b = (int) $v6be379826b20cc58475f636e33f4606b;$vac5c74b64b4b8352ef2f181affb5ac2a = "INSERT INTO cms3_object_types (parent_id) VALUES('{$v6be379826b20cc58475f636e33f4606b}')";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}$v94757cae63fd3e398c0811a976dd6bbe = mysql_insert_id();$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT * FROM cms3_object_field_groups WHERE type_id = '{$v6be379826b20cc58475f636e33f4606b}'";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}while($vf1965a857bc285d26fe22023aa5ab50d = mysql_fetch_assoc($result)) {$vac5c74b64b4b8352ef2f181affb5ac2a = "INSERT INTO cms3_object_field_groups (name, title, type_id, is_active, is_visible, ord, is_locked) VALUES ('" . mysql_real_escape_string($vf1965a857bc285d26fe22023aa5ab50d['name']) . "', '" . mysql_real_escape_string($vf1965a857bc285d26fe22023aa5ab50d['title']) . "', '{$v94757cae63fd3e398c0811a976dd6bbe}', '{$vf1965a857bc285d26fe22023aa5ab50d['is_active']}', '{$vf1965a857bc285d26fe22023aa5ab50d['is_visible']}', '{$vf1965a857bc285d26fe22023aa5ab50d['ord']}', '{$vf1965a857bc285d26fe22023aa5ab50d['is_locked']}')";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}$v159ce805831f9f42598564e0fbd06f83 = $vf1965a857bc285d26fe22023aa5ab50d['id'];$v5f2444d49c5d43b9cf7a3d7174b983f1 = mysql_insert_id();$vac5c74b64b4b8352ef2f181affb5ac2a = "INSERT INTO cms3_fields_controller SELECT ord, field_id, '{$v5f2444d49c5d43b9cf7a3d7174b983f1}' FROM cms3_fields_controller WHERE group_id = '{$v159ce805831f9f42598564e0fbd06f83}'";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}}$vee085e556579b9a69e64e3eddc559b89 = false;if($v6be379826b20cc58475f636e33f4606b) {$v328a21868fce2b3f8569db40f1aa8a89 = $this->getType($v6be379826b20cc58475f636e33f4606b);if($v328a21868fce2b3f8569db40f1aa8a89) {$vee085e556579b9a69e64e3eddc559b89 = $v328a21868fce2b3f8569db40f1aa8a89->getHierarchyTypeId();}}$v599dcce2998a6b40b1e38e8c6006cb0a = new umiObjectType($v94757cae63fd3e398c0811a976dd6bbe);$v599dcce2998a6b40b1e38e8c6006cb0a->setName($vb068931cc450442b63f5b3d276ea4297);$v599dcce2998a6b40b1e38e8c6006cb0a->setIsLocked($v1945c9a2a5e2ba6133f1db6757a35fcb);if($vee085e556579b9a69e64e3eddc559b89) {$v599dcce2998a6b40b1e38e8c6006cb0a->setHierarchyTypeId($vee085e556579b9a69e64e3eddc559b89);}$v599dcce2998a6b40b1e38e8c6006cb0a->commit();$this->types[$v94757cae63fd3e398c0811a976dd6bbe] = $v599dcce2998a6b40b1e38e8c6006cb0a;return $v94757cae63fd3e398c0811a976dd6bbe;}public function delType($v94757cae63fd3e398c0811a976dd6bbe) {if($this->isExists($v94757cae63fd3e398c0811a976dd6bbe)) {$v599dcce2998a6b40b1e38e8c6006cb0a = $this->getType($v94757cae63fd3e398c0811a976dd6bbe);if ($v599dcce2998a6b40b1e38e8c6006cb0a->getIsLocked()) throw new publicAdminException (getLabel('error-object-type-locked'));$this->disableCache();$vadce578d04ed03c31f6ac59451fcf8e4 = $this->getChildClasses($v94757cae63fd3e398c0811a976dd6bbe);$v7dabf5c198b0bab2eaa42bb03a113e55 = sizeof($vadce578d04ed03c31f6ac59451fcf8e4);for($v865c0c0b4ab0e063e5caa3387c1a8741 = 0;$v865c0c0b4ab0e063e5caa3387c1a8741 < $v7dabf5c198b0bab2eaa42bb03a113e55;$v865c0c0b4ab0e063e5caa3387c1a8741++) {$vd4fd255f51559df00de5424b64292413 = $vadce578d04ed03c31f6ac59451fcf8e4[$v865c0c0b4ab0e063e5caa3387c1a8741];if($this->isExists($vd4fd255f51559df00de5424b64292413)) {$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_objects WHERE type_id = '{$vd4fd255f51559df00de5424b64292413}'";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_object_types WHERE id = '{$vd4fd255f51559df00de5424b64292413}'";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_import_types WHERE new_id = '{$vd4fd255f51559df00de5424b64292413}';";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}unset($this->types[$vd4fd255f51559df00de5424b64292413]);}}$v94757cae63fd3e398c0811a976dd6bbe = (int) $v94757cae63fd3e398c0811a976dd6bbe;$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_objects WHERE type_id = '{$v94757cae63fd3e398c0811a976dd6bbe}'";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_object_types WHERE id = '{$v94757cae63fd3e398c0811a976dd6bbe}'";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);$vac5c74b64b4b8352ef2f181affb5ac2a = "DELETE FROM cms3_import_types WHERE new_id = '{$v94757cae63fd3e398c0811a976dd6bbe}';";l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}unset($this->types[$v94757cae63fd3e398c0811a976dd6bbe]);return true;}else {return false;}}public function isExists($v94757cae63fd3e398c0811a976dd6bbe) {return true;}private function isLoaded($v94757cae63fd3e398c0811a976dd6bbe) {if($v94757cae63fd3e398c0811a976dd6bbe === false) return false;return (bool) array_key_exists($v94757cae63fd3e398c0811a976dd6bbe, $this->types);}private function loadType($v94757cae63fd3e398c0811a976dd6bbe) {if($this->isLoaded($v94757cae63fd3e398c0811a976dd6bbe)) {return true;}else {$v599dcce2998a6b40b1e38e8c6006cb0a = cacheFrontend::getInstance()->load($v94757cae63fd3e398c0811a976dd6bbe, "object_type");if($v599dcce2998a6b40b1e38e8c6006cb0a instanceof umiObjectType == false) {try {$v599dcce2998a6b40b1e38e8c6006cb0a = new umiObjectType($v94757cae63fd3e398c0811a976dd6bbe);}catch(privateException $ve1671797c52e15f763380b45e841ec32) {return false;}cacheFrontend::getInstance()->save($v599dcce2998a6b40b1e38e8c6006cb0a, "object_type");}if(is_object($v599dcce2998a6b40b1e38e8c6006cb0a)) {$this->types[$v94757cae63fd3e398c0811a976dd6bbe] = $v599dcce2998a6b40b1e38e8c6006cb0a;return true;}else {return false;}}}public function getSubTypesList($v94757cae63fd3e398c0811a976dd6bbe) {if(!is_numeric($v94757cae63fd3e398c0811a976dd6bbe)) {throw new coreException("Type id must be numeric");return false;}$v94757cae63fd3e398c0811a976dd6bbe = (int) $v94757cae63fd3e398c0811a976dd6bbe;$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id FROM cms3_object_types WHERE parent_id = '{$v94757cae63fd3e398c0811a976dd6bbe}'";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}$v9b207167e5381c47682c6b4f58a623fb = Array();while(list($v94757cae63fd3e398c0811a976dd6bbe) = mysql_fetch_row($result)) {$v9b207167e5381c47682c6b4f58a623fb[] = (int) $v94757cae63fd3e398c0811a976dd6bbe;}return $v9b207167e5381c47682c6b4f58a623fb;}public function getParentClassId($v94757cae63fd3e398c0811a976dd6bbe) {if($this->isLoaded($v94757cae63fd3e398c0811a976dd6bbe)) {return $this->getType($v94757cae63fd3e398c0811a976dd6bbe)->getParentId();}else {$v94757cae63fd3e398c0811a976dd6bbe = (int) $v94757cae63fd3e398c0811a976dd6bbe;$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE parent_id FROM cms3_object_types WHERE id = '{$v94757cae63fd3e398c0811a976dd6bbe}'";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}if(list($v2e3c048401582f4247d7ccac43657d2d) = mysql_fetch_row($result)) {return (int) $v2e3c048401582f4247d7ccac43657d2d;}else {return false;}}}public function getChildClasses($v94757cae63fd3e398c0811a976dd6bbe, $vadce578d04ed03c31f6ac59451fcf8e4 = false) {$v9b207167e5381c47682c6b4f58a623fb = Array();if(!$vadce578d04ed03c31f6ac59451fcf8e4) $vadce578d04ed03c31f6ac59451fcf8e4 = Array();$v94757cae63fd3e398c0811a976dd6bbe = (int) $v94757cae63fd3e398c0811a976dd6bbe;$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id FROM cms3_object_types WHERE parent_id = '{$v94757cae63fd3e398c0811a976dd6bbe}'";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}while(list($vb80bb7740288fda1f201890375a60c8f) = mysql_fetch_row($result)) {$v9b207167e5381c47682c6b4f58a623fb[] = $vb80bb7740288fda1f201890375a60c8f;if(!in_array($vb80bb7740288fda1f201890375a60c8f, $vadce578d04ed03c31f6ac59451fcf8e4)) $v9b207167e5381c47682c6b4f58a623fb = array_merge($v9b207167e5381c47682c6b4f58a623fb, $this->getChildClasses($vb80bb7740288fda1f201890375a60c8f, $v9b207167e5381c47682c6b4f58a623fb));}$v9b207167e5381c47682c6b4f58a623fb = array_unique($v9b207167e5381c47682c6b4f58a623fb);return $v9b207167e5381c47682c6b4f58a623fb;}public function getGuidesList($v805ab0374f72d8da46502cbb00c05464 = false, $va08f2aee9de301619776deb6fee83e50 = null) {$v9b207167e5381c47682c6b4f58a623fb = Array();if($v805ab0374f72d8da46502cbb00c05464) {$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id, name FROM cms3_object_types WHERE is_guidable = '1' AND is_public = '1'";}else {$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id, name FROM cms3_object_types WHERE is_guidable = '1'";}if($va08f2aee9de301619776deb6fee83e50) {$va08f2aee9de301619776deb6fee83e50 = (int) $va08f2aee9de301619776deb6fee83e50;$vac5c74b64b4b8352ef2f181affb5ac2a .= " AND parent_id = '{$va08f2aee9de301619776deb6fee83e50}'";}$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);while(list($vb80bb7740288fda1f201890375a60c8f, $vb068931cc450442b63f5b3d276ea4297) = mysql_fetch_row($result)) {$v9b207167e5381c47682c6b4f58a623fb[$vb80bb7740288fda1f201890375a60c8f] = $this->translateLabel($vb068931cc450442b63f5b3d276ea4297);}return $v9b207167e5381c47682c6b4f58a623fb;}public function getTypesByHierarchyTypeId($v0715f6d9497f93911417c9c324265771, $v35507ea46d2c0b049d7ed968c449223d = false) {static $v0fea6a13c52b4d4725368f24b045ca84 = Array();$v0715f6d9497f93911417c9c324265771 = (int) $v0715f6d9497f93911417c9c324265771;if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771]) && $v35507ea46d2c0b049d7ed968c449223d == false) return $v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771];$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id, name FROM cms3_object_types WHERE hierarchy_type_id = '{$v0715f6d9497f93911417c9c324265771}'";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}$v9b207167e5381c47682c6b4f58a623fb = Array();while(list($vb80bb7740288fda1f201890375a60c8f, $vb068931cc450442b63f5b3d276ea4297) = mysql_fetch_row($result)) {$v9b207167e5381c47682c6b4f58a623fb[$vb80bb7740288fda1f201890375a60c8f] = $this->translateLabel($vb068931cc450442b63f5b3d276ea4297);}return $v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771] = $v9b207167e5381c47682c6b4f58a623fb;}public function getTypeByHierarchyTypeId($v0715f6d9497f93911417c9c324265771, $v35507ea46d2c0b049d7ed968c449223d = false) {static $v0fea6a13c52b4d4725368f24b045ca84 = Array();$v0715f6d9497f93911417c9c324265771 = (int) $v0715f6d9497f93911417c9c324265771;if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771]) && $v35507ea46d2c0b049d7ed968c449223d == false) return $v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771];$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT SQL_CACHE id FROM cms3_object_types WHERE hierarchy_type_id = '{$v0715f6d9497f93911417c9c324265771}' LIMIT 1";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);if($v56bd7107802ebe56c6918992f0608ec6 = mysql_error()) {throw new coreException($v56bd7107802ebe56c6918992f0608ec6);return false;}if(list($vb80bb7740288fda1f201890375a60c8f) = mysql_fetch_row($result)) {return $v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771] = $vb80bb7740288fda1f201890375a60c8f;}else {return $v0fea6a13c52b4d4725368f24b045ca84[$v0715f6d9497f93911417c9c324265771] = false;}}public function getBaseType($vb068931cc450442b63f5b3d276ea4297, $vabf77184f55403d75b9d51d79162a7ca = "") {$vb946c44d711ade3b061653732977d043 = umiHierarchyTypesCollection::getInstance()->getTypeByName($vb068931cc450442b63f5b3d276ea4297, $vabf77184f55403d75b9d51d79162a7ca);if($vb946c44d711ade3b061653732977d043) {$v0715f6d9497f93911417c9c324265771 = $vb946c44d711ade3b061653732977d043->getId();$v94757cae63fd3e398c0811a976dd6bbe = $this->getTypeByHierarchyTypeId($v0715f6d9497f93911417c9c324265771);return (int) $v94757cae63fd3e398c0811a976dd6bbe;}else {return false;}}}?>