<?php
 abstract class selectorWhereProp {protected $value, $mode,  $modes = array('equals', 'notequals', 'ilike', 'like', 'more', 'eqmore', 'less', 'eqless', 'between', 'isnull', 'isnotnull');public function __call($vea9f6aca279138c58f705c8d4cb4b8ce, $args) {$vea9f6aca279138c58f705c8d4cb4b8ce = strtolower($vea9f6aca279138c58f705c8d4cb4b8ce);if(in_array($vea9f6aca279138c58f705c8d4cb4b8ce, $this->modes)) {$v2063c1608d6e0baf80249c42e2be5804 = sizeof($args) ? $args[0] : null;if($v2063c1608d6e0baf80249c42e2be5804 instanceof iUmiEntinty) {$v2063c1608d6e0baf80249c42e2be5804 = $v2063c1608d6e0baf80249c42e2be5804->getId();}if(isset($this->fieldId)) {$v06e3d36fa30cea095545139854ad1fb9 = selector::get('field')->id($this->fieldId);if($v6b1a57fa235477758817df3c91158006 = $v06e3d36fa30cea095545139854ad1fb9->getRestrictionId()) {$v3dadfaeb46ec74762b37de11fea7605c = baseRestriction::get($v6b1a57fa235477758817df3c91158006);if($v3dadfaeb46ec74762b37de11fea7605c instanceof iNormalizeInRestriction) {$v2063c1608d6e0baf80249c42e2be5804 = $v3dadfaeb46ec74762b37de11fea7605c->normalizeIn($v2063c1608d6e0baf80249c42e2be5804);}}if(is_numeric($v2063c1608d6e0baf80249c42e2be5804)) {$v2063c1608d6e0baf80249c42e2be5804 = (double) $v2063c1608d6e0baf80249c42e2be5804;}if($v06e3d36fa30cea095545139854ad1fb9->getDataType() == 'relation' && is_string($v2063c1608d6e0baf80249c42e2be5804)) {if($v52eb29c6d8ea0d3a5bb3654f49bbd7c7 = $v06e3d36fa30cea095545139854ad1fb9->getGuideId()) {$v8be74552df93e31bbdd6b36ed74bdb6a = new selector('objects');$v8be74552df93e31bbdd6b36ed74bdb6a->types('object-type')->id($v52eb29c6d8ea0d3a5bb3654f49bbd7c7);$v8be74552df93e31bbdd6b36ed74bdb6a->where('*')->ilike($v2063c1608d6e0baf80249c42e2be5804);$v2fa47f7c65fec19cc163b195725e3844 = sizeof($v8be74552df93e31bbdd6b36ed74bdb6a->result);if($v2fa47f7c65fec19cc163b195725e3844 > 0 && $v2fa47f7c65fec19cc163b195725e3844 < 100) {$v2063c1608d6e0baf80249c42e2be5804 = $v8be74552df93e31bbdd6b36ed74bdb6a->result;}}}if($v06e3d36fa30cea095545139854ad1fb9->getDataType() == 'date' && is_string($v2063c1608d6e0baf80249c42e2be5804)) {$v5fc732311905cb27e82d67f4f6511f7f = new umiDate;$v5fc732311905cb27e82d67f4f6511f7f->setDateByString(trim($v2063c1608d6e0baf80249c42e2be5804, ' %'));$v2063c1608d6e0baf80249c42e2be5804 = $v5fc732311905cb27e82d67f4f6511f7f->getDateTimeStamp();}}$this->value = $v2063c1608d6e0baf80249c42e2be5804;$this->mode = $vea9f6aca279138c58f705c8d4cb4b8ce;}else {throw new selectorException("This property doesn't support \"{$vea9f6aca279138c58f705c8d4cb4b8ce}\" method");}}public function between($vea2b2676c28c0db26d39331a336c6b92, $v7f021a1415b86f2d013b2618fb31ae53) {return $this->__call('between', array(array($vea2b2676c28c0db26d39331a336c6b92, $v7f021a1415b86f2d013b2618fb31ae53)));}public function __get($v23a5b8ab834cb5140fa6665622eb6417) {return $this->$v23a5b8ab834cb5140fa6665622eb6417;}};class selectorWhereSysProp extends selectorWhereProp {protected $name;public function __construct($vb068931cc450442b63f5b3d276ea4297) {$this->name = $vb068931cc450442b63f5b3d276ea4297;}};class selectorWhereFieldProp extends selectorWhereProp {protected $fieldId;public function __construct($v945100186b119048837b9859c2c46410) {$this->fieldId = $v945100186b119048837b9859c2c46410;}};class selectorWhereHierarchy {protected $elementId, $level = 1, $selfLevel;public function page($v7552cd149af7495ee7d8225974e50f80)  {$vb81ca7c0ccaa77e7aa91936ab0070695 = umiHierarchy::getInstance();if(is_numeric($v7552cd149af7495ee7d8225974e50f80) == false) {$v7552cd149af7495ee7d8225974e50f80 = $vb81ca7c0ccaa77e7aa91936ab0070695->getIdByPath($v7552cd149af7495ee7d8225974e50f80);}if($v7552cd149af7495ee7d8225974e50f80 !== false) {$this->elementId = (int) $v7552cd149af7495ee7d8225974e50f80;}return $this;}public function childs($vc9e9a848920877e76685b2e4e76de38d = 1) {if(is_null($this->selfLevel)) {$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT level FROM cms3_hierarchy_relations WHERE child_id = {$this->elementId}";$result = l_mysql_query($vac5c74b64b4b8352ef2f181affb5ac2a);list($this->selfLevel) = mysql_fetch_row($result);}$this->level = ($vc9e9a848920877e76685b2e4e76de38d == 0) ? 0 : (int) $vc9e9a848920877e76685b2e4e76de38d + (int) $this->selfLevel;}public function __get($v23a5b8ab834cb5140fa6665622eb6417) {return $this->$v23a5b8ab834cb5140fa6665622eb6417;}};class selectorWherePermissions {protected $level = 0x1, $owners = array(), $isSv;public function __construct() {$permissions = permissionsCollection::getInstance();$v8e44f0089b076e18a718eb9ca3d94674 = $permissions->getUserId();$this->isSv = $permissions->isSv();if(!$this->isSv) {$this->owners = array($v8e44f0089b076e18a718eb9ca3d94674);}}public function level($vc9e9a848920877e76685b2e4e76de38d) {$this->level = (int) $vc9e9a848920877e76685b2e4e76de38d;}public function owners($vb132392a317588e56460e77a8fd74229) {if(is_array($vb132392a317588e56460e77a8fd74229)) {foreach($vb132392a317588e56460e77a8fd74229 as $v72122ce96bfec66e2396d2e25225d70a) $this->owners($v72122ce96bfec66e2396d2e25225d70a);}else {$this->addOwner($vb132392a317588e56460e77a8fd74229);}return $this;}public function __get($v23a5b8ab834cb5140fa6665622eb6417) {return $this->$v23a5b8ab834cb5140fa6665622eb6417;}protected function addOwner($vb0ab4f7791b60b1e8ea01057b77873b0) {if(in_array($vb0ab4f7791b60b1e8ea01057b77873b0, $this->owners)) return;$permissions = permissionsCollection::getInstance();$v5891da2d64975cae48d175d1e001f5da = umiObjectsCollection::getInstance();$va8cfde6331bd59eb2ac96f8911c4b666 = $v5891da2d64975cae48d175d1e001f5da->getObject($vb0ab4f7791b60b1e8ea01057b77873b0);if($va8cfde6331bd59eb2ac96f8911c4b666 instanceof iUmiObject) {if($permissions->isSv($vb0ab4f7791b60b1e8ea01057b77873b0)) {$this->isSv = true;return;}$this->owners[] = $vb0ab4f7791b60b1e8ea01057b77873b0;if($va8cfde6331bd59eb2ac96f8911c4b666->groups) {$this->owners = array_merge($this->owners, $va8cfde6331bd59eb2ac96f8911c4b666->groups);}}}};?>