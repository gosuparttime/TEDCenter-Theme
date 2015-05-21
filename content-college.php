<script>
$(document).ready(function() {
	$("#signupForm").validate({
		//errorLabelContainer: $("#signupForm div.field_error"),
		// validate signup form on keyup and submit
		rules: {
			"49952[71516]": "required", // First name
			"49953[71517]": "required", // Last name
			"49954": { // Email
				required: true,
				email: true
			},
			"58275[71527]": "required", // Last name
			
		},
		messages: {
			"49952[71516]": "Please enter your first name",
			"49953[71517]": "Please enter your last name",
			"49954": "Please enter a valid email address",
			"58275[71527]": "Please enter a phone number", // Last name
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
      <h2>College Readiness Exam Sign-Up</h2>
      <p><em><span class="red">* All fields are required</span></em></p>
    </div>
    <div class="modal-body">
      <form action="http://demandengine.bm23.com/public/webform/process/" method="post" id="signupForm" >
        <input type="hidden" name="fid" value="kuhk78ximvatsyqh37utgrhx76v66" />
        <input type="hidden" name="sid" value="d4a671f6b0808e341eee3571eae99448" />
        <input type="hidden" name="delid" value="" />
        <input type="hidden" name="subid" value="" />
        <div class="row pad-one-b">
          <div class="col-xs-7">
            <label for="field_71516">First Name</label>
            <input type="text" id="field_71516" class="form-control"name="49952[71516]" value="" />
          </div>
          <div class="col-xs-7">
            <label for="field_71517">Last Name</label>
            <input type="text" id="field_71517" class="form-control" name="49953[71517]" value="" />
          </div>
        </div>
        <div class="row pad-one-b">
          <div class="col-xs-7">
            <label for="49954">Email Address</label>
            <input type="text" class="form-control"  name="49954" value="" />
          </div>
          <div class="col-xs-7" field_id="71527">
            <label for="field_71527" class="caption">Phone</label>
            <input type="text" id="field_71527" class="form-control" name="58275[71527]" value="" />
          </div>
        </div>
        <div class="row pad-one-tb" id="row_17848">
          <div class="col-xs-7" id="submit-field">
            <button type="submit" name="Submit" class="btn btn-info"><i class="fa fa-arrow-right"></i> Submit Request</button>
          </div>
          <div class="hideden" id="71531">
            <input type="hidden" id="field_71531" class="hidden field" name="49957[71531]" value="" />
            <input type="hidden" id="field_325042" class="hidden field" name="58272[325042]" value="College and Career Readiness Program" />
            <input type="hidden" name="49958[371130]" value="true" />
            <input type="hidden" name="58274[350499]" value="true" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>

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