<?php
 abstract class __filemanager extends baseModuleAdmin {public function directory_list() {$this->upload_files();$v15d61712450a686a7f365adf4fef581f = (string) getRequest('param0');if($v15d61712450a686a7f365adf4fef581f == "do") {$this->upload_files();$this->chooseRedirect();}$ve62e4d22f2d8630f6e44e2b7c3f70ddc = Array(    'directory' => $this->getCurrentPath()   );$this->setDataType("list");$this->setActionType("view");$this->setData($ve62e4d22f2d8630f6e44e2b7c3f70ddc);return $this->doData();}public function getCurrentPath() {$v547e5184cac771813fdf2c88ce9c9b73 = $this->s_root_path . "/files/";if (strlen(getRequest('dir'))) {$v547e5184cac771813fdf2c88ce9c9b73 = base64_decode(getRequest('dir'));$_SESSION['umi_fs_path'] = $v547e5184cac771813fdf2c88ce9c9b73;}elseif (isset($_SESSION['umi_fs_path'])) {$v547e5184cac771813fdf2c88ce9c9b73 = $_SESSION['umi_fs_path'];}$v547e5184cac771813fdf2c88ce9c9b73 = realpath($v547e5184cac771813fdf2c88ce9c9b73);$v547e5184cac771813fdf2c88ce9c9b73 = str_replace("\\", "/", $v547e5184cac771813fdf2c88ce9c9b73);$v547e5184cac771813fdf2c88ce9c9b73 = str_replace("//", "/", $v547e5184cac771813fdf2c88ce9c9b73);if(strpos($v547e5184cac771813fdf2c88ce9c9b73, $this->s_root_path) === false || strpos($v547e5184cac771813fdf2c88ce9c9b73, "..") !== false || strpos($v547e5184cac771813fdf2c88ce9c9b73, "./") !== false) {$v547e5184cac771813fdf2c88ce9c9b73 = $this->s_root_path;}while (substr($v547e5184cac771813fdf2c88ce9c9b73, -1)=="/") $v547e5184cac771813fdf2c88ce9c9b73=substr($v547e5184cac771813fdf2c88ce9c9b73, 0, (strlen($v547e5184cac771813fdf2c88ce9c9b73)-1));$v547e5184cac771813fdf2c88ce9c9b73 = is_dir($v547e5184cac771813fdf2c88ce9c9b73) ? $v547e5184cac771813fdf2c88ce9c9b73 : $this->s_root_path;if($v547e5184cac771813fdf2c88ce9c9b73 == $this->s_root_path) {$v547e5184cac771813fdf2c88ce9c9b73 = ".";}else {$v547e5184cac771813fdf2c88ce9c9b73 = substr($v547e5184cac771813fdf2c88ce9c9b73, strlen($this->s_root_path) + 1);}$v547e5184cac771813fdf2c88ce9c9b73 = str_replace("\\", DIRECTORY_SEPARATOR, $v547e5184cac771813fdf2c88ce9c9b73);return $v547e5184cac771813fdf2c88ce9c9b73;}public function upload_files() {$v547e5184cac771813fdf2c88ce9c9b73 = $this->getCurrentPath();if (!defined("CURRENT_VERSION_LINE") || CURRENT_VERSION_LINE != "demo") {if (isset($_FILES['fs_upl_files']) && count($_FILES['fs_upl_files'])) {$v9354d23e6add83850f6476ba92ed0c1d = $_FILES['fs_upl_files'];foreach ($v9354d23e6add83850f6476ba92ed0c1d['name'] as $v80d3355158da377544e1e1638572dd96 => $v9d1d369cb136d359b283cd02165d2cd2) {umiFile::upload("fs_upl_files", $v80d3355158da377544e1e1638572dd96, $v547e5184cac771813fdf2c88ce9c9b73);}}}}public function make_directory() {$v547e5184cac771813fdf2c88ce9c9b73 = $this->getCurrentPath();if (defined("CURRENT_VERSION_LINE") && CURRENT_VERSION_LINE == "demo") {$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v547e5184cac771813fdf2c88ce9c9b73));return false;}$vfa137a2541001feef0f966356723efd3 = translit::convert(getRequest('newdir'));$vf506e1b4aad626df2c3b77d225df6c97 = $v547e5184cac771813fdf2c88ce9c9b73."/".$vfa137a2541001feef0f966356723efd3;if (strlen($v547e5184cac771813fdf2c88ce9c9b73) && !is_dir($vf506e1b4aad626df2c3b77d225df6c97)) {if (false === mkdir($vf506e1b4aad626df2c3b77d225df6c97)) {throw new publicAdminException(getLabel("error-can-not-create-directory"));}}$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v547e5184cac771813fdf2c88ce9c9b73));}public function del() {$vf6fe2202aaa5491a9c7a9fef46f44483 = base64_decode(getRequest('param0'));$v40a9b083c3f1470a5d6db5014dcf3da9 = dirname($vf6fe2202aaa5491a9c7a9fef46f44483);if(!$this->checkIsAllowedPath($vf6fe2202aaa5491a9c7a9fef46f44483)) {throw new publicAdminException(getLabel('error-fs-not-allowed'));}if (defined("CURRENT_VERSION_LINE") && CURRENT_VERSION_LINE == "demo") {$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v40a9b083c3f1470a5d6db5014dcf3da9));return false;}if (is_dir($vf6fe2202aaa5491a9c7a9fef46f44483)) {removeDirectory($vf6fe2202aaa5491a9c7a9fef46f44483);}elseif (is_file($vf6fe2202aaa5491a9c7a9fef46f44483)) {if(@unlink($vf6fe2202aaa5491a9c7a9fef46f44483)) {$vb3827f7111095f5ba1a9f49988fe9382   = umiObjectTypesCollection::getInstance();$v69ae498121c2d8e63f20c7144a0246d7 = umiObjectsCollection::getInstance();$vef5714e0519bfaa645cdff7d28843b70 = new umiSelection();$v5f694956811487225d15e973ca38fbab    = $vb3827f7111095f5ba1a9f49988fe9382->getBaseType("filemanager", "shared_file");$v599dcce2998a6b40b1e38e8c6006cb0a     = $vb3827f7111095f5ba1a9f49988fe9382->getType($v5f694956811487225d15e973ca38fbab);$vef5714e0519bfaa645cdff7d28843b70->addObjectType($v5f694956811487225d15e973ca38fbab);$vef5714e0519bfaa645cdff7d28843b70->addPropertyFilterLike($v599dcce2998a6b40b1e38e8c6006cb0a->getFieldId('fs_file'), './'.$vf6fe2202aaa5491a9c7a9fef46f44483);$v6b6100f785783a5be7a21060b707a599    = umiSelectionsParser::runSelection($vef5714e0519bfaa645cdff7d28843b70);foreach($v6b6100f785783a5be7a21060b707a599 as $ve68ee9ddba89ea0bf91a99dd809e4225) {if($v8c7dd922ad47494fc02c388e12c00eac = $v69ae498121c2d8e63f20c7144a0246d7->getObject($ve68ee9ddba89ea0bf91a99dd809e4225)) {$v8c7dd922ad47494fc02c388e12c00eac->setValue('fs_file', '');}}}}$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v40a9b083c3f1470a5d6db5014dcf3da9));}public function rename() {$v547e5184cac771813fdf2c88ce9c9b73 = $this->getCurrentPath();if (defined("CURRENT_VERSION_LINE") && CURRENT_VERSION_LINE == "demo") {$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v547e5184cac771813fdf2c88ce9c9b73));return false;}$v09ef24498593171dc6a3291435fc8530 = getRequest('old_name');$vb4d0aa7ed714752ababf634f2204a4bf = getRequest('new_name');if(!$this->checkIsAllowedPath($v547e5184cac771813fdf2c88ce9c9b73 . "/" . $v09ef24498593171dc6a3291435fc8530)) {throw new publicAdminException(getLabel('error-fs-not-allowed'));}$v4e023b1f029153195cf0d1d330d01065 = split("\.", $vb4d0aa7ed714752ababf634f2204a4bf);foreach($v4e023b1f029153195cf0d1d330d01065 as &$vafbe94cdbe69a93efabc9f1325fc7dff) {$vafbe94cdbe69a93efabc9f1325fc7dff = translit::convert($vafbe94cdbe69a93efabc9f1325fc7dff);}$vb4d0aa7ed714752ababf634f2204a4bf = implode(".", $v4e023b1f029153195cf0d1d330d01065);if (strlen($v547e5184cac771813fdf2c88ce9c9b73) && strlen($v09ef24498593171dc6a3291435fc8530) && strlen($vb4d0aa7ed714752ababf634f2204a4bf)) {if (file_exists($v547e5184cac771813fdf2c88ce9c9b73."/".$v09ef24498593171dc6a3291435fc8530) && !file_exists($v547e5184cac771813fdf2c88ce9c9b73."/".$vb4d0aa7ed714752ababf634f2204a4bf)) {if (@rename($v547e5184cac771813fdf2c88ce9c9b73."/".$v09ef24498593171dc6a3291435fc8530, $v547e5184cac771813fdf2c88ce9c9b73."/".$vb4d0aa7ed714752ababf634f2204a4bf) === false) {throw new publicAdminException(getLabel('error-cant-rename-dir'));}else {$vb3827f7111095f5ba1a9f49988fe9382   = umiObjectTypesCollection::getInstance();$v69ae498121c2d8e63f20c7144a0246d7 = umiObjectsCollection::getInstance();$vef5714e0519bfaa645cdff7d28843b70 = new umiSelection();$v5f694956811487225d15e973ca38fbab    = $vb3827f7111095f5ba1a9f49988fe9382->getBaseType("filemanager", "shared_file");$v599dcce2998a6b40b1e38e8c6006cb0a     = $vb3827f7111095f5ba1a9f49988fe9382->getType($v5f694956811487225d15e973ca38fbab);$vef5714e0519bfaa645cdff7d28843b70->addObjectType($v5f694956811487225d15e973ca38fbab);$vef5714e0519bfaa645cdff7d28843b70->addPropertyFilterLike($v599dcce2998a6b40b1e38e8c6006cb0a->getFieldId('fs_file'), './'.$v547e5184cac771813fdf2c88ce9c9b73."/".$v09ef24498593171dc6a3291435fc8530);$v6b6100f785783a5be7a21060b707a599    = umiSelectionsParser::runSelection($vef5714e0519bfaa645cdff7d28843b70);foreach($v6b6100f785783a5be7a21060b707a599 as $ve68ee9ddba89ea0bf91a99dd809e4225) {if($v8c7dd922ad47494fc02c388e12c00eac = $v69ae498121c2d8e63f20c7144a0246d7->getObject($ve68ee9ddba89ea0bf91a99dd809e4225)) {$v8c7dd922ad47494fc02c388e12c00eac->setValue('fs_file', new umiFile('./'.$v547e5184cac771813fdf2c88ce9c9b73."/".$vb4d0aa7ed714752ababf634f2204a4bf));}}}}}$this->chooseRedirect('/admin/filemanager/directory_list/?dir=' . base64_encode($v547e5184cac771813fdf2c88ce9c9b73));}public function getDatasetConfiguration($veca07335a33c5aeb5e1bc7c98b4b9d80 = '') {return array(     'methods' => array(      array('title'=>getLabel('smc-load'), 'forload'=>true,     'module'=>'filemanager', '#__name'=>'shared_files'),      array('title'=>getLabel('smc-delete'),           'module'=>'filemanager', '#__name'=>'del_shared_file', 'aliases' => 'tree_delete_element,delete,del'),      array('title'=>getLabel('smc-activity'),    'module'=>'filemanager', '#__name'=>'shared_file_activity', 'aliases' => 'tree_set_activity,activity'),      array('title'=>getLabel('smc-copy'), 'module'=>'content', '#__name'=>'tree_copy_element'),      array('title'=>getLabel('smc-move'),       'module'=>'content', '#__name'=>'tree_move_element'),      array('title'=>getLabel('smc-change-template'),        'module'=>'content', '#__name'=>'change_template'),      array('title'=>getLabel('smc-change-lang'),       'module'=>'content', '#__name'=>'move_to_lang')),     'types' => array(      array('common' => 'true', 'id' => 'shared_file')     ),     'stoplist' => array('title', 'h1', 'meta_keywords', 'meta_descriptions', 'menu_pic_ua', 'menu_pic_a', 'header_pic', 'more_params', 'robots_deny', 'is_unindexed', 'store_amounts', 'locktime', 'lockuser', 'anons', 'content', 'rate_voters', 'rate_sum'),     'default' => 'downloads_counter[140px]'    );}public function checkIsAllowedPath($veec4d6416f6ba06d977d1eec284beb23) {$v13872c0118a4316afd1e99295017d654 = Array(    '/classes', '/css', '/dtd', '/errors', '/js', '/man', '/manifest',    '/pwindows', '/scriptaculous', '/smu', '/styles', '/tinymce',    '/tpls', '/xmldb', '/xsl',    '/autothumbs.php', '/cacheControl.php', '/captcha.php', '/clusterCacheSync.php',    '/comile.php', '/config.php', '/cron.php', '/def_macroses.php', '/errors.php',    '/index.php',  '/lib.php', '/mysql.php', '/releaseStreams.php', '/sbots.php',    '/security.php', '/standalone.php', '/streams.php', '/system.php'   );$veec4d6416f6ba06d977d1eec284beb23 = substr(realpath($veec4d6416f6ba06d977d1eec284beb23), strlen(CURRENT_WORKING_DIR));foreach($v13872c0118a4316afd1e99295017d654 as $vd6fe1d0be6347b8ef2427fa629c04485) {if(substr($veec4d6416f6ba06d977d1eec284beb23, 0, strlen($vd6fe1d0be6347b8ef2427fa629c04485)) == $vd6fe1d0be6347b8ef2427fa629c04485) {return false;}}return true;}};?>