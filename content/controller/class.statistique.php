<?php
class statistique
{
    function get_stat_rdv_CP_CDI()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(auto_cmp_rdv.id),auto_cmp_rdv.`status`,concat(u.nom,' ',u.prenom) FROM `rdv_from_call_center` inner join contact_indirect on contact_indirect.id=rdv_from_call_center.contact INNER join users u on u.id=contact_indirect.Contact_Suivi_par inner join auto_cmp_rdv on auto_cmp_rdv.id_rdv_table=rdv_from_call_center.id WHERE `type_contact`='CDI' group by `user`,auto_cmp_rdv.`status`");
        $call_center='';
        $totale=0;
        $value="<table class='table table-bordered'><tr><th>Status</th><th>Nbr rendez vous</th></tr>";
        while($data=$req->fetch())
        {
            if($call_center=="")
            {
                $call_center=$data[2];
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
            }
            else if($call_center==$data[3])
            {
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
                $totale+=$data[0];
            }
            else if($call_center!=$data[2])
            {
                $call_center=$data[2];
                $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
                $totale=0;  
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td>";
            }
        }
        $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
        $value.="</table>";
        return $value;
    }
    function get_stat_rdv_CP_CD()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(auto_cmp_rdv.id),auto_cmp_rdv.`status`,concat(u.nom,' ',u.prenom) FROM `rdv_from_call_center` inner join contact_direct on contact_direct.id=rdv_from_call_center.contact INNER join users u on u.id=contact_direct.Contact_Suivi_par inner join auto_cmp_rdv on auto_cmp_rdv.id_rdv_table=rdv_from_call_center.id WHERE `type_contact`='CD' group by `user`,auto_cmp_rdv.`status`");
        $call_center='';
        $totale=0;
        $value="<table class='table table-bordered'><tr><th>Status</th><th>Nbr rendez vous</th></tr>";
        while($data=$req->fetch())
        {
            if($call_center=="")
            {
                $call_center=$data[2];
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
            }
            else if($call_center==$data[3])
            {
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
                $totale+=$data[0];
            }
            else if($call_center!=$data[2])
            {
                $call_center=$data[2];
                $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
                $totale=0;  
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td>";
            }
        }
        $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
        $value.="</table>";
        return $value;
    }
    function get_stat_rdv_call_center_CDI()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(rdv_from_call_center.id),`status`,`valider`,concat(u.nom,' ',u.prenom) FROM `rdv_from_call_center` INNER join users u on u.id=rdv_from_call_center.user WHERE `type_contact`='CDI' group by `user`,`status`,`valider`");
        $call_center='';
        $totale=0;
        $value="<table class='table table-bordered'><tr><th>Status</th><th>Nbr rendez vous</th></tr>";
        while($data=$req->fetch())
        {
            if($call_center=="")
            {
                $call_center=$data[3];
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
            }
            else if($call_center==$data[3])
            {
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
                $totale+=$data[0];
            }
            else if($call_center!=$data[3])
            {
                $call_center=$data[3];
                $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
                $totale=0;  
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td>";
            }
        }
        $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
        $value.="</table>";
        return $value;
    }
    function get_stat_rdv_call_center_CD()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(rdv_from_call_center.id),`status`,`valider`,concat(u.nom,' ',u.prenom) FROM `rdv_from_call_center` INNER join users u on u.id=rdv_from_call_center.user WHERE `type_contact`='CD' group by `user`,`status`,`valider`");
        $call_center='';
        $totale=0;
        $value="<table class='table table-bordered'><tr><th>Status</th><th>Nbr rendez vous</th></tr>";
        while($data=$req->fetch())
        {
            if($call_center=="")
            {
                $call_center=$data[3];
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
            }
            else if($call_center==$data[3])
            {
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td></tr>";
                $totale+=$data[0];
            }
            else if($call_center!=$data[3])
            {
                $call_center=$data[3];
                $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
                $totale=0;  
                $totale+=$data[0];
                $value.="<tr style='font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;' align='center'><td colspan='2'>".$call_center."</td></tr>";
                $value.="<tr><td>".$data[1]."</td><td>".$data[0]."</td>";
            }
        }
        $value.="<tr style='background-color: #222d32;color: white;'><th>Total</td><th>".$totale."</td></tr>";
        $value.="</table>";
        return $value;
    }
    function getgraph_rendez_vous_week_by_user()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(id) FROM `rendez_vous` WHERE week(`date`)=week(Curdate())");
        $global_nbr=$req->fetch();
        $global_nbr=$global_nbr[0];
        $requ=$bdd->query("SELECT distinct`type_rendez_vous` FROM `rendez_vous` WHERE week(`date`)=week(Curdate()) order by type_rendez_vous");
        $categories=array();
    	while($donner=$requ->fetch())
		{
		   $categories[]=$donner[0];
		}
		$data_global=array();
        $requ=$bdd->query("SELECT count(id),`type_rendez_vous` FROM `rendez_vous` WHERE week(`date`)=week(Curdate()) group by `type_rendez_vous` order by type_rendez_vous");
        $i=0;
        $colores=["#7cb5ec", "#434348", "#90ed7d", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b", "#91e8e1"];
        if($requ->rowCount()>0)
    	{
    		while($donner=$requ->fetch())
    		{
    		    $array=array();
    		    $array['color']=$colores[$i];
    		    $array['y']=($donner[0]/$global_nbr)*100;
    		    $drilldown=array();
                $rqu=$bdd->query("SELECT count(rv.id),`type_rendez_vous`,concat(u.nom,' ',u.prenom) as 'users' FROM `rendez_vous` rv left join users u on rv.user=u.id WHERE week(`date`)=week(Curdate()) and type_rendez_vous='".$donner['type_rendez_vous']."' group by `type_rendez_vous` order by type_rendez_vous");
				$array_categories=array();
				$array_data=array();
				while($data=$rqu->fetch())
		        {
		            $array_categories[]=$data[2];
		            $array_data[]=($data[0]/$global_nbr)*100;
		        }
    		    $drilldown['name']=$donner['type_rendez_vous'];
    		    $drilldown['color']=$colores[$i];
		        $drilldown['categories']=$array_categories;
		        $drilldown['data']=$array_data;
		        $array['drilldown']=$drilldown;
    			$data_global[]=$array;
    			$i++;
    		}	
    	}
        return json_encode(array("data_global"=>$data_global,"categories"=>$categories)); 
    }
    function getgraph_rendez_vous_week()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req=$bdd->query("SELECT count(id) FROM `rendez_vous` WHERE week(`date`)=week(Curdate())");
        $global_nbr=$req->fetch();
        $global_nbr=$global_nbr[0];
        $requ=$bdd->query("SELECT count(id),`type_rendez_vous` FROM `rendez_vous` WHERE week(`date`)=week(Curdate()) group by `type_rendez_vous`");
        if($requ->rowCount()>0)
    	{
    		while($donner=$requ->fetch())
    		{
    		    $array=array();
    		    $array['name']=$donner[1];
    		    $array['y']=($donner[0]/$global_nbr)*100;
    			$data_global[]=$array;
    		}	
    	}
        return json_encode($data_global); 
    }
    function get_rendez_vous_current_date()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT rv.*,concat(u.Nom,' ',u.Prenom) as nom_user FROM `rendez_vous` rv left join users u on u.id=rv.`user` where date=CURDATE()");
        $data_global="<table class='table table-bordered'><tr><th>Date</th><th>Utilisateur</th><th>Contact</th><th>Contact type</th><th>Type</th><th>Observation</th></tr>";
		while($donner=$requ->fetch())
		{
		    if($donner['type_contact']=="from_search")
		    {
		        $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
	            $contact=$req->fetch();
	            $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
		    }
		    else
		    {
    			$req=$bdd->query("SELECT * FROM `listcampagne` WHERE `Campagne1`='".$donner['type_contact']."'");
    			if($req->rowCount()>0)
    			{
    			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Indirect' as contact_type FROM `contact_indirect` WHERE md5(id)='".$donner['id_contact']."'");
    			    $contact=$req->fetch();
    			    $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
		    	}
    			else
    			{
    		    	$req=$bdd->query("SELECT * FROM `listcmpclt` WHERE `Campagne1`='".$donner['type_contact']."'");
        			if($req->rowCount()>0)
        			{
        			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Indirect' as contact_type FROM `contact_indirect` WHERE md5(id)='".$donner['id_contact']."'");
    		            $contact=$req->fetch();
    			        $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
        			}
        			else
        			{
        			    $req=$bdd->query("SELECT * FROM `listcampagnedir` WHERE `Campagne1`='".$donner['type_contact']."'");
            			if($req->rowCount()>0)
            			{
            			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
    			            $contact=$req->fetch();
    			            $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
            			}
            			else
            			{
                			$req=$bdd->query("SELECT * FROM `listcmpcltdir` WHERE `Campagne1`='".$donner['type_contact']."'");
                			if($req->rowCount()>0)
                			{
                			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
    			                $contact=$req->fetch();
    			                $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
                			}
            			}
        			}
        			
    			}
		    }
        
		}
        $data_global.="</table>";
        return ($data_global); 
    }
     function get_suivie_actions()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT actions_week.*,concat(u.nom,' ',u.prenom) as 'nom_user' FROM `actions_week`  left join users u on u.id = actions_week.commercial WHERE CURDATE() BETWEEN `date_debut` and `date_fin`");
        $return_values='';
        if($requ->rowCount()>0)
    	{
    	    $return_values.='<table class="table table-striped">';
    		while($donner=$requ->fetch())
    		{
    		    $return_values.='<tr style="background-color: #007ed7;color: white;font-size: 18px;" ><td colspan="7" align="center" style="font-weight:bold">Action Week '.strtoupper($donner['nom_user']).'</td></tr>';
    		    $return_values.='<tr><th colspan="2">Date Début</th><th colspan="2">Date Fin</th><th colspan="3">Objectif</th></tr>';
    		    $return_values.='<tr><td colspan="2">'.$donner['date_debut'].'</td><td colspan="2">'.$donner['date_fin'].'</td><td colspan="3">'.$donner['objectif'].'</td></tr>';
    		    $return_values.='<tr style="background-color: #054069;color: white;font-size: 18px;"><td colspan="7" align="center" style="font-weight:bold"> Les Actions</th></td>';
    		    $return_values.='<tr><th>Date Début</th><th>Date Fin</th><th>Action</th><th>Objectif</th><th>Cible</th><th>Effectif Prévue</th><th>Effectif Réalisé</th></tr>';
    		    $req_actions_week=$bdd->query("SELECT * FROM `actions_week_action` WHERE `id_actions_week`=".$donner['id']);
    		    while($data=$req_actions_week->fetch())
    		    {
    		        if($data['action']=="Phoning")
    		        {
    		            $req_actions_phoning=$bdd->query("SELECT count(*),SUM(IF(`Etape_Phoning1`<>'NRP' and `Etape_Phoning1`<>'Faux NUM' and `Etape_Phoning1`<>'BV' and `Etape_Phoning1`<>'injoignable',1,0)) as 'appel_abuti' from all_appel_for_stat_actions where `Date_Phoning1` BETWEEN '".$donner['date_debut']."' and '".$donner['date_fin']."' and `Contact_Suivi_par`='".$donner['commercial']."' group by Contact_Suivi_par");
    		            $req_actions_phoning=$req_actions_phoning->fetch();
        		        $req_actions=$bdd->query("SELECT sum(`nbr_cible_realise`) FROM `action_users_by_week` where `id_ac`=".$donner['id']." and `Action`='".$data['action']."' and user='".$donner['commercial']."'");
        		        while($dt=$req_actions->fetch())
        		        {
        		            $return_values.='<tr><th>'.$data['date_debut'].'</th><th>'.$data['date_fin'].'</th><th>'.$data['action'].'</th><th>'.$data['objectif'].'</th><th>'.$data['cibles'].'</th><th>'.$data['Nombre_prevu'].'</th><th>'.$req_actions_phoning[1].'/'.$req_actions_phoning[0].'</th></tr>';
        		        }
    		        }
    		        else
    		        {
    		            $req_actions=$bdd->query("SELECT sum(`nbr_cible_realise`) FROM `action_users_by_week` where `id_ac`=".$donner['id']." and `Action`='".$data['action']."' and user='".$donner['commercial']."'");
        		        while($dt=$req_actions->fetch())
        		        {
        		            $return_values.='<tr><th>'.$data['date_debut'].'</th><th>'.$data['date_fin'].'</th><th>'.$data['action'].'</th><th>'.$data['objectif'].'</th><th>'.$data['cibles'].'</th><th>'.$data['Nombre_prevu'].'</th><th>'.$dt[0].'</th></tr>';
        		        }
    		        }
    		    }
    		    
    		    $return_values.='<tr style="background-color: #054069;color: white;font-size: 18px;"><td colspan="7" align="center" style="font-weight:bold"> Autres Actions</th></td>';
    		    $return_values.='<tr><th>Action</th><th>Date Action</th><th>Cible</th><th>Effectif Réalisé</th><th>Objectif</th><th colspan="2">Message</th></tr>';
    		    $req_actions_week=$bdd->query("SELECT * FROM `actions` WHERE `Action` not in (select action from actions_week_action inner join actions_week on actions_week.id=actions_week_action.id_actions_week where actions_week.id=".$donner['id']." and actions_week.commercial=".$donner['commercial'].") and `user`=".$donner['commercial']." and date_action BETWEEN '".$donner['date_debut']."' and '".$donner['date_fin']."' ");
    		    while($data=$req_actions_week->fetch())
    		    {
		            $return_values.='<tr><th>'.$data['Action'].'</th><th>'.$data['date_action'].'</th><th>'.$data['cible'].'</th><th>'.$data['nbr_cible_realise'].'</th><th>'.$data['objectif'].'</th><th>'.$data['message'].'</th></tr>';
    		    }
    		}
    		$return_values.="</table>";
    	}
    	
        return $return_values; 
    }
     function actions_by_user_week()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT sum(`nbr_cible_realise`) as nbr_cible_realise,concat(u.nom,' ',u.prenom) as nom,id_ac,user FROM `action_users_by_week` left JOIN users u on u.id=user where `action_users_by_week`.`Action` in (SELECT `action` from actions_week_action) group by `action_users_by_week`.`user`");
        if($requ->rowCount()>0)
    	{
    	    $series=array();
    	    $data_global=array();
    		while($donner=$requ->fetch())
    		{
    		    $req=$bdd->query("SELECT `nbr_cible` FROM `actions_week` WHERE `id`=".$donner['id_ac']);
    		    $dt=$req->fetch();
    		    $donner['nbr_total_cible']=$dt[0];
    		    $req=$bdd->query("SELECT `nbr_cible_realise`,concat(u.nom,' ',u.prenom),id_ac,action FROM `action_users_by_week` left JOIN users u on u.id=user where `action_users_by_week`.`Action` in (SELECT `action` from actions_week_action) and user=".$donner['user']);
                $serie=array();
                $serie['name']=$donner[1];
                $serie['id']=$donner[1];
                $data=array();
                while($dt=$req->fetch())
                {
                    $dtn=array();
                    array_push($dtn,$dt[3],$dt[0]);
                    array_push($data,$dtn);
                }
                $serie['data']=$data;
    			$data_global['data_detail'][]=$donner;
    		}	
    	}
    	array_push($series,$serie);
    	$data_global['series']=$series;
        return json_encode($data_global);
    }
     function getgraph_realisation_par_zone()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT count(`statistique_by_zone`.`id`) as nbr_contact,sum(if(`Inscrit`=1,1,0)) as nbr_inscrit,ville.region as 'regions' FROM `statistique_by_zone` left join ville on ville.ville=`statistique_by_zone`.`ville` GROUP BY ville.region HAVING region is not null");
        if($requ->rowCount()>0)
    	{
    		while($donner=$requ->fetch())
    		{
    		    if($donner[2]==0)
    		    {
    		        $donner[2]="Autres";
    		    }
    			$data_global[]=$donner;
    		}	
    	}
        return json_encode($data_global); 
    }
     function getgraph_reporting_realisation_par_charge_promotion()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(cd.`id`) as nbr_contact,(SELECT COUNT(cdi.id) from contact_indirect cdi WHERE cdi.`Contact_Suivi_par`=cd.`Contact_Suivi_par`) as nbr_contact_indirect,SUM( IF( `Test_Passe` = 1 , 1, 0)) as nbr_test_passe,SUM( IF( `depot_dossier` = 1 , 1, 0)) as nbr_depot_dossier,SUM( IF( md5(cd.`id`) in (select iddc from histo_transf) , 1, 0)) as nbr_transfer,SUM( IF( `Inscrit` = 1 , 1, 0)) as nbr_Inscrit,concat(u.nom,' ',u.prenom) as user FROM `contact_direct` cd left JOIN users u on u.id=cd.`Contact_Suivi_par` where cd.`Contact_Suivi_par` is not null and cd.`Contact_Suivi_par`<>'' and cd.`Contact_Suivi_par`<>'0' group by cd.`Contact_Suivi_par`");
        if($requ->rowCount()>0)
    	{
    		while($donner=$requ->fetch())
    		{
    			$data_global[]=$donner;
    		}	
    	}
        return json_encode($data_global); 
    }
     function get_nbr_cd_by_nature()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',Nature_de_Contact FROM `contact_direct` group by `Nature_de_Contact` order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Nature de Contact</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
    function get_nbr_cd_by_formation()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',Formation_Demmandee FROM `contact_direct` group by `Formation_Demmandee` order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Formation</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
    function get_nbr_cd_by_zone()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',v.region FROM `contact_direct` cdi left JOIN ville v on v.ville=cdi.ville where v.ville=cdi.ville group by v.region order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Zone</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
    function get_nbr_cdi_by_nature()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',Nature_de_Contact FROM `contact_indirect` group by `Nature_de_Contact` order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Nature de Contact</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
    function get_nbr_cdi_by_formation()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',Formation_Demmandee FROM `contact_indirect` group by `Formation_Demmandee` order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Formation</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
    function get_nbr_cdi_by_zone()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT COUNT(*) as 'nbr',v.region FROM `contact_indirect` cdi left JOIN ville v on v.ville=cdi.ville where v.ville=cdi.ville group by v.region order by nbr desc");
        $data_global="<table class='table table-bordered'><tr><th>Zone</th><th>Nombre</th></tr>";
    		while($donner=$requ->fetch())
    		{
    			$data_global.="<tr><td>".$donner[1]."</td><td>".$donner[0]."</td></tr>";
    		}
        $data_global.="</table>";
        return ($data_global); 
    }
     function get_appels_by_hour($heure_debur,$heure_fin,$date)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $requ=$bdd->query("SELECT concat(u.nom,' ',u.prenom) as 'nom' ,SUM(CASE WHEN Etape_Phoning1='NRP' or Etape_Phoning1='BV' or Etape_Phoning1='injoignable' or Etape_Phoning1='PAS D NUM' THEN 1 END) as 'Non_Aboutis', SUM(CASE WHEN Etape_Phoning1<>'NRP' and Etape_Phoning1<>'BV' and Etape_Phoning1<>'injoignable' and Etape_Phoning1<>'PAS D NUM' THEN 1 END) as 'Aboutis' FROM all_appel_by_week LEFT join users u ON u.id=all_appel_by_week.TA where (time between '".$heure_debur."' and '".$heure_fin."') and date='".$date."' GROUP by `TA`");
            $data_global=[];
            if($requ->rowCount()>0)
        	{
        		while($donner=$requ->fetch())
        		{
        			$data_global[]=$donner;
        		}	
        	}
	
	        return json_encode($data_global); 
        }
    public function get_historique_by_week($date)
    {
        include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
			$req_day_week=$bdd->query("SELECT * FROM `hours` ORDER BY `hours`.`heur_debut` ASC");

			$content="";
			$i=0;
			////////////////////////////////////////

		while($data=$req_day_week->fetch())
		{
		    $i++;
			$content.='<div class="col-md-4">
					<div class="box box-primary">
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
								    <h4 class="text-center"> '.$data['heur_debut'].' - '.$data['heur_fin'].' </h4>
									<canvas style="height: 230px; width: 627px; " class="text-center" id="canvas_histo_'.$i.'"></canvas>
								</div>
							</div>
						</div>
					</div>
						<script>
						getgraphhistorique("canvas_histo_'.$i.'","'.$data['heur_debut'].'","'.$data['heur_fin'].'","'.$date.'");
						</script>
					</div>';
    		}
    		return $content;exit;
    
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
        function appels_by_day_detail($type,$user)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_databasget_user_daye, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type=="nabt")
            {
                $requ=$bdd->query("SELECT * FROM `appels_by_day_detail` WHERE `Etape_Phoning` in ('NRP','BV','injoignable','PAS D NUM') and md5(id_user)='$user'");
            }
             else if($type=="abt")
            {
                $requ=$bdd->query("SELECT * FROM `appels_by_day_detail` WHERE `Etape_Phoning` not in ('NRP','BV','injoignable','PAS D NUM') and md5(id_user)='$user'");
            }
        	$data_global="<table class='table table-striped'>
        	<tr>
        	    <th> Contact </th>
        	    <th> Campagne </th>
        	    <th> Etape Phoning </th>
        	    <th> Date Phoning </th>
        	    <th> Agent </th>
        	</tr>";
        	while($data=$requ->fetch())
        	{
        	    $data_global.="<tr>
                	    <td>".$data['Nom']." ".$data['Prenom']."</td>
                	    <td>".$data['Campagne1']."</td>
                	    <td>".$data['Etape_Phoning']."</td>
                	    <td>".$data['Date_Phoning1']."</td>
                	    <td>".$data['nomTA']." ".$data['TAprenom']."</td>
        	    </tr>";
        	}
	        $data_global.="</table>";
	        return ($data_global); 
        }
    function get_user_day()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $requ=$bdd->query("SELECT CONCAT(`nom`,' ',`prenom`)as 'nom',SUM(CASE WHEN Etape_Phoning='NRP' or Etape_Phoning='BV' or Etape_Phoning='injoignable' or Etape_Phoning='PAS D NUM' THEN nbr_appel END) as 'Non_Aboutis', SUM(CASE WHEN Etape_Phoning<>'NRP' and Etape_Phoning<>'BV' and Etape_Phoning<>'injoignable' and Etape_Phoning<>'PAS D NUM' THEN nbr_appel END) as 'Aboutis' FROM nbr_app_statistique GROUP by `TA1`");
        	$data_global=[];
        	if($requ->rowCount()>0)
        	{
        		while($donner=$requ->fetch())
        		{
        			$data_global[]=$donner;
        		}	
        	}
	
	        return json_encode($data_global); 
        }
    function get_nbr_byuser_day()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT CONCAT(`nom`,' ',`prenom`)as 'nom',SUM(CASE WHEN Etape_Phoning='NRP' or Etape_Phoning='BV' or Etape_Phoning='injoignable' or Etape_Phoning='PAS D NUM' THEN nbr_appel END) as 'Non_Aboutis', SUM(CASE WHEN Etape_Phoning<>'NRP' and Etape_Phoning<>'BV' and Etape_Phoning<>'injoignable' and Etape_Phoning<>'PAS D NUM' THEN nbr_appel END) as 'Aboutis',id_user FROM nbr_app_statistique GROUP by `TA1`");
            $value="<div class='col-md-12'><table class='table table-bordered'><tr><th>Agents</th><th>Nombre des appels Aboutis</th><th>Nombre des appels Non Aboutis</th></tr>";
            while($donner=$reqindss->fetch())
            {
                        $value.="<tr><td onclick='window.location=\'/?page=affecter_cdi&type=abt&user=".md5($donner[3])."\'>".$donner[0]."</td><td onclick='window.location=\'/?page=affecter_cdi&type=nabt&user=".md5($donner[3])."\'>".$donner[2]."</td><td>".$donner[1]."</td></tr>"; 
            }
            $value.="</table></div>";
            return $value;
        }
     function get_nbr_cpt_cmp_nont_cd()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query('SELECT count(*) FROM `contact_direct` WHERE `Contact_Suivi_par` is null or `Contact_Suivi_par`=""');
            $value="<table class='table table-bordered'><tr><th>Nombre des contacts direct non affectés</th></tr>";
            while($donner=$reqindss->fetch())
            {
                        $value.="<tr><td>".$donner[0]."</td></tr>"; 
            }
            $value.="</table>";
            return $value;
        }
    function get_nbr_cpt_cmp_nont()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query('SELECT count(*) FROM `contact_indirect` WHERE `Contact_Suivi_par` is null or `Contact_Suivi_par`=""');
            $value="<table class='table table-bordered'><tr><th>Nombre des contacts indirect non affectés</th></tr>";
            while($donner=$reqindss->fetch())
            {
                        $value.="<tr><td>".$donner[0]."</td></tr>"; 
            }
            $value.="</table>";
            return $value;
        }
     function get_nbr_cpt_cmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT u.nom,u.prenom, 
            COALESCE(cdi.nbrcdi,0) AS nbrcdi,
                COALESCE(cd.nbrcd,0) AS nbrcd,
                COALESCE(cd.nbrdd,0) AS nbrdd,
                COALESCE(cd.nbrtp,0) AS nbrtp,
                COALESCE(cd.nbradmis,0) AS nbradmis,
                COALESCE(cd.nbrins,0) AS nbrins,
                COALESCE(rv.nbrrdv,0) AS nbrrdv, u.centre
            FROM users AS u
                LEFT JOIN (
                        SELECT COUNT(*) AS nbrcd,Contact_Suivi_par as csp,
                    SUM(IF( `depot_dossier` = 1 , 1, 0)) AS 'nbrdd',
                    SUM(IF( `Test_Passe` = 1 , 1, 0)) AS 'nbrtp',
                    SUM(IF( `Resultat` = 'Admis' , 1, 0)) AS 'nbradmis',
                    SUM(IF( `Inscrit` = 1 , 1, 0)) AS 'nbrins'
                        FROM contact_direct
                        GROUP BY Contact_Suivi_par
                    ) AS cd
                    ON u.id = cd.csp
                LEFT JOIN (
                        SELECT COUNT(*) AS nbrcdi,Contact_Suivi_par as cspcdi
                        FROM contact_indirect
                        GROUP BY Contact_Suivi_par
                    ) AS cdi
        ON u.id = cdi.cspcdi
        LEFT JOIN (
                        SELECT count(*) as nbrrdv,user as urs FROM `rendez_vous` WHERE `inscription_rdv`=1
                    ) AS rv
        ON u.id = rv.urs order by u.centre");
            $value="<table class='table table-bordered'><tr><th>Chargé de promotion</th><th> Centre </th><th>Contacts Indirect</th><th>Contacts Direct</th>
            <th>Dépôt Dossier</th>
            <th>Test Passé</th>
            <th>Admis</th>
            <th>RDV Inscr</th>
            <th>Inscrits</th>
            </tr>";
            $totale1=0;
            $totale2=0;
            $totale3=0;
            $totale4=0;
            $totale5=0;
            $totale6=0;
            $totale7=0;
            $center="";
            while($donner=$reqindss->fetch())
            {
                if($center!="")
                {
                    if($center==$donner[9])
                    {
                        $center=$donner[9];
                        if($donner[2]!=0 or $donner[3]!=0 or $donner[4]!=0 or $donner[5]!=0 or $donner[6]!=0 or $donner[7]!=0)
                        {
                            if($donner[1]=="")
                            {
                                $value.="<tr><td>".$donner[2]."</td><td>Non traité</td></tr>";
                            }
                            else
                            {
                                $value.="<tr><td>".$donner[0]." ".$donner[1]."</td><td>".$donner[9]."</td><td>".$donner[2]."</td><td>".$donner[3]."</td><td>".$donner[4]."</td><td>".$donner[5]."</td><td>".$donner[6]."</td><td>".$donner[8]."</td><td>".$donner[7]."</td></tr>";
                               
                            }
                             
                            $totale1+=$donner[2];
                            $totale2+=$donner[3];
                            $totale3+=$donner[4];
                            $totale4+=$donner[5];
                            $totale5+=$donner[6];
                            $totale6+=$donner[7];
                            $totale7+=$donner[8];
                            $center=$donner[9];
                           
                        }
                    }
                    else
                    {
                        $totale1=0;
                        $totale2=0;
                        $totale3=0;
                        $totale4=0;
                        $totale5=0;
                        $totale6=0;
                        $totale7=0;
                        if($donner[2]!=0 or $donner[3]!=0 or $donner[4]!=0 or $donner[5]!=0 or $donner[6]!=0 or $donner[7]!=0)
                        {
                            if($donner[1]=="")
                            {
                                $value.="<tr><td>".$donner[2]."</td><td>Non traité</td></tr>";
                            }
                            else
                            {
                                if($donner[0]!="" and $donner[1]!=""  and $donner[9]!=""  and $donner[2]!=""  and $donner[3]!=""  and $donner[4]!=""  and $donner[5]!="" and $donner[7]!=""  and $donner[8]!="" and $donner[9]!=""  )
                                {
                                    $value.="<tr style='background-color: #222d32;color: white;'><th colspan='2'>Total</th><th>".$totale1."</th><th>".$totale2."</th><th>".$totale3."</th><th>".$totale4."</th><th>".$totale5."</th><th>".$totale7."</th><th>".$totale6."</th></tr>";
                                    $value.="</table>";
                                    $value.="<table class='table table-bordered'><tr><th>Chargé de promotion</th><th> Centre </th><th>Contacts Indirect</th><th>Contacts Direct</th>
                                    <th>Dépôt Dossier</th>
                                    <th>Test Passé</th>
                                    <th>Admis</th>
                                    <th>RDV Inscr</th>
                                    <th>Inscrits</th>
                                    </tr>";
                                $value.="<tr><td>".$donner[0]." ".$donner[1]."</td><td>".$donner[9]."</td><td>".$donner[2]."</td><td>".$donner[3]."</td><td>".$donner[4]."</td><td>".$donner[5]."</td><td>".$donner[6]."</td><td>".$donner[8]."</td><td>".$donner[7]."</td></tr>";
                                }
                            }
                             
                            $totale1+=$donner[2];
                            $totale2+=$donner[3];
                            $totale3+=$donner[4];
                            $totale4+=$donner[5];
                            $totale5+=$donner[6];
                            $totale6+=$donner[7];
                            $totale7+=$donner[8];
                            $center=$donner[9];
                           
                        }
                    }
                }
                else
                {
                    if($donner[2]!=0 or $donner[3]!=0 or $donner[4]!=0 or $donner[5]!=0 or $donner[6]!=0 or $donner[7]!=0)
                    {
                        if($donner[1]=="")
                        {
                            $value.="<tr><td>".$donner[2]."</td><td>Non traité</td></tr>";
                        }
                        else
                        {
                            $value.="<tr><td>".$donner[0]." ".$donner[1]."</td><td>".$donner[9]."</td><td>".$donner[2]."</td><td>".$donner[3]."</td><td>".$donner[4]."</td><td>".$donner[5]."</td><td>".$donner[6]."</td><td>".$donner[8]."</td><td>".$donner[7]."</td></tr>";
                           
                        }
                         
                        $totale1+=$donner[2];
                        $totale2+=$donner[3];
                        $totale3+=$donner[4];
                        $totale4+=$donner[5];
                        $totale5+=$donner[6];
                        $totale6+=$donner[7];
                        $totale7+=$donner[8];
                        $center=$donner[9];
                       
                    }
                    
                }
                
                
            }
            
            $value.="<tr style='background-color: #222d32;color: white;'><th colspan='2'>Total</th><th>".$totale1."</th><th>".$totale2."</th><th>".$totale3."</th><th>".$totale4."</th><th>".$totale5."</th><th>".$totale7."</th><th>".$totale6."</th></tr>";
                    
            $value.="</table>";
            return $value;
        }
        function gettestpasse_by_formation()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $value='<table class="table table-bordered table-striped"><thead>
                                    <tr>
                                        <th align=\'center\'>Niveau</th>
                                        <th align=\'center\'>Test Passé</th>
                                        <th align=\'center\'>Admis</th>
                                        <th align=\'center\'>Inscrit</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                $totale1_globale=0;
                $totale2_globale=0;
                $totale3_globale=0;
                $reqindss = $bdd->query("SELECT `Formation_Demmandee`,Test,count(`Test_Passe`), sum(case when `Inscrit` = 1 then 1 else 0 end) Inscrit, sum(case when `Resultat` = 'Admis' then 1 else 0 end) Admis FROM `contact_direct` WHERE `Test_Passe`=1 and test is not null and test<>'' group by `Formation_Demmandee`");
                if($reqindss->rowCount()>0)
                {
                    while($statistique=$reqindss->fetch())
                    {
                        $totale1_globale+=$statistique[2];
                        $totale2_globale+=$statistique[3];
                        $totale3_globale+=$statistique[4];
                        $value.= "<tr>";
                        $value.= "<td>".$statistique[0]."</td>";
                        if($statistique[2]==0)
                        {
                            $value.=  "<td align='center'>-</td>";
                        }
                        else
                        {
                            $value.=  "<td align='center'>".$statistique[2]."</td>";
                        }
                        if($statistique[4]==0)
                        {
                            $value.=  "<td align='center'>-</td>";
                        }
                        else
                        {
                            $value.=  "<td align='center'>".$statistique[4]."</td>";
                        }
                        if($statistique[3]==0)
                        {
                            $value.=  "<td align='center'>-</td>";
                        }
                        else
                        {
                            $value.=  "<td align='center'>".$statistique[3]."</td>";
                        }
                        $value.= "</tr>";
        
                    }
                }
                $totale1_globale+=$totale1;
                $totale2_globale+=$totale2;
                $totale3_globale+=$totale3;
            $value.=" <tr style='background-color: #222d32;color: white;'>
                                        <th>Total Global</th>
                                        <td style='font-weight: bold' align='center'>$totale1_globale</td>
                                        <td style='font-weight: bold' align='center'>$totale3_globale</td>
                                        <td style='font-weight: bold' align='center'>$totale2_globale </td>
                                    </tr>";
            $value.="</tbody>
                                </table>";
            return $value;
        }
    function gettestpasse_by_niveau()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $value='<table class="table table-bordered table-striped"><thead>
                                <tr>
                                    <th align=\'center\'>Niveau</th>
                                    <th align=\'center\'>Test Passé</th>
                                    <th align=\'center\'>Admis</th>
                                    <th align=\'center\'>Inscrit</th>
                                </tr>
                                </thead>
                                <tbody>';
            $totale1_globale=0;
            $totale2_globale=0;
            $totale3_globale=0;
            $reqindss = $bdd->query("SELECT `niveau_demande`,Test,count(`Test_Passe`), sum(case when `Inscrit` = 1 then 1 else 0 end) Inscrit, sum(case when `Resultat` = 'Admis' then 1 else 0 end) Admis FROM `contact_direct` WHERE `Test_Passe`=1 and test is not null and test<>'' group by `niveau_demande`");
            if($reqindss->rowCount()>0)
            {
                while($statistique=$reqindss->fetch())
                {
                    $totale1_globale+=$statistique[2];
                    $totale2_globale+=$statistique[3];
                    $totale3_globale+=$statistique[4];
                    $value.= "<tr>";
                    $value.= "<td>".$statistique[0]."</td>";
                    if($statistique[2]==0)
                    {
                        $value.=  "<td align='center'>-</td>";
                    }
                    else
                    {
                        $value.=  "<td align='center'>".$statistique[2]."</td>";
                    }
                    if($statistique[4]==0)
                    {
                        $value.=  "<td align='center'>-</td>";
                    }
                    else
                    {
                        $value.=  "<td align='center'>".$statistique[4]."</td>";
                    }
                    if($statistique[3]==0)
                    {
                        $value.=  "<td align='center'>-</td>";
                    }
                    else
                    {
                        $value.=  "<td align='center'>".$statistique[3]."</td>";
                    }
                    $value.= "</tr>";
    
                }
            }
            $totale1_globale+=$totale1;
            $totale2_globale+=$totale2;
            $totale3_globale+=$totale3;
        $value.=" <tr style='background-color: #222d32;color: white;'>
                                    <th>Total Global</th>
                                    <td style='font-weight: bold' align='center'>$totale1_globale</td>
                                    <td style='font-weight: bold' align='center'>$totale3_globale</td>
                                    <td style='font-weight: bold' align='center'>$totale2_globale </td>
                                </tr>";
        $value.="</tbody>
                            </table>";
        return $value;
    }
    function gettestpasse()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->query("SELECT DISTINCT Test FROM `contact_direct`");
        $value='<table class="table table-bordered table-striped"><thead>
                                <tr>
                                    <th align=\'center\'>Niveau</th>
                                    <th align=\'center\'>Test Passé</th>
                                    <th align=\'center\'>Admis</th>
                                    <th align=\'center\'>Inscrit</th>
                                </tr>
                                </thead>
                                <tbody>';
        $totale1_globale=0;
        $totale2_globale=0;
        $totale3_globale=0;
        $totale4_globale=0;
        while($donner=$req->fetch())
        {
            $totale1=0;
            $totale2=0;
            $totale3=0;
            $reqindss = $bdd->query("SELECT `niveau_demande`,Test,sum(case when `Test_Passe` = 1 then 1 else 0 end), sum(case when `Inscrit` = 1 then 1 else 0 end) Inscrit, sum(case when `Resultat` = 'Admis' then 1 else 0 end) Admis FROM `contact_direct` WHERE `Test_Passe`=1 and Test='$donner[0]' group by Test,`niveau_demande`");
           
            if($reqindss->rowCount()>0)
            {
                $value.='<td style="font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;" colspan="4" align=\'center\'>'.$donner[0].'</td>';
            while($statistique=$reqindss->fetch())
            {
                $totale1+=$statistique[2];
                $totale2+=$statistique[3];
                $totale3+=$statistique[4];
                $value.= "<tr>";
                $value.= "<td>".$statistique[0]."</td>";
                if($statistique[2]==0)
                {
                    $value.=  "<td align='center'>-</td>";
                }
                else
                {
                    $value.=  "<td align='center'>".$statistique[2]."</td>";
                }
                if($statistique[4]==0)
                {
                    $value.=  "<td align='center'>-</td>";
                }
                else
                {
                    $value.=  "<td align='center'>".$statistique[4]."</td>";
                }
                if($statistique[3]==0)
                {
                    $value.=  "<td align='center'>-</td>";
                }
                else
                {
                    $value.=  "<td align='center'>".$statistique[3]."</td>";
                }
                $value.= "</tr>";

            }
            }
             if($reqindss->rowCount()>0)
            {
            $value.=" <tr>
                                    <td>Total</td>
                                    <td align='center'>$totale1</td>
                                    <td align='center'>$totale3</td>
                                    <td align='center'>$totale2 </td>
                                </tr>";
            }
            $totale1_globale+=$totale1;
            $totale2_globale+=$totale2;
            $totale3_globale+=$totale3;
        }
        $value.=" <tr style='background-color: #222d32;color: white;'>
                                    <th>Total Global</th>
                                    <td style='font-weight: bold' align='center'>$totale1_globale</td>
                                    <td style='font-weight: bold' align='center'>$totale3_globale</td>
                                    <td style='font-weight: bold' align='center'>$totale2_globale </td>
                                </tr>";
        $value.="</tbody>
                            </table>";
        return $value;
    }
    function getdepotdossier_by_day()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->query("SELECT DISTINCT Test FROM `contact_direct` WHERE `Test`<>'Vide'");
        $value='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Niveau</th>
                                    <th>Depot Dossier</th>
                                </tr>
                                </thead>
                                <tbody>';
        $totale1_globale=0;
        while($donner=$req->fetch())
        {
            $totale1=0;
            $reqindss = $bdd->query("SELECT `test`,`niveau_demande`,count(`depot_dossier`) FROM `contact_direct` where `depot_dossier`=1 and date_depot=CURDATE() and Test_Passe=0 and AbsTest=0 and Test<>'Vide' and Test='".$donner[0]."' group by `test`,`niveau_demande`");
            if($reqindss->rowCount()>0)
            {
                $value.='<td style="font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;" colspan="3" align=\'center\'>'.$donner[0].'</td>';
                while($statistique=$reqindss->fetch())
                {
                    $totale1+=$statistique[2];
                    $value.= "<tr>";
                    $value.= "<td>".$statistique[1]."</td>";
                    $value.= "<td align='center'>".$statistique[2]."</td>";
                    $value.= "</tr>";
                }
            }
            if($totale1>0)
            {
                $value.=" <tr>
                                    <td>Total</td>
                                    <td align='center'>$totale1</td>
                                </tr>";
            }
            $totale1_globale+=$totale1;
        }

        $value.=" <tr style='background-color: #222d32;color: white;'>
                                    <th>Total Global</th>
                                    <td style='font-weight: bold' align='center'>$totale1_globale</td>
                                </tr>";
        $value.="</tbody>
                            </table>";
        return $value;
     }
    function getdepotdossier()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->query("SELECT DISTINCT Test FROM `contact_direct` WHERE `Test`<>'Vide'");
        $value='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Niveau</th>
                                    <th>Depot Dossier</th>
                                </tr>
                                </thead>
                                <tbody>';
        $totale1_globale=0;
        while($donner=$req->fetch())
        {
            $totale1=0;
            $reqindss = $bdd->query("SELECT `test`,`niveau_demande`,count(`depot_dossier`) FROM `contact_direct` where `depot_dossier`=1 and Test_Passe=0 and AbsTest=0 and Test<>'Vide' and Test='".$donner[0]."' group by `test`,`niveau_demande`");
            if($reqindss->rowCount()>0)
            {
                $value.='<td style="font-size: 15px;background-color: #41A0D1;color: white;border: 1px solid #000000;" colspan="3" align=\'center\'>'.$donner[0].'</td>';
                while($statistique=$reqindss->fetch())
                {
                    $totale1+=$statistique[2];
                    $value.= "<tr>";
                    $value.= "<td>".$statistique[1]."</td>";
                    $value.= "<td align='center'>".$statistique[2]."</td>";
                    $value.= "</tr>";
                }
            }
            if($totale1>0)
            {
                $value.=" <tr>
                                    <td>Total</td>
                                    <td align='center'>$totale1</td>
                                </tr>";
            }
            $totale1_globale+=$totale1;
        }

        $value.=" <tr style='background-color: #222d32;color: white;'>
                                    <th>Total Global</th>
                                    <td style='font-weight: bold' align='center'>$totale1_globale</td>
                                </tr>";
        $value.="</tbody>
                            </table>";
        return $value;
     }
      function getStatistiqueGlobal()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->query("select count(id) from contact_indirect");
        $nbr_cdi_glb=$req->fetch();
        $req = $bdd->query("
SELECT `Formation_Demmandee`,`niveau_demande`, count(`id`) as 'nbr_contact', (select count(id) from contact_indirect WHERE contact_indirect.Formation_Demmandee=cd.`Formation_Demmandee` ) as nbr_cdi,
(SELECT SUM(IF( `inscription_rdv` = 1 , 1, 0)) AS 'inscription_rdv' FROM `rendez_vous` WHERE (`id_contact`) in (SELECT md5(id) from contact_direct cd1 where cd.niveau_demande=cd1.niveau_demande))
 AS inscription_rdv, SUM(IF( `depot_dossier` = 1 , 1, 0)) AS 'depot_dossier', SUM(IF( `Test_Passe` = 1 , 1, 0)) AS 'Test_Passe', SUM(IF( `Resultat` = 'Admis' , 1, 0)) AS 'Admis', SUM(IF( `Inscrit` = 1 , 1, 0)) AS 'Inscrit' FROM contact_direct as cd WHERE `Formation_Demmandee` is not null and `Formation_Demmandee`<>'' and `niveau_demande` is not null and `niveau_demande`<>'' group by `Formation_Demmandee`,`niveau_demande` ORDER by `Formation_Demmandee`,`niveau_demande`");
        $value='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Formation Demmandée</th>
                                    <th>Niveau Demmandé</th>
                                    <th>Nbr Contact Indirect</th>
                                    <th>Nbr Contact Direct</th>
                                    <th>Depot Dossier</th>
                                    <th>Test Passé</th>
                                    <th>Admis</th>
                                    <th>RDV Inscription</th>
                                    <th>Inscrit</th>
                                </tr>
                                </thead>
                                <tbody>';
        $totale1_globale=0;
        $totale2_globale=0;
        $totale3_globale=0;
        $totale4_globale=0;
        $totale5_globale=0;
        $totale6_globale=0;
        while($donner=$req->fetch())
        {
                    $inscription_rdv=0;
                    if($donner["inscription_rdv"]=="")
                    {
                        $inscription_rdv=0;
                    }
                    else
                    {
                        $inscription_rdv=$donner["inscription_rdv"];
                    }
                    $value.= "<tr ondblclick='window.location=\"".$location."?page=detailgroupe&formation=".$donner["niveau_demande"]."&type_affichage=global\"'>";
                    $value.= "<td>".$donner["Formation_Demmandee"]."</td>";
                    $value.= "<td>".$donner["niveau_demande"]."</td>";
                    $value.= "<td align='center'>".$donner["nbr_cdi"]."</td>";
                    $value.= "<td align='center'>".$donner["nbr_contact"]."</td>";
                    $value.= "<td align='center'>".$donner["depot_dossier"]."</td>";
                    $value.= "<td align='center'>".$donner["Test_Passe"]."</td>";
                    $value.= "<td align='center'>".$donner["Admis"]."</td>";
                    $value.= "<td align='center'>".$inscription_rdv."</td>";
                    $value.= "<td align='center'>".$donner["Inscrit"]."</td>";
                    $value.= "</tr>";
                    $totale1_globale+=$donner["nbr_contact"];
                    $totale2_globale+=$donner["depot_dossier"];
                    $totale3_globale+=$donner["Test_Passe"];
                    $totale4_globale+=$donner["Admis"];
                    $totale5_globale+=$donner["Inscrit"];
                    $totale6_globale+=$inscription_rdv;
        }

        $value.= " <tr style='background-color: #8c8c8c;color: white;'>
                                    <th colspan='2'>Total Global</th>
                                    <th style='font-weight: bold' align='center'>$nbr_cdi_glb[0]</th>
                                    <th style='font-weight: bold' align='center'>$totale1_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale2_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale3_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale4_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale6_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale5_globale</th>
                                </tr>";
        $value.="</tbody>
                            <tfoot>
                                <tr>
                                    <th>Formation Demmandée</th>
                                    <th>Niveau Demmandé</th>
                                    <th>Nbr Contact Indirect</th>
                                    <th>Nbr Contact Direct</th>
                                    <th>Depot Dossier</th>
                                    <th>Test Passé</th>
                                    <th>Admis</th>
                                    <th>RDV Inscription</th>
                                    <th>Inscrit</th>
                                </tr>
                            </tfoot>
                            </table>";
        return $value;
    }
    function getRapportJournaliser()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->query("SELECT `Formation_Demmandee`,`niveau_demande`,test, SUM(IF(`date_du_contact`=CURRENT_DATE() , 1, 0)) AS 'nbr_contact', SUM(IF( `depot_dossier` = 1 and date_depot=CURRENT_DATE() , 1, 0)) AS 'depot_dossier',(select count(id) from contact_indirect where CURDATE()=date_Saisie) as nbr_cdi,
(SELECT SUM(IF( `inscription_rdv` = 1 and 	DATE(date)=CURDATE() , 1, 0)) AS 'inscription_rdv' FROM `rendez_vous` WHERE (`id_contact`) in (SELECT md5(id) from contact_direct cd1 where cd.niveau_demande=cd1.niveau_demande))
 AS inscription_rdv, SUM(IF( `Test_Passe` = 1 and date_test=CURRENT_DATE(), 1, 0)) AS 'Test_Passe', SUM(IF( `Inscrit` = 1 and date_inscription=CURRENT_DATE(), 1, 0)) AS 'Inscrit' FROM contact_direct cd WHERE `Formation_Demmandee` is not null and `Formation_Demmandee`<>'' and `niveau_demande` is not null and `niveau_demande`<>'' group by `Formation_Demmandee`,`niveau_demande`,test ORDER by `Formation_Demmandee`,niveau_demande ");
        $value='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Formation Demmandée</th>
                                    <th>Niveau Demmandé</th>
                                    <th>Test</th>
                                    <th>Nbr Contact Indirect</th>
                                    <th>Nbr Contact Direct</th>
                                    <th>Depot Dossier</th>
                                    <th>Test Passé</th>
                                    <th>RDV Inscription</th>
                                    <th>Inscrit</th>
                                </tr>
                                </thead>
                                <tbody>';
        $totale1_globale=0;
        $totale2_globale=0;
        $totale3_globale=0;
        $totale5_globale=0;
        $totale6_globale=0;
        $totale7_globale=0;
        while($donner=$req->fetch())
        {
            if($donner["nbr_contact"]!=0 or $donner["depot_dossier"]!=0 or $donner["Test_Passe"]!=0 or $donner["Admis"]!=0 or $donner["Inscrit"]!=0 or $donner["inscription_rdv"]!=0)
            {
                 $inscription_rdv=0;
                    if($donner["inscription_rdv"]=="")
                    {
                        $inscription_rdv=0;
                    }
                    else
                    {
                        $inscription_rdv=$donner["inscription_rdv"];
                    }
                $value.= "<tr>";
                $value.= "<td>".$donner["Formation_Demmandee"]."</td>";
                $value.= "<td>".$donner["niveau_demande"]."</td>";
                $value.= "<td align='center'>".$donner["test"]."</td>";
                $value.= "<td align='center'>".$donner["nbr_cdi"]."</td>";
                $value.= "<td align='center'>".$donner["nbr_contact"]."</td>";
                $value.= "<td align='center'>".$donner["depot_dossier"]."</td>";
                $value.= "<td align='center'>".$donner["Test_Passe"]."</td>";
                $value.= "<td align='center'>".$inscription_rdv."</td>";
                $value.= "<td align='center'>".$donner["Inscrit"]."</td>";
                $value.= "</tr>";
                $totale1_globale+=$donner["nbr_contact"];
                $totale2_globale+=$donner["depot_dossier"];
                $totale3_globale+=$donner["Test_Passe"];
                $totale5_globale+=$donner["Inscrit"];
                $totale6_globale+=$inscription_rdv;
                $totale7_globale+=$donner["nbr_cdi"];
            }
        }

        $value.= " <tr style='background-color: #8c8c8c;color: white;'>
                                    <th colspan='3'>Total Global</th>
                                    <th style='font-weight: bold' align='center'>$totale7_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale1_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale2_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale3_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale6_globale</th>
                                    <th style='font-weight: bold' align='center'>$totale5_globale</th>
                                </tr>";
        $value.="</tbody>
                            <tfoot>
                                <tr>
                                    <th>Formation Demmandée</th>
                                    <th>Niveau Demmandé</th>
                                    <th>Test</th>
                                    <th>Nbr Contact Indirect</th>
                                    <th>Nbr Contact Direct</th>
                                    <th>Depot Dossier</th>
                                    <th>Test Passé</th>
                                    <th>RDV Inscription</th>
                                    <th>Inscrit</th>
                                </tr>
                            </tfoot>
                            </table>";
        return $value;
    }
}