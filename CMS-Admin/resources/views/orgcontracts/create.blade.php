@extends('layouts.app')
 @section('title') Create Contract @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                 <h1 class="title">{{ trans('org.module')}}</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             
             <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/contracts') }}">Contracts</a> </li>
              <li class="active"> Add Contract </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('contracts.add')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    
     {{ Form::open( ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgcontracts.store']]) }}	
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
    
          <div id="pills" class='wizardpills' >
          <ul class="form-wizard nav nav-pills">
            <li class="complete"><a href="#pills-tab1" data-toggle="tab" aria-expanded="false"><span>Creating organization</span></a></li>
            <li class="complete"><a href="#pills-tab2" data-toggle="tab" aria-expanded="false"><span>Creating Admin</span></a></li>
            <li class="complete"><a href="#pills-tab3" data-toggle="tab" aria-expanded="false"><span>Select Services</span></a></li>
            <li class="active"><a href="#pills-tab4" data-toggle="tab" aria-expanded="true"><span>Contract terms</span></a></li>
            <li><a href="#pills-tab5" data-toggle="tab"><span>Functional Support</span></a></li>
            <li><a href="#pills-tab6" data-toggle="tab"><span>Review</span></a></li>
          </ul>
          <div id="bar" class="progress active">
            <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
          </div>
          <div class="clearfix"></div>
          <br>
          <br>
          <div class="tab-content">
          <div class="tab-pane" id="pills-tab1">
            <h4>Creating organization</h4>
            <div class="clearfix"></div>
            <br>
            
           
            
          </div>
          <div class="tab-pane" id="pills-tab2">
            <h4>Creating org admin user and assign org admin role to user</h4>
            <br>
            
          </div>
      <div class="tab-pane" id="pills-tab3">
      <h4>Assigning service to organization</h4>
      <br>
          
    </div>
    <div class="tab-pane active" id="pills-tab4">
      <h4>Contract terms for service </h4>
      <br>
        <div class="col-xs-12 col-sm-9 col-md-8">
                  <div class="form-group">
        <label class="form-label">{{ trans('contracts.heading1')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('org_id',  ['' => 'Select Organisation'] + $orgs, $curorg, ['class' => 'form-control']) !!}
                           @if ($errors->has('org_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organisation</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">{{ trans('contracts.service')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('service_id',  ['' => 'Select Service'] + $services, null, ['class' => 'form-control']) !!}
                          @if ($errors->has('service_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose service</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
<div class="form-group">
                        <label class="form-label">{{ trans('contracts.heading2')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {{ Form::text('contract_start_date', null, ['class' => 'datepicker form-control','onkeyup' => 'lastdate()','id'=>'lastdate']) }}
                            @if ($errors->has('contract_start_date'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Start date of Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">{{ trans('contracts.heading3')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {{ Form::text('contract_end_date', null, ['class' => 'form-control ','id'=>'yeardate']) }}
                            @if ($errors->has('contract_end_date'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select End date of Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
        <label class="form-label">Contracts <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('contract_id',  ['' => 'Select Contract'] + $contracts, '', ['class' => 'form-control']) !!}
                           @if ($errors->has('contract_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                    
                      
                    <div class="form-group">
                        <label class="form-label">Status <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('status',  ['' => 'Select Status','1'=>'Active','0'=>'In Active'] , null, ['class' => 'form-control']) !!}
                                            @if ($errors->has('contract_status'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Status of Contract</strong>
                                    </span>
                                @endif
                                                  </div>
                      </div>
                                          
                  </div>
    </div>
    <div class="tab-pane" id="pills-tab5">
      <h4>Assigning Functional Supporttype</h4>
      <br>
      
      
    </div>
    <div class="tab-pane" id="pills-tab6">
      <h4>Assigning profession service user to account</h4>
      <br>
      
    </div>
    
    
   <div class="clearfix"></div>
    <ul class="pager wizard">
     
        <li class="next"> <button type="submit" class="btn btn-success">Next</button></li>
    </ul>
  </div>
</div>
 {{ Form::close() }}
         <div class="clearfix"></div>
    <ul class="pager wizard">
     
         <li class="next" id="openn"> <a onclick="openpreview()" class="btn btn-default">Preview</a></li>
         <li class="next" id="close" style="display:none;">
             <a onclick="closepreivew()" class="btn btn-default" >Close</a></li>
        <li class="next">
             <a onclick="printdiv()"  class="btn btn-default" >Print</a></li>
    </ul>
       
   <div id="open_preview" style="display:none;">
       <div style=" border:solid 1px #ddd; background-color:#fff; margin:20px auto;">
	<p style="text-align:center;margin:10px;font-weight: 400;color: #505458;font-size: 36px;" >Contract Agreement</h1>
	<hr>

	<p>THIS SERVICE AGREEMENT (“Agreement”) is made and entered into as of the contract_start_date, which shall be effective from contract_start_date(“Effective Date”), by and between </p>
	<p><b>CMS a proprietary of Aadhya Analytics & Info Logics Private Limited</b> a company incorporated under the Companies Act, 1956 and having its corporate office at 2-39,<i> SriNagar Colony, Gannavaram, Vijayawada, Andhra Pradesh - 521101</i></p>
	<p>AND</p>
	<P><b>org_name </b>.  a company incorporated under the Companies Act, 1956 and having its principal place of business at _(address) referred as (“Customer” or Customer). 

</P>
	<P>For and in consideration of the <b>service_name </b> that the Customer has chosen from the list of services provided as part of CMS.</P>
	<br>
	<h3>1. PURPOSES/STRUCTURE/TERM OF AGREEMENT</h3>
	<br>
	<p><b>1.1. Purpose of Agreement</p></b>
	
<ol type="a">
	<li>CMS will provide (“<b>service_name</b>”) andthe Vendor is experienced and skilled in the administration, management, provision, performance and delivery of such Service and the business functions, responsibilities and tasks attendant with such services for customers.  The Vendor desires to provide the Services to the Customer for its business, all as specifically set forth in the Agreement.</li>
	
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

      
    </div>                 
    </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
         <script type="application/javascript">
             function openpreview()
             {
                 console.log('test view');
                $("#open_preview").show();
                 $("#close").show();
                 $("#openn").hide();
    
             }
             function closepreivew()
             {
                 console.log('test view');
                $("#open_preview").hide();
                 $("#close").hide();
                 $("#openn").show();
    
             }
            function printdiv()
             {
                 alert(14);
                 var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

var pdf = new jsPDF();
pdf.fromHTML($('#open_preview').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
pdf.save('contracts.pdf');
}    
         </script>
         <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/jspdf/1.2.61/jspdf.min.js"></script>
@endsection
