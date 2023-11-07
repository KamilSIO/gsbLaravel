<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
        $lesforfaits=$pdo->getListeTypeForfait();
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
        $lesforfaits=$pdo->getListeTypeForfait();
		include("views/v_cumulfrais.php");
		break;

	}

	case 'cumulfrais':{
        $typeFrais=$pdo->getListeTypeForfait();
        //$leMois = $_REQUEST['lstMois'];
        $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
    
        //$moisASelectionner = $leMois;
        include("views/v_cumulfrais.php");
        break;
    }

    case 'voirCumulFrais':{
        $typeFrais=$pdo->getListeTypeForfait();
        $leMois = $_REQUEST['lstMois'];
        $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
        //$moisASelectionner = $leMois;
        include("views/v_cumulfrais.php");
        $idFraisForfait=$_REQUEST['tfrais'];
        $mois = $_REQUEST['lstMois'];
        //$idFraisForfait=$pdo->getTypeDeFrais();
        $montant=$pdo->getlecumuldesfrais($idVisiteur,$mois,$idFraisForfait);
        //$dateModif =  dateAnglaisVersFrancais($dateModif);
        include("views/v_voircumulfrais.php");
        break;
    }

    case 'idtypeFrais':{
        $lesid=$pdo->getIdClient();
        $typeFraiss=$pdo->getListeTypeForfait();
        include("views/v_idTypeFrais.php");
        break;
    }

    case 'voirTypeFrais':{
        $lesid=$pdo->getIdClient();
        $typeFraiss=$pdo->getListeTypeForfait();
        include("views/v_idTypeFrais.php");
        $id=$_REQUEST['id'];
        $type = $_REQUEST['tfrais'];
        $montant=$pdo->getForfaitParId($id,$type);
        include("views/v_idtype.php");
        break;
    }

    case 'selectionnerMoiss':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("views/v_afficherMois.php");
		break;
	}
    case 'typemois':{
        $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
        $mois = $_REQUEST['lstMois'];
        $libelle=$pdo->getLibelle();
        $montant=$pdo->getCumulParMois($mois);
        include ("views/v_moisType.php");
        break;
    }

    case 'listeId':{
        $lesid=$pdo->getIdClient();
        include("views/v_fraisParId.php");
        break;

    }

    case 'voirfraisid':{
        $lesid=$pdo->getIdClient();
        include("views/v_fraisParId.php");
        $idd=$_REQUEST['id'];
        $montant=$pdo->getFraisParId($idd);
        include("views/v_voirfraisid.php");
        break;
    }

    case 'insertion':
        {
            $lesid=$pdo->getIdClient();
            $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
		    $lesCles = array_keys( $lesMois );
		    $moisASelectionner = $lesCles[0];
            include("views/v_insertionform.php");
            break;
        }

    case 'apresinsertion':{
        $annee=$_REQUEST['lstannee'];
        $mois=$_REQUEST['lstmoiss'];
        $date=$annee.$mois;
        $idd=$_REQUEST['id'];
        $nui=$_REQUEST['nui'];
        $rep=$_REQUEST['rep'];
        $km=$_REQUEST['km'];
        $etp=$_REQUEST['etp'];
        $test=$pdo->selectionnerid($idd,$date);
        if(empty($test)){
            $pre =$pdo->prerequete($idd,$date);
        }
        //teste si la ligne existe deja ou pas
        //appel de la fonction de select sur fraisforfait 
        //sinon si ligne existe pas insertion de la ligne frais forfait
    
        if($nui>0 && isset($_REQUEST['nui'])){
            $tf1='NUI';
            $res1 = $pdo->inscrirePersonne($idd,$date,$tf1,$nui);
        }
    
        if($etp>0 && isset($_REQUEST['etp'])){
            $tf2='ETP';
            $res2 = $pdo->inscrirePersonne($idd,$date,$tf2, $etp);
        }
    
        if(isset($_REQUEST['km']) && $km>0){
            $tf3='KM';
            $res3 = $pdo->inscrirePersonne($idd,$date,$tf3,$km);
        }
        if(isset($_REQUEST['rep']) && $rep>0){
            $tf4='REP';
            $res4 = $pdo->inscrirePersonne($idd,$date,$tf4,$rep);
        }
        if($rep==null or $rep==0 and $km==null or $km==0 and $etp==0 or $etp==null and $nui==0 or $nui==null ){
            echo "Vous n'avez rien rempli";
        }
        $lesid=$pdo->getIdClient();
        $montant=$pdo->selectionnerNouvelEntrant($idd,$date);
        include("views/v_afficherRes1e.php");
        break;
    }

}