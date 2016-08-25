<?php
  // Create a database connection
  $connection = mysqli_connect('localhost', 'root', '', 'sheffield');
  // Test if connection occurred
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>

<?php

	// Declare form variables
	$name = '';
	$faculty = 0;
	$department = 0;
	$username = '';
	$email = '';
	$phone = '';
	$roles = 0;
	$comments = '';
	
	// Read form values in $_POST
	$name = $_POST['aboutName'];
	if ($_POST['aboutFaculty'] != '') {$faculty = $_POST['aboutFaculty'];} 
	if ($_POST['aboutDepartment'] != '') {$department = $_POST['aboutDepartment'];}
	$username = $_POST['aboutUsername'];
	$email = $_POST['aboutEmail'];
	$phone = $_POST['aboutPhone'];
	if (!empty($_POST['roles'])) $roles = implode("| ",$_POST['roles']);
	$comments = $_POST['further'];


	// Write form values into database 
	$query  = "INSERT INTO myteamrequests (";
	$query .= "  name, faculty, department, username, email, phone, roles, comments";
	$query .= ") VALUES (";
	$query .= "  '{$name}', {$faculty}, {$department}, '{$username}', '{$email}', '{$phone}', '{$roles}', '{$comments}' ";
	$query .= ")";

	$result = mysqli_query($connection, $query);

	if ($result) {
		// Success
	} else {
		// Failure
		die("Database query failed. " . mysqli_error($connection));
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Thank You. Your access request has been submitted - University of Sheffield<strong></strong></title>
    <meta name="robots" content="noindex" />
    <link rel="shortcut icon" href="img/sheffield/favicon.ico" />
    <link rel="stylesheet" href="css/sheffield/general.css?v=2014-01-24" />
    <link rel="stylesheet" href="css/sheffield/7.19964.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
    <style type="text/css">
        @import url(css/main.css);
    </style>
</head>
<body class=" p-4933 f-1015">
<div id="topHeader">
    <nav>
        <!-- global navigation links -->
        <ul>
            <li><a href="http://www.shef.ac.uk" accesskey="1">Home</a></li>
            <li class="hide"><a href="http://www.shef.ac.uk/accessibility/" accesskey="0">Accessibility information</a></li>
			<li>&nbsp;</li>
			<li><a href="https://www.shef.ac.uk/nap/panel/login" accesskey="m" id="nap">Log in to MUSE</a></li>
        </ul>
        <!-- // global navigation links -->
    </nav>
<!-- site search -->
<div id="siteSearch">
    <form name="gs" method="get" action="//google.shef.ac.uk/search" id="siteSearchBox">
        <label class="hide" for="siteSearchTerms">Search our site</label>
        <input type="text" name="q" maxlength="100" placeholder="Search our site" id="siteSearchTerms">
        <button id="siteSearchBtn" class="icon-search" type="submit" value="Search" name="btnG">Search</button>
        <input type="hidden" name="sort" value="date:D:L:d1">
        <input type="hidden" name="output" value="xml_no_dtd">
        <input type="hidden" name="ie" value="UTF-8">
        <input type="hidden" name="oe" value="UTF-8">
        <input type="hidden" name="client" value="default_frontend">
        <input type="hidden" name="proxystylesheet" value="default_frontend">
        <input type="hidden" name="site" value="default_collection">
    </form>
</div>
<!-- // site search -->
</div><!-- header -->
<header>
    <table>
        <tr>
            <td id="headerLeft">
                <div id="headerCrest">
                    <a href="http://www.shef.ac.uk/" title="The University of Sheffield homepage" accesskey="1"><img src="img/sheffield/crest-l.gif" alt="The University of Sheffield" /></a>
                </div>
            </td>
            <td id="headerRight">
                <div id="headerTitle">
                    <span id="pageTitle">Human Resources</span>
                </div>
            </td>
        </tr>
    </table>
</header>
<!-- // header -->
<!-- subglobal navigation -->
<nav id="subGlobalNavigation">
    <ul>
        <li>
            <a href="http://www.shef.ac.uk/study" class="studyLink" accesskey="3">Study at Sheffield</a>
        </li>
        <li>
            <a href="http://www.shef.ac.uk/students" class="currentStudentsLink" accesskey="4">For Current Students</a>
        </li>
        <li>
            <a href="http://www.shef.ac.uk/staff" class="staffLink" accesskey="5">For Staff</a>
        </li>
        <li>
            <a href="http://www.shef.ac.uk/research" class="researchLink" accesskey="6">Our Research</a>
        </li>
        <li id="currentSection">
            <a href="/departments" class="departmentsLink" accesskey="7">Departments &amp; Services</a>
        </li>
        <li>
            <a href="/links" class="usefulLinksLink" accesskey="8">Useful Links</a>
        </li>
        <li>
            <a href="/news-events" class="newsLink" accesskey="9">News &amp; Events</a>
        </li>
    </ul>
</nav><!-- // subglobal navigation -->
<!-- breadcrumbs -->
<nav id="breadcrumbs"> You are here:
    <ol>
        <li><a href="http://www.shef.ac.uk/">Home</a> / </li>
        <li><a href="http://www.shef.ac.uk/hr">Human Resources</a> / </li>
        <li>myTeam and e-Recruitment Recruiter Access and Training</li>
    </ol>
</nav>
<!-- // breadcrumbs -->
<!-- local navigation -->
<nav id="localNavigation">





<ul>
    <li id="currentPage"><a href="index.php">Home</a></li>
    <li><a href="contact.php">Help</a></li>
</ul>


</nav>
<!-- // local navigation -->


<!-- right hand links -->

<aside id="rightHandLinks">
        <div class="quickLinks seeAlso">
            <div><strong>See also</strong></div>
            <ul>
                <li><a target="_blank" href="http://www.shef.ac.uk/finance/staff-information/financial_systems">myPurchase and uBASE Guidance</a></li>
            </ul>
        </div>
    </aside>
<!-- // right hand links -->


<section id="content" class="three-col">    <div id="inner">
        <!-- WYSIWYG content -->
        <div id="appContainer">
            <h2>Thank You</h2><br />
<?php  
/* TRANSLATE FACULTY AND DEPARTMENT VALUES INTO HUMAN LANGUAGE */
$faculties = array(1 => "Engineering", 2 => "Social Sciences", 3 => "Professional Services", 4 => "Medicine, Dentistry and Health", 5 => "Science", 6 => "Arts and Humanities", 7 => "AMRC");
$departments = array(51 => "Accommodation & Commercial Services", 86 => "AMRC Composites Centre", 87 => "AMRC with Boeing", 31 => "Animal & Plant Sciences", 1 => "Archaeology", 38 => "Architecture", 13 => "Automatic Control & Systems Engineering", 32 => "Biomedical Science", 14 => "Chemical & Biological Engineering", 33 => "Chemistry", 15 => "Civil & Structural Engineering", 21 => "Clinical Dentistry", 16 => "Computer Science", 52 => "Corporate Communications", 57 => "Corporate Information & Computing Services", 96 => "Department for Lifelong Learning", 53 => "Development, Alumni Relations & Events", 40 => "Economics", 17 => "Electronic & Electrical Engineering", 97 => "Energy 2050", 54 => "Estates & Facilities Management", 90 => "Faculty Office - Arts and Humanities", 83 => "Faculty Office - Engineering", 85 => "Faculty Office - Medicine, Dentistry & Health", 84 => "Faculty Office - Science", 55 => "Finance and Commercial", 7 => "French", 41 => "Geography", 8 => "Germanic Studies", 9 => "Hispanic Studies", 3 => "History", 22 => "Human Communication Sciences", 56 => "Human Resources", 24 => "Infection, Immunity & Cardiovascular Disease", 42 => "Information School", 94 => "Interdisciplinary Centre of the Social Sciences (ICOSS)", 95 => "Interdisciplinary Programs Office (IPO)", 43 => "Journalism Studies", 44 => "Landscape", 45 => "Law", 58 => "Library", 46 => "Management School", 18 => "Materials Science & Engineering", 19 => "Mechanical Engineering", 25 => "Medical School", 65 => "Modern Languages Teaching Centre", 35 => "Molecular Biology & Biotechnology", 100 => "Multidisciplinary Engineering Education", 4 => "Music", 26 => "Neuroscience", 89 => "Nuclear AMRC", 27 => "Nursing & Midwifery", 28 => "Oncology & Metabolism", 5 => "Philosophy", 36 => "Physics & Astronomy", 47 => "Politics", 37 => "Psychology", 61 => "Research & Innovation Services", 93 => "Research Exchange for the Social Sciences (RESS)", 11 => "Russian & Slavonic Studies", 29 => "ScHARR", 39 => "School of East Asian Studies", 49 => "School of Education", 12 => "School of English", 6 => "School of Languages & Cultures", 34 => "School of Mathematics & Statistics", 30 => "Sheffield Institute for Studies on Ageing", 92 => "Sheffield Methods Institute (SMI)", 48 => "Sociological Studies", 59 => "Strategy, Planning & Governance", 62 => "Student Services", 66 => "Student Services - Academic & Learning Services", 67 => "Student Services - Admissions", 68 => "Student Services - Careers Service", 69 => "Student Services - Chaplaincy Service", 70 => "Student Services - Counselling Service", 71 => "Student Services - Disability & Dyslexia Support Service", 72 => "Student Services - English Language Teaching Centre", 73 => "Student Services - International Office", 74 => "Student Services - Learning and Teaching Services", 75 => "Student Services - Outreach & Access", 76 => "Student Services - Projects & Development", 77 => "Student Services - Recruitment Support", 78 => "Student Services - Registry Services", 99 => "Student Services - Student Health and Wellbeing", 79 => "Student Services - Student Support & Guidance", 80 => "Student Services - Taught Programmes Office", 81 => "Student Services - University Health Service", 82 => "Student Services - University of Sheffield Enterprise", 98 => "The Diamond", 50 => "Urban Studies and Planning", 60 => "Vice Chancellor's Office");
$rolesAll = array (16 => "Casual Worker Registration Checker", 1 => "myTeam", 2 => "myTeam(Admin)", 4 => "myTeam(HR)");

if ($faculty != 0) {$aboutFaculty = $faculties[$_POST['aboutFaculty']];} else $aboutFaculty = '';
if ($department != 0) {$aboutDepartment = $departments[$_POST['aboutDepartment']];}  else $aboutDepartment = '';
if (!empty($_POST['roles'])) $rolesSelected = $_POST['roles'];

/* OUTPUT ALL VALUES, AS A MEANS OF CONFIRMATION */
echo 'We received your access request on ' . gmdate("Y/m/j H:i:s", time() + 3600*(date("I"))) . '.<br><br>';; 
echo ('Here is what was submitted:<br><table><tr><td>Name: </td><td>' . $_POST['aboutName'] . '</td></tr><br>');
echo ('<tr><td>Faculty:</td><td>' . $aboutFaculty . '<br>');
echo ('<tr><td>Department:</td><td>'. $aboutDepartment . '<br>');
echo ('<tr><td>Username:</td><td>'.  $_POST['aboutUsername'] . '<br>');
echo ('<tr><td>Email:</td><td>'. $_POST['aboutEmail'] . '<br>');
echo ('<tr><td>Phone:</td><td>'. $_POST['aboutPhone'] . '<br>');
echo ('<tr><td>Roles:</td><td>');
if (!empty($_POST['roles'])) 
{
	foreach($rolesSelected as $key => $value){
	echo $rolesAll[$value] . '<br>';
	}
}
	echo ('<tr><td>Comments:</td><td>' . $_POST['further'] . '</tr></table>');

?>


	</div>
</section><div id="footer">
	<div id="footerLeft">
	<ul>
		<li><a href="http://www.shef.ac.uk/">Home</a> |&#160;</li>
		<li><a href="http://www.shef.ac.uk/contact/comments" accesskey="f">Feedback</a> |&#160;</li>
		<li><a href="http://www.shef.ac.uk/privacy">Privacy</a> |&#160;</li>
		<li><a href="http://www.shef.ac.uk/foi"><abbr title="Freedom of Information">FOI</abbr></a> |&#160;</li>
		<li><a href="http://www.shef.ac.uk/accessibility">Accessibility</a> |&#160;</li>
		<li><a href="http://www.shef.ac.uk/contact/social-media">Social networks</a></li>
		<li><a href="https://www.facebook.com/theuniversityofsheffield" class="facebook"><span class="hide">Like The University of Sheffield on Facebook</span></a></li>
		<li><a href="http://twitter.com/sheffielduni" class="twitter"><span class="hide">Follow The University of Sheffield on Twitter</span></a></li>
		<li><a href="http://www.youtube.com/user/uniofsheffield" class="youtube"><span class="hide">Watch The University of Sheffield's videos on YouTube</span></a></li>
	</ul>
</div>
<div id="footerRight">&#169; 2016 The University of Sheffield</div>
</div>

</body>
</html>

<?php
// Send form values by email to administrator
$msg = "Submitted at: " . gmdate("Y/m/j H:i:s", time() + 3600*(date("I"))) . "\n" . "Name: " . $_POST['aboutName'] . "\n";
$msg = $msg . "Faculty: " . $aboutFaculty . "\n";
$msg = $msg . "Department: ".  $aboutDepartment . "\n";
$msg = $msg . "Username: ".  $_POST['aboutUsername'] . "\n" .
"Email: ". $_POST['aboutEmail'] . "\n" .
"Phone: ". $_POST['aboutPhone'] . "\n";
$msg = $msg . "Roles: \n";
if (!empty($_POST['roles'])) 
{
	foreach($rolesSelected as $key => $value){
	$msg = $msg . $rolesAll[$value] . "\n";
	}
}
$msg = $msg . "Comments: "  . $_POST['further'];

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("marianne@mariannekay.com","Notification: myTeam and e-Recruitment Role access request",$msg);

// Close database connection
mysqli_close($connection);
?>