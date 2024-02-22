<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <table border="1">
    <tr>
        <th>User Data</th>
        
    </tr>
    <?php 

if(!empty($user_arr))
{
    foreach($user_arr as $user){

    

    
    ?>
    <tr>
            <td><?php echo $user->user_name; ?></td>
            <td><?php echo $user->user_image; ?></td>
            <td>
                <a href="/mvc-crud/update-user">
                    <i class="fa fa-pencil-square" area-hidden="true"></i></a>
            </td>
            <td> <a href="/mvc-crud/delete-user?del_id=<?php echo $user->user_id; ?>">
                <i class="fa fa-trash" area-hidden="true"></i></a></td>
        </tr>
        <?php } } ?>
   </table>
</body>
</html>