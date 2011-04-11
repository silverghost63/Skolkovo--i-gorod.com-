<?php
define("UPDATE_SERVER",       base64_decode('aHR0cDovL3VwZGF0ZXMudW1pLWNtcy5ydS9zbXVzL3NlcnZlci5waHA='));define("LOCAL_PACKAGE_STORE", dirname(__FILE__).'/packages/');define("UPDATE_TEMP_STORE",   dirname(__FILE__).'/install-temp/');define("PROCESS_SAVE_FILE",   dirname(__FILE__).'/uprocess.ssd');define("CONFIGURATION_FILE",  dirname(__FILE__).'/configuration.xml');function __dbg($_message) {}class SMUException extends Exception {const ERR_NOTAUTHORIZED = 1001;const MSG_NOTAUTHORIZED = "Not authorized";const ERR_NOSTEPDEFINED = 1101;const MSG_NOSTEPDEFINED = "No step defined";const ERR_CANTWRITEPACKAGEFILE = 1102;const MSG_CANTWRITEPACKAGEFILE = "Cant write package file";const ERR_WRONGRESPONSE     = 1201;const MSG_WRONGRESPONSE     = "Wrong response";const ERR_INCORRECTTRANSFER = 1202;const MSG_INCORRECTTRANSFER = "Incorrect transfer";const ERR_UNKNOWN       = 1999;const MSG_UNKNOWN       = "Unknown error";protected $type = "";public function __construct($_message = "", $_code = "", $_type = "exception") {parent::__construct($_message, $_code);$this->type = $_type;}public function getType() {return $this->type;}public function setType($_type) {$this->type = $_type;}};class SMUCore {private $configuration = null;private $stepState     = null;public function __construct() {if(!file_exists(CONFIGURATION_FILE)) {$this->writeConfiguration();}if(!is_dir(LOCAL_PACKAGE_STORE)) {mkdir(LOCAL_PACKAGE_STORE);}$this->configuration = new umiSimpleXML( file_get_contents(CONFIGURATION_FILE) );$this->loadStepState();}public function __destruct() {$this->saveStepState();}public function doUpdate() {try {$v7aa28ed115707345d0274032757e8991 = true;$v2764ca9d34e90313978d044f27ae433b   = $this->getStepInstance();$result = $v2764ca9d34e90313978d044f27ae433b->run($this->configuration, $this->stepState['parameters'], $v7aa28ed115707345d0274032757e8991);$this->stepState['sid'] = $v2764ca9d34e90313978d044f27ae433b->getSID();$v0f635d0e0f3874fff8b581c132e6c7a7    = new xmlTranslator();$result = $v0f635d0e0f3874fff8b581c132e6c7a7->translateToXml($result);echo substr($result, strpos($result, '?>')+2);if(!$v7aa28ed115707345d0274032757e8991) {$this->getNextStep();}}catch(Exception $ve1671797c52e15f763380b45e841ec32) {if($ve1671797c52e15f763380b45e841ec32->getCode() == 202) {$this->stepState = null;}if($ve1671797c52e15f763380b45e841ec32 instanceof SMUException) {$v599dcce2998a6b40b1e38e8c6006cb0a  = $ve1671797c52e15f763380b45e841ec32->getType();$v04a75036e9d520bb983c5ed03b8d0182 = '';}else {$v599dcce2998a6b40b1e38e8c6006cb0a  = 'exception';$v04a75036e9d520bb983c5ed03b8d0182 = "\n\t\t<trace>" . $ve1671797c52e15f763380b45e841ec32->getTraceAsString() . "</trace>\n";}echo <<<XML
<response type="{$v599dcce2998a6b40b1e38e8c6006cb0a}">
	<error code="{$ve1671797c52e15f763380b45e841ec32->getCode()}">{$ve1671797c52e15f763380b45e841ec32->getMessage()}{$v04a75036e9d520bb983c5ed03b8d0182}</error>
</response>
XML;
<configuration>
	<systeminfo>
		<domainkey></domainkey>
		<version>{$vb1444fb0c07653567ad325aa25d4e37a->getVal('//modules/autoupdate/system_version')}</version>
		<build>{$vb1444fb0c07653567ad325aa25d4e37a->getVal('//modules/autoupdate/system_build')}</build>
		<line>pro</line>		
		<edition>{$vb1444fb0c07653567ad325aa25d4e37a->getVal('//modules/autoupdate/system_edition')}</edition>		
		<modules>
{$v0eb9b3af2e4a00837a1b1a854c9ea18c}			
		</modules>
	</systeminfo>	
</configuration>
XML;