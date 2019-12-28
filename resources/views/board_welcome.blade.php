<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Support | Board</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets') }}/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets') }}/form-validation.css" rel="stylesheet">
  </head>

  <body style="background: #eee">

    <div class="container">
      <div class="py-3 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="{{ asset('assets') }}/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h3 class="py-1" style="background-color: lightgrey; border-radius: 3px; color: red;">Board Enquery Form</h3>
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
                <small class="text-muted">INstraction here ...</small>
              </div>
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

              <div class="col-md-5 mb-3">
                <label for="country">EIIN Number (Optional)</label>
                <input type="number" name="eiin" class="form-control form-control-sm" placeholder="EIIN Number">
              </div>

              <div class="col-md-7 mb-3">
                <label for="country">Registration Number (Optional)</label>
                <input type="number" name="eiin" class="form-control form-control-sm" placeholder="Registration number">
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

              <div class="col-md-7 mb-3">
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

            <div class="row">
              <div class="col-md-12 mb-12">
                <label >Your Message</label>
                <textarea name="message" class="form-control d-block w-100" required="" rows="3" minlength="20" maxlength="300"></textarea>
                <div class="invalid-feedback">
                  Please provide a minimum 20 characters length text.
                </div>
              </div>

              <div class="col-md-6 mt-md-2">
                <label for="">Documents 1 ( optional )</label>
                <input type="file" class="form-control form-control-sm" name="doc1" placeholder="">
                <!-- <small class="text-muted">Full name as displayed on card</small> -->
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mt-md-2">
                <label>Documents 2 (Optional)</label>
                <input type="file" class="form-control form-control-sm" name="doc2" placeholder="">
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-sm btn-primary col-md-4 col-sm-12 mb-2 form-control form-control-sm" type="submit">Submit This Query</button>
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