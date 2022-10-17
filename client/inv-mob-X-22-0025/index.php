<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | INV.Mob/X/22/0025</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</head>

<link rel="stylesheet" href="style.css">

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
                    <div>PRANASUCITRA</div>
                    <div>Mobile Apps Developer</div>
                </div>
            </div>

            <!-- INVOICE NUMBER -->
            <div class="inv-number">
                <div>INVOICE</div>
                <div>INV.Mob/X/22/0025</div>
            </div>
        </div>

        <!-- STATUS PAID -->
        <div class="status-paids">
            <div>Status :&nbsp;</div>
            <div class="status-unpaid">UNPAID</div>
        </div>
        <!-- STATUS PAID DATE-->
        <div class="status-paids">
            <div>Paid Date :&nbsp;</div>
            <!-- <div class="status-paid-date">17 Jul 2022</div> -->
            <div class="status-paid-date">Waiting for payment</div>
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
                            "Pembangunan Aplikasi Mobile Augmented Reality Relief Flora"
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Tgl. Invoice
                        </div>
                        : &nbsp;
                        <div>
                            01-Oct-2022
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Tgl. Jatuh Tempo
                        </div>
                        : &nbsp;
                        <div>
                            07-Oct-2022
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
                                2 (Dua) - 40%
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td-fill tgl-invoice">
                        <div>
                            Dari Total Pembayaran
                        </div>
                        : &nbsp;
                        <div>
                            <b>
                                Rp. 18,500,000
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
                            *Selambat-lambatnya 7 hari kerja setelah invoice diterima.
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
                            &nbsp; <a
                                href="mailto:lingga.pranasucitra@gmail.com?subject=Hello Lingga, about Invoice INV.Mob/VII/22/0012">lingga.pranasucitra@gmail.com</a>
                        </div>
                        <div class="td-site">
                            <i class='bx bx-link'></i>
                            &nbsp; <a href="https://pranasucitra.com" target="_blank">www.pranasucitra.com</a>
                        </div>
                    </td>
                    <td>
                        <div class="td-title">
                            Alif Nurul Iman
                        </div>
                        <div class="td-fill-address">
                            Jln. Sekelimus Tengah No.36c, Bandung, Indonesia
                        </div>
                        <div class="td-number">
                            <i class='bx bx-mobile'></i>
                            &nbsp; +62 877-2026-9363
                        </div>
                        <div class="td-email">
                            <i class='bx bxs-envelope'></i>
                            &nbsp; alifnurulss@gmail.com
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
                    <th class="bg-th" style="min-width: 40px;">QTY</th>
                    <th class="bg-th" style="min-width: 130px;">PRICE</th>
                    <th class="bg-th" style="min-width: 130px;">AMOUNT</th>
                </tr>

                <tr>
                    <td class="bg-td">
                        <b>1. Apps Development</b>
                        <div>- AR Scene Setup</div>
                        <div>- Marker Setup with 3D Object (Loaded assetbundle local system)</div>
                        <div>- 3D Material Setup</div>
                        <div>- Tapping (Rebind Animation), Add floating panel description in 3D</div>
                        <div>- Rotating & Scalling 3D Object</div>
                        <div>- Video/Picture Capture Features</div>
                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        1
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 5,400,000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 5,400,000
                    </td>
                </tr>
                <tr>
                    <td class="bg-td">
                        <b>2. Firebase Integration</b>
                        <div>- Firebase Authentication System</div>
                        <div>- Firebase Databases Setup</div>
                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        1
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 2,000,000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 2,000,000
                    </td>
                </tr>

                <tr>
                    <td>Note : -</td>
                    <td></td>
                    <td style="text-align: right;">Subtotal</td>
                    <td style="text-align: right;" class="bg-td">Rp. 7,400,000</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Tax</td>
                    <td style="text-align: right;" class="bg-td"><i>Included (3%)</i></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Billed Amount</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-th"><b>Rp. 7,400,000</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Paid Off</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-green"><b>Rp. 0</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Unpaid</td>
                    <td style="text-align: right; font-size: 0.78em;" class="bg-yellow"><b>Rp. 7,400,000</b></td>
                </tr>


            </table>
        </div>

        <br>
        <br>

        <div class="footer">
            <div class="transfer">
                <div>Transfer to account :</div>
                <div>BANK BCA</div>
                <div><span>a/n </span>LINGGA PRANASUCITRA Skom</div>
                <div><span>No Rek : </span>3760656380</div>
                <div><span>NPWP : </span>93.964.904.2-444-000.</div>
            </div>

            <div class="signature">
                <div><img src="qr_Images/0ct1st2022.png" alt=""></div>
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
</body>

</html>