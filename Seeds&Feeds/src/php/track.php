<?php
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
    require_once 'data/config.php';
?>

</section>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Farm Input Tracker</h4>
                    </div>
                    <div class="card-body">
                        <?php track(); ?>

                        <!--form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="input_id" value="<?php if(isset($_GET['input_id'])){echo $_GET['input_id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                
                                    $conn = connect();

                                    if(isset($_GET['input_id'])){
                                        $input_id = $_GET['input_id'];

                                        //$query = "SELECT * FROM tbl_inputorderdetails WHERE id='$input_id' ";
                                        $query= "SELECT * FROM tbl_inputorderdetails INNER JOIN tbl_inputs ON tbl_inputorderdetails.input_id = tbl_inputs.input_id ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $row){ 
                                                //if($row['name'] == $_GET['input_id'] || $row['desc'] == $_GET['input_id']){
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" value="<?= $row['name']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Description</label>
                                                    <input type="text" value="<?= $row['desc']; ?>" class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Quantity</label>
                                                    <input type="text" value="<?= $row['quantity']; ?>" class="form-control">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="">Total Ksh</label>
                                                    <input type="text" value="<?= $row['total']; ?>" class="form-control">
                                                </div>
                                                
                                            } //}
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div-->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
<?php include_once 'footer.php'; ?>