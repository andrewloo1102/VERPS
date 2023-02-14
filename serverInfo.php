<?php
require_once 'DB.php';

define("CUR_CYCLE", 6);
//Connect to the database - MAMP
//Before you launch this file you must create a database called VERITAS_Proposal
//$db = DB::connect('mysql://root:root@localhost/VERITAS_Proposal');
//// - USCS
$db = DB::connect('');
if (DB::isError($db)) {die ("Can't connect: " . $db->getMessage());}
//Set up automatic error handling

$db->setErrorHandling(PEAR_ERROR_DIE);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

//prevent _ and % from being misinterpretted as code
$ret_values1 = trim($_GET['id']);
$ret_values1 = strtr($ret_values1, array('_' => '\_', '%' => '\%'));
//echo gettype($ret_values1);

$ret_values2 = trim($_GET['last']);
$ret_values2 = strtr($ret_values2, array('_' => '\_', '%' => '\%'));
//echo gettype($ret_values2);

//gets data from specified id number and PI last name
$rows = $db->getAll("SELECT proposal_id, working_group, title, PI_first, PI_last, PI_email, PI_institution, Fermi, analyzer, mw, mw_info, thesis, thesis_info, abstract, themes, multi_year, opportunity, trigger_cond, trigger_ratepyr, min_obshrsptrigger, source, RA, decl, min_elev, max_exposure, min_exposure, obs_mode, obs_mode_info, noTels, moonlight, weather, begin_obs, end_obs, comments FROM tblObserving_Proposals WHERE proposal_id = '". $ret_values1 ."' AND PI_last = '". $ret_values2."' AND cycle = '". CUR_CYCLE ."'");

//prints a string with all the information; // separates each form element (for each source) and || separates between forms (separates the sources)
foreach ($rows as $row) {

    print "$row[proposal_id]//";
    print "$row[working_group]//";
    print "$row[title]//";
    print "$row[PI_first]//";
    print "$row[PI_last]//";
    print "$row[PI_email]//";
    print "$row[PI_institution]//";
    print "$row[Fermi]//";
    print "$row[analyzer]//";
    print "$row[mw]//";

    if ($row['mw_info'])
    {
        print "$row[mw_info]//";
    }
    else
    {
        print "NULL//";
    }
    print "$row[thesis]//";
    if ($row['thesis_info'])
    {
        print "$row[thesis_info]//";
    }
    else
    {
        print "NULL//";
    }
    print "$row[abstract]//";
    print "$row[themes]//";
    print "$row[multi_year]//";
	print "$row[opportunity]//";
    if ($row['opportunity'])
    {
        print "$row[trigger_cond]//";
        print "$row[trigger_ratepyr]//";
        print "$row[min_obshrsptrigger]//";
    }
    else
    {
        print "NULL//";
        print "NULL//";
        print "NULL//";
    }
    //print "STUFF HERE"^i

    print "$row[source]//";
    print "$row[RA]//";
    print "$row[decl]//";
    print "$row[min_elev]//";
    print "$row[max_exposure]//";
    print "$row[min_exposure]//";
    print "$row[obs_mode]//";
    print "$row[obs_mode_info]//";
    print "$row[noTels]//";
    print "$row[moonlight]//";
    print "$row[weather]//";
    print "$row[begin_obs]//";
    print "$row[end_obs]//";
    print "$row[comments]";
    print "||";

}

?>
