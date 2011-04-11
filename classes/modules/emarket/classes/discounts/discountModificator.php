<?php
 abstract class discountModificator extends umiObjectProxy {protected $name, $discount, $object;public static function create(discount $ve2dc6c48c56de466f6d13781796abf3d, umiObject $v8cdfd1cfa3c104c26b00256bc7f5d7b8) {$v5891da2d64975cae48d175d1e001f5da = umiObjectsCollection::getInstance();$v16b2b26000987faccb260b9d39df1269 = $v5891da2d64975cae48d175d1e001f5da->addObject('', $v8cdfd1cfa3c104c26b00256bc7f5d7b8->modificator_type_id);$va8cfde6331bd59eb2ac96f8911c4b666 = $v5891da2d64975cae48d175d1e001f5da->getObject($v16b2b26000987faccb260b9d39df1269);if($va8cfde6331bd59eb2ac96f8911c4b666 instanceof umiObject) {$va8cfde6331bd59eb2ac96f8911c4b666->setValue('modificator_type_id', $v8cdfd1cfa3c104c26b00256bc7f5d7b8->getId());$va8cfde6331bd59eb2ac96f8911c4b666->commit();return self::get($v16b2b26000987faccb260b9d39df1269, $ve2dc6c48c56de466f6d13781796abf3d);}else {return false;}}public static function get($v338c1f7a2f8afe2cd832c21fbaf2491a, discount $ve2dc6c48c56de466f6d13781796abf3d) {$v5891da2d64975cae48d175d1e001f5da = umiObjectsCollection::getInstance();$v55551339c2ae3c4ac7cff84da33d332e = $v5891da2d64975cae48d175d1e001f5da->getObject($v338c1f7a2f8afe2cd832c21fbaf2491a);if($v55551339c2ae3c4ac7cff84da33d332e instanceof umiObject == false) return false;$vadceddddb69e6187bceace83aa4ab0f6 = self::getCodeName($v55551339c2ae3c4ac7cff84da33d332e->modificator_type_id);if(!$vadceddddb69e6187bceace83aa4ab0f6) return false;if(!self::includeModificator($vadceddddb69e6187bceace83aa4ab0f6)) return false;$v6f66e878c62db60568a3487869695820 = $vadceddddb69e6187bceace83aa4ab0f6 . 'DiscountModificator';if(!class_exists($v6f66e878c62db60568a3487869695820)) return false;$vcc988f011312e4c8b814c94033811229 = new $v6f66e878c62db60568a3487869695820($ve2dc6c48c56de466f6d13781796abf3d, $v55551339c2ae3c4ac7cff84da33d332e, $vadceddddb69e6187bceace83aa4ab0f6);return ($vcc988f011312e4c8b814c94033811229 instanceof discountModificator) ? $vcc988f011312e4c8b814c94033811229 : false;}public static function getList($v65b6e2aac2f682a632ccd61650e47085 = false) {$v6301cee35ea764a1e241978f93f01069 = self::getModificatorType()->getId();$v8be74552df93e31bbdd6b36ed74bdb6a = new selector('objects');$v8be74552df93e31bbdd6b36ed74bdb6a->types('object-type')->id($v6301cee35ea764a1e241978f93f01069);if($v65b6e2aac2f682a632ccd61650e47085) {$v8be74552df93e31bbdd6b36ed74bdb6a->where('modificator_discount_types')->equals($v65b6e2aac2f682a632ccd61650e47085);}return $v8be74552df93e31bbdd6b36ed74bdb6a->result();}abstract public function recalcPrice($v78a5eb43deef9a7b5b9ce157b9d52ac4);protected function __construct(discount $ve2dc6c48c56de466f6d13781796abf3d, umiObject $vda2dc92ee83a9f229a35eee412144e40, $v9a79c462c3c07cbf915ce11837e9d3c9) {parent::__construct($vda2dc92ee83a9f229a35eee412144e40);$this->name = $v9a79c462c3c07cbf915ce11837e9d3c9;$this->discount = $ve2dc6c48c56de466f6d13781796abf3d;$this->init();}protected function init() {}private static function getModificatorType() {$v0e8133eb006c0f85ed9444ae07a60842 = umiObjectTypesCollection::getInstance();$v6301cee35ea764a1e241978f93f01069 = $v0e8133eb006c0f85ed9444ae07a60842->getBaseType('emarket', 'discount_modificator_type');if(!$v6301cee35ea764a1e241978f93f01069) {throw new coreException("Required data type (emarket::discount_modificator_type) not found");}return $v0e8133eb006c0f85ed9444ae07a60842->getType($v6301cee35ea764a1e241978f93f01069);}private static function includeModificator($v3bfd700d80f7f6e33459a24999ce8e00) {static $v99f78c54130e752954404fff0707dcbd = Array();if(isset($v99f78c54130e752954404fff0707dcbd[$v3bfd700d80f7f6e33459a24999ce8e00])) {return $v99f78c54130e752954404fff0707dcbd[$v3bfd700d80f7f6e33459a24999ce8e00];}$v6a2a431fe8b621037ea949531c28551d = CURRENT_WORKING_DIR . '/classes/modules/emarket/classes/discounts/modificators/' . $v3bfd700d80f7f6e33459a24999ce8e00 . '.php';if(is_file($v6a2a431fe8b621037ea949531c28551d)) {require $v6a2a431fe8b621037ea949531c28551d;return $v99f78c54130e752954404fff0707dcbd[$v3bfd700d80f7f6e33459a24999ce8e00] = true;}return $v99f78c54130e752954404fff0707dcbd[$v3bfd700d80f7f6e33459a24999ce8e00] = false;}private static function getCodeName($v6506e79376c349f614e2fe6b153623aa) {static $v0fea6a13c52b4d4725368f24b045ca84 = Array();if(isset($v0fea6a13c52b4d4725368f24b045ca84[$v6506e79376c349f614e2fe6b153623aa])) {return $v0fea6a13c52b4d4725368f24b045ca84[$v6506e79376c349f614e2fe6b153623aa];}$v5891da2d64975cae48d175d1e001f5da = umiObjectsCollection::getInstance();$v8cdfd1cfa3c104c26b00256bc7f5d7b8 = $v5891da2d64975cae48d175d1e001f5da->getObject($v6506e79376c349f614e2fe6b153623aa);$v0fea6a13c52b4d4725368f24b045ca84[$v6506e79376c349f614e2fe6b153623aa] = ($v8cdfd1cfa3c104c26b00256bc7f5d7b8 instanceof umiObject) ? trim($v8cdfd1cfa3c104c26b00256bc7f5d7b8->modificator_codename) : false;return $v0fea6a13c52b4d4725368f24b045ca84[$v6506e79376c349f614e2fe6b153623aa];}};?>