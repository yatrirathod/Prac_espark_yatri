<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="container">
      <header>Job Application Form</header>
      <div class="progress-bar">
        <div class="step">
          <p>Basic</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Education</p>
          <div class="bullet">
              <span>2</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Work</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Lang</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Techno</p>
          <div class="bullet">
            <span>5</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Contact</p>
          <div class="bullet">
            <span>6</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
        <div class="step">
          <p>Submit</p>
          <div class="bullet">
            <span>7</span>
          </div>
          <div class="check fas fa-check">
          </div>
        </div>
      </div>
      <div class="form-outer">
        <form action="#" method="POST" id="Employeeform">
          {{ csrf_field() }} 
          <div class="page slide-page">
            <div class="title">Basic Info:</div>
            <div class="test">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname">
              @if($errors->has('firstname'))
              <div class="error">{{ $errors->first('firstname') }}</div>
              @endif
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname">
            </div>
            <div class="test">
              <label for="email">Email</label>
              <input type="email" name="email" id="email">
              <label for="designation">Designation</label>
              <input type="text" name="designation" id="designation">
            </div>
            <div class="test">
              <label for="phone">Phone No</label>
              <input type="text" name="phone" id="phone">
              <label for="" class="geneder">Geneder</label>
              <input type="radio" id="male" name="gender" value="male">
              <label for="gender">Male</label>
              <input type="radio" id="female" name="gender" value="female">
              <label for="gender">Female</label>
            </div>
            <div class="test">
              <label for="relation">RelationShip Status</label>
              <select name="relation" id="relation">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
              </select>
              <label for="dob" class="dateformt">Date of Birth</label>
              <input type="date" name="dob" id="dob">
            </div>
            <div class="test">
              <label for="add">Address</label>
              <input type="text" name="add" id="add">
              <label for="state">State</label>
              <select name="state" id="state" class="state">
                <option value="Gujarat">Gujarat</option>
                <option value="UttarPradesh">U.P</option>
                <option value="UttarKhand">U.K</option>
              </select>
            </div>
            <div class="test">
              <label for="city">City</label>
              <input type="text" name="city" id="city">
              <label for="zip">ZipCode</label>
              <input type="text" name="zip" id="zip">
            </div>
            <div class="field">
              <button class="firstNext next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Education Info:</div>
            <input type="hidden" name="cntEduc" id="cntEduc"  value="4">
            <div class="ssc">
              <div class="label">SSC Result</div>
              <input type="hidden" name="class[]" id="ssc"  value="SSC">
            </div>
            <div class="educ">
              <label for="nameBoard">Board</label>
              <input type="text" name="nameBoard[]" id="nameBoard">
              <label for="pasyear" class="dateformt">Pass Year</label>
              <input type="date" name="pasyear[]" id="pasyear">
              <label for="perc">Percentage</label>
              <input type="text" name="perc[]" id="perc">
            </div>
            <div class="borderLine"></div>
            <div class="ssc">
              <div class="label">HSC Result</div>
              <input type="hidden" name="class[]" id="hsc"  value="HSC">
            </div>
            <div class="educ">
              <label for="nameBoard">Board</label>
              <input type="text" name="nameBoard[]" id="nameBoard">
              <label for="pasyear" class="dateformt">Pass Year</label>
              <input type="date" name="pasyear[]" id="pasyear">
              <label for="perc">Percentage</label>
              <input type="text" name="perc[]" id="perc">
            </div>
            <div class="borderLine"></div>
            <div class="ssc">
              <div class="label">Bachelor Degree</div>
              <input type="hidden" name="class[]" id="bachelor"  value="Bachelor">
            </div>
            <div class="educ">
              <label for="nameBoard">Course</label>
              <input type="text" name="nameBoard[]" id="nameBoard">
              <label for="pasyear" class="dateformt">Pass Year</label>
              <input type="date" name="pasyear[]" id="pasyear">
              <label for="perc">Percentage</label>
              <input type="text" name="perc[]" id="perc">
            </div>
            <div class="borderLine"></div>
            <div class="ssc">
              <div class="label">Master Degree</div>
              <input type="hidden" name="class[]" id="master"  value="Master">
            </div>
            <div class="educ">
              <label for="nameBoard">Course</label>
              <input type="text" name="nameBoard[]" id="nameBoard">
              <label for="pasyear" class="dateformt">Pass Year</label>
              <input type="date" name="pasyear[]" id="pasyear">
              <label for="perc">Percentage</label>
              <input type="text" name="perc[]" id="perc">
            </div>
            <div class="field btns">
              <button type="button" class="prev-1 prev">Previous</button>
              <button type="button" class="next-1 next">Next</button>
            </div>
          </div>
          <div class="page" id="workExperience">
            <div class="title">Work Experience:</div>
            <div class="work" id="companydata">
              <label for="companyName">CompanyName</label>
              <input type="text" name="companyName_1" id="companyName">
              <label for="desi" style="padding-right:14px !important;">Designation</label>
              <input type="text" name="desi_1" id="desi">
              <label for="from" class="dateformt">From</label>
              <input type="date" name="from_1" id="from">
              <label for="to" class="dateformt">To</label>
              <input type="date" name="to_1" id="to" style="margin-left: -19px;">
            </div>
            <div class="newItems"></div>
            <div>
              <input class="button button1" name="addExper" id="addExper" data-cnt="2" value="Add More" type="button">
              <input type="hidden" name="cntExp" id="cntExp" value="1">
            </div>
            <div class="field btns">
              <button type="button" class="prev-2 prev">Previous</button>
              <button type="button" class="next-2 next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Language Known:</div>
            <?php $lang_cnt = count($language); ?>
            @foreach($language as $lang)
            <div class="lang">
              <input type="checkbox" id="lang" name="Lang[]" value="{{$lang->id}}">
              <label for="lang">{{$lang->name}}</label>
              <input type="checkbox" id="read" name="level_{{$lang->id}}[]" value="read">
              <label for="read">Read</label>
              <input type="checkbox" id="write" name="level_{{$lang->id}}[]" value="write">
              <label for="speak">Write</label>
              <input type="checkbox" id="speak" name="level_{{$lang->id}}[]" value="speak">
              <label for="speak">Speak</label>
            </div>
            @endforeach
            <input type="hidden" name="cnt_lang" value={{$lang_cnt}}>
            <div class="field btns">
              <button type="button" class="prev-3 prev">Previous</button>
              <button type="button" class="next-3 next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Technologies Known:</div>
            <?php $tech_cnt = count($techonolgy); ?>
            @foreach($techonolgy as $tech)
            <div class="techno">
              <input type="checkbox" id="tech" name="tech[]" value="{{$tech->id}}">
              <label for="php">{{$tech->name}}</label>
              <input type="radio" id="beg" name="techlevel_{{$tech->id}}" value="0">
              <label for="beg">Beginer</label>
              <input type="radio" id="middle" name="techlevel_{{$tech->id}}" value="1">
              <label for="middle">Middle</label>
              <input type="radio" id="expert" name="techlevel_{{$tech->id}}" value="2">
              <label for="expert">Expert</label>
            </div>
            @endforeach
            <input type="hidden" name="cnt_tech" value={{$tech_cnt}}>
            <div class="field btns">
              <button type="button" class="prev-4 prev">Previous</button>
              <button type="button" class="next-4 next">Next</button>
            </div>
          </div>
          <div class="page" id="referenceContact">
            <div class="title">Reference contact:</div>
            <div class="refer">
              <label for="refName" style="padding-right:14px !important;">Name</label>
              <input type="text" name="refName_1" id="refName">
              <label for="refContact" style="padding-right:14px !important;">Conact</label>
              <input type="text" name="refContact_1" id="refContact">
              <label for="refrelation" style="padding-right:14px !important;">Relation</label>
              <input type="text" name="refrelation_1" id="refrelation">
            </div>
            <div class="addmoreRefer"></div>
            <div>
              <input class="button button1" name="addRefere" id="addRefere" data-cnt="2" value="Add More" type="button">
              <input type="hidden" name="cntRef" id="cntRef" value="1">

            </div>
            <div class="field btns">
              <button type="button" class="prev-5 prev">Previous</button>
              <button type="button" class="next-5 next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Prefrence:</div>
            <div class="pref">
              <label for="location">Choose location:</label>
              <select name="location" id="location">
                <option value="ahmedabad">Ahmedabad</option>
                <option value="gandhinagr">Gandhinagar</option>
                <option value="surat">Surat</option>
              </select>
              <label for="department">Choose Department:</label>
              <select name="department" id="department">
                <option value="marketing">Marketing</option>
                <option value="desgining">Desgining</option>
                <option value="developer">Developer</option>
              </select>
            </div>
            <div class="pref">
              <label class ="prefelabel" for="np" style="padding-right:14px !important; padding-left: 51px !important;">NoticePeriod</label>
              <input type="text" name="np" id="np">
              <label  class ="prefelabel" for="ctc" style="padding-right:14px !important; padding-left: 51px !important;">CTC</label>
              <input type="text" name="ctc" id="ctc">
              <label class ="prefelabel" for="ectc" style="padding-right:14px !important;padding-left: 51px !important;">ECTC</label>
              <input type="text" name="ectc" id="ectc">
            </div>
            <div class="field btns">
              <button type="button" class="prev-6 prev">Previous</button>
              <button type="submit" class="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="{{ asset('public/js/script.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#Employeeform').on('submit',function(e){
          e.preventDefault();
          // alert("yatri");
          $.ajax({
            "type":"POST",
            "url":"employee_store",
            "data":$("#Employeeform").serialize(),
            "dataType":"JSON",
            success: function(response) {
              toastr.success(response['message']);
              window.location.href = "{{url('/employeeList')}}";
            },
            error: function(response) {
              toastr.error(response['errors']);
              console.log(response.responseJSON.message['errors']);
              $('.validation-div').text('');
              // $.each(response.responseJSON['error'], function( index, value ) {
              //   console.log(index);
              //   $('#val-'+index).text(value);
              // });
            }
          })
        });
        $('#addExper').on("click", function(){
          // console.log("yatri");
          var cnt = $(this).attr('data-cnt');
          $("#workExperience").find(".newItems").append('<div class="work" id="companydata"><label for="companyName">CompanyName</label><input type="text" name="companyName_'+cnt+'" id="companyName"><label for="desi" style="padding-right:14px !important;">Designation</label><input type="text" name="desi_'+cnt+'" id="desi"><label for="from" class="dateformt">From</label><input type="date" name="from_'+cnt+'" id="from"><label for="to" class="dateformt">To</label><input type="date" name="to_'+cnt+'" id="to" style="margin-left: -19px;"></div>');
          $('#cntExp').val(cnt);
          cnt = parseInt(cnt)+1;
          $(this).attr('data-cnt',cnt);
      });
      $('#addRefere').on("click", function(){
          // console.log("yatri");
          var cnt = $(this).attr('data-cnt');
          $("#referenceContact").find(".addmoreRefer").append('<div class="refer"><label for="refName" style="padding-right:14px !important;">Name</label><input type="text" name="refName_'+cnt+'" id="refName"><label for="refContact" style="padding-right:14px !important;">Conact</label><input type="text" name="refContact_'+cnt+'" id="refContact"><label for="refrelation" style="padding-right:14px !important;">Relation</label><input type="text" name="refrelation_'+cnt+'" id="refrelation"></div>');
          $('#cntRef').val(cnt);
          cnt = parseInt(cnt)+1;
          $(this).attr('data-cnt',cnt);
      });
      });
    </script>
  </body>
</html>
