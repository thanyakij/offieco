<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Payment Voucher -- Offieco</title>
    <link rel="stylesheet" type="text/css" media="all" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../css/style_custom.css"/>
	<?php	include ('../php/configuration.php');	?>
</head>
<body>
    <div class="printarea">
        <div class="o-logo"><a href="<?php echo $HOMEURL ?>"><img src="<?php echo $O_LOGOURL ?>"/></a></div>
        <div class="doctext">
        	<ul class="pagehead ului">
                <li class="o-tname"><?php if (isset($O_TNAME)) : echo $O_TNAME; 
				else : echo strtolower($unnamed) ;
				endif; ?></li>
                <?php if (isset($O_FNAME)) : echo '<li class="o-fname">'.$O_FNAME.'</li>' ; endif; ?>
                <?php if (isset($O_ADDRESS)) : echo '<li class="o-address">'.$O_ADDRESS.'</li>' ; endif; ?>
                <?php if (isset($O_TEL) ||isset($O_FAX) ||isset($O_TAXID) ||isset($O_MAIL) ||isset($O_WEB)) : echo '<li class="o-address">' ; endif; ?>
					<?php if (isset($O_ADDRESS)) : echo '<span class="o-tel">'.$O_TEL.'</span>' ; endif; ?>
					<?php if (isset($O_ADDRESS)) : echo '<span class="o-fax">'.$O_FAX.'</span>' ; endif; ?>
					<?php if (isset($O_ADDRESS)) : echo '<span class="o-taxid">'.$O_TAXID.'</span>' ; endif; ?>
					<?php if (isset($O_ADDRESS)) : echo '<span class="o-mail">'.$O_MAIL.'</span>' ; endif; ?>
					<?php if (isset($O_ADDRESS)) : echo '<span class="o-web">'.$O_WEB.'</span>' ; endif; ?>
                <?php if (isset($O_TEL) ||isset($O_FAX) ||isset($O_TAXID) ||isset($O_MAIL) ||isset($O_WEB)) : echo '</li>' ; endif; ?>
			</ul>
            
            <h1 class="inlineblock">PAYMENT VOUCHER</h1>
            <span class="copytype floatright inlineblock">ORIGINAL</span>
			<div class="clearboth"></div>
            <ul class="bordertop ului">
                <li class="floatright"><span class="span1">NUMBER:</span><span class="span2 nomargin datafield">$PMV_SEQ</span></li>
            	<li><span class="span1">DATE:</span><span class="span4 nomargin datafield">$PMV_DATE</span></li>
                <li class="floatright"><span class="span1">CID:</span><span class="span2 nomargin datafield">$C_ID</span></li>
                <li><span class="span1">TO:</span><span class="span4 nomargin datafield">$C_NAME</span><br/>
                <span class="span1"></span><span class="span4 nomargin datafield">$C_ADDRESS1</span><br/>
                <span class="span1"></span><span class="span4 nomargin datafield">$C_ADDRESS2</span><br/><br/></li>
            </ul>
            <ul class="bordertop ului">
            	<li><span class="span8 nomargin">FOR:</span></li>
            	<li><ul class="forlist datafield"><?php
				/*$FORLINE = array(
					1 => $FORLINE_01, 2 => $FORLINE_02,
					3 => $FORLINE_03, 4 => $FORLINE_04,
					5 => $FORLINE_05, 6 => $FORLINE_06,
					7 => $FORLINE_07, 8 => $FORLINE_08,
					9 => $FORLINE_09, 10 => $FORLINE_10,
					11 => $FORLINE_11
					);
				$FORAMOU = array(
					1 => $FORAMOU_01, 2 => $FORAMOU_02,
					3 => $FORAMOU_03, 4 => $FORAMOU_04,
					5 => $FORAMOU_05, 6 => $FORAMOU_06,
					7 => $FORAMOU_07, 8 => $FORAMOU_08,
					9 => $FORAMOU_09, 10 => $FORAMOU_10,
					11 => $FORAMOU_11
					);*/
					$FORLINE[1] = 'Food at MONPOCHANA';
					$FORAMOU[1] = 1130.59;
				for ($i = 1; $i <= 15; $i++) {
					if(isset($FORLINE[$i])) : ?>
                	<li class="floatleft"><span class="span4"><?php  echo $FORLINE[$i]; ?></span></li>
                    <li class="floatright listnone inlineblock"><span class="span2 al-right"><?php  echo number_format($FORAMOU[$i],2); ?></span><span class="span1 nomargin">THB</span></li>
				<?php
					else : echo '<li class="listnone clearboth">&nbsp;</li>';
					endif;
				}
				?>
                </ul></li>
            </ul>
            <ul class="bordertop borderbottom ului">
			<?php 
				$TOTALAMOUNT = 0;
				for ($i = 1; $i <= 15; $i++) {
					if(isset($FORAMOU[$i])) :  $TOTALAMOUNT = $TOTALAMOUNT + $FORAMOU[$i];
					endif;
					
				}
				?>
                <?php
					require('../php/numtoword.php');
					$TOTALTEXT = new toWords($TOTALAMOUNT, 'baht', 'satang');
				?>
            	<li class="floatleft"><span class="span1 floatleft">TOTAL:</span><span class="span4 nomargin datafield"><?php //echo $TOTALTEXT->words; ?></span></li>
                <li class="floatright listnone inlineblock"><span class="span2 al-right datafield"><?php 	echo number_format($TOTALAMOUNT,2);  ?></span><span class="span1 nomargin datafield">THB</span></li>
            <div class="clearboth"></div>
            </ul>
            <ul class="borderbottom ului">
            	<li class="listnone clearboth">&nbsp;</li>
            	<li><span class="span1 floatleft">METHOD:</span><span class="span6 nomargin datafield">$PAYMETHD</span></li>
            </ul>
            <ul class="ului">
            	<li class="listnone clearboth">&nbsp;</li>
            	<li class="listnone clearboth">&nbsp;</li>
            	<li class="listnone clearboth">&nbsp;</li>
            	<li><span class="span3 floatleft clearboth">PAID BY:</span></li>
            	<li><span class="span3 floatleft clearboth borderbottom-dotted"><br/><br/></span></li>
            	<li><span class="span3 floatleft clearboth">(Aquapatindra Vanijvarmindra)</span></li>
            </ul>
        </div>
        <div class="clearboth"></div>
    </div>
    <div style="page-break-after:always"></div>
</body>
</html>