@extends('layouts.app')
 @section('title') Show Contract @stop
@section('content')
 <script type="text/javascript" src="{{ URL::asset('theme/assets/js/jquery.print.js') }}"></script>
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script type="text/javascript">
$(function() {
$("#hrefPrint").click(function() {
// Print the DIV.
$("#printcontract").print();
return (false);
});
});
</script>
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
           <a href="#" id="hrefPrint">Print DIV</a>
            <div class="content-body" id="printcontract">
    <div class="row">
                    
               <div class="container" style="max-width:960px; border:solid 1px #ddd; background-color:#fff; margin:20px auto;">
	<h1 style="text-align:center;">Contract Agreement</h1>
	<hr>

	<p>THIS SERVICE AGREEMENT (“Agreement”) is made and entered into as of the _______day of_______, 2016 which shall be effective from _______________________(“Effective Date”), by and between </p>
	<p><b>CMS a proprietary of Aadhya Analytics & Info Logics Private Limited</b> a company incorporated under the Companies Act, 1956 and having its corporate office at 2-39,<i> SriNagar Colony, Gannavaram, Vijayawada, Andhra Pradesh - 521101</i></p>
	<p>AND</p>
	<P><b>(Organization)</b>.  a company incorporated under the Companies Act, 1956 and having its principal place of business at _(address) referred as (“Customer” or Customer). 

</P>
	<P>For and in consideration of the <b>(Service)</b> that the Customer has chosen from the list of services provided as part of CMS.</P>
	<br>
	<h3>1. PURPOSES/STRUCTURE/TERM OF AGREEMENT</h3>
	<br>
	<p><b>1.1. Purpose of Agreement</p></b>
	
<ol type="a">
	<li>CMS will provide (“Service”) andthe Vendor is experienced and skilled in the administration, management, provision, performance and delivery of such Service and the business functions, responsibilities and tasks attendant with such services for customers.  The Vendor desires to provide the Services to the Customer for its business, all as specifically set forth in the Agreement.</li>
	
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

<div class="row">
<div class="col-md-6 col-xs-6">
<pre>
_______________________________
(“Customer)



Name:  _____________________________

Title:  ______________________________
</pre>
</div>
<div class="col-md-6 col-xs-6">
<pre>
Aadhya Analytics and Info Logics Private Limited.
(“Vendor”)



Name:  _____________________________

Title: _____________________________
</pre>
</div>

</div>


	



</div> 
                
                </div>
    		</div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
      
              	<style>
		ol li{text-indent:0px;}
		body{text-align:justify;}
		</style>      

@endsection
