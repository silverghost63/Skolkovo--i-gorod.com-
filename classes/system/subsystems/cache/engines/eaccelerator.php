<?php
 class eacceleratorCacheEngine implements iCacheEngine {protected $connected = false;public function __construct() {$this->connected = true;}public function getIsConnected() {return (bool) $this->connected;}public function saveObjectData($v3c6e0b8a9c15224a8228b9a98ca1531d, $va8cfde6331bd59eb2ac96f8911c4b666, $vcd91e7679d575a2c548bd2c889c23b9e) {return eaccelerator_put($v3c6e0b8a9c15224a8228b9a98ca1531d, serialize($va8cfde6331bd59eb2ac96f8911c4b666), $vcd91e7679d575a2c548bd2c889c23b9e);}public function saveRawData($v3c6e0b8a9c15224a8228b9a98ca1531d, $vb45cffe084dd3d20d928bee85e7b0f21, $vcd91e7679d575a2c548bd2c889c23b9e) {return eaccelerator_put($v3c6e0b8a9c15224a8228b9a98ca1531d, $vb45cffe084dd3d20d928bee85e7b0f21, $vcd91e7679d575a2c548bd2c889c23b9e);}public function loadObjectData($v3c6e0b8a9c15224a8228b9a98ca1531d) {$result = eaccelerator_get($v3c6e0b8a9c15224a8228b9a98ca1531d);if($result) {return unserialize($result);}else {return false;}}public function loadRawData($v3c6e0b8a9c15224a8228b9a98ca1531d) {return eaccelerator_get($v3c6e0b8a9c15224a8228b9a98ca1531d);}public function delete($v3c6e0b8a9c15224a8228b9a98ca1531d) {return eaccelerator_rm($v3c6e0b8a9c15224a8228b9a98ca1531d);}public function flush() {$v9b207167e5381c47682c6b4f58a623fb = eaccelerator_clear();$v14f802e1fba977727845e8872c1743a7 = eaccelerator_list_keys();foreach($v14f802e1fba977727845e8872c1743a7 as $v3c6e0b8a9c15224a8228b9a98ca1531d) {eaccelerator_rm(substr($v3c6e0b8a9c15224a8228b9a98ca1531d['name'], 1));}return $v9b207167e5381c47682c6b4f58a623fb;}};?>