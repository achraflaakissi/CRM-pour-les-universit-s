<?php
class page{	
	public $Page;
	public $File;
	public $Title;
	Public $Authentification;
	
	public  function generer(){	
		if($this->Authentification==true){			
			include('content/config.php');
            if($_SESSION['user']['profile']==sha1(md5('import'.$salt)) ) {
                // routing for agent profiles
                switch ($this->Page) {
                    case "pageimport":
                        $this->File = 'content/vues/import/import-pageimport-vue.php';
                        $this->Title = $this->Page;
                        break;
                    case "deconnexion":
                        $this->File = 'content/vues/' . $this->Page . '-vue.php';
                        $this->Title = $this->Page;
                        break;
                    case "home":
                        $this->File = 'content/vues/import/import-home-vue.php';
                        $this->Title = $this->Page;
                        break;
                    default:
                        $this->File = 'content/vues/404.php';
                        $this->Title = $this->Page;
                }
            }
				if($_SESSION['user']['profile']==sha1(md5('agent'.$salt))) {
						switch ($this->Page) {

                            case "campagne_caravane":
                                $this->File = 'content/vues/agent/agent-campagne_caravane-vue.php';
                                $this->Title = $this->Page;
                            break;
                            case "campagne":
                                $this->File = 'content/vues/agent/agent-campagne-vue.php';
                                $this->Title = $this->Page;
                            break;
                            case "afficherct":
                                $this->File = 'content/vues/agent/agent-afficherct-vue.php';
                                $this->Title = $this->Page;
                            break;

                            case "rappel":
                                $this->File = 'content/vues/agent/agent-rappel-vue.php';
                                $this->Title = $this->Page;
                            break;
                            
                            case "recherche":
                                $this->File = 'content/vues/agent/agent-recherche-vue.php';
                                $this->Title = $this->Page;
                            break;

                            case "deconnexion":
									$this->File = 'content/vues/'.$this->Page.'-vue.php';
									$this->Title = $this->Page;
                            break;

                            case "home":
                                    $this->File = 'content/vues/agent/agent-home-vue.php';
                                    $this->Title = $this->Page;
                            break;

							default:
								$this->File = 'content/vues/404.php';
								$this->Title = $this->Page;
						}
				}	


                if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt))) {
                        switch ($this->Page) {
                            
                            
                            
                            case "auto_cmp_from_tr":
                                $this->File = 'content/vues/commercial/commercial-auto_cmp_from_tr-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "auto_cmpsite_appels":
                                $this->File = 'content/vues/commercial/commercial-auto_cmpsite_appels-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "auto_cmp_from_tr":
                                $this->File = 'content/vues/commercial/commercial-auto_cmp_from_tr-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "auto_cmp_appels":
                                $this->File = 'content/vues/commercial/commercial-auto_cmp_appels-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                
                            case "campagne_for_agents":
                                $this->File = 'content/vues/commercial/commercial-campagne_for_agents-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "imprimerrecu":
                                $this->File = 'content/vues/commercial/commercial-imprimer-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                

                                
                                 case "liste_etb":
                                $this->File = 'content/vues/commercial/commercial-liste_etb-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                 case "campagnetrt_global":
                                $this->File = 'content/vues/commercial/commercial-campagnetrt_global-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "listcompagne_global":
                                $this->File = 'content/vues/commercial/commercial-listcompagne_global-vue.php';
                                $this->Title = $this->Page;
                                break;

			                	case "getdoublons":
                                $this->File = 'content/vues/commercial/commercial-getdoublant-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                              case "campagne_email":
                                $this->File = 'content/vues/commercial/commercial-campagne_email-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "fiche_synthese":
                                $this->File = 'content/vues/commercial/commercial-fiche_synthese-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "actions":
                                $this->File = 'content/vues/commercial/commercial-actions-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "rappel_qualification":
                                $this->File = 'content/vues/commercial/commercial-rappel_qualification-vue.php';
                                $this->Title = $this->Page;
                                break;
                            case "getdoublonsind":
                                $this->File = 'content/vues/commercial/commercial-getdoublonsind-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "compagne":
                                $this->File = 'content/vues/commercial/commercial-campagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "rappel":
                                $this->File = 'content/vues/commercial/commercial-rappel-vue.php';
                                $this->Title = $this->Page;
                            break;
                            
                              case "financement":
                                $this->File = 'content/vues/commercial/commercial-finace-vue.php';
                                $this->Title = $this->Page;
                            break;
                            
                            case "recherche_by_one":
                                $this->File = 'content/vues/commercial/commercial-recherche_by_one-vue.php';
                                $this->Title = $this->Page;
                            break;
                            
				case "affecter_cdi":
                                $this->File = 'content/vues/commercial/commercial-affecter_cdi-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
				case "avancee_recherche":
                                $this->File = 'content/vues/commercial/commercial-avancee_recherche-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "avancee_recherche_cdi":
                                $this->File = 'content/vues/commercial/commercial-avancee_recherche_cdi-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "rendez_vous":
                                $this->File = 'content/vues/commercial/commercial-rendez-vous-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                 case "financementConcour":
                                $this->File = 'content/vues/commercial/commercial-financementConcour-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "appels":
                                $this->File = 'content/vues/commercial/commercial-appels-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "mycompagne":
                                $this->File = 'content/vues/commercial/commercial-mycampagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "auto":
                                $this->File = 'content/vues/commercial/commercial-auto-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "recherche":
                                $this->File = 'content/vues/commercial/commercial-recherche-vue.php';
                                $this->Title = $this->Page;
                                break;

				case "recherche_cdi1":
                                $this->File = 'content/vues/commercial/commercial-recherche_cdi1-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "recherche_cdi":
                                $this->File = 'content/vues/commercial/commercial-recherche_cdi-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactind":
                                $this->File = 'content/vues/commercial/commercial-contactind-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactd":
                                $this->File = 'content/vues/commercial/commercial-contactd-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "listcompagneclp":
                                $this->File = 'content/vues/commercial/commercial-listcompagneclp-vue.php';
                                $this->Title = $this->Page;
                                break;
                            case "listcompagne":
                                $this->File = 'content/vues/commercial/commercial-listcompagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "campagnetrt":
                                $this->File = 'content/vues/commercial/commercial-campagnetrt-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactdirect":
                                $this->File = 'content/vues/commercial/commercial-contactdirect-vue.php';
                                $this->Title = $this->Page;
                                break;
                            case "contactindirect":
                                $this->File = 'content/vues/commercial/commercial-contactindirect-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "deconnexion":
                                    $this->File = 'content/vues/'.$this->Page.'-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            case "home":
                                    $this->File = 'content/vues/commercial/commercial-home-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            default:
                                $this->File = 'content/vues/404.php';
                                $this->Title = $this->Page;

                        }
                }
                
                if($_SESSION['user']['profile']==sha1(md5('supercommercial'.$salt)))
                {
                   
                    switch ($this->Page) {
                        
                          case "auto_cmp_from_tr":
                                $this->File = 'content/vues/supercommercial/supercommercial-auto_cmp_from_tr-vue.php';
                                $this->Title = $this->Page;
                                break;
                       
                            case "contactdirect":
                                $this->File = 'content/vues/supercommercial/supercommercial-contactdirect-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                
                                  case "whatsapp":
                                $this->File = 'content/vues/supercommercial/supercommercial-whatsapp-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                
                                case "contactd":
                                $this->File = 'content/vues/supercommercial/supercommercial-contactd-vue.php';
                                $this->Title = $this->Page;
                                break;
                            case "contactindirect":
                                $this->File = 'content/vues/supercommercial/supercommercial-contactindirect-vue.php';
                                $this->Title = $this->Page;
                                break;
                                case "dejaaffecte":
                                $this->File = 'content/vues/supercommercial/supercommercial-dejaaffecte-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "deconnexion":
                                    $this->File = 'content/vues/'.$this->Page.'-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            case "home":
                                    $this->File = 'content/vues/supercommercial/supercommercial-home-vue.php';
                                    $this->Title = $this->Page;
                                break;
                                
                                        case "recherche":
                                $this->File = 'content/vues/supercommercial/supercommercial-recherche-vue.php';
                                $this->Title = $this->Page;
                                break;

                            default:
                                $this->File = 'content/vues/404.php';
                                $this->Title = $this->Page;

                        }
                }
                
                
                if($_SESSION['user']['profile']==sha1(md5('saisie'.$salt))) {
                        switch ($this->Page) {
                            case "contactdirect":
                                $this->File = 'content/vues/saisie/saisie-contactdirect-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactindirect":
                                $this->File = 'content/vues/saisie/saisie-contactindirect-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "campagne":
                                $this->File = 'content/vues/saisie/saisie-compagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "mycampagne":
                                $this->File = 'content/vues/saisie/saisie-mycompagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "appels":
                                $this->File = 'content/vues/saisie/saisie-appels-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "listcampagne":
                                $this->File = 'content/vues/saisie/saisie-listcompagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "listcampagneclp":
                                $this->File = 'content/vues/saisie/saisie-listcompagneclp-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "campagnetrt":
                                $this->File = 'content/vues/saisie/saisie-compagnetrt-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "recherche_cdi":
                                $this->File = 'content/vues/saisie/saisie-recherche_cdi-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "recherche":
                                $this->File = 'content/vues/saisie/saisie-recherche-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactind":
                                $this->File = 'content/vues/commercial/commercial-contactind-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "contactd":
                                $this->File = 'content/vues/commercial/commercial-contactd-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "deconnexion":
                                    $this->File = 'content/vues/'.$this->Page.'-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            case "home":
                                    $this->File = 'content/vues/saisie/saisie-home-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            default:
                                $this->File = 'content/vues/404.php';
                                $this->Title = $this->Page;

                        }
                }	


                                if($_SESSION['user']['profile']==sha1(md5('admin'.$salt))) {
                        switch ($this->Page) {
                            
                            
                                case "export":
                                $this->File = 'content/vues/admin/admin-export-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "statistique_rendez_vous":
                                $this->File = 'content/vues/admin/admin-statistique_rendez_vous-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "affectationcommercial":
                                $this->File = 'content/vues/admin/admin-affectationcommercial-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "historique_appels":
                                $this->File = 'content/vues/admin/admin-historique_appels-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "landing":
                                $this->File = 'content/vues/admin/admin-landing-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                               
                            
                            case "divers":
                                $this->File = 'content/vues/admin/admin-divers-vue.php';
                                $this->Title = $this->Page;
                                break;
                            
                            case "actions_week":
                                $this->File = 'content/vues/admin/admin-actions_week-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "reaffectation_etb":
                                $this->File = 'content/vues/admin/admin-reaffectation_etb-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "affectation_etb":
                                $this->File = 'content/vues/admin/admin-affectation_etb-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "validation_cmp":
                                $this->File = 'content/vues/admin/admin-validation_cmp-vue.php';
                                $this->Title = $this->Page;
                                break;

                                case "detailgroupe":
                                $this->File = 'content/vues/admin/admin-detailgroupe-vue.php';
                                $this->Title = $this->Page;
                                break;

                                case "statistique_rapport_journalier":
                                $this->File = 'content/vues/admin/admin-statistique_rapport_journalier-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                                case "statistique_action":
                                $this->File = 'content/vues/admin/admin-statistique_action-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "listcompagne":
                                $this->File = 'content/vues/admin/admin-listcompagne-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "qualification":
                                $this->File = 'content/vues/admin/admin-qualification-vue.php';
                                $this->Title = $this->Page;
                                break;
                                
                            case "verificateur":
                                $this->File = 'content/vues/admin/admin-'.$this->Page.'-vue.php';
                                $this->Title = $this->Page;
                                break;

                                case "verificateur-direct":
                                $this->File = 'content/vues/admin/admin-'.$this->Page.'-vue.php';
                                $this->Title = $this->Page;
                                break;
                                     case "valides":
                                     $this->File = 'content/vues/admin/admin-'.$this->Page.'-vue.php';
                                     $this->Title = $this->Page;
                                     break;

                             case "statistique_test":
                                 $this->File = 'content/vues/admin/admin-statistique_test-vue.php';
                                 $this->Title = $this->Page;
                                 break;

                            case "rendez-vous":
                                $this->File = 'content/vues/admin/admin-rendez-vous-vue.php';
                                $this->Title = $this->Page;
                                break;


                            case "rendez-vous-list":
                                $this->File = 'content/vues/admin/admin-rendez-vous-list-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "ajoutertout":
                                $this->File = 'content/vues/admin/admin-'.$this->Page.'-vue.php';
                                $this->Title = $this->Page;
                                break;

                            case "users":
                                $this->File = 'content/vues/admin/admin-gestionutilisateur-vue.php';
                                $this->Title = $this->Page;
                            break;

                            case "campagne":
                                $this->File = 'content/vues/admin/admin-campagne-vue.php';
                                $this->Title = $this->Page;
                            break;
                            case "deconnexion":
                                    $this->File = 'content/vues/'.$this->Page.'-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            case "home":
                                    $this->File = 'content/vues/admin/admin-home-vue.php';
                                    $this->Title = $this->Page;
                                break;

                            default:
                                $this->File = 'content/vues/404.php';
                                $this->Title = $this->Page;

                        }
                }			

                if($_SESSION['user']['profile']==sha1(md5('superadmin'.$salt))) {
                switch ($this->Page) {
                    
                    
                     case "historique":
                        $this->File = 'content/vues/superviseur/superviseur-historique-vue.php';
                        $this->Title = $this->Page;
                        break;
                        
                     case "recherche":
                        $this->File = 'content/vues/superviseur/superviseur-recherche-vue.php';
                        $this->Title = $this->Page;
                        break;
                        
                    
                     case "export":
                        $this->File = 'content/vues/superviseur/superviseur-export-vue.php';
                        $this->Title = $this->Page;
                        break;
                        
                     case "statistique_rendez_vous":
                        $this->File = 'content/vues/admin/admin-statistique_rendez_vous-vue.php';
                        $this->Title = $this->Page;
                        break;
                                
                     case "historique_appels":
                                $this->File = 'content/vues/admin/admin-historique_appels-vue.php';
                                $this->Title = $this->Page;
                                break;
                            
                    case "divers":
                        $this->File = 'content/vues/admin/admin-divers-vue.php';
                        $this->Title = $this->Page;
                        break;
                                
                    case "liste_actions":
                        $this->File = 'content/vues/admin/admin-liste_actions-vue.php';
                        $this->Title = $this->Page;
                        break;

                    case "home":
                        $this->File = 'content/vues/admin/admin-statistique_rapport_journalier-vue.php';
                        $this->Title = $this->Page;
                        break;

                    case "statistique_phoning":
                        $this->File = 'content/vues/admin/admin-home-vue.php';
                        $this->Title = $this->Page;
                        break;
                    case "statistique_action":
                        $this->File = 'content/vues/admin/admin-statistique_action-vue.php';
                        $this->Title = $this->Page;
                        break;

                    case "statistique_test":
                        $this->File = 'content/vues/admin/admin-statistique_test-vue.php';
                        $this->Title = $this->Page;
                        break;
                    case "deconnexion":
                        $this->File = 'content/vues/'.$this->Page.'-vue.php';
                        $this->Title = $this->Page;
                        break;

                    default:
                        $this->File = 'content/vues/404.php';
                        $this->Title = $this->Page;

                }
            }

				
	}else{
						
					switch ($this->Page) {	
											
							case "login":
									$this->File = 'content/vues/'.$this->Page.'-vue.php';
									$this->Title = 'login';
								break;

							case "deconnexion":
								$this->File = 'content/vues/'.$this->Page.'-vue.php';
								$this->Title = $this->Page;
							break;
						
							
							default:
								$this->File = 'content/vues/login-vue.php';
								$this->Title = 'Connexion';
														
						}

				}					
				
		}
}

$page=new page();
?>