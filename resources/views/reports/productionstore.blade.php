<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
            .row-1 {
              display: flex;
              justify-content: space-between;
              align-items: flex-end;
              margin-top: 55px;
            }

            .row-2 {
              display: flex;
              justify-content: space-between;
              padding-top: 30px;
              border-bottom: 1px solid black;
            }

            .footer-logo {
              border: 1px solid black;
              
            }

            @font-face {
              font-family: Volkswagen-DemiBold;
              src: url("../fonts/Volkswagen-DemiBold Regular.ttf");
            }
            @font-face {
              font-family: Volkswagen-Medium;
              src: url("../fonts/Volkswagen-Medium Regular.ttf");
            }
            @font-face {
              font-family: Volkswagen-Regular;
              src: url("../fonts/Volkswagen-Regular Regular.ttf");
            }
            @font-face {
              font-family: AGaramondExp-Semibold;
              src: url("../fonts/AGaramondExp-Semibold.ttf");
            }
            .sunfarm h1 {
              font-size: 30px;
              font-family: AGaramondExp-Semibold;
              color: #3a8b38 !important;
              margin: 0%;
            }
            .sunfarm h2 {
              font-size: 16px;
              font-family: Volkswagen-Regular;
              color: #3a8b38 !important;
              margin-top: 5px;
              margin-bottom: 5px;
            }
            .sunfarm h4 {
              font-size: 22px;
              font-family: AGaramondExp-Semibold;
              color: #3a8b38 !important;
              margin-top: 5px;
              margin-bottom: 5px;
            }
            .sunfarm p {
              font-size: 14px;
              font-family: Volkswagen-Regular;
              color: #61797d;
              margin: 0%;
            }

            .invoice2 th {
              font-size: 14px;
              font-family: Volkswagen-Regular;
            }
            .invoice2 td {
              font-size: 14px;
              font-family: Volkswagen-Regular;
            }

            .table-group-divider {
              border-top: 2px solid #3A8B38 !important;
            }

            .dashed-border {
              border-bottom: 1px solid #3A8B38 !important;  
              border-right: 1px solid #3A8B38 !important;  

              /*background-image: linear-gradient(to right, #61797D 44%, transparent 0%);
              background-position: bottom;
              background-size: 8px 0.5px;
              background-repeat: repeat-x;*/
            }

            .TableHeading {
              line-height: 2 !important;
            }

            .transparentcolor {
              color: rgba(255, 255, 255, 0);
            }

            .footer-border {
              border-bottom: solid 3px #3A8B38;
            }

            .table-borderless th {
              font-size: 14px;
              font-family: Volkswagen-Regular;
            }
            .table-borderless td {
              color: #61797d;
              font-size: 12px;
              font-family: Volkswagen-Regular;
            }
            .table-borderless .color-dark {
              color: #273133;
            }
            .table-borderless .font-dark {
              color: #273133;
              font-family: Volkswagen-Medium;
            }

            .table-responsive p {
              font-family: Volkswagen-Regular;
              font-size: 12px;
              color: #61797D;
            }
            .table-responsive .farmstock {
              font-family: Volkswagen-DemiBold;
              font-size: 18px;
              border-bottom: none;
              line-height: 2.5;
              text-align: center;
            }

            .TableHeader {
              border: 1px solid black;
            }
            .TableHeader tr {
              background-color: #F8F8F8;
            }

            .TableBody {
              border: 1px solid black;
              border-top: 0px solid transparent !important;
            }
            .TableBody tr {
              border-bottom: none !important;
              border-top: none !important;
              color: #61797D;
            }
            .TableBody .dashed-border {
              border-bottom: 1px solid black !important;   
              border-right: 1px solid black !important; 
              /*background-image: linear-gradient(to right, #61797D 44%, transparent 0%);
              background-position: top;
              background-size: 8px 0.5px;
              background-repeat: repeat-x;*/
            }

            table tr:first-child {
              background-size: 8px 0px !important;
            }

            .paragraph {
              font-family: Volkswagen-Regular;
              font-size: 14px;
              color: #61797D;
              text-align: justify;
            }

            .report-details {
              font-family: Volkswagen-Regular;
              font-size: 14px;
            }
            .report-details p {
              color: #61797D;
            }
            .report-details span {
              color: #273133;
            }

            .table {
              background-color: transparent;
              width: 100%;
              margin-bottom: 1rem;
              vertical-align: top;
              border-color: black;
            }

            .table > :not(caption) > * > * {
              padding: 0.6rem 0.6rem;
              box-shadow: inset 0 0 0 9999px transparent;
            }

            .table > tbody {
              vertical-align: inherit;
            }

            .table > thead {
              vertical-align: bottom;
            }

            table {
              caption-side: bottom;
              border-collapse: collapse;
            }

            th {
              text-align: inherit;
              border-right: 1px solid black !important; 
            }

            td {
              
              border-right: 1px solid black !important; 
            }

            thead,
            tbody,
            tfoot,
            tr,
            td,
            th {
              border-color: inherit;
              border-style: solid;
              border-width: 0;
            }

            .table-bordered > :not(caption) > * > * {
              border-width: 0 1px;
            }

            .table-bordered > :not(caption) > * {
              border-width: 1px 0;
            }

            @media (min-width: 1400px) {
              .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                max-width: 1320px;
                margin: auto;
              }
            }/*# sourceMappingURL=shamba.css.map */   
    </style>

    <title>ShambaPro</title>
