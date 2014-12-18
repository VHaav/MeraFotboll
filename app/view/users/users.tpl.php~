<h1><?=$title?></h1>
<a href="<?=$this->url->create('users/active') ?>"><i class="fa fa-check-square-o"> Se aktiva användare</i></a><br>
<a href="<?=$this->url->create('users/list') ?>"><i class="fa fa-align-justify"> Se samtliga användare</i></a><br>
<a href="<?=$this->url->create('form/add-user') ?>"><i class="fa fa-plus-square"> Lägg till användare</i></a><br>
<a href="<?=$this->url->create('users/inactive') ?>"><i class="fa fa-trash-o"> Se papperskorg</i></a>

<table class="table-users">

<tr>
    <th><?='Id'?></th>
    <th><?='Akronym'?></th>
    <th><?='Namn'?></th>
    <th><?='Email'?></th>
    <th><?='Soft-Delete'?></th>
    <th><?='Radera'?></th>
    <th><?='Uppdatera'?></th>
</tr> 
<?php foreach ($users as $user) : ?>
<tr >
    <td><?=$user->id?></td>
    <td><a href="<?=$this->url->create('users/id/' . $user->id)?>"><?=$user->acronym?></a></td>
    <td><?=$user->name?></td>
    <td><?=$user->email?></td>
    <?php
        $softDeleteURL = $this->url->create("users/soft-delete/$user->id");
        $bringBackURL = $this->url->create("users/bring-back/$user->id");
        if(isset($user->deleted)) { 
            echo "<td><a href='$bringBackURL'><i class='fa fa-check-square-o'></i></a></td>"; 
        } 
        else { 
            echo "<td><a href='$softDeleteURL'><i class='fa fa-square-o'></i></a></td>"; 
        } 
    ?>
    <td><a href="<?=$this->url->create('users/delete/' . $user->id) ?>"><i class="fa fa-trash"></i></a></td>
    <td><a href="<?=$this->url->create('users/update-form/' . $user->id) ?>"><i class="fa fa-pencil-square-o"></i></a></td>
</tr> 
<?php endforeach; ?>

</table>
<a href="<?=$this->url->create('user/reset') ?>">Reset DB</a>
