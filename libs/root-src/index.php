<?php
 require CURRENT_WORKING_DIR . '/libs/config.php';if((strstr($_SERVER['HTTP_USER_AGENT'], 'Shockwave Flash')!== false || strstr($_SERVER['HTTP_USER_AGENT'], 'Adobe Flash Player'))  && isset($_GET['PHPSESSID'])) {session_id($_GET['PHPSESSID']);}$v2245023265ae4cf87d02c8b6ba991139 = mainConfiguration::getInstance();$v7f2db423a49b305459147332fb01cf87 = OutputBuffer::current('HTTPOutputBuffer');if(PRE_AUTH_ENABLED) {umiAuth::tryPreAuth();}if($v2245023265ae4cf87d02c8b6ba991139->get('stub', 'enabled')) {if(is_array($vde56be8fa19339d679efa6232455f342 = $v2245023265ae4cf87d02c8b6ba991139->get('stub', 'filter.ip'))) {$va10311459433adf322f2590a4987c423 = !in_array(getServer('REMOTE_ADDR'), $vde56be8fa19339d679efa6232455f342);}else {$va10311459433adf322f2590a4987c423 = true;}if($va10311459433adf322f2590a4987c423) {$v0a1aa93a2e994cce7eff84d11d2478a5 = $v2245023265ae4cf87d02c8b6ba991139->includeParam('system.stub');if(is_file($v0a1aa93a2e994cce7eff84d11d2478a5)) {require $v0a1aa93a2e994cce7eff84d11d2478a5;exit;}else {throw new coreException("Stub file \"{$v0a1aa93a2e994cce7eff84d11d2478a5}\" not found");}}}if($v2245023265ae4cf87d02c8b6ba991139->get('kernel', 'matches-enabled')) {$v9c28d32df234037773be184dbdafc274 = new matches("sitemap.xml");$v9c28d32df234037773be184dbdafc274->setCurrentURI(getRequest('path'));try {$v9c28d32df234037773be184dbdafc274->execute();}catch (Exception $ve1671797c52e15f763380b45e841ec32) {traceException($ve1671797c52e15f763380b45e841ec32);}unset($v9c28d32df234037773be184dbdafc274);}if($v2245023265ae4cf87d02c8b6ba991139->get('cache', 'static.enabled')) {require CURRENT_WORKING_DIR . '/libs/cacheControl.php';$v805e6b8e623f5dd06f99f55e55230cca = new staticCache;$v805e6b8e623f5dd06f99f55e55230cca->load();}else $v805e6b8e623f5dd06f99f55e55230cca = null;$permissions = permissionsCollection::getInstance();$v8b1dc169bf460ee884fceef66c6607d6 = cmsController::getInstance();$v8b1dc169bf460ee884fceef66c6607d6->analyzePath();$v640654dfd4f90b5353b1d32575907b87 = $v8b1dc169bf460ee884fceef66c6607d6->getCurrentMode();$v72ee76c5c29383b7c9f9225c1fa4d10b = $v8b1dc169bf460ee884fceef66c6607d6->getCurrentDomain()->getId();$vf585b7f018bb4ced15a03683a733e50b = $v8b1dc169bf460ee884fceef66c6607d6->getCurrentLang()->getId();if($v640654dfd4f90b5353b1d32575907b87 == 'admin') {$v918d83c715c19dd93ff49f87e2fae0b3 = 'main.xsl';}else {$v918d83c715c19dd93ff49f87e2fae0b3 = system_get_tpl();}define('XSLT_TPL_MODE', (substr($v918d83c715c19dd93ff49f87e2fae0b3, -4, 4) == '.xsl'));$v8980246496f088322ddf9eca96750755 = templater::getInstance();if(XSLT_TPL_MODE) {$v7b975dff6c0134c6f231fd13895c2349 = $v8b1dc169bf460ee884fceef66c6607d6->getCurrentModule();$vb6ad8768e9a35023e3d824c5057699d1 = $v8b1dc169bf460ee884fceef66c6607d6->getCurrentMethod();$v8e44f0089b076e18a718eb9ca3d94674 = $permissions->getUserId();$vca02d1555c813b1b1ad637654c0fe111 = $permissions->isAllowedMethod($v8e44f0089b076e18a718eb9ca3d94674, $v7b975dff6c0134c6f231fd13895c2349, $vb6ad8768e9a35023e3d824c5057699d1);$vd66e1019fcc04b85fb1ee50cf71d6e4f = xslTemplater::getInstance();$vd66e1019fcc04b85fb1ee50cf71d6e4f->init();if($v640654dfd4f90b5353b1d32575907b87 != 'admin') {$v8b1dc169bf460ee884fceef66c6607d6->parsedContent = macros_content();}if($v640654dfd4f90b5353b1d32575907b87 == 'admin') {$vd66e1019fcc04b85fb1ee50cf71d6e4f = xslAdminTemplater::getInstance();}$v4390f617e27bfe77ff04b6736f0b7af7 = $vd66e1019fcc04b85fb1ee50cf71d6e4f;if($v640654dfd4f90b5353b1d32575907b87 == 'admin') {$vf2ce473b36fb79a44028293890c685be = $v2245023265ae4cf87d02c8b6ba991139->includeParam('templates.skins', array('skin' => xslAdminTemplater::getCurrentSkinName()));}else {$vf2ce473b36fb79a44028293890c685be = $v2245023265ae4cf87d02c8b6ba991139->includeParam('templates.xsl');}if((!$permissions->isAdmin() || !$vca02d1555c813b1b1ad637654c0fe111) && file_exists($vf2ce473b36fb79a44028293890c685be . 'main_login.xsl')) {$vf2ce473b36fb79a44028293890c685be .= 'main_login.xsl';}else {$vf2ce473b36fb79a44028293890c685be .= $v918d83c715c19dd93ff49f87e2fae0b3;}}else {$v8b1dc169bf460ee884fceef66c6607d6->parsedContent = macros_content();$v4390f617e27bfe77ff04b6736f0b7af7 = $v8980246496f088322ddf9eca96750755;$vf2ce473b36fb79a44028293890c685be = $v2245023265ae4cf87d02c8b6ba991139->includeParam('templates.tpl') . 'content/' . $v918d83c715c19dd93ff49f87e2fae0b3;}if($v640654dfd4f90b5353b1d32575907b87 == 'admin') {$v8b1dc169bf460ee884fceef66c6607d6->parsedContent = macros_content();}$v7f2db423a49b305459147332fb01cf87->contentType('text/html');if(XSLT_TPL_MODE) {$v4390f617e27bfe77ff04b6736f0b7af7->init($vf2ce473b36fb79a44028293890c685be);if(getRequest("xmlMode") == "force") {$v7f2db423a49b305459147332fb01cf87->contentType('text/xml');$v7f2db423a49b305459147332fb01cf87->push($v4390f617e27bfe77ff04b6736f0b7af7->flushXml());}else {$v7f2db423a49b305459147332fb01cf87->push($v4390f617e27bfe77ff04b6736f0b7af7->parseResult());}if(is_null(getRequest('showStreamsCalls')) == false) {$v7f2db423a49b305459147332fb01cf87->contentType('text/xml');$v7f2db423a49b305459147332fb01cf87->clear();$v7f2db423a49b305459147332fb01cf87->push(umiBaseStream::getCalledStreams());$v7f2db423a49b305459147332fb01cf87->end();}}else {if(!file_exists($vf2ce473b36fb79a44028293890c685be)) {$v7f2db423a49b305459147332fb01cf87 = outputBuffer::current();$v7f2db423a49b305459147332fb01cf87->clear();$v7f2db423a49b305459147332fb01cf87->push(file_get_contents(SYS_ERRORS_PATH . 'no_design_template.html'));$v7f2db423a49b305459147332fb01cf87->end();}$v0333a2bd4a6440b31d249df558b2b2c7 = file_get_contents($vf2ce473b36fb79a44028293890c685be);$v0333a2bd4a6440b31d249df558b2b2c7 = str_replace("%pid%", $v8b1dc169bf460ee884fceef66c6607d6->getCurrentElementId(), $v0333a2bd4a6440b31d249df558b2b2c7);$result = $v4390f617e27bfe77ff04b6736f0b7af7->parseInput($v0333a2bd4a6440b31d249df558b2b2c7);$result = str_replace("%catched_errors%", macros_catched_errors(), $result);$v7f2db423a49b305459147332fb01cf87->push($v4390f617e27bfe77ff04b6736f0b7af7->cleanUpResult($result));}if($va912a94d79b5124d876951f96ebb256f = $v8b1dc169bf460ee884fceef66c6607d6->getModule('stat')) {$va912a94d79b5124d876951f96ebb256f->pushStat();}if($v805e6b8e623f5dd06f99f55e55230cca instanceof staticCache) {$v805e6b8e623f5dd06f99f55e55230cca->save($v7f2db423a49b305459147332fb01cf87->content());}$v7f2db423a49b305459147332fb01cf87->end();?>