</head>
<body >
    <div class="container-xxl">
<div class="sunfarm py-4">
    <div class="row-1">
        <div class="col-1">
    <h1>SUNSHINE FARM LTD</h1>
    <h2 class="mb-1" style="font-size: 22px !important;">Production Report</h2>
    <?php
    $day = Carbon\Carbon::now()->format('j');
    $symbol = Carbon\Carbon::now()->format('S');
    $year = Carbon\Carbon::now()->format('F Y');
    
    ?>
    <p class="mb-1" style="font-size: 14px !important;">FOR THE YEAR ENDED 31<sup>st</sup> DECEMBER {{Carbon\Carbon::now()->format('Y')}}</p>
    <p>Generated On {{$day}}<sup>{{$symbol}}</sup> {{$year}} </p>
</div>
<div class="col-2">
    

</div>
</div>
</div>
<div class="row-2 report-details">
    <div class="col-sm-3">
        <p>Name:<span class="ps-1">{{ ($user->name) ? $user->name : '' }}</span></p>
    </div>
    <div class="col-sm-6">
        <p>Creation Date:<span class="ps-1">{{Carbon\Carbon::now()->format('d M Y')}}</span></p>
    </div>

    <div class="col-sm-3 text-sm-end">
        <p>Category:<span class="ps-1">{{ ($enterprise->enterprise_type) ? $enterprise->enterprise_type : '' }}</span></p>
    </div>
    <!-- <div class="col-sm-3 text-sm-end">
        <p>Sub-Category:<span class="ps-1">Cattle(Diary)</span></p>
    </div> -->
</div>
<div class="table-responsive border-top">
    @if(count($feed_record) > 0)
        <div class="text-center farmstock">
            Feeding Records - Daily Production Records
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                @foreach($feed_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->created_at))}}</td>
                        <td>{{ $fs->feed_name  }}</td>
                        <td>{{ $fs->quantity  }}</td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    @endif

</div>
<div class="table-responsive">
  @if(count($grazing_record) > 0)
      <div class="text-center farmstock">
          Feeding Records - Daily Grazing Record
      </div>
      <table class="table table-bordered border-dark invoice2 mb-0">
          <thead class="TableHeader">
              <tr >
                  <th scope="col">Date</th>
                  <!-- <th scope="col">Animal ID</th> -->
                  <th scope="col">Grazing From</th>
                  <th scope="col">Grazing To</th>
              </tr>
          </thead>

          <tbody class="TableBody">
              
              @foreach($grazing_record as $fs)
                  <tr class="dashed-border">
                      <td>{{date("d M Y",strtotime($fs->created_at))}}</td>
                      <td>{{date("d M Y",strtotime($fs->grazing_from ))}}</td>
                      <td>{{date("d M Y",strtotime($fs->grazing_to))}}</td>
                  </tr>
              @endforeach 
              
          </tbody>
      </table>
  @endif    
