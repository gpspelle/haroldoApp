<?php

  // Esse bloco aqui faz eu poder receber requests de localhost
  if (isset($_SERVER['HTTP_ORIGIN'])) {         
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');   
    header('Access-Control-Max-Age: 86400');     
  }

if(strlen($_GET['qr']) != 44)
  return;

require_once('../../core/Config.php');
require_once('../../core/Donation.php');
require_once('../../core/Ong.php');
require_once('../../core/OngManager.php');
require_once('../../core/DonationManager.php');

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function formatQr($data)
{
	$_GET['qr'] = "";
	for($i = 0;$i < 44;$i+=4)
	{
		$_GET['qr'] .= substr($data, $i, 4)."-";		
	}
	return rtrim($_GET['qr'], "-");
}

$ong = OngManager::getInstance()->getOngFromId($_GET['id']);

if(!$ong || !$ong->getValid())
	return;

$donation = new Donation(htmlentities($_GET['id']), formatQr(htmlentities($_GET['qr'])), time(), 0, -1, getRealIpAddr(), htmlentities($_GET['msg']));
DonationManager::getInstance()->insertDonationToOng($donation);
echo "Doação enviada com sucesso!"
?>