
<section class="vh-100" style="background-color:#fff;">
<?php foreach ($user as $usr): ?>
    <form method="POST" action="<?php echo getenv('BASE_URL'); ?>user/update">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <!-- <h1 class="text-black mb-4">Welcome</h1> -->

        <?php if ($this->session->flashdata('success')): ?>
    <div id="mydiv" class="alert alert-success">
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div id="mydiv" class="alert alert-danger">
        <h4><i class="icon fa fa-times"></i> Failed!</h4>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<script>
    // Hide message after 5 seconds
    setTimeout(function() {
        var myDiv = document.getElementById("mydiv");
        if (myDiv) {
            myDiv.style.display = "none";
        }
    }, 5000);
</script>


        <div class="px-5 py-4">
            <a href="<?php echo getenv('BASE_URL').'logout'; ?>">
              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg">Logout</button>
                </a>
            </div>    

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
          <img src=<?php echo  $usr['profile_picture']?> class="img-responsive img-circle img-thumbnail" />

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Full name</h6>

              </div>
              <div class="col-md-9 pe-5">
                <input type="text" disabled value="<?php echo $usr['first_name']."&nbsp;".$usr['last_name']; ?>" class="form-control form-control-lg" />
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email address</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="email" disabled value="<?php echo $usr['email_address']; ?>" class="form-control form-control-lg" placeholder="example@example.com" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Phone Number</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input value="<?php echo $usr['phone_number']; ?>" type="number" name="phone" class="form-control form-control-lg" />
              </div>
            </div>
            <hr class="mx-n3">
            <div class="px-5 py-4">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Save</button>
            </div>
           
          </div>
        </div>

      </div>
    </div>
  </div>
</form>
<?php endforeach; ?>
</section>
</body>
</html>