</div>
<div class="table-responsive">
    @if(count($weaning_record) > 0)
        <div class="text-center farmstock">
            Feeding Records - Daily Weaning Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Weaning Weight</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($weaning_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->created_at))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->weaning_weight}}kg</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($weaning_record) > 0)
        <div class="text-center farmstock">
            Feeding Records - Daily Weaning Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Weaning Weight</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($weaning_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->created_at))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->weaning_weight}}kg</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($feeding_consumption_record) > 0)
        <div class="text-center farmstock">
            Feeding Records - Daily Feed Consumption
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Feed Type</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($feeding_consumption_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->time}}</td>
                        <td>{{$fs->feed_name}}</td>
                        <td>{{$fs->quantity}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($water_consumption_record) > 0)
        <div class="text-center farmstock">
            Feeding Records - Daily Water Consumption
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($water_consumption_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->time}}</td>
                        <td>{{$fs->quantity}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($milk_record) > 0)
        <div class="text-center farmstock">
            Milk - Daily Milk Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Time</th>
                    <th scope="col">Milk Produced</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($milk_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->time}}</td>
                        <td>{{$fs->milk_produced}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($milk_used) > 0)
        <div class="text-center farmstock">
            Milk - Daily Milk Used
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Milk Feed</th>
                    <th scope="col">Milk Consumed</th>
                    <th scope="col">Milk Loss</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($milk_used as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->milk_fed}}</td>
                        <td>{{$fs->milk_consumed}}</td>
                        <td>{{$fs->milk_loss}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($growth_register) > 0)
        <div class="text-center farmstock">
           Growth Death Record - Growth Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Cause of Death</th>
                    <th scope="col">Deressed Weight</th>
                    <th scope="col">Meat Quality</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($growth_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->cause_of_death}}</td>
                        <td>{{$fs->dressed_weight}}</td>
                        <td>{{$fs->meat_quality}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($death_register) > 0)
        <div class="text-center farmstock">
           Growth Death Record - Death Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Disposal Method</th>
                    <th scope="col">Cause of Death</th>
                   
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($death_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->disposal_method}}</td>
                        <td>{{$fs->cause_of_death}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($slaughter_record) > 0)
        <div class="text-center farmstock">
           Growth Death Record - Slaughter Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Kill Weight</th>
                    <th scope="col">Dressed Weight</th>
                   <th scope="col">Meat Quality</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($slaughter_record as $fs)
                    <tr class="border-dark">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->kill_weight}}</td>
                        <td>{{$fs->dressed_weight}}</td>
                        <td>{{$fs->meat_quality}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($vaccination_record) > 0)
        <div class="text-center farmstock">
           Health Record - Vaccination Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Dosage</th>
                   <th scope="col">batch_number</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($vaccination_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->batch_number}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($disease_pests_record) > 0)
        <div class="text-center farmstock">
           Health Record - Disease Pests Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Signs Symptoms</th>
                    <th scope="col">Diagnosis</th>
                   <th scope="col">Dosage</th>
                   <th scope="col">Treatment Duration</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($disease_pests_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->signs_symptoms}}</td>
                        <td>{{$fs->diagnosis}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->treatment_duration}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($treatment_record) > 0)
        <div class="text-center farmstock">
           Health Record - Treatment Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Batch Number</th>
                    <th scope="col">Dosage</th>
                   <th scope="col">Treatment Duration</th>
                   <th scope="col">With Holding Days</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($treatment_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->batch_number}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->treatment_duration}}</td>
                        <td>{{$fs->withholding_days}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($veterinary_record) > 0)
        <div class="text-center farmstock">
           Health Record - Veterinary Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">observations</th>
                    <th scope="col">Recommendations</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($veterinary_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->observations}}</td>
                        <td>{{$fs->recommendations}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($service_register) > 0)
        <div class="text-center farmstock">
           Breeding Record - Service Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Start Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Service Date</th>
                    <th scope="col">Time of Service</th>
                    <th scope="col">Date dying off</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Weight</th>
                    <th scope="col">No of New Born</th>
                    <th scope="col">Birth Date</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($service_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{date("d M Y",strtotime($fs->date_last))}}</td>
                        <td>{{date("d M Y",strtotime($fs->date_service))}}</td>
                        <td>{{$fs->time_service}}</td>
                        <td>{{date("d M Y",strtotime($fs->date_dying_off))}}</td>
                        <td>{{$fs->sex}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->no_new_born}}</td>
                        <td>{{date("d M Y",strtotime($fs->birth_date))}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($calf_birth_register) > 0)
        <div class="text-center farmstock">
           Breeding Record - Calf Birth Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Mother Name</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($calf_birth_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->sex}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->father_id}}</td>
                        <td>{{$fs->mother_id}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($piglet_birth_register) > 0)
        <div class="text-center farmstock">
           Breeding Record - Piglet Birth Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Mother Name</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($piglet_birth_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->sex}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->father_id}}</td>
                        <td>{{$fs->mother_id}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($kid_birth_register) > 0)
        <div class="text-center farmstock">
           Breeding Record - Kid Birth Register
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Mother Name</th>
                    <th scope="col">No of New Born</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($kid_birth_register as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->sex}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->father_id}}</td>
                        <td>{{$fs->mother_id}}</td>
                        <td>{{$fs->no_new_born}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($egg_record) > 0)
        <div class="text-center farmstock">
           Egg Record - Daily Egg Production
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Egg Produced</th>
                    <th scope="col">Egg Sold</th>
                    <th scope="col">Egg Broken</th>
                    <th scope="col">Egg Consumed</th>
                    <th scope="col">Egg Poor Quality</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($egg_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->egg_produced}}</td>
                        <td>{{$fs->egg_sold}}</td>
                        <td>{{$fs->egg_broken}}</td>
                        <td>{{$fs->egg_consumed}}</td>
                        <td>{{$fs->egg_poor_quality}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($bird_record) > 0)
        <div class="text-center farmstock">
           Meat Record - Daily Bird Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Dead</th>
                    <th scope="col">Removed</th>
                    <th scope="col">sold</th>
                    <th scope="col">Farm Consumption</th>
                    
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($bird_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->dead}}</td>
                        <td>{{$fs->removed}}</td>
                        <td>{{$fs->sold}}</td>
                        <td>{{$fs->farm_consumption}}</td>
                        
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($production_record) > 0)
        <div class="text-center farmstock">
           Meat Record - Daily Production Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Dead</th>
                    <th scope="col">Removed</th>
                    <th scope="col">sold</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($production_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->dead}}</td>
                        <td>{{$fs->removed}}</td>
                        <td>{{$fs->sold}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($meat_slaughter_record) > 0)
        <div class="text-center farmstock">
           Meat Record - Daily Slaughter Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">No of Birds</th>
                    <th scope="col">Kill Weight</th>
                    <th scope="col">Dressed Weight</th>
                    <th scope="col">Meat Quality</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($meat_slaughter_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->no_of_birds}}</td>
                        <td>{{$fs->kill_weight}}</td>
                        <td>{{$fs->dressed_weight}}</td>
                        <td>{{$fs->quality}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($wool_record) > 0)
        <div class="text-center farmstock">
           Meat Record - Wool Production Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Animal ID</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Quality</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($wool_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->animal_name}}</td>
                        <td>{{$fs->weight}}</td>
                        <td>{{$fs->quality}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($soil_test) > 0)
        <div class="text-center farmstock">
           Field Preparation Record - Soil Test
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Service Provider</th>
                    <th scope="col">Type</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($soil_test as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->service_provider}}</td>
                        <td>{{$fs->type}}</td>
                        <td>{{$fs->result}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($land_preparation) > 0)
        <div class="text-center farmstock">
           Field Preparation Record - Land Preparation Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Acreage</th>
                    <th scope="col">Done By</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($land_preparation as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->type}}</td>
                        <td>{{$fs->acreage}}</td>
                        <td>{{$fs->done_by}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($soil_amendment) > 0)
        <div class="text-center farmstock">
           Field Preparation Record - Soil Amendment Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Batch No</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Supplier Name</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($soil_amendment as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->type}}</td>
                        <td>{{$fs->quantity}}</td>
                        <td>{{$fs->ingredient}}</td>
                        <td>{{$fs->batch_no}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->supplier_name}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($planting_record) > 0)
        <div class="text-center farmstock">
           Field Preparation Record - Planting Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Done by</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($planting_record as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->type}}</td>
                        <td>{{$fs->quantity}}</td>
                        <td>{{$fs->done_by}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($routine_scouting) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Routine Scouting
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Sign Symptoms</th>
                    <th scope="col">Diagnosis</th>
                    <th scope="col">Batch no</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Supplier Name</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($routine_scouting as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->sign_symptoms}}</td>
                        <td>{{$fs->diagnosis}}</td>
                        <td>{{$fs->batch_no}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->supplier_name}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($weed_management) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Weed Management
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Batch no</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Supplier Name</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($weed_management as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->ingredient}}</td>
                        <td>{{$fs->batch_no}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->amount}}</td>
                        <td>{{$fs->supplier_name}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($pesticide_application) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Pesticide Application Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Batch no</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">With holding Days</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($pesticide_application as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->method}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->ingredient}}</td>
                        <td>{{$fs->batch_no}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->amount}}</td>
                        <td>{{$fs->supplier_name}}</td>
                        <td>{{$fs->withholding_days}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($fertilizer_application) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Fertilizer Application Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ingredient</th>
                    <th scope="col">Batch no</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Supplier Name</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($fertilizer_application as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->method}}</td>
                        <td>{{$fs->name}}</td>
                        <td>{{$fs->ingredient}}</td>
                        <td>{{$fs->batch_no}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->amount}}</td>
                        <td>{{$fs->supplier_name}}</td>
                       
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($manure_application) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Manure Application Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Supplier Name</th>
                   
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($manure_application as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->method}}</td>
                        <td>{{$fs->dosage}}</td>
                        <td>{{$fs->amount}}</td>
                        <td>{{$fs->supplier_name}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($irrigation) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Irrigation Record
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">recommended</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($irrigation as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->type}}</td>
                        <td>{{$fs->recommended}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($other_farm_activities) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Other Farm Activities
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Observation</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($other_farm_activities as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->purpose}}</td>
                        <td>{{$fs->observation}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($agronomist_inspection) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Agronomist Inspection
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Observation</th>
                    
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($agronomist_inspection as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->purpose}}</td>
                        <td>{{$fs->observation}}</td>
                        
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>

<div class="table-responsive">
    @if(count($crop_produce_harvested) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Crop Produce Harvested
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($crop_produce_harvested as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->quantity}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<div class="table-responsive">
    @if(count($harvest_consumed_workers) > 0)
        <div class="text-center farmstock">
           Crop Management Record - Harvest Consumed Workers
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
            <thead class="TableHeader">
                <tr >
                    <th scope="col">Date</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>

            <tbody class="TableBody">
                
                @foreach($harvest_consumed_workers as $fs)
                    <tr class="dashed-border">
                        <td>{{date("d M Y",strtotime($fs->date))}}</td>
                        <td>{{$fs->quantity}}</td>
                    </tr>
                @endforeach 
                
            </tbody>
        </table>
    @endif     
</div>
<table class="table table-bordered border-dark invoice2 mb-0">
        <tbody class="footer-logo">  
          <tr>
            <td style="border: 1px solid;border-color: #273133;">
              <?php
              $image = public_path('src/imgs/logos/shambapro.webp');
              ?>
              <img src="{{ $image }}" alt="" style="margin-top:10px;margin-left: 10px;">
              <br/>
              <a href="www.shambapro.com">www.shambapro.com</a>
            </td>
            <td>
              <p class="py-4" style="color: #273133;">The data presented in this report is the sole property of the farm owner and is not to be shared or distributed to third parties without their written permission. For inquiries, please write to <a href="mailto:hello@shambapro.com"> hello@shambapro.com</a></p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>
</html>