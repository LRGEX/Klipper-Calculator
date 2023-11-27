<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="<?= base_url('assets/Dark logo.ico'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.min.css"> -->
    <script src="<?= base_url('js/lrgex.js'); ?>"></script>
    <title>LRGEX Klipper Calculator</title>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark">
    <br class="mb-3">
    <section class="rounded container bg-info col-sm-2">
        <div class="container mb-3 text-center flex-grow-1">
            <div class="d-inline-block">
                <img class="mb-3 me-3 img-fluid mt-4" width="60" src="<?= base_url('assets/Asset_5.png'); ?>">
                <img class="img-fluid" width="220"  src="<?= base_url('assets/Dark_Full_Logo.png'); ?>" onClick="window.location.href='<?= site_url(''); ?>'">
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <form class="form-group row" method="post" action="<?= site_url('klipper/calculate'); ?>" id="calculationForm">
                        <div class="mb-3">
                            <h5 class="text-center fs-4 fw-bold text-secondary">LRGEX Klipper <br> Rotational Calculator</h5>
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" step="0.00001" id="previousRotationalValue" name="previousRotationalValue" class="input" placeholder="Previous Rotational Value">
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control"  type="number" step="0.00001" id="measuredDistance" name="measuredDistance" class="input" placeholder="Measured Distance">
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" step="0.00001" id="targetDistance" name="targetDistance" class="input" placeholder="Target Distance">
                        </div>
                        <!-- Display server-side validation errors -->
                        <?php if (session()->has('errors')): ?>
                            <div class="alert-alert-danger">
                                    <p class="text-danger text-center fw-bold">No Empty Fields</p>
                            </div>
                        <?php endif; ?>

                        <!-- Display the calculation result if available -->
                        <?php if (isset($result)): ?>
                            <h5 class="text-center fs-3 text-primary" id="label-result"><b>New Rotational value</b> </h5>
                            <div class="input-group mb-3">
                            <input readonly onClick="select_all();" type="number" step="0.00001" id="result" name="result" class="form-control" value="<?= esc($result); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary mb-4" type="submit">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid bg-dark text-center text-white footer fixed-bottom">
            <div class="row">
                <div class="col-sm-12">
                    <p class="mt-3 mb-3">LRGEX &copy; <script>document.write(new Date().getFullYear());</script></p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>