<?php
    include('api.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <link rel="stylesheet" href="style.css">
  </head>
<body class="container mt-5">
<table class="table">   
  <div class="text-center">
  <i class='bx bxs-message-add fs-2 mb-2 text-success btn_primary' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ></i>
  </div>
  <thead class="table-dark">
  <tr>
      <th scope="col">#</th>
      <th scope="col">Agresor</th>
      <th scope="col">Estado</th>
      <th scope="col">Lugar de los hechos</th>
      <th scope="col">Descripcion</th>
      <th></th>

    </tr>
  </thead>
  <tbody>
 
      <?php
        foreach($denuncias as $clave => $valor){

          
      ?>
      <tr>  
        <th scope="row"><?php echo $valor->id; ?></th>
        
        <td><?php echo $valor->agresor; ?></td>
        <td><?php echo $valor->estado_suceso; ?></td>
        <td><?php echo $valor->lugar_suceso; ?></td>  
        <td><?php echo $valor->descripcion; ?></td>
        <td><i  class='bx bxs-edit fs-3 text-primary btn_primary' ></i> <i class='bx bx-message-square-x fs-3 text-danger btn_primary' id="btn_delete" value="<?php $valor->id?>"></i> </td>

      </tr>
      <?php 

      }
      ?>
      
     
  
    
  </tbody>
</table>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denuncia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action = "api.php">
       
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Agresor</label>
          <input type="text" name="agresor" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Estado</label>
          <input type="text" name="estado" class="form-control" id="exampleInputPassword1" required>
        </div>
       
          <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Lugar de los hechos</label>
          <input type="text" name="lugar_suceso" class="form-control" id="exampleInputPassword1"required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Descripcion</label>
          <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" required>
        </div>
       
        <button type="submit" class="btn btn-primary w-100">Enviar</button> 
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="app.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>