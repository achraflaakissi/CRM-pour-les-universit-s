<?php
include('class.contact-direct.php');
include('class.contact-indirecte.php');
if(count($_POST) >0)
{
    $c = new ContactDirect();
    $ci = new contact_indirecte();
    $type ="";
    $id = "";

    //echo $id.' '.$type;exit;

    switch($_POST['oper'])
        {
            case 'edit':
                $type = explode("#",$_POST['type'])[0];
                $id = explode("#",$_POST['type'])[1];
            if($type=='direct') {
                //echo "oui contact direct edit";exit;
                $c->setCivilite($_POST['civilite']);
                $c->setNom($_POST['nom']);
                $c->setPrenom($_POST['prenom']);
                $c->setEmail($_POST['email']);
                $c->setGsm($_POST['gsm']);
                $c->setTelephone($_POST['telephone']);
                $c->setMailPere($_POST['Mail_Pere']);
                $c->setMailMere($_POST['Mail_Mere']);
                $c->setTelPere($_POST['Tel_Pere']);
                $c->setTelMere($_POST['Tel_Mere']);
                $c->setId($id);
                if (strtoupper($_POST['valide']) == 'NON')
                    $c->setValide(0);
                else
                    $c->setValide(1);
               $c->Validercontactdirect();
            }
            else if($type=='indirect')
            {

                //echo "oui contact indirect edit";exit;
                $ci->setCivilite($_POST['civilite']);
                $ci->setNom($_POST['nom']);
                $ci->setPrenom($_POST['prenom']);
                $ci->setEmail($_POST['email']);
                $ci->setGsm($_POST['gsm']);
                $ci->setTel($_POST['telephone']);
                $ci->setMailPere($_POST['Mail_Pere']);
                $ci->setMailMere($_POST['Mail_Mere']);
                $ci->setTelPere($_POST['Tel_Pere']);
                $ci->setTelMere($_POST['Tel_Mere']);
                $ci->setId($id);
                if (strtoupper($_POST['valide']) == 'NON')
                    $ci->setValide(0);
                else
                    $ci->setValide(1);
             $ci->Validercontactindirect();
            }
            break;
        case 'del':
            for($i=0;$i<count(explode(',',$_POST['id']));$i++)
            {
                $type = explode("#", explode(',',$_POST['id'])[$i])[0];
                $id = explode("#", explode(',',$_POST['id'])[$i])[1];
                if ($type == 'indirect') {
                    $ci->supprimercontact($id);
                    echo "ok1";
                } else if ($type == 'direct')
                    {
                    $c->supprimercontact($id);
                     echo "ok2";
                    }
            }

            break;

        //edit
        //add
        //del / array

        /*
         * [civilite] => Alabama
    [nom] => elmahmoudi
    [prenom] => rachid
    [email] => rachid@gmail.com
    [gsm] => 0672162712617
    [telephone] => 11627162712677
    [Mail_Pere] => pere@gmail.com
    [Mail_Mere] => rachidd@gmail.com
    [Tel_Pere] => 023232
    [Tel_Mere] => 0323223
    [valide] => Non
    [oper] => edit
    [id] => 1
)
         */
    }
}