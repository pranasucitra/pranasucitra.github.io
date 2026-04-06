<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | INV.Mob/X/22/0032</title>

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
                <div>INV.Mob/X/22/0032</div>
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
                            "Pembangunan Aplikasi Mobile AR & Web Portal (CMS) FURNIPEDIA"
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
                            29-Oct-2022
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
                            05-Nov-2022
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
                                3 (Tiga [Final]) - 40%
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
                                Rp. 35,000,000
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

                        <div>- Cart & Order System (Get databases)</div>
                        <div>- Custom Order Feature</div>
                        <div>- Payment Gateway System (Duitku API Integration)</div>
                        <div>- Checkout with Duitku WebView System</div>
                        <div>- Debug/Checking Payment with SSL/NonSSL Connections (For Security Purpose)</div>
                        <div>- Order Details (Shipping Status, Filter Order by Status)</div>
                        <div>- Added Materials Options On Detail Product (Max 3)</div>
                        <div>- Confirm Shipping by QR Code Scanner</div>
                        <div>- Some Minor Revision</div>
                        <div>- Revisions (MOM 7 Agustus 2022)</div>
                        <div>- Revisions (MOM 22 Oct 2022)</div>
                        <div>- Android (.apk)/(.aab) Build for Release</div>
                        <div>- iOS Test Flight & (.ipa) Build for Release</div>
                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        2
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 4,750,000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 9,500,000
                    </td>
                </tr>
                <tr>
                    <td class="bg-td">
                        <b>2. Web Development</b>
                        <div>- Header (Notification System if new Order Arrived)</div>
                        <div>- Purchase Order Detail (Shipping Status, Payment Gateway Detail, View Custom Order List)
                        </div>
                        <div>- QR Code Generator (Generate Shipping Label)</div>
                        <div>- Change Databases System for Materials/Thumbnails Image</div>
                        <div>- Change Databases System for Notification System</div>
                        <div>- Added Materials Options (Upload 3 Options)</div>
                        <div>- Minor revisions (MOM 22 Oct 2022)</div>
                        <div>- Change Duitku API with Client Account</div>
                        <div>- Change Site Server with Client Account</div>
                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        1
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 4,500,000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 4,500,000
                    </td>
                </tr>
                <tr>
                    <td class="bg-td">
                        <b>3. Sisa Pembayaran Term 2</b>
                        <div>- <a href="http://pranasucitra.com/client/inv-mob-I-XXII-0012" target="_blank">Invoice Term
                                2
                            </a></div>
                    </td>

                    <td style="text-align: center; vertical-align: top;" class="bg-td">
                        -
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 500,000
                    </td>

                    <td style="text-align: right;  vertical-align: top;" class="bg-td">
                        Rp. 500,000
                    </td>
                </tr>

                <tr>
                    <td>Note : Boleh di Split jadi 2x pembayaran, sisanya setelah perubahan API Duitku & Pemindahan
                        Server dengan Akun FURNIPEDIA
                    </td>
                    <td></td>
                    <td style="text-align: right;">Subtotal</td>
                    <td style="text-align: right;" class="bg-td">Rp. 14,500,000</td>
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
                    <td style="text-align: right; font-size: 0.78em;" class="bg-th"><b>Rp. 14,500,000</b></td>
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
                    <td style="text-align: right; font-size: 0.78em;" class="bg-yellow"><b>Rp. 14,500,000</b></td>
                </tr>


            </table>
        </div>

        <br>
        <br>

        <div class="footer">
            <div class="transfer">
                <div>Please select a transfer account for payment:<br><br></div>
                <div>BANK BCA</div>
                <div><span>a/n </span>LINGGA PRANASUCITRA Skom</div>
                <div><span>No Rek : </span><b>3 7 6 0 6 5 6 3 8 0</b></div>
                <div><span>NPWP : </span>93.964.904.2-444-000.</div>
            </div>
            <div class="transfer">
                <div><br><br></div>
                <div>BANK MANDIRI (Livin' by Mandiri)</div>
                <div><span>a/n </span>LINGGA PRANASUCITRA Skom</div>
                <div><span>No Rek : </span><b>1 3 0 0 0 2 2 1 5 7 1 6 1</b></div>
                <div><span></span></div>
            </div>
            <div class="transfer">
                <div><br><br></div>
                <div>BANK BTPN (Jenius / Visa)</div>
                <div><span>a/n </span>LINGGA PRANASUCITRA</div>
                <div><span>No Rek : </span><b>9 0 1 5 0 2 4 0 6 0 2</b></div>
                <div><span>$Cashtag : </span>$pranasucitra</div>
            </div>

            <div class="signature">
                <div><img src="qr_Images/oct29th2022.png" alt=""></div>
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