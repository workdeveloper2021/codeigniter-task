<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
        <table class="table" border=1 cellspacing=0 cellpadding=0>
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Address 1</th>
                        <th scope="col">Address 2</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">City</th>
                        <th scope="col">Reason</th>
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td><?=$data[0]['username']?></td>
                        <td><?=$data[0]['email']?></td>
                        <td><?=$data[0]['dob']?></td>
                        <td><?=$data[0]['number']?></td>
                        <td><?=$data[0]['address1']?></td>
                        <td><?=$data[0]['address2']?></td>
                        <td><?=$data[0]['country']?></td>
                        <td><?=$data[0]['state']?></td>
                        <td><?=$data[0]['city']?></td>
                        <td><?= $data[0]['reason']?></td>
                    </tr>
                   
            </tbody>
        </table>
          <div style="margin-top:50px; margin-right: 20px; ">
               <?php 
                  if(!empty($data[0]['image'])){
                    $images =  explode(',', $data[0]['image']);
                    foreach ($images as $key => $value) {
                    $url = 'http://localhost/Codeigniter/'.$value;
                    $image = file_get_contents($url);
                    $src = 'data:image/jpg;base64,'.base64_encode($image);
                ?>
                 <img style="height: 100px; width: 100px;" src="<?= $src;?>">
                <?php  } } ?>
          </div>
       
  </body>
</html>