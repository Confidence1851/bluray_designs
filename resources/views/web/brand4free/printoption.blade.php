<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-10 col-md-7 offset-2" style="margin-top:3%;">
    <p><strong>Congratulations, ChooseWise Cosmetics!</strong> Select your print choice.</p>
    <p style="margin-bottom:0px; color:#09F;"><strong>*Please note</strong></p><hr style="margin-bottom:2px; margin-top:3px;">
    <p style="font-size:14px; font-style:italic;">

       We do not pay for delivery. Delivery within Lagos usually cost between N1000 - N2500 and N2500 - N5000 outside Lagos depending on distance and location

    </p>
    </div>
    </div>



    <div class="row">
    <div class="col-12 col-sm-10 col-md-8 offset-2 jumbotron" style="margin-top:1%;">





        <div class="form-group">
        <label for="registered"><strong>Is your Business registered?:</strong></label>
        <select class="form-control" placeholder="" id="registered">
        <option>100 copies of Flyers</option>
        <option>100 copies of Business Card</option>
            <option>100 copies of Product Stickers</option>
                <option>1 3x5ft Flex Banner</option>
            </select>
          </div>

           <div class="form-group">
            <label for="business"><strong>Full Business Name:</strong></label>
            <input type="text" class="form-control" placeholder="e.g Fancy Smoothies" id="business" required="required">
          </div>


         <div class="form-group">
         <label for="Business Details"></label>
         <textarea class="form-control" placeholder="e.g phone number, email, website, list of services, company color etc"></textarea>
         </div>



            <div class="form-group">
            <label for="upload"><strong>Do you have a design already? Upload let's print for you (pdf, corel draw &amp; .jpg only)</strong></label>
            <input type="file" class="form-control-file" id="upload">



          </div>





          <button type="submit" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Submit</button>

          <!--modal section -->




            </div>
          </div>
        </div>












        <!--important note -->



















          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

             <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
              <script>
        $(document).ready(function(){
          $("button").click(function(){
            $("p").toggle();
          });
        });
        </script>


        </body>


</html>
