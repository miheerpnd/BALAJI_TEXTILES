<!DOCTYPE html>
<html ang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .ppr {
            width: 100vm;
            height: 100vh;
            background-color: slategrey;
        }

        .ijh {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .iji {
            font-size: 18px;
        }

        .ijk {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        img {
            border: 2px solid black;
        }
    </style>
</head>

<body class="ppr">
    <div class="row" style="width: 100vm; height: 100vh;">
        <div class="col-6">
            <div style="width: 100%; height: 100vh; text-align: left; display: flex; justify-content: center; align-items: center;">
                <h1 style="font-size: 45px;" class="text-warning"><strong class="text-light ijk">Setting Up</strong> Your Profile First!</h1>
            </div>
        </div>
        <div class="col-6">
            <div style="width: 100%; height: 100vh; text-align: left; display: flex; justify-content: center; align-items: center;">
                <div style="width: 100%; padding: 20px; margin-right: 30px;" class="bg-light">
                    <h1 class="text-primary ijk">
                        Invoice Titles
                    </h1>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h1 class="ijk">
                                Hints ---->>>
                            </h1>
                        </div>
                        <div class="col-4">
                            <img src="assets/img/hint1.png" alt="hint1" width="100%" height="100px">
                        </div>
                        <div class="col-4">
                            <img src="assets/img/hint2.png" alt="hint2" width="100%" height="100px">
                        </div>
                    </div>
                    <hr>
                    <form name="MyForm" action="javascript:void(0)" onsubmit="valida()" autocomplete="on">
                        <div class="two fields" style="width: 100%;">
                            <div class="field">
                                <label>
                                    <h2 class="ijh">Title 1</h2>
                                </label> <br> <br>
                                <div class="ui fluid right icon input">
                                    <input class="iji" type="text" placeholder="Invoice Title" name="title1" required>
                                    <i class="icon bi bi-file-check"></i>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="field">
                                <label>
                                    <h2 class="ijh">Title 2</h2>
                                </label> <br> <br>
                                <div class="ui fluid right icon input">
                                    <input class="iji" type="text" placeholder="Invoice Sub-Title" name="title2" required>
                                    <i class="icon bi bi-file-earmark-medical"></i>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn-warning" style="width: 100%; height: 50px;">
                            SUBMIT
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function valida() {
            if (document.getElementById('cust_name') === "") {

            } else if (document.getElementById('cust_mobile' === "")) {

            } else {

                var formValues = $(document.forms["MyForm"]).serialize();

                $.post("php/pro/pro.php", formValues,
                    function(data, status) {
                        if (status == "success") {
                            if (data == "true") {
                                alert('Records has been submitted successfully!');
                                location.reload();
                            } else {
                                alert(data);
                            }
                        } else {
                            alert(data);
                        }
                    });
            }
        }
    </script>
</body>

</html>