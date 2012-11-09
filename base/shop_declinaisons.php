<?php
/**
 * Plugin Déclinaisons Produit
 * (c) 2012 Rainer Müller
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 */
function shop_declinaisons_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['declinaison'] = 'declinaison';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 */
function shop_declinaisons_declarer_tables_objets_sql($tables) {

	$tables['spip_declinaisons'] = array(
		'type' => 'id',
		'principale' => "oui",
		'field'=> array(
			"id"                 => "bigint(21) NOT NULL",
			"titre"              => "varchar(250) not null default """,
			"descriptif"         => "text NOT NULL",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id",
			"KEY statut"         => "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('titre', 'descriptif'),
		'champs_versionnes' => array('titre', 'descriptif'),
		'rechercher_champs' => array(),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'id:texte_changer_statut_id', 
		

	);

	return $tables;
}



?>