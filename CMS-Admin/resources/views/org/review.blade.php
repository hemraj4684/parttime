@extends('layouts.app')
 @section('title') Create Organization @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

     <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
              <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/org') }}">Organizations</a> </li>
              <li class="active"> Organization Review </li>
              </ol>
             
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    

<div class="col-lg-12">
    <section class="box nobox ">
                <div class="content-body">    
                
                
                <div class="row">
        
	
		<!-- Accordion START -->
                <div class="col-md-8  col-xs-12">
                    <div class="panel-group panel-default" id="accordion" role="tablist" aria-multiselectable="true">
                        <div style=" border:solid 1px #ddd; background-color:#fff; margin:20px auto; padding:15px;">
	

@if($contract)
     @foreach($contract as $row)                  
       
               <div style=" border:solid 1px #ddd; background-color:#fff; margin:20px auto;">
	<h1 style="text-align:center;">Contract Agreement</h1>
	<hr>

	<p>THIS SERVICE AGREEMENT (“Agreement”) is made and entered into as of the {{ $row->contract_start_date }}, which shall be effective from {{ $row->contract_start_date }}(“Effective Date”), by and between </p>
	<p><b>CMS a proprietary of Aadhya Analytics & Info Logics Private Limited</b> a company incorporated under the Companies Act, 1956 and having its corporate office at 2-39,<i> SriNagar Colony, Gannavaram, Vijayawada, Andhra Pradesh - 521101</i></p>
	<p>AND</p>
	<P><b>{{ $row->org_name }}</b>.  a company incorporated under the Companies Act, 1956 and having its principal place of business at _(address) referred as (“Customer” or Customer). 

</P>
	<P>For and in consideration of the <b>{{ $row->service_name }}</b> that the Customer has chosen from the list of services provided as part of CMS.</P>
	<br>
	<h3>1. PURPOSES/STRUCTURE/TERM OF AGREEMENT</h3>
	<br>
	<p><b>1.1. Purpose of Agreement</p></b>
	
<ol type="a">
	<li>CMS will provide (“<b>{{ $row->service_name }}</b>”) andthe Vendor is experienced and skilled in the administration, management, provision, performance and delivery of such Service and the business functions, responsibilities and tasks attendant with such services for customers.  The Vendor desires to provide the Services to the Customer for its business, all as specifically set forth in the Agreement.</li>
	
	<li>The Parties have identified specific purposes that they intend that the Parties performance pursuant to the Agreement will achieve.  These purposes include the following:</li> 
	
<ol type="i">	
	<li>Providing the security, confidentiality, availability, efficiency and stability of data that is exchanged as part of CMS services</li>
	<li>Support services available 24X7</li>
	<li>Securing the commitment by the Vendor to maintain currency in the information technology and resources used to provide services and otherwise, and to apply its size and scale to quickly provide hardware, software and personnel resources to support planned objectives that may be implemented concurrently for various services;</li>
	<li>Securing performance of the Services in accordance with the Service Levels, laws applicable to the Vendor and laws applicable to the Customer; </li>
	
</ol>
<br>
	<li>In the event of a conflict between the terms of the various documents that comprise the Agreement, the conflict shall be resolved in the following order of 
Provider has violated the Anti-Bribery Laws, Customer and its representatives shall have the right to review and audit, at Customer’s expense, any and all books and financial records of Service Provider at any time, and MSM shall be entitled partially or totally to suspend its performance hereunder until such time it is proven to Customer’s satisfaction that Service Provider has not violated the Anti-Bribery Laws.  In the event MSM determines, in its sole discretion (whether through an audit or otherwise), that Service Provider has violated the Anti-Bribery Laws, either in connection with this Agreement or otherwise, Customer may terminate this Agreement immediately upon written notice to Service Provider.  Such suspension or termination of this Agreement shall not subject Customer to any liability, whether in contract or tort or otherwise, to Customer or any third party, and Customer’s rights to indemnification shall survive such suspension or termination of this Agreement.
</li>
</ol>

