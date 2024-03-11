<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Search Form -->
    <table align="center" border="1" class="table table-striped">
    <form action="<?php echo base_url();?>index.php/Welcome/taskuserview" method="post">
        <tr><td>
            <input type="text" class="form-control" name="search" placeholder="Search...">
        </td> </tr>
        <tr>
            <td>
        <input type="submit" class="btn btn-primary" value="search"></tr></td>
    </form> 
</table>
    <table align="center" border="1">
        <?php if(isset ($search)) { ?>
            <div class="center-container">
                <p><?php echo $search;?></p>
            </div>
            <?php }
            else { ?>
                <table align="center" border="1" class="table table-striped">
                    <tr>
                    <th>Task</th>
                    <th>Name</th>
                    <th>RegisterNo</td>
                    
                </tr>
                <?php foreach($data as  $d)
                                { ?>
                                            <tr>
                                                <td><?php echo $d->task;?></td>
                                                <td><?php echo $d->name;?></td>
                                                <td><?php echo $d->regno;?></td>
                                                
                                                
                    <!-- <td><a href="" class="btn btn-outline-success">Approve</td> -->
 
                                            </tr>
                                <?php }

            } ?>
                

           
    </table>
    </body>
    </html>