<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Support | Institute</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets') }}/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets') }}/form-validation.css" rel="stylesheet">

    <style>
      .history_form_input{
        border: 1px solid darkgrey; padding: 3px; border-radius: 3px; display: block;
        margin-top: 3px;
      }
      td hr{
        padding: 0px; 
        margin: 0px;
      }
    </style>
  </head>

  <body style="background: #eee">

    <div class="container">
      <div class="py-3 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="{{ asset('assets') }}/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h3 class="py-1" style="background-color: lightgrey; color: red;">Institute Enquery Form</h3>
        <!-- <p class="lead">The Following form is created for to get all kind of your enquery.</p> -->

        @include('notification')
      </div>

      <div class="row" style="box-shadow: 0px 0px 3px green; padding: 10px; border-radius: 5px;">
        <div class="col-md-4 order-md-2 mb-4">
          <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Statistics</span>
            <span class="badge badge-secondary badge-pill">23</span>
          </h4> -->
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Questions</h6>
                <small class="text-muted">This Month</small>
              </div>
              <span class="text-muted">{{ $total_enquery }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Instractions</h6>
                <small class="text-muted">Instraction here ...</small>
              </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <form action="{{ route('institute_query_history') }}" method="POST">
              @csrf
                <input type="number" placeholder="EIIN" class="history_form_input" min="0" name="eiin" required>
                <input type="Password" placeholder="Password" class="history_form_input" name="password" required>
                <input type="submit" value="See My Queries" class="history_form_input">
              </form>
            </li>

            

            <!-- 
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li> -->
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" novalidate="" action="{{ route('frontend.enquery_submit') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="row">

              <div class="col-md-5 mb-3">
                <label for="country">EIIN Number</label>
                <input type="number" name="eiin" class="form-control form-control-sm" placeholder="EIIN Number" required>
                <div class="invalid-feedback">
                  Please provide your valid EIIN number.
                </div>
              </div>
              
              <div class="col-md-7 mb-3">
                <label for="country">EIIN Password</label>
                <input type="password" name="eiin_password" class="form-control form-control-sm" placeholder="EIIN Password" required="">
                <div class="invalid-feedback">
                  Please provide your valid EIIN Password.
                </div>
              </div>
              

              <div class="col-md-5 mb-3">
                <label><span>Board</span></label>
                <select class="custom-select d-block w-100 form-control-sm" name="board" required="">
                  <option value="">Select Your Board</option>
                  @foreach($boards as $board)
                    <option value="{{ $board->id }}">{{ $board->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-7 mb-6">
                <label>Service Name</label>
                <select class="custom-select form-control-sm" name="service_name" required="">
                  <option value="">Choose...</option>
                  @foreach($services as $service)
                    <option value="{{ $service->name }}">{{ $service->name }}</option>
                  @endforeach
                </select>
                
                <div class="invalid-feedback">
                  Please provide a valid Service Name.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label >Students Reg. Number (Optional)</label>
                <input type="text" class="form-control form-control-sm" name="student_reg"  placeholder="1234,5678,9876" value="">
              </div>


              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" placeholder="Your Name" value="" required="">
                <div class="invalid-feedback">
                  Name is required.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label >Contact Number</label>
                <input type="text" class="form-control form-control-sm" name="number"  placeholder="01xxxxxxxxx" value="" required="">
                <div class="invalid-feedback">
                  Contact is required.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label>Email </label>
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" name="email" placeholder="you@example.com" required="">
                  <div class="invalid-feedback" style="width: 100%;">
                    Email is required.
                  </div>
                </div>
              </div>
            </div>

            {{--
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            --}}

            <div class="row">
              <div class="col-md-12 mb-12">
                <label >Your Message</label>
                <textarea name="message" class="form-control d-block w-100" required="" rows="3" minlength="20" maxlength="300" placeholder="Please write your problem here clearly.If it is required to put any information about institute/student please give these."></textarea>
                <div class="invalid-feedback">
                  Please provide a minimum 20 characters length text.
                </div>
              </div>

              <div class="col-md-6 mt-md-2">
                <label for="">Documents 1 ( optional )</label>
                <input type="file" class="form-control form-control-sm" name="doc1" placeholder="">
              </div>
              <div class="col-md-6 mt-md-2">
                <label>Documents 2 (Optional)</label>
                <input type="file" class="form-control form-control-sm" name="doc2" placeholder="">
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-sm btn-primary col-md-4 col-sm-12 mb-2 form-control form-control-sm" type="submit">Send This Query</button>
            <button type="reset" class="btn btn-reset col-sm-6 col-md-4 mb-2 btn-sm btn-warning">Reset</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 1995 - {{ date('Y') }} Copotronic Info Systems Ltd</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Privacy</a></li>
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Terms</a></li>
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets') }}/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{ asset('assets') }}/popper.min.js.download"></script>
    <script src="{{ asset('assets') }}/bootstrap.min.js.download"></script>
    <script src="{{ asset('assets') }}/holder.min.js.download"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

    <script type="text/javascript">
      
    </script>
  

</body></html>