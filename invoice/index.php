<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | INV.Mob/X/24/0201</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script> -->

</head>

<link rel="stylesheet" href="style.css?<?php echo rand(00000, 99999); ?>">

<body>
    <div id="wrapper">

        <div class="line">
            <div class="line-green"></div>
            <div class="line-grey"></div>
        </div>

        <div class="header">

            <!-- LOGO -->
            <div class="logo">
                <img src="icon.svg" alt="">
                <div class="logo-name">
                    <div class="sub-logo-name">
                        <i class="bx bx-code-alt small-bx-icon"></i> PRANASUCITRA
                    </div>
                    <div>Full Stack Developer</div>
                </div>
            </div>

            <!-- INVOICE NUMBER -->
            <div class="inv-number">
                <div>INVOICE</div>
                <div>INV.Mob/X/24/0201</div>
            </div>
        </div>

        <!-- STATUS PAID -->
        <div class="status-paids">
            <div>Status :&nbsp;</div>
            <div class="status-paid">PAID</div>
        </div>
        <!-- STATUS PAID DATE-->
        <div class="status-paids">
            <div>Paid Date :&nbsp;</div>
            <div class="status-paid-date">31 Oct 2024</div>
            <!-- <div class="status-paid-date">Waiting for payment</div> -->
        </div>

        <!-- FORM INFO -->
        <div class="form-info">

            <table>
                <tr>
                    <th>
                        INVOICE DETAILS :
                        <div class="line-border"></div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <div class="td-title-object">
                            "Deploy Furnipedia Apps & Setup to Playstore"
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Invoice Date
                        </div>
                        : &nbsp;
                        <div>
                            30 Oct 2024
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Invoice Due Date
                        </div>
                        : &nbsp;
                        <div>
                            06 Nov 2024
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Term
                        </div>
                        : &nbsp;
                        <div>
                            <b>
                                1 (First [Final]) - 100%
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            From Total Payment
                        </div>
                        : &nbsp;
                        <div>
                            <b>
                                Rp. 600.000
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Note
                        </div>
                        : &nbsp;
                        <div>
                            *No later than 7 working days after the invoice is received.
                        </div>
                    </td>
                </tr>
            </table>

            <br>

            <table>
                <tr>
                    <th style="width: 50%;">
                        FROM :
                        <div class="line-border"></div>
                    </th>

                    <th style="width: 50%;">
                        BILL TO :
                        <div class="line-border"></div>
                    </th>
                </tr>
                <tr style="vertical-align: top;">
                    <td class="">
                        <div class="td-title">
                            Lingga Pranasucitra
                        </div>
                        <div class="td-fill-address">
                            Nagreg Kendan 001/002, No. 9, Kec. Nagreg, Kab. Bandung 40215, Indonesia
                        </div>
                        <div class="td-number">
                            <i class='bx bx-mobile'></i>
                            &nbsp; +62 813-9525-0814
                        </div>
                        <div class="td-email">
                            <i class='bx bxs-envelope'></i>
                            &nbsp; <a href="mailto:lingga.pranasucitra@gmail.com?subject=Hello Lingga, about Invoice INV.Mob/X/24/0201">lingga.pranasucitra@gmail.com</a>
                        </div>
                        <div class="td-site">
                            <i class='bx bx-link'></i>
                            &nbsp; <a href="https://pranasucitra.github.io" target="_blank">pranasucitra.github.io</a>
                        </div>
                    </td>
                    <td>
                        <div class="td-title">
                            Abe
                        </div>
                        <div class="td-fill-address">
                            Portiara Cimanggis, Jakarta, Indonesia
                        </div>
                        <div class="td-number">
                            <i class='bx bx-mobile'></i>
                            &nbsp; +62 813-1111-7511
                        </div>
                        <div class="td-email">
                            <i class='bx bxs-envelope'></i>
                            &nbsp; abeberani17@gmail.com
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <br>

        <!-- TABLE WORK -->
        <div>
            <table class="table-work">
                <tr>
                    <th class="bg-th">DESCRIPTION</th>
                    <th class="bg-th" style="min-width: 40px;">QTY / PACKAGE</th>
                    <th class="bg-th" style="min-width: 130px;">PRICE</th>
                    <th class="bg-th" style="min-width: 130px;">AMOUNT</th>
                </tr>

                <tr>
                    <td class="bg-td">
                        <b>1. Build Apps</b>

                        <div>- Build Apps (.aab/.apk) target to API 34 (Android 14). </div>
                        <div>- Patch some dependency Packages/Plugins. </div>

                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        1
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 350.000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 350.000
                    </td>
                </tr>
                <tr>
                    <td class="bg-td">
                        <b>2. Upload & Setup to Playstore</b>
                        <div>- Update application settings according to new policies on Google Play Store.</div>

                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        1
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 250.000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 250.000
                    </td>
                </tr>

                <tr>
                    <td>Note : Will be processed after the invoice is paid.
                    </td>
                    <td></td>
                    <td style="text-align: right;">Subtotal</td>
                    <td style="text-align: right;" class="bg-td">Rp. 600.000</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Tax</td>
                    <td style="text-align: right;" class="bg-td">Rp. 0</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Billed Amount</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-th"><b>Rp. 600.000</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Paid Off</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-green"><b>Rp. 600.000</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Unpaid</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-yellow"><b>Rp. 0</b></td>
                </tr>


            </table>
        </div>

        <br>
        <br>

        <div class="footer">
            <div class="transfer">
                <div>Please select a transfer account for payment:<br><br></div>
                <div>BANK BCA</div>
                <div><span>Name : </span>LINGGA PRANASUCITRA Skom</div>
                <div><span>Account Number : </span><b>3 7 6 0 6 5 6 3 8 0</b></div>
                <!-- <div><span>NPWP : </span>93.964.904.2-444-000.</div> -->
            </div>
            <div class="transfer">
                <div><br><br></div>
                <div>BANK MANDIRI (Livin' by Mandiri)</div>
                <div><span>Name : </span>LINGGA PRANASUCITRA Skom</div>
                <div><span>Account Number : </span><b>1 3 0 0 0 2 2 1 5 7 1 6 1</b></div>
                <div><span></span></div>
            </div>
            <div class="transfer">
                <div><br><br></div>
                <div>BANK BTPN (Jenius / Visa)</div>
                <div><span>Name : </span>LINGGA PRANASUCITRA</div>
                <div><span>Account Number : </span><b>9 0 1 5 0 2 4 0 6 0 2</b></div>
                <!-- <div><span>$Cashtag : </span>$pranasucitra</div> -->
            </div>

            <div class="signature">
                <!-- <div><img src="qr_Images/aug21st2024.png" alt=""></div> -->
                <div class="qr-container">
                    <div id="qr_sign"></div>
                </div>

                <div>LINGGA PRANASUCITRA</div>
                <div>*This invoice is computer generated<br>
                    and no signature required.</div>
            </div>
        </div>

        <br>
        <br>

        <div class="line">
            <div class="line-green"></div>
            <div class="line-grey"></div>
        </div>

        <br>
        <br>

    </div> <!-- wrapper -->


    <script>
    $(document).ready(function() {
        const timeElapsed = Date.now();
        const today = new Date(timeElapsed);

        var _today = today.toDateString();
        var sign_value = 'Digital signature, Signed by Lingga Pranasucitra on ' + _today + ', in Bandung, Indonesia. www.pranasucitra.github.io';

        $.ajax({
            url: 'generate-qr-sign.php',
            data: {
                _value: sign_value,
            },
            type: "GET",
            dataType: "html",
            success: function(data) {
                document.getElementById('qr_sign').innerHTML = data;
            }
        });
    });
    </script>
</body>

</html>