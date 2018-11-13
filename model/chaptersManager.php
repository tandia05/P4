<?php
require_once("manager.php");

class ChaptersManager extends Manager
{
	
	//Call one chapter
	public function oneChap(){
		$db=$this->dbConnect();
		$selectOne=$db->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
		 $selectOne->execute(array(
			'idPage'=>$_GET['id']
		 	 ));
		return $selectOne;
	
	}

	//Call all chapter
	public function listChap(){	
		$db=$this->dbConnect();
		$allchap= $db->query('SELECT id,titre,SUBSTR(textchap, 1, 250)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  '); 
		return $allchap;
	}

	public function showAllChap(){
		$db=$this->dbConnect();
		$allchapters= $db->query('SELECT id,titre FROM chapitres ORDER BY DESC date_edition ');
		return $allchapters;
	}

	//Add a new chapter
	public function postChapter($titleChap,$textChap){
		$db=$this->dbConnect();
		$newChap=$db->prepare('INSERT INTO chapitres ( id_pseudoAuteur,titre,textchap, date_edition) VALUES(:id_pseudoAuteur,:titre,:textchap, NOW() )' );
		$newChap->execute(array(
			'id_pseudoAuteur'=>$_SESSION['id'],
			'titre'=>$titleChap,
			'textchap'=>$textChap
			
		));
		$newChap=$db->query('SELECT chapitres.id_pseudoAuteur, membres.pseudo FROM chapitres LEFT JOIN membres ON chapitres.id_pseudoAuteur=membres.id');
		header("Location:index.php?action=admin");
	}

	//This Update a chapter
	public function reditChapter($idEdit,$titleEdit,$textEdit){
		$bdd=$this->dbConnect();
		$editChap=$db->prepare('UPDATE chapitres SET titre=:titre, textchap=:textchap WHERE id=:id');
		$editChap->execute(array(
			'titre'=>$titleEdit,
			'textchap'=>$textEdit,
			'id'=>$idEdit
		));
		return $editChap;
	}

	//Delete a chapter
	public function eraseChapter($idChapter){
		$db=$this->dbConnect();
		$dltAChap=$db->prepare('DELETE FROM chapitres WHERE id=?');
		$eraseComms=$dltAChap->execute(array($idChapter));
		header("Location:./index.php?action=admin");
	}
}