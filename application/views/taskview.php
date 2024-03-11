<html>
    </html>
    <head>
        
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z4ZrPO5wk/ylz9+O1jI1t0U0U7BFXhJ2or3JL2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <form method="post"  action="<?php echo base_url() ; ?>index.php/Welcome/updatetask">
        <!-- <input type="hidden" name="hide" value="<?php echo $id;?>"> -->
        <?php foreach ($data as $row)
        { 
           ?>
        <table>
            <tr>
                <input type="hidden" name="hide" value="<?php echo $row->tid;?>">
                
           
            <tr>
                <td>Task</td>
                <td><textarea name="task" class='form-control'> <?php echo $row->task;?></textarea></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="update" class='btn btn-success'>
                </td>
            </tr>

        </table>
        <?php } ?>
    </form>
</body>
</html>