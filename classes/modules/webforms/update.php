<?php
if(!defined('DB_DRIVER') || DB_DRIVER != 'xml') {$vc56c4b05ed55494b480fe745c3c24542 = umiObjectsCollection::getInstance();$v963cecbdfa91757f2c7a4a9e794f3da7     = umiObjectTypesCollection::getInstance()->getBaseType('webforms', 'address');$va94ce50ec7c649aefc2936a423013e83    = 'SELECT * FROM cms_webforms';$v39039f6df7f3f60965be6337ab051e66 = mysql_query($va94ce50ec7c649aefc2936a423013e83);while($vad4f3b23a9c1baee57e5d091271a0053 = mysql_fetch_assoc($v39039f6df7f3f60965be6337ab051e66)) {$v8c1604c64857e79a748c27062fedf5a2     = $vc56c4b05ed55494b480fe745c3c24542->addObject($vad4f3b23a9c1baee57e5d091271a0053['id'], $v963cecbdfa91757f2c7a4a9e794f3da7);$vd82f268d5a82fc66260ad083d1a2e5b4 = $vc56c4b05ed55494b480fe745c3c24542->getObject($v8c1604c64857e79a748c27062fedf5a2);$vd82f268d5a82fc66260ad083d1a2e5b4->setValue('address_description', $vad4f3b23a9c1baee57e5d091271a0053['descr']);$vd82f268d5a82fc66260ad083d1a2e5b4->setValue('address_list', $vad4f3b23a9c1baee57e5d091271a0053['email']);$vd82f268d5a82fc66260ad083d1a2e5b4->setValue('insert_id', $vad4f3b23a9c1baee57e5d091271a0053['id']);$vd82f268d5a82fc66260ad083d1a2e5b4->commit();}mysql_query('TRUNCATE TABLE cms_webforms');}$vefa6c676771e87c3d2fe0cc8f06ee62a = permissionsCollection::getInstance();$v4686cdab6a3ef731874896c23dccfed1  = umiObjectTypesCollection::getInstance()->getBaseType('users', 'user');$v28bfcfa5817454e27c68c4c6165c6d1d   = new umiSelection();$v28bfcfa5817454e27c68c4c6165c6d1d->addObjectType($v4686cdab6a3ef731874896c23dccfed1);$v7790666233dd286bb879d2345a855d71     = umiSelectionsParser::runSelection($v28bfcfa5817454e27c68c4c6165c6d1d);if(is_array($v7790666233dd286bb879d2345a855d71) && !empty($v7790666233dd286bb879d2345a855d71))foreach($v7790666233dd286bb879d2345a855d71 as $vaf8681eadf40a462041053de2403a35a) {$vefa6c676771e87c3d2fe0cc8f06ee62a->setModulesPermissions($vaf8681eadf40a462041053de2403a35a, 'webforms', 'add');}?>