<br>

	<p><b>2. Audit:</b></p>
	<p>Service Provider shall keep and maintain accurate books of account and records covering all transactions relating to this Agreement. Customer or Customer’s designee shall be entitled to (i) audit such books and records during Service Provider’s regular business hours and (ii) make copies and summaries of such books and records for use in auditing only.  All such books of account and records shall be retained by Service Provider for a minimum Three (3) years after expiration or termination of this Agreement.  Customer’s exercise of its audit right shall be without prejudice to any other rights or remedies arising under this agreement or by operation of law, and shall not prohibit Customer from disputing the accuracy of any payment at a later date. In the event the audit reveals a discrepancy which is more that 1% of the total payments made by Customer to the Service Provider, Customer shall have the right to recover such difference and along with interest at 10% per annum compounded annually. The Service Provider shall pay this difference as evidenced by the audit within 15 (Fifteen) days from the service of notice to this effect by Customer.</p>
<br>
	<p><b>3. Force Majeure:</b></p>
	<p>Neither Party shall be liable for any failure or delay in the performance of its obligations under this Agreement to the extent such failure or delay or both is caused because of fire, flood, earthquake, strikes, acts of war, terrorism, civil disorders, (each a  "Force Majeure Event").  Any Party so delayed in its performance will immediately notify the other by telephone or by the most timely means otherwise available (to be confirmed in writing within two (2) Business Days of the inception of such delay) and describe in reasonable detail the circumstances causing such delay with relevant documentary supporting. However the party claiming such event shall take all necessary steps to mitigate the delay so caused in spite of such Force Majeure Event. If under this clause either party is excused performance of any obligations for a continuous period of 30 days, then the other party may at any time hereafter while such performance continues to be excused, terminate this Agreement, without liability, by notice in writing to the other. Customer shall however, be liable to pay Vendor for the services rendered under this Agreement.</p>
<br>
	<p><b>4. Publicity:</b></p>Vendor shall be entitled to use the name (and the logo, if any, associated with the name) of the Customer, in its customer lists, any sales, </p>
	<ol type="a">	
	<li>connection with this Agreement, with appropriate training regarding the data safeguards and data protection requirements.</li>
	<li>On the Effective Date, the Vendor shall designate an individual as the primary security manager for all SOWunder the Agreement.  The security manager shall have overall responsibility for managing and coordinating the performance of the Vendor’s obligations set forth hereinabove.</li>
</ol>




<p>IN WITNESS WHEREOF, the parties hereto have caused this Agreement to be executed by their duly authorized representatives as of the Effective Date.</p>



	



</div>    

                     @endforeach
                      @endif



</div>
					
					</div>
<div class="clearfix"></div>


          <section class="box ">
		  <br/>
             <div class="content-body">
              <div class="row">
       
     
           <div class="col-xs-5 col-md-offset-5 padding-bottom-30">
                    <div class="text-left">
                    <form method="POST" action="{{ url('/org/decide') }}" role="form" class="form-horizontal" >
 	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input type="hidden" name="org_id" value="{{ $curorg }}">
         <button type="submit" name="save" class="btn btn-primary" value="save">Save</button>&nbsp;&nbsp;<button type="submit" name="delete" value="delete" class="btn btn-default delete">Delete</button>
