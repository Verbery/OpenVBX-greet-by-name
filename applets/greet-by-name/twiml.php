<?php
$CI =& get_instance();

if(!empty($_REQUEST['From'])) {

	$from = normalize_phone_to_E164($_REQUEST['From']);
	$resfrom = PluginData::sqlQuery("SELECT first_name, last_name FROM addressbook_contacts WHERE phone = '$from' LIMIT 1");

	$to   = normalize_phone_to_E164($_REQUEST['To']);
	$resto = PluginData::sqlQuery("SELECT first_name, last_name FROM addressbook_contacts WHERE phone = '$to' LIMIT 1");
}


$response = new TwimlResponse;

$next = AppletInstance::getDropZoneUrl('next');
$prompt = AppletInstance::getAudioSpeechPickerValue('prompt');

$prompt = str_replace(array('%caller_first_name%', '%caller_last_name%', '%called_first_name%', '%called_last_name%'), array($resfrom[0]['first_name'], $resfrom[0]['last_name'], $resto[0]['first_name'], $resto[0]['last_name']), $prompt);
// TODO: check if caller is correct for both Inbound and Outbound calls

if (!empty($prompt)) 
{
	AudioSpeechPickerWidget::setVerbForValue($prompt, $response);
}

if(!empty($next))
{
	$response->redirect($next);    
}

$response->respond();
