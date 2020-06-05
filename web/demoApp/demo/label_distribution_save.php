<?php
/*
session_start();

// Authors: 	Zhan Liu
// Created: 	2020/05/15
// Last update:	2020/05/15
// Steps: 1) Save the label the database - table "LABEL"; 2) Create the qrcode and store to the folder; 3) Generate the PDF with article content and qrcode, store to the pdf folder

if($_SESSION["loggedIn"] != true)
{
    echo("Access denied!");
    header("location:index.php");
		exit();
}
*/

$_SESSION['article_id'] = 1;

require_once("config.php");
require_once("model/ConnectionManager.php");
require_once("model/Entity.php");
require_once("model/User.php");
require_once("model/Article.php");
require_once("model/Label.php");
require_once("model/Company.php");

require('fpdf/fpdf.php');


if (isset($_SESSION['article_id'])){
    $article_id = $_SESSION['article_id'];
    
    $article = Article::getArticleById($article_id);
    $code = $article->code;
    $title = $article->title;
    $summary = $article->summary;
    $content = $article->content;
    $user_id = $article->user_id;
    
    $user = User::getUserById($user_id);
    $user_name = $user->firstname . ' ' . $user->lastname;
    $company_id = $user->company_id;

    $company_code = Company::getCompanyCodebyId($company_id);

    $logo = 'qrcode/'. $company_code . '/' . $code . '.png';
}


// step 3: generate the PDF with article content and qrcode, store to the pdf folder
class PDF extends FPDF
{

// Page header
function Header()
{
    global $logo;
    global $title;
    // Logo
    $this->Image('images/logo_ln.jpg',45,4,100);
    $this->Image($logo,155,2,45);
    $this->Ln(40);
    // Arial bold 16
    $this->SetFont('Arial','B',16);
    // Title
    $this->MultiCell(0,7,utf8_decode($title),0,'C');

    // Line break
    $this->Ln(5);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

if (isset($_SESSION['article_id'])){
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    //Author
    $pdf->SetFont('Arial','I',12);
    $pdf->SetTextColor(128,128,128);
    $pdf->MultiCell(0,5, 'Par '.utf8_decode($user_name),0,'L');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode($summary),0,'L');
    $pdf->Ln(3);

    $pdf->SetFont('Arial','',12);

    $pdf->MultiCell(0,5,utf8_decode($content),0,'L');

    $filename="article_pdf/923571.pdf";
    $pdf->Output($filename,'F');
}

?>
