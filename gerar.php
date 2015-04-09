<?php
    
    include("mpdf60/mpdf.php");
    
    
    $mpdf = new mPDF('');
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

    </style>
    <body>
    <div style="width:54.61mm; height: 4.8mm; position: absolute; top: 0; left:30px;">
        <img src="image/cinza.jpg" alt="">
    </div>
    <div style="width:54.61mm; height: 4.8mm; position: absolute; top: 0; right:30px;">
        <img src="image/cores.jpg" alt="">
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
//    $mpdf->Output(); exit;
    //==============================================================
    //==============================================================
    //==============================================================
    //==============================================================
    
    $mpdf->Output('teste/teste_'.rand(0,99).'.pdf','F');
    exit;
    
?>