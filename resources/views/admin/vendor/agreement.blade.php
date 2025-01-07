<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agreement File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <style>
        /** 
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }
        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.2cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2.5cm;
        }
        .table th,.table td, p{
            font-size:14px;
        }

        .table td,.table th{
            padding: 0.25rem;
            font-size:14px;
        }

        li{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="mb-5">
        <img src="./images/header.png" width="100%" height="100%"/>
    </header>

    <footer>
        <img src="./images/footer.png" width="100%" height="100%"/>
    </footer>
    <div class="mt-3">
        <h6 class='text-center mb-3' style="font-weight:600;text-transform:uppercase">Memorandom of understanding</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="50%">Expression</th>
                    <th width="50%">Meaning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1. PRINCIPAL (Name, PAN Number, Address, Contact Number)
                    </td>
                    <td>
                        <p>Ghargharma Doctor Pvt. Ltd. <br>
                            (PAN No. 610285424) <br>
                            Sinamangal-09, Kathmandu <br>
                            +977 01 5917322<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        2. REFERRING COMPANY (Name, Registration Number, Address, Contact Number)
                    </td>
                    <td>
                        <p>{{$agreement->vendor->store_name}} <br>
                            (Registration No. {{$agreement->registration_no}}) <br>
                            {{$agreement->vendor->address}} <br>
                            {{$agreement->company_contact}}<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        3. GUARANTOR (Name, Address, Mobile Number)
                    </td>
                    <td>
                        <p>{{$agreement->guarantor_name}} <br>
                            {{$agreement->guarantor_address}} <br>
                            {{$agreement->guarantor_contact}}<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        4. TERM (length, Commencement)
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        5. TERMINATION NOTICE
                    </td>
                    <td>
                        {{$agreement->termination_time_frame}}
                    </td>
                </tr>
                <tr>
                    <td>
                        6. TERRITORY
                    </td>
                    <td>
                       All
                    </td>
                </tr>
                <tr>
                    <td>
                        7. BUSINESS
                    </td>
                    <td>
                        {{$agreement->vendor->types->vendor_type}}
                    </td>
                </tr>
                <tr>
                    <td>
                        8. NOMINATED PERSON (Name, Address, Mobile Number)
                    </td>
                    <td>
                        <p>{{$agreement->nominator_name}} <br>
                            {{$agreement->nominator_address}} <br>
                            {{$agreement->nominator_contact}}<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        9. APPLICABLE LAW
                    </td>
                    <td>
                        Prevailing Nepalese Law
                    </td>
                </tr>
                <tr>
                    <td>
                        10. DATE OF AGREEMENT
                    </td>
                    <td>
                       {{$agreement->commencement_date}}
                    </td>
                </tr>
            </tbody>                    
        </table>
        <div>
            <p style="text-transform:uppercase; text-align:center">Detailed Provisions using these expressions are on the pages following.</p>
            <div style="margin-top:60px">
                <table class="table">
                    <tr>
                        <td width="40%" style="border:none">           
                            <hr class="ml-0">     
                            <p class="mb-0 text-center"><span style="font-weight: 500;color:#0d59a7">Signed on behalf of the Principal:</p>
                            <p style="font-weight:700" class="text-center">
                                <span>
                                    Name/Designation
                                </span>
                            </p>
                        </td>
                        <td width="20%" style="border:none"></td>
                        <td width="40%" style="border:none" class="text-right">           
                            <hr class="ml-0">     
                            <p class="mb-0 text-center"><span style="font-weight: 500;color:#0d59a7">Signed on behalf of the {{$agreement->vendor->types->vendor_type}}:</p>
                            <p style="font-weight:700" class="text-center">
                                <span>
                                    Name/Designation
                                </span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <p>
            <span  style="font-weight:600">This agreement for the online sale of Gym products and services via GD Store</span> to the client.
        </p>
        <ol>
            <li>
                Description of Services: The GD Store platform shall provide the Client with access to a network of gym facilities, including but not limited to weight 
                training equipment, cardio equipment, group fitness classes, personal training servicess, and access to the swimming pool. The Client shall have the right
                to request specific services and the GD Store platform shall use its best efforts to accomodate such requests.
            </li>
            <li>
                Membership Term: The Client shall be granted access to the gym facilities for the duration of {{$agreement->membership_time_frame}} from the date of this contract.
            </li>
            <li>
                Payment: The Client shall pay a membership fee of Rs. {{$agreement->membership_fee}} to the GD Store platform on a {{$agreement->payment_time_frame}} basis.
                The Client shall also be responsible for any additional charges incurred for services or amenities used during their membershsip term.
            </li>
            <li>
                Quality of Services: The GD Health platform represents and warrants that all services provided to the Client shall be of the highest quality and shall be performed in compliance with all applicable laws
                and regulations. The Client shall have the right to terminate this agreement if the services do not meet the standards of quality set forth in this agreement.
            </li>
            <li>
                Liability: The GD Health platform shall not be liable for any personal injuries or damages to property that occur as a result of its services or the use of the 
                gym facilities. The Client shall be liable for any damages caused to the gym facilities or equipment as a result of their actions.
            </li>
            <li>
                Termination: This agreement may be terminated by either party with {{$agreement->termination_time_frame}} written notice.
            </li>
            <li>
                Governing Law: This agreement shall be governed by and construed in accordance with the laws of Nepal, without giving effect to any principles of conflicts
                of law.
            </li>
            <li>
                Dispute Resolution: Any dispute arising out of or related to this agreement shall be resolved by arbitration in accordance with the rules of the Nepal
                Arbitration Association.
            </li>
        </ol>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>