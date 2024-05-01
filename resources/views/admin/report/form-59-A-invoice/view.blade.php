@extends('admin.includes.master')
@section('addStyle')
<style>
    .ct-chart .ct-series.ct-series-b .ct-slice-donut {
        stroke: #000000;
    }

    .ct-chart .ct-series.ct-series-a .ct-slice-donut {
        stroke: #9da09e;
    }

</style>
@endsection
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Canad CUstomer Invoice</title>
<style>
    /* Your CSS styles here */
    .hidden {
        display: none;
    }
</style>
</head>
<body style="font-family: sans-serif;">
    <header>
        <table>
            <tr>
                <td>
                    <img width="50px"
                        src="https://preview.redd.it/rate-this-canada-flag-v0-9osv9uu5isy91.jpg?auto=webp&s=7f962afeb601368b84675544a84b6afffd71e696"
                        alt="">

                </td>
                <td style="font-size: 10px;"><span> Canada Border <br> Services Agency </span>
                </td>
                <td style="font-size: 10px;">
                    <span> Agence des services <br>
                        frontailers du Canada</span>
                </td>
                <td style="text-align: center; font-weight: 700; font-size: 14px; padding: 0px 10px;"> CANADA CUSTOMS
                    INVOICE <br> FACTURE
                    DES DOUANES
                    CANADIENNES </td>
                <td>
                    <table style="border-collapse: collapse;">
                        <tr style="background-color: #000; color: #fff;">
                            <td>
                                <div style="font-size: 8px; text-align: right;">
                                    PROTECTED<br>PROTEGE
                                </div>
                            </td>
                            <td style="font-size: 15px; padding: 0 5px;">
                                B
                            </td>
                            <td style="font-size: 8px;">
                                when us completed <br> une fois rempli
                            </td>

                        </tr>
                    </table>


                </td>

            </tr>
        </table>
        </div>
    </header>
    <table border="1" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 50%; font-size: 10px;">
                <div style="height: 80px;">

                    <span>1. Vender(name and address) - (nom et adresse)</span><br>
                    <span></span><br>
                    <span></span><br>
                    <span></span><br>

                </div>
            </td>
            <td style="width: 50%; font-size: 10px;">
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr style="border-bottom: 0.5px solid #000;">
                        <td>
                            <div style="height: 40px; width: 100%;">
                                <span>2. Date of direct shipment to Canada - Date d'expedition directle vers le
                                    Canada</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="height: 40px; width: 100%;">

                                <span>3. Date of direct shipment to Canada - Date d'expedition directle vers le
                                    Canada</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 10px;">
                <div style="height: 120px;">

                    <span>4. Consignee (name and address) - (nom et adresse)</span> <br>

                    <span></span><br>
                    <span></span><br>
                    <span></span><br>
                </div>
            </td>
            <td>
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr style="border-bottom: 0.5px solid #000;">
                        <td style=" width: 50%; font-size: 10px;">
                            <div style="height: 70px;">

                                <span>5. Purchaser's name and address (if other than consignee) <br> Nam sit paresse de
                                    racheteur
                                    (s'il diffère du destinataire)</span>
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #000;">
                        <td style="width: 50%; font-size: 10px;">
                            <div style="height: 25px;">

                                <span>6. Country of transhipment- Pays de transbordement</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <table border="0" style="width: 100%; border-collapse: collapse; ">
                            <tr>
                                <td style="width: 50%; font-size: 10px; border-right: 0.5px solid #000;">7. Country of
                                    origin of goods<br>Pays dongine
                                    des marchandises
                                </td>
                                <td style="width: 50%; font-size: 10px; font-weight: 500;"> IF SHIPLENT INCLUDES GOCIOS
                                    OF OFFERENT CROS
                                    ENTER ORIGINS AGAINST TEMEIND L'EXPEDITION COMPREND DES MACHANCHIES D'ORIGINES
                                    DIFFERENTER, PRECIE LEUR PROVENANCE EN 12
                                </td>
                            </tr>
                        </table>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; font-size: 10px;">
                <div style="height: 100px;">

                    <span>4. Transportation: Give mode and place of direct shipment to Canada Transport Précisez mode et
                        point d'expédition directe vers le Canada</span>
                </div>
            </td>
            <td>
                <table border="0" style="width: 100%; border-collapse: collapse; ">
                    <tr style="border-bottom: 0.5px solid #000;">
                        <td style="width: 50%; font-size: 10px;">
                            <div style="height: 65px;">

                                <span>Conditions of sale and terms of payment <br>

                                    (ie sale, consignment shipment, leased goods, etc.) <br>

                                    Conditions de vente et modalités de paiement <br>

                                    (p ex vente, expédition en consignation, location de marchandises, etc)</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%; font-size: 10px;">
                            <div style="height: 35px;">

                                <span>6. Country of transhipment- Pays de transbordement</span>
                            </div>
                        </td>
                    </tr>


                </table>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr>
            <td style="text-align: center; width: 10px; font-size: 8px;">
                <div style="height: 270px; border-right: 1px solid #000;">
                    <span>11.</span> <br> Number of packages nombre
                    de coils
                </div>
            </td>
            <td style=" width: 200px; font-size: 8px;">
                <div style="height: 270px; border-right: 1px solid #000;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px; ">
                                    12.
                                </div>
                            </td>
                            <td>
                                <div style="height: 50px; ">
                                    Specification of commodities (kind of packages, marks and
                                    numbers, general <br>
                                    description and characteristics, ie, grade, quality) <br>

                                    Désignation des articles (nature des colis, marques et numéros, description générale
                                    <br> et
                                    caractéristiques, p. ex. classe, qualité)
                                </div>

                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="text-align: center; width: 10px; font-size: 8px;">
                <div style="height: 270px; border-right: 1px solid #000;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px; ">
                                    13.
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div style="height: 50px; ">
                                    Quantity <br> (state unit) <br> Quantite <br> (precisez I'unite)
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="text-align: center; width: 80px; font-size: 8px;">
                <div style="height: 270px; ">
                    <div style="border-bottom: 1px solid; text-align: center;">
                        Selling price - Prixe de vente
                    </div>
                    <table>

                        <tr>
                            <td style="width: 80px;">
                                <div style="border-right: 1px solid #000; height: 255px;">

                                    <table>
                                        <tr>
                                            <td>
                                                <div style=" height: 50px; ">
                                                    14.
                                                </div>
                                            </td>
                                            <td style=" text-align: center;">
                                                <div style="height: 50px; ">
                                                    Unit price <br> Prix unitaire
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td style="width: 50%;">
                                <div style="height: 255px; ">

                                    <table>
                                        <tr>
                                            <td>
                                                <div style=" height: 50px; ">
                                                    15.
                                                </div>
                                            </td>
                                            <td style=" text-align: center;">
                                                <div style="height: 50px;  text-align: center;">
                                                    Total</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr>
            <td style=" width: 300px; font-size: 8px;">
                <div style="height: 50px; border-right: 1px solid #000;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 30px; ">
                                    18.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px; ">
                                    If any of fields 1 to 17 are included on an attached commercial invoice, check this
                                    bax <br>
                                    tout renseignement relativement aux zones 1 à 17 figure sur une ou des factures <br>

                                    commerciales ci-attachées, cochez cette case <br>Commercial Invoice No. N° de la
                                    facture commerciale
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px; ">
                                    <input type="checkbox" name="" id="">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <!-- <td style="text-align: center; width: 10px; font-size: 8px;">
                <div style="height: 50px; border-right: 1px solid #000;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px; ">
                                    13.
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div style="height: 50px; ">
                                    Quantity <br> (state unit) <br> Quantite <br> (precisez I'unite)
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td> -->
            <td style="text-align: center; width: 80px; font-size: 8px;">
                <div style="height: 50px; ">
                    <div style="border-bottom: 1px solid; text-align: center;">
                        <table>
                            <tr>
                                <td>
                                    <div style="height: 10px; ">
                                        16.
                                    </div>
                                </td>
                                <td>
                                    <div style="height: 10px; ">
                                        Total weight - Poids total
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <table>

                        <tr>
                            <td style="width: 80px;">
                                <div style="border-right: 1px solid #000; height: 30px;">

                                    <table>
                                        <tr>

                                            <td style=" text-align: center;">
                                                <div style="height: 10px; ">
                                                    Net
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td style="width: 80px;">
                                <div style="height: 30px;">

                                    <table>
                                        <tr>

                                            <td style=" text-align: center;">
                                                <div style="height: 10px;  text-align: center;">
                                                    Gross - Brut</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
            </td>
            <td style=" width: 100px; font-size: 8px;">
                <div style="height: 50px; border-left: 1px solid #000;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px; ">
                                    17.
                                </div>
                            </td>
                            <td>
                                <div style="height: 50px; ">
                                    Invoice Total <br>
                                    Total de la facture
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr>
            <td style="width: 50%; font-size: 7px; border-right: 1px solid;">
                <div style="height: 50px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px;">
                                    19.
                                </div>
                            </td>
                            <td>
                                <div style="height: 50px;">
                                    Exporter's name and address (if other than vendor) <br>
                                    nome et adresse de I'exportateur (s'il differe du vendeur)
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
            <td style="width: 50%; font-size: 7px;">
                <div style="height: 50px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 50px;">
                                    20.
                                </div>
                            </td>
                            <td>
                                <div style="height: 50px;">
                                    Originator (name and address) - Expediteur d'origine (nom et adresse)
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr>
            <td style="width: 50%; font-size: 7px; border-right: 1px solid;">
                <div style="height: 30px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 30px;">
                                    21.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px;">
                                    Agency ruling (if applicable) - Decision de I'Agence (s'il y a lieu)
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
            <td style="width: 50%; font-size: 7px;">
                <div style="height: 30px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 30px;">
                                    22.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px;">
                                    If field 23 to 25 are not applicable, check this box <br>
                                    Si les zones 23 a 25 sont sans objet, cochez cette case
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px; margin-left: 40px;">
                                    <input type="checkbox">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; border-top: 0;">
        <tr>
            <td style="width: 33.33%; font-size: 7px; border-right: 1px solid;">
                <div style="height: 150px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 150px;">
                                    23.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px;">
                                    If included in field 17 indicate amount: <br>
                                    Si compris dans le total a la zone 17 precisez:
                                </div>
                                <div style="width: 100%; margin: auto;">
                                    (i) Transportation charges, expenses and insurance <br>
                                    from the place of direct shipment to Canada <br>
                                    Les Frais de transport,
                                    depences directe verse le Canada
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                                <div style="width: 100%; margin: auto;">
                                    (ii) Costs for contruction, erection and assembly<br>
                                    incurred after importation into Canada <br>
                                    Les couts de construction, d'erection et <br>
                                    d'assemblage apres importation au Canada
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                                <div style="width: 100%; margin: auto;">
                                    (iii) Exporting packing <br>
                                    Le cout de I'emballage d'exportation
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                            </td>
                        </tr>

                    </table>

                </div>
            </td>
            <td style="width: 33.33%; font-size: 7px; border-right: 1px solid;">
                <div style="height: 150px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 150px;">
                                    24.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px;">
                                    If included in field 17 indicate amount: <br>
                                    Si compris dans le total a la zone 17 precisez:
                                </div>
                                <div style="width: 100%; margin: auto;">
                                    (i) Transportation charges, expenses and insurance <br>
                                    from the place of direct shipment to Canada <br>
                                    Les Frais de transport,
                                    depences directe verse le Canada
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                                <div style="width: 100%; margin: auto;">
                                    (ii) Costs for contruction, erection and assembly<br>
                                    incurred after importation into Canada <br>
                                    Les couts de construction, d'erection et <br>
                                    d'assemblage apres importation au Canada
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                                <div style="width: 100%; margin: auto;">
                                    (iii) Exporting packing <br>
                                    Le cout de I'emballage d'exportation
                                    <div>
                                        <input type="text" style="width: 90px; border: 0; border-bottom: 1px solid;">
                                    </div>

                                </div>

                            </td>
                        </tr>

                    </table>

                </div>
            </td>
            <td style="width: 33.33%; font-size: 7px; border-right: 1px solid;">
                <div style="height: 150px;">
                    <table>
                        <tr>
                            <td>
                                <div style="height: 150px;">
                                    25.
                                </div>
                            </td>
                            <td>
                                <div style="height: 30px;">
                                    If included in field 17 indicate amount: <br>
                                    Si compris dans le total a la zone 17 precisez:
                                </div>
                                <div style="width: 100%; margin: auto;">
                                    (i) Transportation charges, expenses and insurance <br>
                                    from the place of direct shipment to Canada <br>
                                    Les Frais de transport,
                                    depences directe verse le Canada
                                    <div style="text-align: center;">
                                        <input type="checkbox">
                                    </div>

                                </div>

                                <div style="width: 100%; margin: auto;">
                                    (ii) Costs for contruction, erection and assembly<br>
                                    incurred after importation into Canada <br>
                                    Les couts de construction, d'erection et <br>
                                    d'assemblage apres importation au Canada
                                    <div style="text-align: center;">
                                        <input type="checkbox">
                                    </div>

                                </div>


                            </td>
                        </tr>

                    </table>

                </div>
            </td>
        <tr style="border-top: 0.5px solid;">
            <td colspan="3" style="text-align: center; font-size: 7px; ">Dans ce formulaire, toutes les expressions
                designant des personnes visent a la fois les hommes et les femmes</td>
        </tr>
        </tr>
    </table>
</body>
</html>



<!-- firm background tab start -->

<!-- firm background tab End -->















@endsection

@section('addScript')





@endsection
