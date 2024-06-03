@extends('admin.includes.master')



@section('addStyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<style>
.file-upload {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    height: 200px;
    border: 2px dashed #ccc;
    border-radius: 5px;
    cursor: pointer;
}

.file-input {
    display: none;
}

.file-label {
    font-size: 1rem;
    font-weight: 600;
}

.file-label i {
    margin-bottom: 8px;
    font-size: 2rem;
}

.file-input:hover+.file-label,
.file-input:active+.file-label {
    background-color: #f5f5f5;
}

.custom-input {
    font-size: 12px;
    /* Set font size */
    height: 30px;
    /* Set input height */
}

.form-label {
    font-size: 12px;
    font-weight: 700;
    color: black;
}
</style>

@endsection
@section('content')




<!-- Firm Background form start -->

<div class="row" id="Firm-Background" class="Firm-Background-class-form-submit">
    <div class="card">
        <div class="card-body justify-content-start">
            <form id="firm-step-form" enctype="multipart/form-data">




                <h4 class="card-title"> {{strtoupper("Commercial Invioce Add")}} <br>
                    <span style="color:darkgray; font-size:12px;">Commercial Invioce</span>
                    <p style="color:rgb(236, 7, 7); font-size:12px;"> Note: Every Heading input field can be change according to the requirement </p>
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="INVOICE. NO">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="F.I NO / GD #">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="SHIPPER / MANUFACTURER">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="VESSEL /FLIGHT">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="DATED">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOTAL PKGS">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="CONTRACT NO">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="CONTRACT DATE">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="LC #">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="ISSUE DATE (LC)">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PAYMENT TERMS">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="DRAWN AT:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="DRAWN UNDER:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PORT OF LOADING">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PORT OF DISCHARGE">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="CONTAINER NO">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="CURRENCY">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TERM OF DELIVERY">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="BUYER">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="SHIP TO">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="MARKS & NOS">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="DESCRIPTION OF GOODS">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="QTY">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PRICE US$">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOTAL AMOUNT">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="LEFT & RIGHT SIDES OF BOX ( LONG SIDES )">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PROFORMA INVOICE NO">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOTAL NET. WEIGHT:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOTAL GR. WEIGHT:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="LESS 2% BUYER DISCOUNT">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="LESS COMMISSION">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="ADD FREIGHT">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="NET AMOUNT PAYABLE">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="Note:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="Remarks:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="INTERMEDIARY BANK:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="INTERMEDIARY BANK SWIFT NO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="INTERMEDIARY BANK A/C NO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FOR ONWARD CREDIT TO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOWELLERS LIMITED A/C NO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="SWIFT NO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="IBAN NO:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="BANK ADDRESS:">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="STATEMENT ON ORIGIN">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="TOWELLERS LIMITED">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="WSA 30-31 BLOCK 1, FEDERAL B AREA">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="KARACHI">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PAKISTAN">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="PHONE # +92-21-36314884">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    



                </div>
            
                <hr>
            

                <div class="row">
                    <!-- =========== Director1 ============ -->
                    @for($i=1; $i <= 6; $i++) <div class="col-sm-4 mb-4">
                        <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                        <input type="text" class="form-control custom-input"
                            id="marks_and_numbers_{{ $i }}"
                            name="marks_and_numbers_{{ $i }}" value="">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="numbers_and_kinds_of_packges_{{ $i }}" class="form-label">Numbers and kinds of packges</label>
                    <input type="text" step="any" class="form-control custom-input" id="numbers_and_kinds_of_packges_{{ $i }}"
                        name="numbers_and_kinds_of_packges_{{ $i }}" value="">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="description_of_goods_{{ $i }}" class="form-label">Description of goods</label>
                    <input type="text" step="any" class="form-control custom-input" id="description_of_goods_{{ $i }}"
                        name="description_of_goods_{{ $i }}" value="">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="gross_weight_or_other_quantity_" class="form-label">Gross weight or other quantity</label>
                    <input type="number" step="any" class="form-control custom-input" id="gross_weight_or_other_quantity_{{ $i }}"
                        name="gross_weight_or_other_quantity_{{ $i }}" value="">
                </div>
                
                <div class="col-sm-4 mb-4">
                    <label for="county_of_origin_{{ $i }}" class="form-label">County of origin </label>
                    <input type="text" step="any" class="form-control custom-input" id="county_of_origin_{{ $i }}"
                        name="county_of_origin_{{ $i }}" value="">
                </div>
                <hr>

                @endfor
                <!-- =========== Director1 ============ -->
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex justify-content-start">
                <button type="button" class="btn btn report-tab-unactive" id="firm-prev-4">Cancel</button>
            </div>
            <div class="col-xl-6 d-flex justify-content-end">
                <button type="submit" class="btn btn report-tab-active" id="firm-submit">Submit</button>
            </div>
        </div>


        <!-- firm background 4 step end ========================-->


        </form>
    </div>
</div>
</div>
<!-- Firm Background form end -->













@endsection

@section('addScript')

<script>
$(document).ready(function() {
    // firm background
    $('#firm-step-form').on('submit', function(e) {
        e.preventDefault();

        console.log('Form submitted');

        var formData = new FormData(this);


        $('#firm-submit').prop('disabled', true);

        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{ route('admin.submit_commercial_invoice') }}",
            data: formData,
            dataType: "json",
            processData: false, // important for FormData
            contentType: false, // important for FormData
            success: function(response) {
                console.log(response);

                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK",
                    timer: 3000, // 3 seconds
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href =
                            "{{ route('admin.report_List_commercial_invoice') }}"

                    },
                });
            },
            error: function(error) {
                console.log(error);

                $('#firm-submit').prop('disabled', false);
            }
        });
    });



});
</script>



@endsection
