<!DOCTYPE html>

<head>
    <title>QR Generator</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="html2canvas.min.js" type=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@600&display=swap');

    @font-face {
        font-family: DIN;
        src: url(DINCondensed-Bold.ttf);
    }


    .container {
        width: 100%;
        display: flex;
        /* border: 1px solid green; */
        flex-direction: column;
    }

    .content {
        display: flex;
        align-items: center;
        /* border: 1px dashed gray; */
        flex-direction: column;
        width: 750px;
        margin: 0 auto;
        padding: 0px;
        position: relative;
        /* background-color: rgba(208, 214, 210, 100%); */
    }

    .logo_head {
        width: 100%;
        /* border: 1px solid blue; */
    }

    #qr_sn {
        /* border: 1px solid blue; */
        position: absolute;
        width: 110px;
        height: 110px;
        top: 608px;
        left: 462px;
    }

    #qr_imei {
        /* border: 1px solid blue; */
        position: absolute;
        width: 110px;
        height: 110px;
        top: 796px;
        left: 462px;
    }


    .txt-sn {
        width: 100%;
        text-align: left;
        font-size: 1.9rem;
        font-weight: 900;
        font-family: 'DIN', sans-serif;
        letter-spacing: 1px;
        position: absolute;
        top: -37px;
        left: 50px;
    }

    .txt-imei {
        width: 100%;
        text-align: left;
        font-size: 1.9rem;
        font-weight: 900;
        font-family: 'DIN', sans-serif;
        letter-spacing: 1px;
        position: absolute;
        top: -37px;
        left: 60px;
    }


    .footer-button {
        /* border: 1px solid yellow; */
        padding: 20px;
        margin-top: 20px;
        text-align: center;
    }

    .input-upper {
        text-transform: uppercase;
    }

    ::-webkit-input-placeholder {
        /* WebKit browsers */
        text-transform: none;
    }

    :-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        text-transform: none;
    }

    ::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        text-transform: none;
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10+ */
        text-transform: none;
    }

    ::placeholder {
        /* Recent browsers */
        text-transform: none;
    }
    </style>
</head>

<body>
    <div class="container">

        <!--====== BUTTON ======-->
        <div class="footer-button">
            <div class="form-group mx-sm-3 mb-3">
                <input type="text" class="form-control text-center input-upper" id="sn-device" placeholder="SN" value="">
                <br>
                <input type="text" class="form-control text-center input-upper" id="imei-id" placeholder="IMEI" value="">

            </div>
            <button class="btn btn-primary" id="btn-generate">Generate</button>
            <!-- <br> -->
            <button class="btn btn-primary" id="btn-save">Save</button>
        </div>

        <!--====== CONTENT ======-->
        <div class="content" id="content">
            <!-- BG -->
            <div>
                <img src="logos/fix_qr_dmt.png" alt="" class="logo_head">
            </div>

            <!-- QR SN CODE -->
            <div id="qr_sn"></div>
            <!-- QR IMEI CODE -->
            <div id="qr_imei"></div>


        </div>

    </div>
</body>

<script>
$(document).ready(function() {
    $('#btn-generate').on('click', function(e) {
        e.preventDefault();
        var sn_device = $('#sn-device').val();
        var imei_id = $('#imei-id').val();

        if (sn_device != "") {
            $.ajax({
                url: 'generate-qr-sn.php',
                data: {
                    _sn: sn_device,
                },
                type: "GET",
                dataType: "html",
                success: function(data) {
                    // $('#qr').html($('#qr', data).html());
                    document.getElementById('qr_sn').innerHTML = data;
                }
            });
        } else {
            alert("Isi imei-id & S/N-MOTO na Cuy!!");
        }

        if (imei_id != "") {
            $.ajax({
                url: 'generate-qr-imei.php',
                data: {
                    _imei: imei_id,
                },
                type: "GET",
                dataType: "html",
                success: function(data) {
                    // $('#qr').html($('#qr', data).html());
                    document.getElementById('qr_imei').innerHTML = data;
                }
            });
        } else {
            alert("Isi imei-id & S/N-MOTO na Cuy!!");
        }
    });
});

document.getElementById("btn-save").addEventListener("click", function() {
    var imei_id = $('#imei-id').val();
    var sn_device = $('#sn-device').val();
    var device_type = $('#device-type').val();

    if ($('#imei-id').val() != "" && $('#sn-device').val() != "") {
        html2canvas(document.querySelector('#content')).then(function(canvas) {
            saveAs(canvas.toDataURL(), sn_device + ' | ' + imei_id + '.png');
        });
    } else {
        alert("imei-id & sn_device Kosong keneh!!");
    }
});


function saveAs(uri, filename) {
    var link = document.createElement('a');

    if (typeof link.download === 'string') {
        link.href = uri;
        link.download = filename;
        //Firefox requires the link to be in the body
        document.body.appendChild(link);
        //simulate click
        link.click();
        //remove the link when done
        document.body.removeChild(link);
    } else {
        window.open(uri);
    }
}
</script>

</html>
