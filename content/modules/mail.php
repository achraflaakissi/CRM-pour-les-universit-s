<?php
$html='<html><head></head><body style="background-color: #dadada;">
        <table border="0" cellspacing="0" cellpadding="0" align="center">
            <tr><td height="15" colspan="3" bgcolor="'.$bg_ml.'"></td></tr>
            <tr><td height="10" colspan="3" bgcolor="#FFFFFF"></td></tr>
            <tr>
                <td width="40" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="30" align="left" valign="top" bgcolor="#FFFFFF">
                    <p style="color: '.$bg_ml.';font-size:20px; font-family: Arial,   Helvetica, sans-serif;"><strong>'.$title_ml.'</strong></p>
                    <p>
                        <table cellpadding="0" cellspacing="0" width="100%" border="0" style="font-size:12px; font-family: Arial">
                            <tr>
                                <td style="width:80px; vertical-align:top" width="80">
                                    <img src="http://'.$_SERVER['SERVER_ADDR'].'/pointage/photos/'.$mat_ml.'.jpg" height="95" width="68" style="width: 68px; height:95px" />
                                </td>
                                <td style="vertical-align:top; valign="top">
                                    <p style="margin: 0px 0px 6px;">'.$cvt_ml . ' ' . $pnom_ml . ' ' . $nom_ml.'</p>
                                    <p style="margin: 0px 0px 6px;"><b>Matricule&nbsp;:&nbsp;</b>'.$mat_ml.'</p>
                                    <p style="margin: 0px 0px 6px;"><b>Date demande&nbsp;:&nbsp;</b>'.$dtdmd_ml.'</p>
                                    <p style="margin: 0px 0px 6px;"><b>Type demande&nbsp;:&nbsp;</b>'.$dmd_ml.'</p>
                                    <p style="margin: 0px 0px 10px;">
                                        <b>Du&nbsp;:&nbsp;</b>'.$dtd_ml.'&nbsp;&nbsp;&nbsp;&nbsp;-
                                        &nbsp;&nbsp;&nbsp;&nbsp;<b>Au&nbsp;:&nbsp;</b>'.$dtf_ml.'<br />
                                    </p>
                                </td>
                            </tr>';
                            if($mtf_ml!='')
                            {
                                $html.='<tr >
                                            <td colspan = "2" >
                                                <p style = "margin: 0px; border-bottom:solid 1px #999999" ><b>Motif de la demande&nbsp;:</b ></p >
                                                <p style = "margin: 6px 0px 20px;width:100%; height:70px;" > '.$mtf_ml.'</p >
                                            </td >
                                        </tr >';
                            }
                            if($note_ml!='')
                            {
                                $html .= '<tr>
                                            <td colspan="2">
                                                <p style="margin: 0px;border-bottom:solid 1px #999999"><b>Note RH&nbsp;:</b></p>
                                                <p style="margin: 6px 0px 20px;width:100%; height:70px; ">' . $note_ml . '</p>
                                            </td>
                                        </tr>';
                            }
                            if($mtfrh_ml!='')
                            {
                                $html .= '<tr>
                                            <td colspan="2">
                                                <p style="margin: 0px;border-bottom:solid 1px #999999"><b>Motif refus RH&nbsp;:</b></p>
                                                <p style="margin: 6px 0px 0px;width:100%; height:70px;">' . $mtfrh_ml . '</p>
                                            </td>
                                        </tr>';
                            }
                     $html.='</table>
                    </p>
                </td>
                <td width="40" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td width="40" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="60" align="left" valign="top" style="text-align:center;  font: bold 1em/1.5em sans-serif;  color: white; background: #f57900; ">
                    <a href="http://'.$_SERVER['SERVER_ADDR'].'/pointage/?page=projet&action=demandes" style="text-decoration: none; color:#FFFFFF;">
                        <p style = "margin: 0px;padding-top: 15;display: block; width: 100%; height: 60px" >Afficher la demande</p>
                    </a>

                </td>
                <td width="40" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td align="left" valign="top" bgcolor="#FFFFFF"><hr style="width:450px; " /></td>
                <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
                <td align="left" valign="top" bgcolor="#FFFFFF">
                    <p style="font-family:Arial, Helvetica, sans-serif; font-size:9px; color: #666; line-height: 18px;">Gestion de présence - Copyright &copy;  DATAEMBASSY. All rights reserved.</p>
                </td>
                <td width="40" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
                <td height="20" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
        </table>
        </body></html>';
