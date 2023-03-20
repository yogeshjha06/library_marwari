<!DOCTYPE html>
<html>
<head>
    <title>Resume - Print</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
</body>
</html>

<?php
include('db.php');//path to db.php
   ///session variable//////////////////////////////////////////////////////
   $name=$_SESSION['name'];
   $username=$_SESSION['uname'];
   $email=$_SESSION['email'];  
   //find email and name
   $sqlx="SELECT * FROM student_details WHERE username = '$username'";
   $queryx=mysqli_query($con,$sqlx);//query fire
   $rs1x = mysqli_fetch_array($queryx);
     $id_student=$rs1x['id'];//id of student
     $class_roll=$rs1x['class_roll'];//class roll of student
     $reg_id = $rs1x["reg_id"];//employee id
     $exam_id = $rs1x["eaxm_id"];//exam id
     $department = $rs1x["department"];//department
     $about = $rs1x["about"];//about
     $address=$rs1x['address'];//address
     $phone=$rs1x['phone'];//phone
     $linkedin=$rs1x['linkedin'];//linkedin

     if($department=='MCA'||$department=='BCA'||$department=='BSc-IT')
     $skill="Proficient in Java, Python, C and C++, with experience.
Web development: Strong understanding of HTML, CSS, and PHP.
Database management: Skilled in working with SQL databases such as MySQL.
Operating systems: Experience with Linux-based systems, including shell scripting and system administration.
Agile development: Knowledge of Agile methodologies, including Scrum and Kanban, with experience in project 
management tools such as Jira.";
elseif($department=='MBA'||$department=='M.COM'||$department=='MSC')
$skill="Strategic thinking: Ability to analyze complex business problems, develop innovative solutions, and create effective strategies to drive growth and profitability.
Financial analysis: Proficient in financial modeling and analysis, with experience in financial statement analysis, budgeting, and forecasting.
Marketing: Familiarity with marketing principles and tactics, including market research, segmentation, targeting, and positioning, with experience in developing marketing plans and campaigns.
Leadership: Experience in managing teams, providing direction, coaching and mentoring employees, and developing a positive work culture.
Data analysis: Skilled in using Excel, R, and other tools to analyze data and derive insights to inform business decisions.
Project management: Knowledge of project management methodologies, including agile and waterfall, with experience in managing projects from planning to execution and monitoring.
Communication: Strong verbal and written communication skills, with experience in presenting complex information to different audiences and creating compelling business reports and presentations.
Entrepreneurship: Experience in launching and growing new ventures, with familiarity with startup financing, business planning, and market validation.";
else
$skill="Communication: Strong written and verbal communication skills, including the ability to articulate ideas, actively listen, and collaborate effectively with team members and stakeholders.
Problem-solving: Ability to analyze complex problems, identify root causes, and develop creative solutions to address them.
Time management: Strong organizational and time-management skills, including the ability to prioritize tasks, meet deadlines, and manage competing demands.
Attention to detail: Keen eye for detail, with a commitment to producing high-quality work and delivering error-free results.
Adaptability: Ability to adapt to changing circumstances, learn new skills, and work effectively in fast-paced and dynamic environments.
Leadership: Experience in leading and managing teams, providing direction, coaching and mentoring employees, and building strong relationships.
Critical thinking: Ability to think critically and objectively, and to challenge assumptions and conventional thinking to arrive at optimal solutions.
Technical proficiency: Proficient in using a range of software and tools, including Microsoft Office Suite, project management software, and other industry-specific tools.";
if($about=='')
$about="As a motivated and results-driven professional, I am passionate about achieving success and making a positive impact in the workplace. With hand on experience, I have developed a diverse skill set and a track record of delivering high-quality results.
Throughout my career, I have demonstrated a strong work ethic, a commitment to excellence, and an ability to work effectively both independently and as part of a team. ";

    ob_start();
    //require ('fpdf/fpdf.php');//path to fpdf.php
    require ('fpdf/fit.php');//path to fpdf.php
    $pdf = new FPDF_CellFit();
    $pdf->AddPage();
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(176, 5, $name, 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(176, 5, $phone, 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(176, 5, $email, 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(176, 5, $address, 0, 0, 'L');
    $pdf->Line(5,30, 210-5, 30);
    $pdf->Ln(10);
    $pdf->SetFont('Times', 'I', 10);
    $pdf->MultiCell(170,5, 'Objective: To secure a challenging and rewarding position that utilizes my skills and experience, while providing opportunities for growth and advancement.', '');
    $pdf->Line(5,30, 210-5, 30);
    $pdf->Ln();
    $pdf->SetFont('Times', 'I', 11);    
    $pdf->Cell(170,10,'ABOUT', 0, 0, 'B');
    $pdf->Ln();
    $pdf->MultiCell(176,5, $about,"L");

    $pdf->Ln(10);
    $pdf->SetFont('Times', 'I', 11);    
    $pdf->Cell(170,10,'EDUATION', 0, 0, 'B');
    $pdf->Ln();
    $pdf->MultiCell(176,5, $department.' From MARWARI COLLEGE RANCHI JHARKHAND',"L");

    $pdf->Ln(10);
    $pdf->SetFont('Times', 'I', 11); 
    //$pdf1 = new FPDF_CellFit();
    $pdf->MultiCell(176,5,'SKILLS');
    $pdf->Ln();    
    $pdf->MultiCell(176,5, $skill,"L");

    $pdf->Ln(10);
    $pdf->SetFont('Times', 'I', 11);    
    $pdf->Cell(176,10,'References: Available upon request.', 0, 0, 'L');

    $pdf->Ln(90);
    $pdf->SetFont('Times', 'I', 8);    
    $pdf->Cell(176,10,'Powered By Yogesh Jha', 0, 0, 'C');

    $pdf->Output();
    ob_end_flush();
?>

