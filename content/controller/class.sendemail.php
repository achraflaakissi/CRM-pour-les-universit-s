<?php

class sendemail{

private  $cci;



    /**
     * @return mixed
     */
    public function getCci()
    {
        return $this->cci;
    }

    /**
     * @param mixed $cci
     */
    public function setCci($cci)
    {
        $this->cci = $cci;
    }

    public $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
	
    
    public $sendto;
	/**
     * @return mixed
     */
    public function getSendto()
    {
        return $this->sendto;
    }

    /**
     * @param mixed $sendto
     */
    public function setSendto($sendto)
    {
        $this->sendto = $sendto;
    }
    
     public $objet;
	/**
     * @return mixed
     */
    public function getObjet()
    {
    
        return $this->objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($Objet)
    {
    if($Objet=="" or $Objet==1 )
    {
    	$this->objet= "Université Privée de Marrakech";
    }
    else
    {
    	$this->objet= $Objet;
    }
        
    }
    
    public function __get($name) {
        return $this->$name;
    }

    function Envoyeremail()
    {
   	$loader = 'vendor/autoload.php';

	require_once $loader;
	try {
	    // prepare email message
	    $message = Swift_Message::newInstance()
	        ->setSubject($this->getObjet())
	        ->setFrom(array($_SESSION['user']['email']=>$_SESSION['user']['send_from']))
	        ->setTo(array($this->getSendto()));
	         $logo = $message->embed(Swift_Image::fromPath('dist/img/logo.png'));
                 $back = $message->embed(Swift_Image::fromPath('dist/img/unnamed.jpg'));
            $contenu=$this->getEmail();
            $html = <<<EOT
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Université Privée de Marrakech</title>
</head>
<body>
<div style="@import url('https://fonts.googleapis.com/css?family=Roboto');text-align: center;background: #0b5593;padding: 1%;background-repeat:no-repeat;background-position:center center;background-size:cover;">
<br>
<img src="$logo"/>

</div>
<div>
    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="min-width:800px">
        <tbody>
        <tr><td align="center" width="100%"><table align="center" width="800" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="100%" height="48"></td></tr><tr><td align="center" width="100%" style="text-align:left"><table width="800" border="0" cellpadding="0" cellspacing="0" align="center"><tbody><tr><td align="center" width="100%" style="text-align:left"><span style="color:#0e1724;font-weight:normal;font-size:18px;line-height:28px;font-family:'Roboto',Helvetica,Arial,sans-serif">
                                           $contenu
                                           </span>
        </td></tr></tbody></table></td></tbody></table>
        </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<table align="center" width="450" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" height="48" style="border-radius:3px;font-weight:bold;background: #0b5593;">
                                        <a href="http://etudiants.lmsupm.com/candidature.html" style="color: #ffffff;text-decoration: none;font-size: 18px;line-height: 48px;display: block;width: 100%;font-family: 'Roboto',Helvetica,Arial,sans-serif;">Valider Votre dossier de candidature →</a>
                                    </td>
                                </tr></tbody></table>
<div style="margin-top: 5%;">
    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f0f0f0"><tbody><tr><td width="100%" align="center">
        <table width="650" align="center" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td width="100%" height="32"></td></tr><tr><td align="center">
                            <span style="color:#75787d;font-size:12px;line-height:18px;font-family:'Roboto',Helvetica,Arial,sans-serif">© 2017 Université Privée de Marrakech. Tous Droits Réservés.<br>
                            +212 (0) 5 24 48 70 00 / +212 (0) 5 24 48 38 49<br>
                            <a href="http://www.upm.ac.ma/" style="text-decoration: none">www.upm.ac.ma</a></span>
        </td>
        </tr>
        </tbody>
        </table>
    </td>
    </tr><tr><td width="100%" height="32"></td></tr></tbody></table></td>
    </tr></tbody></table>
</div>


</body>
</html>
EOT;

            $message->setBody($html, 'text/html');
	
	    // create the transport
	    $transport = Swift_SmtpTransport::newInstance('smtp.office365.com',587, 'tls')
	        ->setUsername($_SESSION['user']['email'])
	        ->setPassword($_SESSION['user']['pws_email']);
	    $mailer = Swift_Mailer::newInstance($transport);
	    $result = $mailer->send($message);
	    if ($result) {
                if($result>0)
                {
                    return json_encode(array('validation'=>true, 'message'=>'<div class="callout callout-success" >L\'email est envoyé</div>'));
                }
            } else {
                return json_encode(array('validation'=>false, 'message'=>'<div class="callout callout-success" >Couldn\'t send email !!! Merci de contacter le support</div>'));
            }
	} catch (Exception $e) {
	    echo $e->getMessage();
	}
    }

function envoyermessageCCI()
    {
        $loader = 'vendor/autoload.php';

        require_once $loader;
        try {
            // prepare email message
            $message = Swift_Message::newInstance()
                ->setSubject("Test - Université Privée de Marrakech")
                ->setFrom(array("contact@upm.ac.ma"=>"Université Privée de Marrakech"))
                ->setTo(array($this->getSendto()))
                ->setBcc($this->getCci());
            $logo = $message->embed(Swift_Image::fromPath('dist/img/logo.png'));
            $back = $message->embed(Swift_Image::fromPath('dist/img/unnamed.jpg'));
            $contenu=$this->getEmail();

            $message->setBody("Bonjour Je Suis rachid Test");

            // create the transport
            $transport = Swift_SmtpTransport::newInstance('smtp.office365.com',587, 'tls')
                ->setUsername('contact@upm.ac.ma')
                ->setPassword('A123*123*');
            $mailer = Swift_Mailer::newInstance($transport);
            $result = $mailer->send($message);
            if ($result) {
                if($result>0)
                {
                    //return json_encode(array('validation'=>true, 'message'=>'<div class="callout callout-success" >L\'email est envoyé</div>'));
                    echo "bien Envoye";exit;
                }
            } else {
                //return json_encode(array('validation'=>false, 'message'=>'<div class="callout callout-success" >Couldn\'t send email !!! Merci de contacter le support</div>'));
                echo "non  Envoye";exit;
            }
        } catch (Exception $e) {
            echo $e->getMessage();exit;
        }

        }

function Envoyeremailmassive($array_mails)
    {
        $loader = 'vendor/autoload.php';

        require_once $loader;
        try {
            // prepare email message
            $message = Swift_Message::newInstance()
                ->setSubject($this->getObjet())
                ->setFrom(array($_SESSION['user']['email']=>$_SESSION['user']['send_from']))
                ->setBcc($array_mails);
            $logo = $message->embed(Swift_Image::fromPath('dist/img/logo.png'));
            $back = $message->embed(Swift_Image::fromPath('dist/img/unnamed.jpg'));
            $contenu=$this->getEmail();
            $html = <<<EOT
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Université Privée de Marrakech</title>
</head>
<body>
<div style="@import url('https://fonts.googleapis.com/css?family=Roboto');text-align: center;background: #0b5593;padding: 1%;background-repeat:no-repeat;background-position:center center;background-size:cover;">
<br>

</div>
<div>
    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="min-width:800px">
        <tbody>
        <tr><td align="center" width="100%"><table align="center" width="800" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="100%" height="48"></td></tr><tr><td align="center" width="100%" style="text-align:left"><table width="800" border="0" cellpadding="0" cellspacing="0" align="center"><tbody><tr><td align="center" width="100%" style="text-align:left"><span style="color:#0e1724;font-weight:normal;font-size:18px;line-height:28px;font-family:'Roboto',Helvetica,Arial,sans-serif">
                                           $contenu
                                           </span>
        </td></tr></tbody></table></td></tbody></table>
        </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<table align="center" width="450" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td align="center" height="48" style="border-radius:3px;font-weight:bold;background: #0b5593;">
                                        <a href="http://etudiants.lmsupm.com/candidature.html" style="color: #ffffff;text-decoration: none;font-size: 18px;line-height: 48px;display: block;width: 100%;font-family: 'Roboto',Helvetica,Arial,sans-serif;">Valider Votre dossier de candidature →</a>
                                    </td>
                                </tr></tbody></table>
<div style="margin-top: 5%;">
    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f0f0f0"><tbody><tr><td width="100%" align="center">
        <table width="650" align="center" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td width="100%" height="32"></td></tr><tr><td align="center">
                            <span style="color:#75787d;font-size:12px;line-height:18px;font-family:'Roboto',Helvetica,Arial,sans-serif">© 2017 Université Privée de Marrakech. Tous Droits Réservés.<br>
                            +212 (0) 5 24 48 70 00 / +212 (0) 5 24 48 38 49<br>
                            <a href="http://www.upm.ac.ma/" style="text-decoration: none">www.upm.ac.ma</a></span>
        </td>
        </tr>
        </tbody>
        </table>
    </td>
    </tr><tr><td width="100%" height="32"></td></tr></tbody></table></td>
    </tr></tbody></table>
</div>


</body>
</html>
EOT;

            $message->setBody($html, 'text/html');

            // create the transport
            $transport = Swift_SmtpTransport::newInstance('smtp.office365.com',587, 'tls')
                ->setUsername($_SESSION['user']['email'])
                ->setPassword($_SESSION['user']['pws_email']);
            $mailer = Swift_Mailer::newInstance($transport);
            $result = $mailer->send($message);
            if ($result) {
                if($result>0)
                {
                    return json_encode(array('validation'=>true, 'message'=>'<div class="callout callout-success" >L\'email est envoyé</div>'));
                }
            } else {
                return json_encode(array('validation'=>false, 'message'=>'<div class="callout callout-success" >Couldn\'t send email !!! Merci de contacter le support</div>'));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>