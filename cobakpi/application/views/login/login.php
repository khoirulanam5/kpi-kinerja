<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> PT Internusa Master Niaga | <?php echo $title ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <style>
        .switch-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .switch-label {
            margin-top: 10px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>

<body class="gray-bg">

    <div class="container">
        <!-- Gambar - Kanan -->
        <div class="col-md-8">
            <br><br><br><br>
            <img src="<?php echo base_url('assets/img/login.jpeg')?>" alt="Login Image" class="img-fluid" style="max-width: 100%; max-height: 100%;">
        </div>
        <div class="row">
            <!-- Form Login - Kiri -->
            <div class="col-md-4">
                <div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top: 100px;">
                    <p style="font-size: 40px">Log In</p>
                    <div class="ibox-content">
                        <?php
                        if($this->session->flashdata('sukses')) {
                          echo $this->session->flashdata('sukses');
                      }
                      ?>
                      <form class="m-t" role="form" action="<?php echo site_url('login'); ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="switch-container">
                            <label class="switch">
                                <input type="radio" name="level" value="2" checked>
                                <span class="slider round"></span>
                            </label>
                            <div class="switch-label" id="karyawanLabel">Karyawan</div>
                            <label class="switch">
                                <input type="radio" name="level" value="1">
                                <span class="slider round"></span>
                            </label>
                            <div class="switch-label" id="pimpinanLabel">Pimpinan</div>
                        </div><br><br>
                        <button type="submit" class="btn btn-primary block full-width m-b">Log In</button>
                    </form>
                    <hr/>
                    <strong>Copyright</strong> PT Internusa Master Niaga © 2024 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var karyawanLabel = document.getElementById('karyawanLabel');
        var pimpinanLabel = document.getElementById('pimpinanLabel');
        var switchInputs = document.querySelectorAll('.switch input[name="level"]');

        switchInputs.forEach(function(switchInput) {
            switchInput.addEventListener('change', function() {
                karyawanLabel.style.fontWeight = this.value === '2' ? 'bold' : 'normal';
                pimpinanLabel.style.fontWeight = this.value === '1' ? 'bold' : 'normal';
            });
        });
    });
</script>

</body>

</html>
