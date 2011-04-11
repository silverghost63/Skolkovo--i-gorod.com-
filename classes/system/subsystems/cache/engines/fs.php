<?php
 class fsCacheEngine implements iCacheEngine {protected $wc, $is_connected = false;const mask = 0777, entLevel = 5;public function __construct() {$this->wc = $this->requireFolder(SYS_CACHE_RUNTIME . 'fs-cache/');$this->is_connected = (bool) $this->wc;}public function getIsConnected() {return $this->is_connected;}public function saveObjectData($v3c6e0b8a9c15224a8228b9a98ca1531d, $va8cfde6331bd59eb2ac96f8911c4b666, $vcd91e7679d575a2c548bd2c889c23b9e) {$this->saveRawData($v3c6e0b8a9c15224a8228b9a98ca1531d, $va8cfde6331bd59eb2ac96f8911c4b666, $vcd91e7679d575a2c548bd2c889c23b9e);}public function saveRawData($v3c6e0b8a9c15224a8228b9a98ca1531d, $vb45cffe084dd3d20d928bee85e7b0f21, $vcd91e7679d575a2c548bd2c889c23b9e) {if($vcd91e7679d575a2c548bd2c889c23b9e <= 0) $this->delete($v3c6e0b8a9c15224a8228b9a98ca1531d);$vd6fe1d0be6347b8ef2427fa629c04485 = $this->calcPathByKey($v3c6e0b8a9c15224a8228b9a98ca1531d);$this->requireFile($vd6fe1d0be6347b8ef2427fa629c04485);$v9a0364b9e99bb480dd25e1f0284c8555 = (int) $vcd91e7679d575a2c548bd2c889c23b9e . "\n" . serialize($vb45cffe084dd3d20d928bee85e7b0f21);file_put_contents($vd6fe1d0be6347b8ef2427fa629c04485, $v9a0364b9e99bb480dd25e1f0284c8555);}public function loadObjectData($v3c6e0b8a9c15224a8228b9a98ca1531d) {return $this->loadRawData($v3c6e0b8a9c15224a8228b9a98ca1531d);}public function loadRawData($v3c6e0b8a9c15224a8228b9a98ca1531d) {$vd6fe1d0be6347b8ef2427fa629c04485 = $this->calcPathByKey($v3c6e0b8a9c15224a8228b9a98ca1531d);if(is_file($vd6fe1d0be6347b8ef2427fa629c04485) == false) return false;$v7076b27a4ff56615fedb41f803f69baa = filemtime($vd6fe1d0be6347b8ef2427fa629c04485);$v9a0364b9e99bb480dd25e1f0284c8555 = file_get_contents($vd6fe1d0be6347b8ef2427fa629c04485);$v865c0c0b4ab0e063e5caa3387c1a8741 = strpos($v9a0364b9e99bb480dd25e1f0284c8555, "\n");$vcd91e7679d575a2c548bd2c889c23b9e = (int) substr($v9a0364b9e99bb480dd25e1f0284c8555, 0, $v865c0c0b4ab0e063e5caa3387c1a8741);if(time() > ($v7076b27a4ff56615fedb41f803f69baa + $vcd91e7679d575a2c548bd2c889c23b9e)) {$this->delete($v3c6e0b8a9c15224a8228b9a98ca1531d);return false;}$v8d777f385d3dfec8815d20f7496026dc = substr($v9a0364b9e99bb480dd25e1f0284c8555, $v865c0c0b4ab0e063e5caa3387c1a8741 + 1);return unserialize($v8d777f385d3dfec8815d20f7496026dc);}public function delete($v3c6e0b8a9c15224a8228b9a98ca1531d) {$vd6fe1d0be6347b8ef2427fa629c04485 = $this->calcPathByKey($v3c6e0b8a9c15224a8228b9a98ca1531d);if(is_file($vd6fe1d0be6347b8ef2427fa629c04485)) @unlink($vd6fe1d0be6347b8ef2427fa629c04485);}public function flush() {if($this->wc) {$v736007832d2167baaae763fd3a3f3cf1 = new umiDirectory($this->wc);$v736007832d2167baaae763fd3a3f3cf1->delete();}}protected function requireFolder($v851148b4fd8fd7ae74bd9100c5c0c898) {if(!is_dir($v851148b4fd8fd7ae74bd9100c5c0c898)) mkdir($v851148b4fd8fd7ae74bd9100c5c0c898, self::mask, true);return $v851148b4fd8fd7ae74bd9100c5c0c898;}protected function requireFile($v8c7dd922ad47494fc02c388e12c00eac) {$this->requireFolder(dirname($v8c7dd922ad47494fc02c388e12c00eac));touch($v8c7dd922ad47494fc02c388e12c00eac);chmod($v8c7dd922ad47494fc02c388e12c00eac, self::mask);}protected function calcPathByKey($v3c6e0b8a9c15224a8228b9a98ca1531d) {$v2fa47f7c65fec19cc163b195725e3844 = self::entLevel;$v78f0805fa8ffadabda721fdaf85b3ca9 = array_reverse(preg_split("/[_\.\/:]+/", $v3c6e0b8a9c15224a8228b9a98ca1531d));$v8162eb6d94b84f82b3a1ad304a2530ea = array_pop($v78f0805fa8ffadabda721fdaf85b3ca9);if(strlen($v8162eb6d94b84f82b3a1ad304a2530ea) < $v2fa47f7c65fec19cc163b195725e3844) {$v8162eb6d94b84f82b3a1ad304a2530ea = str_repeat('0', $v2fa47f7c65fec19cc163b195725e3844 - strlen($v8162eb6d94b84f82b3a1ad304a2530ea)) . $v8162eb6d94b84f82b3a1ad304a2530ea;}for($v865c0c0b4ab0e063e5caa3387c1a8741 = 0;$v865c0c0b4ab0e063e5caa3387c1a8741 < $v2fa47f7c65fec19cc163b195725e3844;$v865c0c0b4ab0e063e5caa3387c1a8741++)  $v78f0805fa8ffadabda721fdaf85b3ca9[] = substr($v8162eb6d94b84f82b3a1ad304a2530ea, $v865c0c0b4ab0e063e5caa3387c1a8741, 1);if($v2fa47f7c65fec19cc163b195725e3844 < strlen($v8162eb6d94b84f82b3a1ad304a2530ea)) $v78f0805fa8ffadabda721fdaf85b3ca9[] = substr($v8162eb6d94b84f82b3a1ad304a2530ea, $v2fa47f7c65fec19cc163b195725e3844);return $this->wc . implode("/", $v78f0805fa8ffadabda721fdaf85b3ca9);}};?>