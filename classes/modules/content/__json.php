<?php
 abstract class __json_content extends baseModuleAdmin {public function json_get_editable_blocks() {$v510ff634fce407eea1763854519fd3ce = (int) getRequest('requestId');$vd11a7f89d7c79e361cb82bd0ada9ef91 = 50;if(!system_is_allowed("content", "qedit")) {exit();}$v4b43b0aee35624cd95b910189b3dc231 = getServer('HTTP_REFERER') . " | " . "http://" . getServer('HTTP_HOST') . getServer('REQUEST_URI');$v9b207167e5381c47682c6b4f58a623fb = '';$v3c6e0b8a9c15224a8228b9a98ca1531d = md5(getServer('HTTP_REFERER'));$v47c80780ab608cc046f2a6e6f071feb6 = getSession($v3c6e0b8a9c15224a8228b9a98ca1531d);if(!is_array($v47c80780ab608cc046f2a6e6f071feb6)) {$v47c80780ab608cc046f2a6e6f071feb6 = Array();}if(true) {$this->is_auth = false;if($v1e88513e4226ca45a20547bab9761c76 = cmsController::getInstance()->getModule("users")) {if($v1e88513e4226ca45a20547bab9761c76->is_auth()) {$v7ad6e70c936a7223ff2f1663258f4a0a = (int) $v1e88513e4226ca45a20547bab9761c76->user_id;$this->is_auth = true;$this->user_id = $v7ad6e70c936a7223ff2f1663258f4a0a;if($v5a459b4b428788e52383cf8fae051ef7 = umiObjectsCollection::getInstance()->getObject($v7ad6e70c936a7223ff2f1663258f4a0a)) {$vf92772949d595a912815dfee0eebc3fb = $v5a459b4b428788e52383cf8fae051ef7->getValue("lname");$v1bc8668465e7dcba83804ed7d95f8bce = $v5a459b4b428788e52383cf8fae051ef7->getValue("fname");$v37618849f93660614b1339b5a82f67f6 = $v5a459b4b428788e52383cf8fae051ef7->getValue("father_name");$vc56f5648d4c0e137f9de3dfc7a54d55b = "$vf92772949d595a912815dfee0eebc3fb $v1bc8668465e7dcba83804ed7d95f8bce $v37618849f93660614b1339b5a82f67f6";$v13ac4273dc853636a2413f2d70b438ff = $v5a459b4b428788e52383cf8fae051ef7->getValue("login");$v145cdd22e03d2447db29f9459c129600 = $v5a459b4b428788e52383cf8fae051ef7->getValue("groups");$v5c875c5744744651d10ccce32b6fb464 = Array();foreach($v145cdd22e03d2447db29f9459c129600 as $v5296237d106d81dd1e2314c49a643035) {$v5c875c5744744651d10ccce32b6fb464[] = umiObjectsCollection::getInstance()->getObject($v5296237d106d81dd1e2314c49a643035)->getName();}$va1ca70124e53a4f2847d6d1c34844be4 = implode(", ", $v5c875c5744744651d10ccce32b6fb464);}}}$v8f85b44f4a1eb8cd5c1064df913b3b29 = (int) permissionsCollection::getInstance()->isAllowedMethod($this->user_id, "content", "tickets");$v9b207167e5381c47682c6b4f58a623fb = <<<END
var response = new lLibResponse({$v510ff634fce407eea1763854519fd3ce});
response.links = new Array();
response.user_name = "{$vc56f5648d4c0e137f9de3dfc7a54d55b}";
response.user_login = "{$v13ac4273dc853636a2413f2d70b438ff}";
response.user_groups = "{$va1ca70124e53a4f2847d6d1c34844be4}";
response.modules = new Array();
response.ticketsAllowed = {$v8f85b44f4a1eb8cd5c1064df913b3b29};

END;
response.modules[response.modules.length] = new Array('{$v0744bf6dc42fec1c2800fc05b9808d82}', '{$vf3ad57c965e88f9adb8fdde75cf5f0d3}');

END;
response.modules[response.modules.length] = new Array('{$v0744bf6dc42fec1c2800fc05b9808d82}', '{$vf3ad57c965e88f9adb8fdde75cf5f0d3}');

END;
response.links[response.links.length] = new Array('{$vb068931cc450442b63f5b3d276ea4297}', '{$v2a304a1348456ccd2234cd71a81bd338}', '{$v22178d66649d30b18a7e4e331dc778ce}', '{$v1ab0d841dc5f91663e98cad420687e71}');

END;
lLib.getInstance().makeResponse(response);

END;

				var response = {
					"element_id"	: "{$v7057e8409c7c531a1a6e9ac3df4ed549}",
					"prop_name"	: "{$v23a5b8ab834cb5140fa6665622eb6417}",
					"control_id"	: "{$v944720f8c45818e8d3caeb688b70b9a9}",
					"value"		: "{$v3656061349751653a39f2de7e568c9e1}",
					"prop"		: "{$v23a5b8ab834cb5140fa6665622eb6417}"
				}

				lLib.getInstance().makeResponse(response);
END;
								<html>
									<head>
										<script type="text/javascript">
											var responseArgs = new Array();

											{$v285fe165c97e9d97d252997fe63243dc}

										</script>
									</head>
									<body>Upload ok!</body>
								</html>
END;
							<html>
								<head>
									<script type="text/javascript">
										var error = 'uploadError';
									</script>
								</head>
								<body>Upload error!</body>
							</html>
END;
							<html>
								<head>
									<script type="text/javascript">
										var error = 'uploadError';
									</script>
								</head>
								<body>Upload error!</body>
							</html>
END;
					var responseArgs = new Array();

					jsonRequestsController.getInstance().reportRequest({$vf68d2c3658a26018e43729b214bc84c9}, responseArgs);
END;

				responseArgs[responseArgs.length] = {
						img_info	: {
							"name"	: "{$v077694994fbe8cfb750856a03bca4708}",
							"title" : "{$vb790175058e05911758cdaedd66fe5d9}",
							"src"	: "{$v19e00dfe66d7957ccdaf9f5b7d7ae796}",
							"thumb_base" : "{$vb5503b3860aaf636fad4eaac73916b90}",
							"ext"	: "{$v3cc3cfd0a62f38145783ef77e19a0610}",
							"thumb"	: "{$veeaddacfa04d904c5e99ba1de2509ae8}",
							"width"	: "{$v70d35a4c33a246719a34e09f997e3290->getWidth()}",
							"height"	: "{$v70d35a4c33a246719a34e09f997e3290->getHeight()}"
						}
				}

END;
responseArgs[responseArgs.length] = {
		file_info	: {
			"type"	: "dir",
			"name"  : "..",
			"src"   : "{$vba78048dfd7717f145fa37ef4bff1cad}",
			"full_path" : "{$vd6fe1d0be6347b8ef2427fa629c04485}"
		}
	};

END;
responseArgs[responseArgs.length] = {
		file_info	: {
			"type"	: "dir",
			"name"  : "{$v100664c6e2c0333b19a729f2f3ddb7dd}",
			"src"   : "{$v25d902c24283ab8cfbac54dfa101ad31}",
			"full_path" : "{$vd6fe1d0be6347b8ef2427fa629c04485}"
		}
	};

END;
responseArgs[responseArgs.length] = {
		file_info	: {
			"type"	: "file",
			"name"  : "{$v5b063e275d506f65ebf1b02d926f19a4}",
			"src"   : "{$v8b0afb238c3cd824b61190b77b926185}",
			"full_path" : "{$vd6fe1d0be6347b8ef2427fa629c04485}"
		}
	};

END;
jsonRequestsController.getInstance().reportRequest({$vf68d2c3658a26018e43729b214bc84c9}, responseArgs);";header("Content-type: text/javascript; charset=utf-8");$this->flush($result);}public function json_get_images_panel() {$vf68d2c3658a26018e43729b214bc84c9 = getRequest('requestId');$v0bf37cfe9982a08aeee2ac22107dcb2a = strtolower(getRequest("type"));$vdf38ceb6517abb2f95107c2b39cfc047  = '';$v2ce9f0ddf8a74a96b76f1da1214ca0ec = ini_get("include_path");$vd3e73e87c121191720aa03fc8a866ab4 = $v2ce9f0ddf8a74a96b76f1da1214ca0ec.'images';if (strlen(getRequest('dir'))) {$vdf38ceb6517abb2f95107c2b39cfc047 = base64_decode(getRequest('dir'));}$vdf38ceb6517abb2f95107c2b39cfc047 = str_replace("\\", "/", $vdf38ceb6517abb2f95107c2b39cfc047);$vdf38ceb6517abb2f95107c2b39cfc047 = str_replace("//", "/", $vdf38ceb6517abb2f95107c2b39cfc047);if(strpos($vdf38ceb6517abb2f95107c2b39cfc047, $vd3e73e87c121191720aa03fc8a866ab4) === false || strpos($vdf38ceb6517abb2f95107c2b39cfc047, "..") !== false || strpos($vdf38ceb6517abb2f95107c2b39cfc047, "./") !== false) {$vdf38ceb6517abb2f95107c2b39cfc047 = $vd3e73e87c121191720aa03fc8a866ab4;}while (substr($vdf38ceb6517abb2f95107c2b39cfc047, -1)=="/") $vdf38ceb6517abb2f95107c2b39cfc047=substr($vdf38ceb6517abb2f95107c2b39cfc047, 0, (strlen($vdf38ceb6517abb2f95107c2b39cfc047)-1));$v720aa0a7de050a6992d8e710eaa13450 = new umiDirectory($vdf38ceb6517abb2f95107c2b39cfc047);$vb566484d98c3f5131cfe5bda8303a120 = "";if (!$v720aa0a7de050a6992d8e710eaa13450->getIsBroken()) {if ($v0bf37cfe9982a08aeee2ac22107dcb2a === "dir") {$v0dd970ac429c7bc44ed532dc1807e2f6 = '';if ($vdf38ceb6517abb2f95107c2b39cfc047 !== $vd3e73e87c121191720aa03fc8a866ab4) {$v1161410dd62d4b2d416dfd7b561daf72 = explode("/", $v720aa0a7de050a6992d8e710eaa13450->getPath());array_pop($v1161410dd62d4b2d416dfd7b561daf72);$v0dd970ac429c7bc44ed532dc1807e2f6 = implode("/", $v1161410dd62d4b2d416dfd7b561daf72);}$vfc19ae0e7cb9076cc4077381bbe0b168 = umiConversion::getInstance()->Any2UTF8($v720aa0a7de050a6992d8e710eaa13450->getName());$vb566484d98c3f5131cfe5bda8303a120 .= <<<END
					responseArgs[responseArgs.length] = {
									"name" : '{$vfc19ae0e7cb9076cc4077381bbe0b168}',
									"path" : '{$v720aa0a7de050a6992d8e710eaa13450->getPath()}',
									"parent_dir" : '{$v0dd970ac429c7bc44ed532dc1807e2f6}'
							}
END;

							responseArgs[responseArgs.length] = {
									"name" : '{$vfa716d5b55e839746e3a2789a2cb0148}',
									"path" : '{$v70d35a4c33a246719a34e09f997e3290->getPath()}'
							}

END;
				var responseArgs = new Array();

				{$vb566484d98c3f5131cfe5bda8303a120}

				jsonRequestsController.getInstance().reportRequest({$vf68d2c3658a26018e43729b214bc84c9}, responseArgs);
END;
cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062} = Array();

JS;
cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062}[$v865c0c0b4ab0e063e5caa3387c1a8741] = {"filename" : "{$v8c7dd922ad47494fc02c388e12c00eac[1]}", "full" : "{$v8c7dd922ad47494fc02c388e12c00eac[0]}"};

JS;
image_cifi_generate('{$vc7fd747df51400a95998ed50cb1af062}', cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062}, '{$v4ed9407630eb1000c0f6b63842defa7d}', '{$v736007832d2167baaae763fd3a3f3cf1}');

var selectObj = document.getElementById('cifi_select_{$vc7fd747df51400a95998ed50cb1af062}');
if(selectObj) {
	if(typeof selectObj == "function") {
		selectObj.click();
	}
}
JS;
cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062} = Array();
cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062}[0] = "";

JS;
cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062}[$v4a8a08f09d37b73795649038408b5f33] = "{$v8c7dd922ad47494fc02c388e12c00eac}";

JS;
file_cifi_generate('{$vc7fd747df51400a95998ed50cb1af062}', cifi_images_arr_{$vc7fd747df51400a95998ed50cb1af062}, '{$v4ed9407630eb1000c0f6b63842defa7d}', '{$v736007832d2167baaae763fd3a3f3cf1}');

var selectObj = document.getElementById('cifi_select_{$vc7fd747df51400a95998ed50cb1af062}');
if(selectObj) {
	if(typeof selectObj == "function") {
		selectObj.click();
	}
}
JS;