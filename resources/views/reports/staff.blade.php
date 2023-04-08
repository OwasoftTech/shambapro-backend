<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
              border: 2px solid #3a8b38;
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
              border-bottom: 2px solid #3a8b38 !important;   
              border-right: 2px solid #3a8b38 !important;
              border-left: 2px solid #3a8b38 !important;
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
              border-right: 2px solid #3a8b38 !important; 
            }

            td {
              
              border-right: 2px solid #3a8b38 !important; 
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
  <body>
    <div class="container-xxl" style="padding-right: 10% !important;padding-left: 10% !important">
      <div class="sunfarm py-4">
        <div class="row-1">
            <div class="col-1">

          <h1 style="font-size: 18px !important;text-transform: uppercase;">{{ $user->farm_name }} LTD</h1>
    <h2 class="mb-1" style="font-size: 24px !important;">Staff Performance Report</h2>
    <?php
    $day = Carbon\Carbon::now()->format('j');
    $symbol = Carbon\Carbon::now()->format('S');
    $year = Carbon\Carbon::now()->format('F Y');
    
    ?>
    <p class="mb-1" style="font-size: 9px !important;text-transform: uppercase;">Generated On {{$day}}<sup>{{$symbol}}</sup> {{$year}} </p>
    </div>
    <br/>
    <div class="col-2">
        
    
    </div>
    </div>
    </div>
     @if(count($alljobs) > 0)
      <div class="table-responsive">
        <div class="text-center farmstock">
            Tasks/Jobs
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
          <thead class="TableHeader">
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Jobs Name</th>
              <th scope="col">Team Member</th>
              <th scope="col">Approval Level</th>
              <th scope="col">Actions to be Taken</th>
              <th scope="col">Comments</th>
            </tr>
          </thead>
          <tbody class="TableBody">
            @foreach($alljobs as $alljob)
            <tr class="dashed-border">
              <td>{{date('d M Y', strtotime($alljob->created_at))}}</td>
              <td>{{ $alljob->task }}</td>
              <td>{{$user->name}}</td>
              <td>{{$alljob->job_completion}}</td>
              <td>{{ $alljob->action  }}</td>
              <td>{{ $alljob->comments  }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    @if(count($members_total) > 0)  
      <div class="table-responsive">
        <div class="text-center farmstock">
            Tasks Summery
        </div>
        <table class="table table-bordered border-dark invoice2 mb-0">
          <thead class="TableHeader">
            <tr>
              <th scope="col">Team member</th>
              <th scope="col">Total Tasks</th>
              <th scope="col">Very Satisfied</th>
              <th scope="col">Fairly Satisfied</th>
              <th scope="col">To Be Repeated</th>
              <th scope="col">To Be Reallocated</th>
            </tr>
          </thead>
          <tbody class="TableBody">
            @foreach($members_total as $mt)
            <tr class="dashed-border">
              <td>{{ $mt->get_user($mt->user_id)->name }}</td>
              <td>
                @if($mt->total > 0)
                {{ $mt->total }}
                @endif
              </td>
              <td>
                @php
                    $temp = clone $members_verysatisfied;
                    $temp = $temp->where('user_id', $mt->user_id);
                @endphp
                  @if(!empty($temp) && count($temp) > 0)
                      {{ $temp->first()->total }}
                  @endif
              </td>
              <td>
                @php
                    $temp = clone $members_fairlysatisfied;
                    $temp = $temp->where('user_id', $mt->user_id);
                @endphp
                  @if(!empty($temp) && count($temp) > 0)
                      {{ $temp->first()->total }}
                  @endif
              </td>
              <td>
                @php
                    $temp = clone $members_toberepeated;
                    $temp = $temp->where('user_id', $mt->user_id);
                @endphp
                  @if(!empty($temp) && count($temp) > 0)
                      {{ $temp->first()->total }}
                  @endif
              </td>
              <td>
                @php
                    $temp = clone $members_tobereallocated;
                    $temp = $temp->where('user_id', $mt->user_id);
                @endphp
                  @if(!empty($temp) && count($temp) > 0)
                      {{ $temp->first()->total }}
                  @endif
              </td>
            </tr>
          @endforeach
            
          </tbody>
        </table>
      </div>
    @endif  
     <table class="table table-bordered border-dark invoice2 mb-0">
        <tbody class="footer-logo">  
          <tr>
            <td style="border: 1px solid;border-color: #273133;">
              <?php
              $image = public_path('src/imgs/logos/shambapro.webp');
              ?>
              <img src="{{ $image }}" alt="" style="margin-top:5px;margin-left: 10px;">
              <br/>
              <a href="www.shambapro.com" style="font-size: 10px;margin-left: 15px;">www.shambapro.com</a>
            </td>
            <td>
              <p class="py-2" style="color: #273133;">The data presented in this report is the sole property of the farm owner and is not to be shared or distributed to third parties without their written permission. For inquiries, please write to <a href="mailto:hello@shambapro.com"> hello@shambapro.com</a></p>
            </td>
          </tr>
        </tbody>
      </table> 
    </div>
  </body>
</html>
