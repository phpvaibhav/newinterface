<!DOCTYPE html>
<html>
<head>
     <?php $backend_assets =  base_url().'backend_assets/';?>
    <title>Interface</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- #FAVICONS -->
    <link rel="shortcut icon" href="<?php echo $backend_assets; ?>img/favicon/favicon.ico" type="image/x-icon">
      <link rel="icon" href="<?php echo $backend_assets; ?>img/favicon/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
</head>
<body style="padding: 0; margin: 30px 0px 0px 0px; font-family: 'Quicksand', sans-serif;">
    <div class="Frame" style="width: 100%; max-width: 650px; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; background: #eb324b; text-align: center; padding: 20px; margin: 0 auto;">
        <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding: 10px 0px;box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;">
                    <div class="logo">
                        <img src="<?php echo $backend_assets; ?>img/logo.png" style="width:100%;max-width: 80px;">
                    </div>
                </td>
            </tr>
        </table>
        <div style="background: #fff; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;">
            <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" >
                <tr>
                    <td style="padding-left: 20px; padding-right: 10px; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;">
                        <table width="80%" border="0" align="center" cellspacing="0" cellpadding="0">
                            <tr>
                              <td style="word-break: break-word;color: #2a2a2a;font-size: 16px;line-height: 150%; text-align: center; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                                <h2 style="color: #363535;font-size: 35px;font-weight: 800;text-align: center; display: block;line-height: 125%;padding: 0;margin: 20px 0px;"><?php echo $title; ?></h2>
                                <p style="margin: 8px auto;font-size: 16px;color: #6c6c6c;width: 100%;font-weight: 500;"><?php echo $message; ?></p>
                              </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            
            
        </div>
        <div style="background: #222;">
            <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                       
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>