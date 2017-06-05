<!-- CORE JS FRAMEWORK - START --> 
<script src="<?php echo e(URL::asset('public/theme/assets/js/jquery-1.11.2.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/js/jquery.easing.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/viewport/viewportchecker.js')); ?>" type="text/javascript"></script> 
<script>window.jQuery||document.write('<script src="<?php echo e(URL::asset("public/theme/assets/js/jquery-1.11.2.min.js")); ?>"><\/script>');</script> 
<!-- CORE JS FRAMEWORK - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

<script src="<?php echo e(URL::asset('public/theme/assets/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/js/form-validation.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/js/icheck.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/jquery-validation/js/additional-methods.min.js')); ?>" type="text/javascript"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js" type="text/javascript"></script>





<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 




<script src="<?php echo e(URL::asset('public/theme/assets/plugins/datatables/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js')); ?>" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script src="<?php echo e(URL::asset('public/theme/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js')); ?>" type="text/javascript"></script>
 <script src="<?php echo e(URL::asset('public/theme/assets/plugins/datepicker/js/datepicker.js')); ?>" type="text/javascript"></script>

<!-- CORE TEMPLATE JS - START --> 
<script src="<?php echo e(URL::asset('public/theme/assets/js/scripts.js')); ?>" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

<style type="text/css">
.form-label {
    margin-top:20px;
}
.form-horizontal .form-group {
     margin-right: 0px !important; 
     margin-left: 0px !important; 
}
.hidden{
display:none;
}
#close
{
	cursor:pointer;

}
#create
{
	cursor:pointer;
}
</style>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- modal end -->
  

<script>

$(document).ready(function() {
	  $(".datepicker").datepicker();
    $(".datepicker").on("change",function(){
        var selected = $(this).val();
	   console.log(selected); 
var parts = selected.split("/");
var dd = parts[1];
var mm = parts[0];
var val2 = parseInt(parts[2]) + 1;
var newdate = mm+'/'+dd+'/'+val2;
console.log(newdate);
$('#yeardate').val(newdate);
    });
  $('.delete').on('click',function() {  
 	 var r = confirm("Are you sure you want to delete?");
		if (r == true) {
			//txt = "You pressed OK!";
			document.listview.submit(); return false;
		} else { return false;
			//txt = "You pressed Cancel!";
		}

  });
  
  });
$(document).ready(function(){
	
    $("#create").click(function(){
       $("#open").show();
	    $("#create").hide();
    });
	$("#close").click(function(){
       $("#open").hide();
	   $("#create").show();
    });
	
});

 
function showdiv(x)
	{
		$(".closeopen").hide();
		$('.col-lg-12').addClass('col-lg-8').removeClass('col-lg-12')
		$("#rightdiv").show();
		$("#"+x).show();
		 $('.SelectedUser').removeClass("SelectedUser");
		$("#"+x+'1').addClass('SelectedUser');
	}
 
    var lastEvent = '';
    function toggle(id, event) {
        event = event || window.event;

        if (lastEvent === 'mousedown' && event.type === 'click' && event.detail > 0){
            lastEvent = event.type;
            return;
        }
    
        var el = document.getElementById(id);
        el.style.display = (el.style.display === 'none') ? 'inline-block' : 'none';
        lastEvent = event.type;
    }
</script>