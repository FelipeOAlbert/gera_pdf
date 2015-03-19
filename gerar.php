<?php
    
    require_once('fpdf/fpdf.php');
    require_once('fpdi/fpdi.php');
    require_once('fpdi/fpdf_tpl.php');
    
//    $pdf = new FPDF('P','mm','A4');
////    $pdf->AliasNbPages();
//    
//    
//    $pdf->AddPage();
//    
//    //set colour to grey
//    $pdf->SetDrawColor(192,192,192);
// 
//    //vertical crop marks
//    $pdf->Line(15,10,15,290);
//    $pdf->Line(190,10,190,290);
//    
//    //horizontal crop marks
//    $pdf->Line(10,15,195,15);
//    $pdf->Line(10,285,195,285);
//    
////    $pdf->Image('image/produto.jpg',10,10,-300);
//    
//    // palavras com acentuacao
////    $reportSubtitle = stripslashes('Descrição!');
////    $reportSubtitle = iconv('UTF-8', 'windows-1252', $reportSubtitle);
//    
////    $pdf->SetFont('Arial','B',16);
////    $pdf->Cell(150,150, $reportSubtitle);
////    $pdf->Cell(150,150, 'R$ 5,00');
//    $pdf->Output();
    
    
    $bleedInMM = 3; // the bleed in mm on each side
    $pdfWidthInMM = $this->getPdfWidthInMM();
    $pdfHeightInMM = $this->getPdfHeightInMM();

    //width and height of new pdf. the value of $bleedInMM is doubled to have the bleed on both sides of the page
    $newWidth = ($pdfWidthInMM + ($bleedInMM * 2)); 
    $newHeight = ($pdfWidthInMM + ($bleedInMM * 2));

    $pdf = new \fpdi\FPDI(
            $pdfWidthInMM > $pdfWidthInMM ? 'L' : 'P', // landscape or portrait?
            'mm',
            array(
                $newWidth, 
                $newHeight
            ));

    if (file_exists($srcPdfFilePath)){ 
         $pagecount = $pdf->setSourceFile($srcPdfFilePath); 
    } else { 
        error_log("Error! file: ".$srcPdfFilePath." does not exist");
        return FALSE; 
    } 

    // make the crop line a little shorter so they don't touch each other
    $cropLineLength = $bleedInMM - 1;

     for($i=1; $i <= $pagecount; $i++) { 
         $tpl = $pdf->importPage($i); 
         $pdf->addPage(); 
         $size = $pdf->getTemplateSize($tpl);

         $pdf->useTemplate($tpl, $bleedInMM, $bleedInMM, 0, 0, TRUE); 

         $pdf->SetLineWidth(0.25);

         // top left crop marks
         $pdf->Line($bleedInMM /* x */, 0 /* y */, $bleedInMM /* x */, $cropLineLength /* y */); // horizontal top left
         $pdf->Line(0 /* x */, $bleedInMM /* y */, $cropLineLength /* x */, $bleedInMM /* y */); // vertical top left

         // top right crop marks
         $pdf->Line($newWidth - $bleedInMM /* x */, 0 /* y */, $newWidth - $bleedInMM /* x */, $cropLineLength /* y */); // horizontal top right
         $pdf->Line($newWidth - $cropLineLength /* x */, $bleedInMM /* y */, $newWidth /* x */, $bleedInMM /* y */); // vertical top right

         // bottom left crop marks
         $pdf->Line(0 /* x */, $newHeight - $bleedInMM /* y */, $cropLineLength /* x */, $newHeight - $bleedInMM /* y */); // horizontal bottom left
         $pdf->Line($bleedInMM /* x */, $newHeight - $cropLineLength /* y */, $bleedInMM /* x */, $newHeight /* y */); // vertical bottom left

         // bottom right crop marks
         $pdf->Line($newWidth - $cropLineLength /* x */, $newHeight - $bleedInMM /* y */, $newWidth /* x */, $newHeight - $bleedInMM /* y */); // horizontal top right
         $pdf->Line($newWidth - $bleedInMM /* x */, $newHeight - $cropLineLength /* y */, $newWidth - $bleedInMM /* x */, $newHeight /* y */); // vertical top right
     }

     return $pdf->Output($destinationPdfFilePath,'F');
    
    
    
?>