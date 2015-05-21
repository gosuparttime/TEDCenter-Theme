<script>
$(document).ready(function() {
	$("#signupForm").validate({
		//errorLabelContainer: $("#signupForm div.field_error"),
		// validate signup form on keyup and submit
		rules: {
			"53669[71516]": "required", // First name
			"53670[71517]": "required", // Last name
			"53671": { // Email
				required: true,
				email: true
			},
			
		},
		messages: {
			"53669[71516]": "Please enter your first name",
			"53670[71517]": "Please enter your last name",
			"53671": "Please enter a valid email address",
			
		},
		
		submitHandler: function() {
			//alert("submitted!");
			form.submit();
		}
		
	});
});
</script>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h2>Learn More About TEDCenter Programs</h2>
    </div>
    <div class="modal-body">
      <form action="http://uc_syr.bm23.com/public/webform/process/" method="post" id="signupForm">
        <input type="hidden" name="fid" value="758juq5f2116bobzo3meqp09cq718" />
        <input type="hidden" name="sid" value="d4a671f6b0808e341eee3571eae99448" />
        <input type="hidden" name="delid" value="" />
        <input type="hidden" name="subid" value="" />
        <div class="row pad-one-b">
          <div class="col-xs-6" field_id="71516">
            <label>First Name <span class="red">*</span></label>
            <div class="field">
              <input type="text" id="field_71516" class="form-control" name="53669[71516]" value="" />
            </div>
          </div>
          <div class="col-xs-6" field_id="71517">
            <label>Last Name <span class="red">*</span></label>
            <div class="field">
              <input type="text" id="field_71517" class="form-control" name="53670[71517]" value="" />
            </div>
          </div>
        </div>
        <div class="row pad-one-b">
          <div class="col-xs-6">
            <label>E-mail Address <span class="red">*</span></label>
            <div class="field">
              <input type="text" class="form-control" name="53671" value=""  />
            </div>
          </div>
          <div class="col-xs-6" field_id="71527">
            <label>Phone Number </label>
            <div class="field">
              <input type="text" id="field_71527" class="form-control" name="58669[71527]" value="" />
            </div>
          </div>
        </div>
        <div class="row pad-one-b">
          <div class="col-xs-9">
            <label>TEDCenter Programs of Interest</label>
            <p>I am interested in the following program</p>
            <div class="field">
              <select id="field_325042" class="form-control" name="53672[325042]" >
                <option value="All TEDCenter Programs" selected="selected">All TEDCenter Programs</option>
                <option value="Get Social Workshops" >Get Social Workshops</option>
                <option value="Certified tedctr Master" >Certified SCRUM Master</option>
                <option value="Certified Financial Planner" >Certified Financial Planner</option>
                <option value="Intellectual Property" >Intellectual Property, Trademarks & Patents</option>
                <option value="College and Career Readiness Program" >College and Career Readiness Program</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row pad-one-b">
          <div class="col-xs-12">
            <button type="submit" name="Submit" class="btn btn-info"><i class="fa fa-arrow-right"></i> Submit Request</button>
            <input type="hidden" id="field_71531" class="hidden field" name="53674[71531]" value="" />
            <input type="hidden" name="53675[371130]" value="true" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
!function ($) {
	$(function(){
       	// carousel demo
		$('#myCarousel').carousel()
	})
}(window.jQuery)
//
var currentDate = new Date()
var day = currentDate.getDate()
if (day < 10) { day = '0' + day; }
var month = currentDate.getMonth() + 1
if (month < 10) { month = '0' + month; }
var year = currentDate.getFullYear()
var newDay = month + "/" + day + "/" + year
document.getElementById("field_71531").value = newDay;
</script> 
