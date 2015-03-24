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
 background-image: -moz-repeating-radial-gradient(rgba(255,0,0,0.1), rgba(0,0,255,0.1)
40px, rgba(255,0,0,0.1) 80px);
}
body {
 font-family: sans-serif;
 font-size: 10pt;
}
h4 {
 font-variant: small-caps;
}
h5 {
 margin-bottom: 0;
 color: #110044;
}
p { margin-top: 0; }
dl {
 margin: 0;
}
div.text {
 padding:1em;
 margin: 1em 0;
 text-align:justify;
}
.code {
 font-family: mono;
 font-size: 9pt;
 background-color: #d5d5d5;
 margin: 1em 1cm;
 padding: 0 0.3cm;
}
</style>
<body>
<div style="position:fixed; top: 0; right: 0"><img src="tux.svg" width="110" /></div>
<h1></a>mPDF</h1>
<h2>Other new features in mPDF Version 5.1</h2>
<div class="rounded text">
<ul>
<li>Kerning</li>
<li>Letter- and word-spacing</li>
<li>Small-caps improved to work with justified text, and now with kerning, letter- and
word-spacing</li>
<li>Bleed area on @page media</li>
<li>Colorspace and colour conversion (almost everything except BMP images)</li>
<li>Spot colours</li>
<li>PDF/X files</li>
<li>dir="rtl"</li>
<li>numeric list-styles for arabic and indic</li>
</ul>
</div>
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