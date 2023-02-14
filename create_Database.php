<?php
//This program was originally used (before putting onto UCLA database) to create a database in which the proposal system would fill
require 'DB.php';
//Connect to the database
//Before you launch this file you must create a database called VERITAS_Proposal MANUALLY
$db = DB::connect('mysql://root:root@localhost/VERITAS_Proposal');
if (DB::isError($db)) {die ("Can't connect: " . $db->getMessage());}
//Set up automatic error handling

$db->setErrorHandling(PEAR_ERROR_DIE);

//This deletes the main TABLE Proposal. Only uncomment if you have a table
//$q = $db->query("DROP TABLE tblObserving_Proposals"); 
//This deletes the TABLE Proposal_seq which is automatically made
//Uncomment this only to reset the Proposal number
//$q = $db->query("DROP TABLE tblObserving_Proposals_seq");

//This creates the table you should be able to see it in the database
$q = $db->query("CREATE TABLE tblObserving_Proposals (
        proposal_id INT,
        cycle INT,
        working_group ENUM('Gamma', 'ASPEN', 'Blazar', 'Matter', 'Galactic', 'Engineer', 'Calibration', 'Other'),
        themes VARCHAR(255),
        multi_year BOOLEAN,
        title VARCHAR(255),
        abstract TEXT,
        PI_first VARCHAR(255),
        PI_last VARCHAR(255),
        PI_email VARCHAR(255),
        PI_institution VARCHAR(255),
        coPI VARCHAR(255),
        Fermi BOOLEAN,
        analyzer VARCHAR(255),
        mw BOOLEAN,
        mw_info VARCHAR(255),
        thesis BOOLEAN,
        thesis_info VARCHAR(255),
        opportunity BOOLEAN,
        trigger_cond VARCHAR(255),
        trigger_ratepyr VARCHAR(255),
        min_obshrsptrigger VARCHAR(255),
        source VARCHAR(255),
        RA_deg FLOAT(9,6),
        decl_deg FLOAT(9,6),
        RA VARCHAR(255),
        decl VARCHAR(255),
        min_elev SMALLINT,
        max_exposure SMALLINT,
        min_exposure SMALLINT,
        obs_mode VARCHAR(255),
        obs_mode_info VARCHAR(255),
        noTels SMALLINT,
        moonlight BOOLEAN, 
        weather ENUM('A', 'B', 'C', 'D'),
        begin_obs VARCHAR(255),
        end_obs VARCHAR(255),
        comments VARCHAR(255)
)");
?>
