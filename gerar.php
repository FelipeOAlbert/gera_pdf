<?php
    
    include("mpdf60/mpdf.php");
    
//    $html = '<!DOCTYPE html>
//<html>
//    <head>
//        <title>Tabloide</title>
//        <meta charset="UTF-8">
//        <meta name="viewport" content="width=device-width, initial-scale=1.0">
//    </head>
//    <body>
//        <div>
//            
//            <img src="image/produto_rgb.jpg" width="100" />
//            
//            <br />
//            <br />
//            <label>Descrição do produto a ser encartado</label>
//            <br />
//            <br />
//            <label>Preço do produto: R$99,99</label>
//            
//        </div>
//    </body>
//</html>
//';
//    $mpdf=new mPDF(); 
//    
//    $mpdf->SetDisplayMode('fullpage');
//    
//    $mpdf->PDFX = true;
//    
//    $mpdf->SetDrawColor(15,82,0,10);
//    
//    
//    $mpdf->PDFXauto=true;
//    
//    
////    $mpdf->WriteHTML($html);
//    
//    $mpdf->Output();
//    
//    exit;
    
    
$mpdf=new mPDF('');
$mpdf->useKerning=true;
$mpdf->restrictColorSpace=3; // forces everything to convert to CMYK colors

$mpdf->bleedMargin = 2;
$mpdf->crossMarkMargin = 2;		// Distance of cross mark from margin in mm -- marca que fica no meio
$mpdf->cropMarkMargin = 1;		// Distance of crop mark from margin in mm -- lateral
$mpdf->cropMarkLength = 6;		// Default length in mm of crop line
$mpdf->nonPrintMargin = 0;		// Non-printable border at edge of paper sheet in mm


$mpdf->AddSpotColor('PANTONE 534 EC',85,65,47,9);
//==============================================================
$html = '
<style>
@page {
 size: 200mm 285mm;
 margin: 10%; /* % of page-box width for LR, height for TB */
 margin-header: 8mm;
 margin-footer: 8mm;
 margin-left: 1cm;
 margin-right: 1cm;
 marks: cross crop;
 background-image: -moz-repeating-radial-gradient(rgba(255,0,0,0.1), rgba(0,0,255,0.1) 40px, rgba(255,0,0,0.1) 80px);
}
body { position: relative; }
.cmyk div{ float: left; display: block; }

</style>
<body>
<div class="cmyk" style="width:0.55cm; height: 0.05cm; position: absolute; top: 0; left:110px; border: 1px solid #595959;">
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(75%, 68%, 67%, 90%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(73%, 67%, 65%, 78%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(69%, 63%, 62%, 58%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(65%, 58%, 57%, 37%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(60%, 51%, 51%, 20%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(52%, 43%, 43%, 8%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(43%, 35%, 35%, 1%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(31%, 25%, 25%, 0%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(19%, 15%, 16%, 0%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(9%, 6%, 7%, 0%);">&nbsp;</div>
    <div style="width:0.47cm;height:0.52cm;background-color: cmyk(0%, 0%, 0%, 0%);">&nbsp;</div>
    <div style="clear:both;"></div>
</div>
        <div>
            
            <img src="image/produto_rgb.jpg" width="100" />
            
            <br />
            <br />
            <label>Descrição do produto a ser encartado</label>
            <br />
            <br />
            <label>Preço do produto: R$99,99</label>
            
        </div>
        <div style="background-color: cmyk(1,0,0,0);">
            C
        </div>
        <div style="background-color: cmyk(0,1,0,0);">
            M
        </div>
        <div style="background-color: cmyk(0,0,2,0);">
            Y
        </div>
        <div style="background-color: cmyk(0,0,0,1);">
            K
        </div>
    </body>
';

//==============================================================
$mpdf->WriteHTML($html);
//==============================================================//==============================================================
// OUTPUT
$mpdf->Output(); exit;
//==============================================================
//==============================================================
//==============================================================
//==============================================================
    
?>