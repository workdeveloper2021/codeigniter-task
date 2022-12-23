<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .title{
            text-align:center;
        }
        .error{
            color:red;
        }
    </style>
  </head>
  <body>
    <h1 class="title">Registration Form</h1>
    
<div class="container">
    <?php
    if ($this->session->flashdata('exist')) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Username Or Email Aleready Exist!</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    } 
    if ($this->session->flashdata('five')) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Not upload more than 5 image!</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    } 
    if ($this->session->flashdata('success')) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Register Successfully!</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    } 
    ?>
    <form action="<?php echo base_url('Welcome/save')?>" id="form" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="username" class="form-label">User Name *</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="username">
        </div>
        <div class="mb-3">
                <label for="email" class="form-label">Email Id *</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
                <label for="password" class="form-label">Password*</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
                <label for="repassword" class="form-label">Re-enter Passwords *</label>
                <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Re-enter Password">
        </div>
        <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" name="dob" id="dob">
        </div>
        <div class="mb-3">
                <label for="number" class="form-label">Mobile Number *</label>
                <input type="number" class="form-control" name="number" id="number">
        </div>
        <div class="mb-3">
                <label for="address1" class="form-label">Address 1</label>
                <input type="text" class="form-control" name="address1" id="address1">
        </div>
        <div class="mb-3">
                <label for="address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" name="address2" id="address2">
        </div>
        <div class="mb-3">
                <label for="address2" class="form-label">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="india">INDIA</option>
                    </select>
        </div>
        <div class="mb-3">
                <label for="address2" class="form-label">State</label>
                    <select name="state" id="state" class="form-control">
                            <option value="mp">MADHYA PARDESH</option>
                            <option value="up">UTTAR PARDESH</option>
                        </select>
        </div>
        <div class="mb-3">
                <label for="address2" class="form-label">City</label>
                    <select name="city" id="city" class="form-control">
                            <option value="gwalior">Gwalior</option>
                            <option value="dewas">Dewas</option>
                            <option value="indore">Indore</option>
                            <option value="bhopal">Bhopal</option>
                    </select>
        </div>
        <div class="mb-3">
                <label for="reason" class="form-label">Reason Of Registration</label>
                    <textarea name="reason" class="form-control" id="reason" cols="5" rows="5"></textarea>
        </div>
        <div class="mb-3">
                <label for="pdf" class="form-label">PDF Upload</label>
                <input type="file" class="form-control" name="pdf" id="pdf">
        </div>
        <div class="mb-3">
                <label for="image" class="form-label">Image Upload</label>
                <input type="file" class="form-control" name="image[]" id="image" multiple>
        </div>

        <div class="mb-3">
                <input type="submit" class="form-control" value="submit">
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Jquery Validation CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('#form').validate({
                rules: {
                username: 'required',
                password: 'required',
                dob:'required',
                number:'required',
                repassword:{
                    required:true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 45,
                },
            }
            });
        });
   
    </script>
  </body>
</html>