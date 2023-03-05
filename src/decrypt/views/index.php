<!DOCTYPE html>
  <html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
  <body>
    <?= file_get_contents("./../layout/navbar.html");?>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="jquery-3.6.3.min.js"></script>

    </body>
</html>

    <?php 
      $realArray = (array) $data;
    ?>
    <table class="table">
      <?php foreach($realArray as $index => $dataArray): ?>
          <tr>
          <?php foreach($dataArray as $result): ?>
            <?php if(gettype($result) === "array"):?> 
              <td>
                <?= implode($result)?>
              </td>
            <?php else: ?>
              <td><?= $result?></td>
            <?php endif;?>
          <?php endforeach;?>
          </tr>
      <?php endforeach;?>
      </table>
<script>
  document.getElementById("site").classList.remove("active");
  document.getElementById("date").classList.remove("active");
  document.getElementById("decryption").classList.add("active");
</script>