</form>
            <br/>
                    </div>
					<div class="clearfix"></div>
                  </div>
				  
				  
			  </div>
			  </div>
			  </section>
	
                </div>
                <!-- Accordion END -->
		
		
		<div class="col-md-4 col-xs-12 box">
		<section class="box">
        
          @if($orgs)
                      @foreach($orgs as $org)
		<br/>
            <div class="uprofile-image">
                <img alt="" src="{{ URL::asset('public/orgimages/'.$org->org_logo_image) }}" class="img-responsive">
            </div>
            <div class="uprofile-name">
                <div>Organization Name:<strong> {{ $org->org_name }} </strong>
                <div class="clearfix"></div>
                Organization ID:<strong> {{ $org->org_unique_id }} </strong>
                
                <br/><hr>
                <div style="text-align:left;margin-left:50px;">
                <div><i class="fa fa-globe">&nbsp;&nbsp;</i>{{ $org->org_url }}</div>
			  <div><i class="fa fa-building">&nbsp;&nbsp;</i>{{ $org->org_headquarters }}</div>
			  <div><i class="fa fa-users">&nbsp;&nbsp;</i>{{ $org->org_num_employees }} Employees</div>
	<div><i class="fa fa-money">&nbsp;&nbsp;</i>{{ $org->org_annual_budget }} Budget/ Annum</div>
			  <div><i class="fa fa-suitcase">&nbsp;&nbsp;</i><?php  if($org->account_status_id ==1) echo 'Trail'; ?> Account</div>
              
               <div><i class="fa fa-suitcase">&nbsp;&nbsp;</i>
              Organization Type: <?php  if($org->org_type_id ==1) echo 'Private';?> 
               <?php  if($org->org_type_id ==2) echo 'Public'; ?>
               <?php  if($org->org_type_id ==3) echo 'Non-profit';  ?>
               <?php  if($org->org_type_id ==4) echo 'State Government';  ?>
              </div>
			  
			

                <a href="https://www.facebook.com/{{ $org->org_facebook }}" class="btn btn-primary btn-md facebook btn-xs" target="_blank"><i class="fa fa-facebook icon-xs"></i></a>
                <a href="https://twitter.com/{{ $org->org_twitter }}" class="btn btn-primary btn-md twitter  btn-xs" target="_blank"><i class="fa fa-twitter icon-xs"></i></a>
                
                </div>
            </div>  </div>
            <hr>
			
			
			
			
			<div class="row">
			 
			<div class="content-body" style="padding:5px 30px 30px 30px">
		<div class="col-xs-12"><strong>Services and Contracts</strong>
		
		
		<table class="table small">
                <thead>
                    <tr>
                       
                        <th>Services</th>
                        <th>Contract Term</th>
                    </tr>
                </thead>
                <tbody>
                     @if($contract)
                      @foreach($contract as $row)
                      @if($row->org_id == $org->org_id)
             		  <tr>
                        <td>{{ $row->service_name }}</td>
                        <td>{{ $row->contract_start_date }} to {{ $row->contract_end_date }}</td>
                    </tr>
                    @endif
                 @endforeach
                      @endif
                   
                </tbody>
            </table>
		
		
        </div>
		
		<div class="col-xs-12"><strong>Support</strong>
            <address class="margin-bottom-20 margin-top-10 small">
               @if($profuser)
                      @foreach($profuser as $row)
                      @if($row->org_id == $org->org_id)
                      <div class="col-xs-12">
                        <span class="sName">{{ $row->professional_user }}</span><br>
                <abbr title="Phone">Phone:</abbr><span> {{ $row->phone_number }}</span><div class="clearfix"></div>
				<abbr title="Email">Email:</abbr><span> {{ $row->email }}</span><div class="clearfix"></div>
                </div>
                   @endif
                 @endforeach
                      @endif
				 
            </address>	
            
             
        </div>
			 
			 
		 @if($address)
                      @foreach($address as $row)
                           @if($row->org_id == $org->org_id)
                           
                           <div class="col-xs-12"><strong>Address: {{ $row->address_name }}</strong>
            <address class="margin-bottom-20 margin-top-10 small">
                <span class="line1">{{ $row->address_line1 }}</span>, <span>{{ $row->address_line2 }}</span>,
             <span class="city">{{ $row->city }}</span>, <span class="state">{{ $row->state }}</span>, <span class="pin">{{ $row->zipcode }}</span><br>
                <abbr title="Phone">Phone:</abbr><span> {{ $row->telephone }}</span>,  @if($row->fax)<abbr title="FAX">FAX:</abbr><span> {{ $row->fax }}</span>  @endif
				<abbr title="Email">Email:</abbr><span> {{ $row->email }}</span>
				 <div><i class="fa fa-map-marker"></i>&nbsp; <span>latitude: {{ $row->latitude }}</span> &nbsp; <span>longitude: {{ $row->longitude }}</span></div>
            </address>	
        </div>
        
        
                      	 
                 
                    @endif @endforeach @endif
			 
			 
			 <div class="clearfix"></div>
			 </div>
			 </div>
			
			
			
				
	   @endforeach
                      @endif
			
			
           </section>

        </div>
	
	
	</div>
        </div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
    </section>   
    
@endsection
