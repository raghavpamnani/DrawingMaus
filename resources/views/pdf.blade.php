<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sahastrabahu</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      .userImg {
          display: inline-block;
          padding: 0 25px;
          height: 50px;
          font-size: 16px;
          line-height: 50px;
          border-radius: 25px;
        
      }
      
      .userImg img {
          float: right;
          margin: 0 10px 0 -25px;
          height: 80px;
          width: 80px;
          border-radius: 50%;
      }
   
      .userImage{
          max-height: 70px;
      }
     

      img {
          float: center;
      }

      .clear {
          clear:both;
      }
      </style>
  
  </head>
    <body>
        <?php
          $avatarUrl =  public_path($participants->avatar);
        
          $arrContextOptions=array(
                          "ssl"=>array(
                              "verify_peer"=>false,
                              "verify_peer_name"=>false,
                          ),
                      );
          $type = pathinfo($avatarUrl, PATHINFO_EXTENSION);
          $avatarData = file_get_contents($avatarUrl, false, stream_context_create($arrContextOptions));
          $avatarBase64Data = base64_encode($avatarData);
          $imageData = 'data:image/' . $type . ';base64,' . $avatarBase64Data;
         ?>
         <?php
         $sketchUrl =  public_path('/images/drawing/cat.png');
       
         $arrContextOptions=array(
                         "ssl"=>array(
                             "verify_peer"=>false,
                             "verify_peer_name"=>false,
                         ),
                     );
         $type = pathinfo($sketchUrl, PATHINFO_EXTENSION);
         $sketchData = file_get_contents($sketchUrl, false, stream_context_create($arrContextOptions));
         $sketchBase64Data = base64_encode($sketchData);
         $sketchImg = 'data:image/' . $type . ';base64,' . $sketchBase64Data;
        ?>
         
          <div class="container">
              <div class="page-header">
                  <h4>Sahashtrabahu</h4>
                  <div class="row">
                      <div class="col-lg-6 "> Drawing Competition</div>
                      <div class="col-lg-3  pull-right" ><img src="{{ $imageData }}" alt="{{$participants->avatar}}" class="userImage thumbnail"/></div>
                      <div class="col-lg-3  pull-right" style="font-size:0.8em">
                          <p>Fullname : {{$participants->firstname}} {{$participants->lastname}}</p>
                          <p>Gender :{{$participants->gender}}</p>
                          <p>DOB :{{$participants->dob}}</p>
                      </div>
                  </div>
                </div>

                <img src="{{ $sketchImg }}" alt="{{$sketchImg}}"/>
             
          </div>
      
         
     
               
    </body>
</html>
