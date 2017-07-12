<?php
/**
 * Email template.
 */
$message ='
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Careers in Metro</title>
        </head>
        <body>
            <div class="main-wrapper" style="margin: 0 auto; border: 1px solid #f2f2f2;">
                <div class="logo-container" style="background:#f2f2f2;padding:20px;">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td>
                                <img src="https://careersinmetro.ml//assets/img/logos/email.png" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="email-content" style="padding:20px 30px;">' . $content_body . '</div>
            </div>
        </body>
    </html>
';