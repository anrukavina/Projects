<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Cyclic Matrix</title>
</head>
<body>
  <div class="container mt-5">
    <div class="row h-50 justify-content-center align-items-center vh-auto">
        <form class="col-3" method="get">
            <div class="form-group row">
                <label for="formGroupExampleInput">Row Number:</label>
                <input type="number" class="form-control" name="row" value="<?=$row?>" min=1 required />
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput2">Column Number:</label>
                <input type="number" class="form-control" name="col" value="<?=$col?>" min=1 required />
            </div>
            <div class="form-group row">
              <select class="form-select" aria-label="Default select example" name="option">
                <option selected>Choose direction:</option>
                <option value="1">Left -> Right -> Down</option>
                <option value="2">Right -> Left -> Down</option>
                <option value="3">Left -> Right -> Up</option>
                <option value="4">Right -> Left -> Up</option>
              </select>
            </div>
            <div class="form-group row">
              <select class="form-select" aria-label="Default select example" name="index" required>
                <option selected>Choose starting value:</option>
                <option value="1">0</option>
                <option value="2">1</option>
              </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>

  <div class="container mt-5">

    <?php 
    
    // require_once 'cyclicMatrix1.php'; right - left- up

    // require_once 'cyclicMatrix2.php'; left - right - down

    // require_once 'cyclicMatrix3.php'; right - left - down

    // require_once 'cyclicMatrix4.php'; left - right - up
    
    switch(isset($_GET['option']) ? $_GET['option'] : 1) {
      case '1': 
        require_once 'Requires/cyclicMatrix2.php';
        break;

      case '2':
        require_once 'Requires/cyclicMatrix3.php';
        break;

      case '3':
        require_once 'Requires/cyclicMatrix4.php';
        break;

      case '4': 
        require_once 'Requires/cyclicMatrix1.php';
        break;

      default:
        require_once 'Requires/cyclicMatrix2.php';
    }

    ?>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>